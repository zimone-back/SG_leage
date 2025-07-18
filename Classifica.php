<!DOCTYPE html>
<html lang="it">
<head>
    <title>Classifica - San Giorgio League</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="./immagini/logosgl.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="./style.css">

    //qui sta lo sfondo fatto bene
    <style>
        body {
        padding-top: 70px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        }

        body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("./immagini/logosgl.jpg");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        z-index: -2;
        object-fit: cover;
        background-attachment: scroll;
        }

        body::after {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -1;
        }

        /* REGOLA UGUALE MOBILE E DESKTOP */
        @media (max-width: 767px) and (orientation: portrait) {
        body::before {
            background-size: 100% auto;
            min-height: 100vh;
        }
        }

        @media (max-width: 767px) and (orientation: landscape) {
        body::before {
            background-size: auto 100%;
            min-width: 100vw;
        }
        }

        @media (min-width: 768px) {
        body::before {
            background-size: contain;
            background-color: #f8f9fa;
        }

        body::after {
            background: rgba(255, 255, 255, 0.7);
        }
        }

        /* Immagini logo */
        .squadra-logo {
        width: 30px;
        height: 30px;
        margin-right: 10px;
        vertical-align: middle;
        border-radius: 50%;
        object-fit: cover;
        }

        .squadra-nome {
        vertical-align: middle;
        }

        /* Pulsanti */
        .nav-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .home-btn {
        background-color: #1e3a8a;
        color: white;
        }

        /* Tabelle */
        .table-container {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: none;
        scrollbar-width: none;
        }

        .table-container::-webkit-scrollbar {
        display: none;
        }

        .table-classifica {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
        background-color: rgba(255, 255, 255, 0.9);
        }

        .table-classifica th {
        background-color: #1e3a8a;
        color: white;
        padding: 12px;
        text-align: center;
        font-weight: 600;
        position: sticky;
        top: 0;
        }

        .table-classifica td {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #dee2e6;
        }

        .table-classifica tr:hover {
        background-color: #f1f5ff;
        }

        /* Evidenziazioni */
        .primo {
        background-color: rgba(40, 167, 69, 0.15) !important;
        }
        .primo td:first-child {
        position: relative;
        }
        .primo td:first-child::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background-color: #28a745;
        }

        .retrocessione {
        background-color: rgba(220, 53, 69, 0.15) !important;
        }
        .retrocessione td:first-child {
        position: relative;
        }
        .retrocessione td:first-child::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background-color: #dc3545;
        }

        /* Legenda */
        .legenda-classifica {
        background-color: rgba(248, 249, 250, 0.9);
        border: 1px solid #dee2e6;
        margin-bottom: 1rem;
        padding: 0.75rem;
        border-radius: 0.5rem;
        }
        .legenda-classifica h6 {
        font-weight: bold;
        margin-bottom: 0.5rem;
        }
        .legenda-color {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 4px;
        margin-right: 0.5rem;
        }
        .legenda-color.primo {
        background-color: rgba(40, 167, 69, 0.3);
        border-left: 4px solid #28a745;
        }
        .legenda-color.retrocessione {
        background-color: rgba(220, 53, 69, 0.3);
        border-left: 4px solid #dc3545;
        }

        /* Card */
        .card {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        }



    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="
        background: rgba(30, 58, 138, 0.8);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255,255,255,0.1);
    ">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <img src="./immagini/logoprimario.jpg" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;">
                San Giorgio League
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4 animate__animated animate__fadeInDown">Classifica Squadre</h1>
        
        <!-- Pulsanti navigazione -->
        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="index.php" class="nav-btn home-btn">
                <i class="bi bi-house-door me-2"></i>Home
            </a>
        </div>
        
        <?php
        include 'connessione.php';
        include 'utility.php'; // Inclusione del file con la funzione getLogoPath()
        
        // Aggiunta della legenda
        echo '<div class="legenda-classifica animate__animated animate__fadeIn">';
        echo '<h6><i class="bi bi-info-circle me-2"></i>Legenda:</h6>';
        echo '<div class="d-flex flex-wrap gap-3">';
        echo '<div class="d-flex align-items-center"><span class="legenda-color primo"></span>Qualificate ai quarti</div>';
        echo '<div class="d-flex align-items-center"><span class="legenda-color retrocessione"></span>Eliminata</div>';
        echo '</div>';
        echo '</div>';
        
        // Query per ottenere i gironi distinti
        $query_gironi = "SELECT DISTINCT Girone FROM squadre WHERE Cod_campionato = 2 ORDER BY Girone";
        $result_gironi = $conn->query($query_gironi);
        
        if ($result_gironi->num_rows > 0) {
            while($girone_row = $result_gironi->fetch_assoc()) {
                $girone = $girone_row['Girone'];
                
                echo '<div class="card animate__animated animate__fadeIn">';
                echo '<div class="card-header bg-primary text-white">';
                echo '<h4 class="mb-0"><i class="bi bi-trophy me-2"></i>Girone '.$girone.'</h4>';
                echo '</div>';
                echo '<div class="card-body p-0">';
                echo '<div class="table-container">';
                echo '<table class="table-classifica mb-0">';
                echo '<thead>';
                echo '<tr>';
                echo '<th style="width: 5%;">Pos</th>';
                echo '<th style="width: 35%; text-align: left;">Squadra</th>';
                echo '<th style="width: 10%;">PT</th>';
                echo '<th style="width: 10%;">G</th>';
                echo '<th style="width: 10%;">V</th>';
                echo '<th style="width: 10%;">N</th>';
                echo '<th style="width: 10%;">P</th>';
                echo '<th style="width: 10%;">DR</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                // Query per ottenere le squadre del girone corrente
                $query_squadre = "SELECT 
                                    squadre.ID_squadre, 
                                    squadre.Nome, 
                                    squadre.PT, 
                                    squadre.G, 
                                    squadre.V, 
                                    squadre.N, 
                                    squadre.P, 
                                    squadre.DR,
                                    presidenti.Nome AS presidente_nome,
                                    presidenti.Cognome AS presidente_cognome
                                FROM squadre
                                LEFT JOIN presidenti ON squadre.Cod_presidenti = presidenti.ID_presidenti
                                WHERE squadre.Cod_campionato = 2 
                                AND squadre.Girone = '".$girone."'
                                ORDER BY squadre.PT DESC, squadre.DR DESC";
                $result_squadre = $conn->query($query_squadre);
                
                if ($result_squadre->num_rows > 0) {
                    $posizione = 1;
                    $num_squadre = $result_squadre->num_rows;
                    
                    while($row = $result_squadre->fetch_assoc()) {
                        // Determina la classe in base alla posizione
                        $rowClass = '';
                        if ($posizione < 5) {
                            $rowClass = 'primo';
                        } elseif ($posizione >= $num_squadre - 1) {
                            $rowClass = 'retrocessione';
                        }
                        
                        echo '<tr class="'.$rowClass.'">';
                        echo '<td>'.$posizione.'</td>';
                        echo '<td style="text-align: left;">';
                        echo displaySquadraWithLogo($row['Nome'], $conn);
                        
                        // Mostra il presidente se presente
                        if (!empty($row['presidente_nome']) || !empty($row['presidente_cognome'])) {
                            $presidente = trim($row['presidente_nome'] . ' ' . $row['presidente_cognome']);
                            echo '<div class="presidente-info small">';
                            echo '<i class="bi bi-person-fill"></i> Presidente: '.$presidente;
                            echo '</div>';
                        }
                        
                        echo '</td>';
                        echo '<td><strong>'.$row['PT'].'</strong></td>';
                        echo '<td>'.$row['G'].'</td>';
                        echo '<td>'.$row['V'].'</td>';
                        echo '<td>'.$row['N'].'</td>';
                        echo '<td>'.$row['P'].'</td>';
                        echo '<td>'.$row['DR'].'</td>';
                        echo '</tr>';
                        $posizione++;
                    }
                } else {
                    echo '<tr><td colspan="8" class="text-center py-3">Nessuna squadra trovata in questo girone</td></tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-warning text-center">Nessun girone trovato</div>';
        }

        echo '<h1 class="text-center mb-4 animate__animated animate__fadeIn">Classifica Marcatori</h1>';
        
        // Query completa per la classifica marcatori
        $query_marcatori = "SELECT giocatori.ID_giocatori, giocatori.Nome, giocatori.Cognome, squadre.Nome AS squadra,SUM(cont_goal.Goal) AS gol_totali
                        FROM giocatori
                        JOIN cont_goal ON giocatori.ID_giocatori = cont_goal.Cod_giocatori
                        JOIN squadre ON giocatori.Cod_squadre = squadre.ID_squadre
                        WHERE squadre.Cod_campionato = 2
                        GROUP BY giocatori.ID_giocatori
                        ORDER BY gol_totali DESC";
        
        $result_marcatori = $conn->query($query_marcatori);
        
        if ($result_marcatori->num_rows > 0) {
            echo '<div class="card shadow-sm mb-4 animate__animated animate__fadeIn">';
            echo '<div class="card-header bg-primary text-white">';
            echo '<h4 class="mb-0"><i class="bi bi-person-badge me-2"></i>Marcatori</h4>';
            echo '</div>';
            echo '<div class="card-body p-0">';
            echo '<div class="table-container">';
            echo '<table class="table-classifica mb-0">';
            echo '<thead>';
            echo '<tr>';
            echo '<th style="width: 10%;">Pos</th>';
            echo '<th style="width: 40%; text-align: left;">Giocatore</th>';
            echo '<th style="width: 30%; text-align: left;">Squadra</th>';
            echo '<th style="width: 20%;">Gol</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            $posizione = 1;
            while($row = $result_marcatori->fetch_assoc()) {
                $nome_completo = trim($row['Nome'] . ' ' . $row['Cognome']);
                
                $rowClass = $posizione <= 3 ? 'top-player' : '';
                
                echo '<tr class="'.$rowClass.'">';
                echo '<td>'.$posizione.'</td>';
                echo '<td style="text-align: left;">'.$nome_completo.'</td>';
                echo '<td style="text-align: left;">';
                echo displaySquadraWithLogo($row['squadra'], $conn);
                echo '</td>';
                echo '<td><strong>'.$row['gol_totali'].'</strong></td>';
                echo '</tr>';
                $posizione++;
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning text-center">Nessun marcatore trovato</div>';
        }
        
        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>