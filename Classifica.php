<!DOCTYPE html>
<html>
<head>
    <title>Classifica - San Giorgio League</title>
    <style>
        .squadra-logo {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            vertical-align: middle;
        }
        .squadra-nome {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h1>Classifica Squadre</h1>
    
    <!-- Pulsanti navigazione -->
    <div class="d-flex justify-content-center gap-3 mb-4">
      <a href="index.php" class="nav-btn home-btn">
        <i class="bi bi-house-door me-2"></i>Home
      </a>
    </div>
    
    <?php
    include 'connessione.php';
    
    // Funzione per ottenere il percorso del logo in base al nome della squadra
    function getLogoPath($nomeSquadra, $conn) {
        $query = "SELECT immagini_loghi FROM squadre WHERE Nome = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $nomeSquadra);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return './immagini/' . $row['immagini_loghi'];
        }
        return ''; // Ritorna stringa vuota se non trova il logo
    }
    
    $query_squadre = "SELECT squadre.Nome, squadre.PT, squadre.G, squadre.V, squadre.N, squadre.P, squadre.DR, squadre.Girone 
                     FROM squadre 
                     WHERE squadre.Cod_campionato = 1 
                     ORDER BY squadre.Girone, squadre.PT DESC, squadre.DR DESC";
    $result_squadre = $conn->query($query_squadre);
    
    if ($result_squadre->num_rows > 0) {
        $current_girone = '';
        while($row = $result_squadre->fetch_assoc()) {
            if ($row['Girone'] != $current_girone) {
                if ($current_girone != '') echo "</table>";
                echo "<h2>Girone ".$row['Girone']."</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Posizione</th><th>Squadra</th><th>Punti</th><th>Partite</th><th>Vittorie</th><th>Pareggi</th><th>Sconfitte</th><th>Differenza Reti</th></tr>";
                $current_girone = $row['Girone'];
                $posizione = 1;
            }
            
            // Ottieni il percorso del logo
            $logoPath = getLogoPath($row['Nome'], $conn);
            
            echo "<tr>
                    <td>".$posizione."</td>
                    <td>";
            
            // Mostra il logo solo se esiste
            if (!empty($logoPath)) {
                echo "<img src='".$logoPath."' class='squadra-logo' alt='".$row['Nome']."'>";
            }
            
            echo "<span class='squadra-nome'>".$row['Nome']."</span></td>
                    <td>".$row['PT']."</td>
                    <td>".$row['G']."</td>
                    <td>".$row['V']."</td>
                    <td>".$row['N']."</td>
                    <td>".$row['P']."</td>
                    <td>".$row['DR']."</td>
                  </tr>";
            $posizione++;
        }
        echo "</table>";
    } else {
        echo "<p>Nessuna squadra trovata</p>";
    }

    echo "<h1>Classifica Marcatori</h1>";
    
    $query_marcatori = "SELECT giocatori.Nome, giocatori.Cognome, squadre.Nome AS squadra, SUM(cont_goal.Goal) AS gol_totali
                       FROM giocatori
                       JOIN cont_goal ON giocatori.ID_giocatori = cont_goal.Cod_giocatori
                       JOIN squadre ON giocatori.Cod_squadre = squadre.ID_squadre
                       WHERE squadre.Cod_campionato = 1
                       GROUP BY giocatori.ID_giocatori
                       ORDER BY gol_totali DESC";
    
    $result_marcatori = $conn->query($query_marcatori);
    
    if ($result_marcatori->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Posizione</th><th>Giocatore</th><th>Squadra</th><th>Gol</th></tr>";
        $posizione = 1;
        while($row = $result_marcatori->fetch_assoc()) {
            $nome_completo = trim($row['Nome'] . ' ' . $row['Cognome']);
            
            // Ottieni il percorso del logo per la squadra del marcatore
            $logoPath = getLogoPath($row['squadra'], $conn);
            
            echo "<tr>
                    <td>".$posizione."</td>
                    <td>".$nome_completo."</td>
                    <td>";
            
            // Mostra il logo solo se esiste
            if (!empty($logoPath)) {
                echo "<img src='".$logoPath."' class='squadra-logo' alt='".$row['squadra']."'>";
            }
            
            echo "<span class='squadra-nome'>".$row['squadra']."</span></td>
                    <td>".$row['gol_totali']."</td>
                  </tr>";
            $posizione++;
        }
        echo "</table>";
    } else {
        echo "<p>Nessun marcatore trovato</p>";
    }
    
    $conn->close();
    ?>
</body>
</html>