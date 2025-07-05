<html>
<head>
    <title>San Giorgio League - Eventi Passati</title>
</head>
<body>
    <?php
    include 'connessione.php';
    if (!isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori'])) {
        echo "<h1>Seleziona un Campionato</h1>";
        echo "<form method='POST'>";
        echo "<button type='submit' name='scelta' value='sangiorgileague'>San Giorgio League</button>";
        echo "<button type='submit' name='scelta' value='king'>King</button>";
        ?>

        <input type="button" onclick="location.href='index.php'" value="home"/>

        <?php
        echo "</form>";
    }
    elseif (isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori'])) {
        $scelta = $conn->real_escape_string($_POST['scelta']);
        echo "<h1>$scelta</h1>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='scelta' value='$scelta'>";
        echo "<button type='submit' name='Classifica'>Classifica</button>";
        echo "<button type='submit' name='Marcatori'>Marcatori</button>";
        ?>

        <input type="button" onclick="location.href='Eventi_passati1.php'" value="Visulazza i campioanti"/>

        <?php
        echo "</form>";
    }
    elseif (isset($_POST['Classifica'])) {
        $scelta = $conn->real_escape_string($_POST['scelta']);
        
        echo "<h1>$scelta - Classifica</h1>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='scelta' value='$scelta'>";
        echo "<button type='submit' name='Marcatori'>Vedi Marcatori</button>";
        echo "<button type='submit' name='indietro'>Torna al Menu</button>";
        echo "</form>";

        $query_campionato = "SELECT ID_campionato FROM campionati WHERE Nome = ? LIMIT 1";
        $stmt = $conn->prepare($query_campionato);
        $stmt->bind_param("s", $scelta);
        $stmt->execute();
        $result_campionato = $stmt->get_result();

        if ($result_campionato->num_rows > 0) {
            $id_campionato = $result_campionato->fetch_assoc()['ID_campionato'];

            $query_gironi = "SELECT DISTINCT Girone FROM squadre WHERE Cod_campionato = ? ORDER BY Girone";
            $stmt = $conn->prepare($query_gironi);
            $stmt->bind_param("i", $id_campionato);
            $stmt->execute();
            $result_gironi = $stmt->get_result();

            $gironi = [];
            while ($row = $result_gironi->fetch_assoc()) {
                $gironi[] = $row['Girone'];
            }

            if (!empty($gironi)) {
                foreach ($gironi as $girone) {
                    echo "<h2>Girone $girone</h2>";
                    echo "<table border='1'>";
                    echo "<tr>
                            <th>Squadra</th>
                            <th>Punti</th>
                            <th>Partite Giocate</th>
                            <th>Vittorie</th>
                            <th>Pareggi</th>
                            <th>Sconfitte</th>
                            <th>Differenza Reti</th>
                          </tr>";

                    $query_classifica = "SELECT Nome AS squadra, PT AS Punti, G AS Partite_giocate, V AS Vittorie, N AS Pareggi, P AS Sconfitte, DR AS Differenza_reti
                                         FROM squadre 
                                         WHERE Cod_campionato = ? AND Girone = ?
                                         ORDER BY Punti DESC, Differenza_reti DESC";
                    $stmt = $conn->prepare($query_classifica);
                    $stmt->bind_param("is", $id_campionato, $girone);
                    $stmt->execute();
                    $result_classifica = $stmt->get_result();

                    while ($row = $result_classifica->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['squadra'] . "</td>
                                <td>" . $row['Punti'] . "</td>
                                <td>" . $row['Partite_giocate'] . "</td>
                                <td>" . $row['Vittorie'] . "</td>
                                <td>" . $row['Pareggi'] . "</td>
                                <td>" . $row['Sconfitte'] . "</td>
                                <td>" . $row['Differenza_reti'] . "</td>
                              </tr>";
                    }
                    echo "</table>";
                }
            } else {
                echo "Nessun girone trovato per questo campionato.";
            }
        } else {
            echo "Campionato non trovato.";
        }
    }
    elseif (isset($_POST['Marcatori'])) {
        $scelta = $conn->real_escape_string($_POST['scelta']);
        
        echo "<h1>$scelta - Classifica Marcatori</h1>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='scelta' value='$scelta'>";
        echo "<button type='submit' name='Classifica'>Vedi Classifica</button>";
        echo "<button type='submit' name='indietro'>Torna al Menu</button>";
        echo "</form>";

        $query_campionato = "SELECT ID_campionato FROM campionati WHERE Nome = ? LIMIT 1";
        $stmt = $conn->prepare($query_campionato);
        $stmt->bind_param("s", $scelta);
        $stmt->execute();
        $result_campionato = $stmt->get_result();
        
        if ($result_campionato->num_rows > 0) {
            $id_campionato = $result_campionato->fetch_assoc()['ID_campionato'];
            
            $query_marcatori = "SELECT giocatori.ID_giocatori, giocatori.Nome, giocatori.Cognome, squadre.Nome AS squadra, SUM(cont_goal.Goal) AS totale_goal
                                FROM giocatori
                                JOIN squadre ON giocatori.Cod_squadre = squadre.ID_squadre
                                JOIN cont_goal ON giocatori.ID_giocatori = cont_goal.Cod_giocatori
                                WHERE squadre.Cod_campionato = ?
                                GROUP BY giocatori.ID_giocatori
                                ORDER BY totale_goal DESC";

            $stmt = $conn->prepare($query_marcatori);
            $stmt->bind_param("i", $id_campionato);
            $stmt->execute();
            $result_marcatori = $stmt->get_result();

            if ($result_marcatori->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr>
                        <th>Posizione</th>
                        <th>Giocatore</th>
                        <th>Squadra</th>
                        <th>Gol Segnati</th>
                      </tr>";

                $posizione = 1;
                while ($row = $result_marcatori->fetch_assoc()) {
                    $nome_completo = trim($row['Nome'] . ' ' . $row['Cognome']);
                    echo "<tr>
                            <td>$posizione</td>
                            <td>$nome_completo</td>
                            <td>{$row['squadra']}</td>
                            <td>{$row['totale_goal']}</td>
                          </tr>";
                    $posizione++;
                }
                echo "</table>";
            } else {
                echo "<p>Nessun marcatore trovato per questo campionato.</p>";
            }
        } else {
            echo "<p>Campionato non trovato.</p>";
        }
    }
    elseif (isset($_POST['indietro'])) {
        header("Location: Eventi_passati1.php");
        exit();
    }

    $conn->close();
    ?>
</body>
</html>