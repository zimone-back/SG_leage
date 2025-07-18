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
            z-index: -2;
            background-size: cover;
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

        /* Hero Section */
        .hero {
            background: rgba(30, 60, 114, 0.85);
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            border: none;
            backdrop-filter: blur(2px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 3rem 0;
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

        .back-btn {
            background-color: white;
            color: #1e3a8a;
            border: 1px solid #1e3a8a;
        }

        /* Card Stile */
        .classifica-card {
            transition: all 0.3s ease;
            border: none;
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .classifica-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .classifica-card .card-header {
            background-color: #1e3a8a;
            color: white;
            font-weight: bold;
            padding: 1rem;
            border-bottom: none;
        }

        .classifica-card .card-body {
            padding: 1.5rem;
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
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.8rem;
        }

        .table-classifica thead th {
            background-color: #2c4fa6;
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: 600;
        }

        .table-classifica tbody tr {
            transition: background-color 0.2s;
        }

        .table-classifica tbody tr:hover {
            background-color: #f1f5ff;
        }

        .table-classifica td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
            border-top: 1px solid #e9ecef;
        }

        /* Evidenziazioni */
        .primo {
            background-color: rgba(40, 167, 69, 0.08) !important;
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
            background-color: rgba(220, 53, 69, 0.08) !important;
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

        .top-player {
            font-weight: bold;
            background-color: #d4edff;
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

        /* Stile per i marcatori */
        .scorers-table {
            width: 100%;
        }

        .scorer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            margin-bottom: 0.5rem;
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .scorer-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            margin-bottom: 0.5rem;
            background-color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .scorer-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white !important;
        }

        .top-scorer {
            border-left: 4px solid #1e3a8a;
        }

        .position-badge {
            width: 30px;
            height: 30px;
            background-color: #1e3a8a;
            color: white;
            border-radius: 50%;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .player-name {
            font-weight: 700 !important;
            font-size: 1.2rem;
            color: #212529 !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            letter-spacing: 0.5px;
            margin: 8px 0;
            line-height: 1.3;
        }

        .team-name {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .goals-count {
            font-weight: bold;
            color: #1e3a8a;
            font-size: 1.1rem;
        }

        /* Stile migliorato per i presidenti */
        /* Stile per allineare nome squadra e presidente */
        .table-classifica td:first-child {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        /* Stile per il nome della squadra */
        .squadra-nome {
            font-weight: bold;
            margin-right: 5px;
        }

        /* Stile per l'icona e cognome presidente */
        /* Stile per il badge del presidente */
        /* Stile per la cella della squadra */
        .squadra-cell {
            padding: 8px 4px;
            text-align: left;
            vertical-align: middle;
        }

        /* Contenitore squadra */
        .squadra-container {
            display: flex;
            align-items: center;
        }

        /* Nome squadra */
        .squadra-name {
            font-weight: bold;
            margin-bottom: 2px;
        }

        /* Info presidente */
        .presidente-info {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            color: #6c757d;
            margin-top: 2px;
        }

        .presidente-icon {
            color: #1e3a8a;
            margin-right: 4px;
            font-size: 0.9rem;
        }

        /* Adattamento mobile */
        @media (max-width: 576px) {
            .presidente-info span {
                max-width: 100px;
            }
        }

        .presidente-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(30, 58, 138, 0.1);
            border-radius: 12px;
            padding: 2px 8px;
            margin-left: 8px;
        }

        .presidente-icon {
            color: #1e3a8a;
            font-size: 0.8rem;
            margin-right: 5px;
        }

        .presidente-name {
            font-size: 0.75rem;
            color: #1e3a8a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
            font-weight: 500;
        }

        /* Adatta la larghezza su mobile */
        @media (max-width: 576px) {
            .presidente-name {
                max-width: 80px;
            }
        }

        .presidente-cognome {
            display: inline-flex;
            align-items: center;
            font-size: 0.75rem;
            color: #6c757d;
            margin-left: 5px;
        }

        /* Mantieni allineamento verticale delle celle */
        .table-classifica td {
            vertical-align: middle !important;
        }

        .presidente-info {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 0.7rem;
            color: #6c757d;
            margin-top: 2px;
        }

        .presidente-info i {
            color: #1e3a8a;
            font-size: 0.8rem;
        }

        .presidente-info span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 120px;
        }

        /* Media queries */
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

        @media (max-width: 576px) {
            .classifica-card {
                margin: 0 5px;
            }

            .card-body {
                padding: 10px 5px;
            }

            .classifica-header h5 {
                font-size: 1rem;
            }

            .table-classifica {
                font-size: 0.75rem;
            }

            .table-classifica th,
            .table-classifica td {
                padding: 6px 3px !important;
            }
        }

        /* Stile personalizzato per i presidenti */
        .presidente-info {
            font-size: 0.7rem !important;
            color: #6c757d !important;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            display: inline-block;
            margin-left: 5px;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand navbar-dark fixed-top shadow" style="
    background: rgba(30, 58, 138, 0.8);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.1);
">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <img src="./immagini/logosgl.jpg" alt="Logo" width="30" height="30" class="rounded-circle me-2">
            San Giorgio Kings League
        </a>
    </div>
</nav>

    <div class="container mt-4">
        <!-- Hero Section -->
        <div class="hero">
            <div class="container hero-content text-center text-white">
                <h1 class="display-5 fw-bold mb-3 animate__animated animate__fadeInDown">Classifica</h1>
                <p class="lead fs-4 animate__animated animate__fadeInUp">Scopri la classifica aggiornata della San Giorgio League</p>
            </div>
        </div>

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
        echo '<div class="d-flex align-items-center"><span class="legenda-color primo"></span>Qualificata alle semifinali</div>';
        echo '<div class="d-flex align-items-center"><span class="legenda-color retrocessione"></span>Eliminata</div>';
        echo '</div>';
        echo '</div>';

        // Query per ottenere i gironi distinti
        $query_gironi = "SELECT DISTINCT Girone FROM squadre WHERE Cod_campionato = 2 ORDER BY Girone";
        $result_gironi = $conn->query($query_gironi);

        if ($result_gironi->num_rows > 0) {
            while ($girone_row = $result_gironi->fetch_assoc()) {
                $girone = $girone_row['Girone'];

                echo '<div class="classifica-card mb-3" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">';
                echo '  <div class="classifica-header py-2 px-3" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
                echo '<h5 class="mb-0 font-weight-bold"><img src="./immagini/logoprimario.jpg" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;"> Girone ' . $girone . '</h5>';
                echo '  </div>';
                echo '  <div class="table-container">';
                echo '    <table class="table-classifica mb-0" style="width: 100%; border-collapse: collapse; font-size: 0.8rem;">';
                echo '      <thead>';
                echo '        <tr style="background-color: #f8f9fa; color: #495057;">';
                echo '          <th style="padding: 8px 4px; text-align: left; border-bottom: 2px solid #dee2e6; width: 40%;">Squadra & Presidenti</th>';
                echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">PT</th>';
                echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">G</th>';
                echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">V</th>';
                echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">N</th>';
                echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">P</th>';
                echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">DR</th>';
                echo '        </tr>';
                echo '      </thead>';
                echo '      <tbody>';

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
                                AND squadre.Girone = '" . $girone . "'
                                ORDER BY squadre.PT DESC, squadre.DR DESC";
                $result_squadre = $conn->query($query_squadre);

                if ($result_squadre->num_rows > 0) {
                    $posizione = 0;
                    $num_squadre = $result_squadre->num_rows;

                    while ($row = $result_squadre->fetch_assoc()) {
                        $posizione++;
                        // Determina la classe in base alla posizione
                        $rowClass = '';
                        if ($posizione < 3) {
                            $rowClass = 'primo';
                        } elseif ($posizione >= $num_squadre - 1) {
                            $rowClass = 'retrocessione';
                        }

                        echo '<tr class="' . $rowClass . '" style="transition: all 0.2s;">';
                        echo '  <td style="padding: 8px 4px; text-align: left;">';
                        echo '    <div style="display: flex; align-items: center;">';
                        echo '      <img src="' . getLogoPath($row['Nome'], $conn) . '" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;">';
                        echo '      <div>';
                        echo '        <div style="font-weight: bold;">' . $row['Nome'] . '</div>';

                        // Mostra il presidente se presente
                        if (!empty($row['presidente_nome']) || !empty($row['presidente_cognome'])) {
                            $presidente = trim($row['presidente_nome'] . ' ' . $row['presidente_cognome']);
                            echo '        <div style="display: flex; align-items: center; font-size: 0.75rem; color: #6c757d; margin-top: 2px;">';
                            echo '          <i class="bi bi-person-gear" style="color: #1e3a8a; margin-right: 4px;"></i>';
                            echo '          <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">' . $presidente . '</span>';
                            echo '        </div>';
                        }
                        echo '      </div>';
                        echo '    </div>';
                        echo '  </td>';
                        echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: center; color: #1e3a8a;">' . $row['PT'] . '</td>';
                        echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['G'] . '</td>';
                        echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['V'] . '</td>';
                        echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['N'] . '</td>';
                        echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['P'] . '</td>';
                        echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: center;">' . $row['DR'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center py-3">Nessuna squadra trovata in questo girone</td></tr>';
                }

                echo '      </tbody>';
                echo '    </table>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-warning text-center">Nessun girone trovato</div>';
        }

        echo '<div class="hero mt-5">';
        echo '  <div class="container hero-content text-center text-white">';
        echo '    <h1 class="display-5 fw-bold mb-3 animate__animated animate__fadeInDown">Classifica Marcatori</h1>';
        echo '    <p class="lead fs-4 animate__animated animate__fadeInUp">Scopri i migliori marcatori della San Giorgio Kings League</p>';
        echo '  </div>';
        echo '</div>';

        // Query completa per la classifica marcatori
        $query_marcatori = "SELECT giocatori.ID_giocatori, giocatori.Nome, giocatori.Cognome, squadre.Nome AS squadra,SUM(cont_goal.Goal) AS gol_totali
                        FROM giocatori
                        JOIN cont_goal ON giocatori.ID_giocatori = cont_goal.Cod_giocatori
                        JOIN squadre ON giocatori.Cod_squadre = squadre.ID_squadre
                        WHERE squadre.Cod_campionato = 2
                        GROUP BY giocatori.ID_giocatori
                        ORDER BY gol_totali DESC
                        LIMIT 10";


        $result_marcatori = $conn->query($query_marcatori);

        if ($result_marcatori->num_rows > 0) {
            echo '<div class="scorers-table mt-4">';

            // Intestazione
            echo '<div class="scorer-header d-flex justify-content-between align-items-center p-3 mb-2 rounded" style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">';
            echo '  <div class="d-flex align-items-center" style="width: 70%;">';
            echo '    <span class="player-label fw-bold">GIOCATORE</span>';
            echo '  </div>';
            echo '  <span class="goals-label fw-bold" style="width: 30%; text-align: right;">GOL</span>';
            echo '</div>';

            $posizione = 1;
            while ($row = $result_marcatori->fetch_assoc()) {
                $nome_completo = trim($row['Nome'] . ' ' . $row['Cognome']);
                $squadra = $row['squadra'];

                $top_class = $posizione <= 3 ? 'top-scorer' : '';

                echo '<div class="scorer-item d-flex justify-content-between align-items-center p-3 mb-2 rounded ' . $top_class . '" style="background-color: rgba(255,255,255,0.9); transition: all 0.3s ease;">';
                echo '  <div class="d-flex align-items-center" style="width: 70%;">';
                echo '    <span class="position-badge d-flex align-items-center justify-content-center me-3" style="width: 30px; height: 30px; background-color: ' . ($posizione <= 3 ? '#1e3a8a' : '#6c757d') . '; color: white; border-radius: 50%; font-weight: bold;">' . $posizione . '</span>';
                echo '    <div>';
                echo '<div class="player-name" style="font-weight: 700 !important; font-size: 1.2rem; color: #212529 !important; text-shadow: 0 1px 2px rgba(0,0,0,0.1); letter-spacing: 0.5px; margin: 8px 0; line-height: 1.3;">' . $nome_completo . '</div>';
                echo '      <div class="team-name small"> <img src="' . getLogoPath($row['squadra'], $conn) . '" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;">' . $squadra . '</div>';
                echo '    </div>';
                echo '  </div>';
                echo '  <span class="goals-count fw-bold" style="width: 30%; text-align: right; color: #1e3a8a; font-size: 1.1rem;">' . $row['gol_totali'] . '</span>';
                echo '</div>';

                $posizione++;
            }

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