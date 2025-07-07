<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>San Giorgio League - Eventi Passati</title>
  <link rel="icon" type="image/svg+xml" href="./immagini/logosgl.jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

    /* Card Stile */
    .event-card {
      transition: all 0.3s ease;
      border: none;
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin-bottom: 1.5rem;
    }

    .event-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .event-card .card-header {
      background-color: #1e3a8a;
      color: white;
      font-weight: bold;
      padding: 1rem;
      border-bottom: none;
    }

    .event-card .card-body {
      padding: 1.5rem;
    }

    .btn-event {
      background-color: rgba(30, 58, 138, 0.9);
      border: none;
      transition: all 0.3s ease;
    }

    .btn-event:hover {
      background-color: rgba(30, 58, 138, 1);
      transform: translateY(-2px);
    }

    /* Pulsanti navigazione */
    .nav-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 8px 12px;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.2s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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

    /* Tabelle */
    .data-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
    }

    .data-table thead th {
      background-color: #2c4fa6;
      color: white;
      padding: 12px;
      text-align: center;
      font-weight: 600;
    }

    .data-table tbody tr {
      transition: background-color 0.2s;
    }

    .data-table tbody tr:hover {
      background-color: #f1f5ff;
    }

    .data-table td {
      padding: 10px;
      text-align: center;
      vertical-align: middle;
      border-top: 1px solid #e9ecef;
    }

    .top-player {
      font-weight: bold;
      background-color: #d4edff;
    }

    .relegation {
      background-color: #fff0f0;
    }
    .btn-event {
    background: linear-gradient(135deg, #007bff, #6610f2);
    color: white;
    border: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
  }

  .btn-event:hover {
    transform: scale(1.03);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.3);
  }

  .btn-event img {
    border-radius: 50%;
    object-fit: cover;
  }

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

/* Regolazione desktop */
@media (min-width: 768px) {
    body::before {
        background-size: contain;
        background-color: #f8f9fa;
    }
    body::after {
        background: rgba(255,255,255,0.7);
    }
}
  </style>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">San Giorgio League</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <div class="container mt-4">
    <!-- Hero Section -->
    <div class="hero">
      <div class="container hero-content text-center text-white">
        <h1 class="display-5 fw-bold mb-3 animate__animated animate__fadeInDown">Archivio Storico</h1>
        <p class="lead fs-4 animate__animated animate__fadeInUp">Rivivi le competizioni concluse e scopri tutti i vincitori delle passate edizioni</p>
      </div>
    </div>

    <!-- Pulsanti navigazione -->
    <div class="d-flex justify-content-center gap-3 mb-4">
      <a href="index.php" class="nav-btn home-btn">
        <i class="bi bi-house-door me-2"></i>Home
      </a>
      <button onclick="history.back()" class="nav-btn back-btn">
        <i class="bi bi-arrow-left me-2"></i>Indietro
      </button>
    </div>

    <?php
    include 'connessione.php';
    if (!isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori'])) {
      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center">';
      echo '<h4 class="mb-0"><i class="bi bi-trophy me-2"></i>Campionati disponibili</h4>';
      echo '</div>';
      echo '<div class="card-body">';
      echo '<div class="alert alert-info">';
      echo '<h5 class="alert-heading"><i class="bi bi-info-circle-fill me-2"></i>Esplora la storia del torneo</h5>';
      echo '<p class="mb-0">Seleziona una competizione conclusa per visualizzare classifiche finali, statistiche e tutti i dati storici</p>';
      echo '</div>';
      
      
      echo '<form method="POST" class="text-center">';
      echo '  <button type="submit" name="scelta" value="San Giorgio League 2025" class="btn btn-event btn-lg mb-3 w-100 py-3">';
      echo '    <img src="./immagini/logoprimario.jpg" alt="Logo" width="40" height="40">';
      echo '    <span class="fw-bold fs-5">San Giorgio League 2025</span>';
      echo '  </button>';
      echo '</form>';

      
      echo '<div class="alert alert-warning mt-3">';
      echo '<i class="bi bi-exclamation-triangle-fill me-2"></i>Solo le competizioni concluse sono disponibili in questa sezione';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    elseif (isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);

      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center">';
      echo '<h4 class="mb-0">'.$scelta.'</h4>';
      echo '</div>';
      echo '<div class="card-body text-center">';
      echo '<form method="POST" class="d-flex justify-content-center gap-3">';
      echo '<input type="hidden" name="scelta" value="'.$scelta.'">';
      echo '<button type="submit" name="Classifica" class="btn btn-primary px-4 py-2">';
      echo '<i class="bi bi-table me-2"></i>Classifica';
      echo '</button>';
      echo '<button type="submit" name="Marcatori" class="btn btn-success px-4 py-2">';
      echo '<i class="bi bi-person-badge me-2"></i>Marcatori';
      echo '</button>';
      echo '</form>';
      echo '</div>';
      echo '</div>';

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
            echo '<div class="event-card">';
            echo '<div class="card-header">Girone '.$girone.'</div>';
            echo '<div class="card-body p-0">';
            echo '<div class="table-responsive">';
            echo '<table class="data-table">';
            echo '<thead><tr>
                    <th>Squadra</th>
                    <th>PT</th>
                    <th>G</th>
                    <th>V</th>
                    <th>N</th>
                    <th>P</th>
                    <th>DR</th>
                  </tr></thead><tbody>';

            $query_classifica = "SELECT Nome AS squadra, PT, G, V, N, P, DR
                               FROM squadre 
                               WHERE Cod_campionato = ? AND Girone = ?
                               ORDER BY PT DESC, DR DESC";
            $stmt = $conn->prepare($query_classifica);
            $stmt->bind_param("is", $id_campionato, $girone);
            $stmt->execute();
            $result_classifica = $stmt->get_result();

            $posizione = 0;
            $num_squadre = $result_classifica->num_rows;
            while ($row = $result_classifica->fetch_assoc()) {
              $posizione++;
              $rowClass = '';
              if ($posizione < 5) {
                $rowClass = 'top-player';
              } elseif ($posizione >= $num_squadre - 1) {
                $rowClass = 'relegation';
              }
              
              echo '<tr class="'.$rowClass.'">
                      <td class="text-start">'.$row['squadra'].'</td>
                      <td><strong>'.$row['PT'].'</strong></td>
                      <td>'.$row['G'].'</td>
                      <td>'.$row['V'].'</td>
                      <td>'.$row['N'].'</td>
                      <td>'.$row['P'].'</td>
                      <td>'.$row['DR'].'</td>
                    </tr>';
            }
            echo '</tbody></table></div></div></div>';
          }
        } else {
          echo '<div class="alert alert-warning">Nessun girone trovato per questo campionato.</div>';
        }
      } else {
        echo '<div class="alert alert-danger">Campionato non trovato.</div>';
      }
    }
    elseif (isset($_POST['Classifica'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);
      
      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center">';
      echo '<h4 class="mb-0">'.$scelta.' - Classifica</h4>';
      echo '</div>';
      echo '<div class="card-body">';
      
      echo '<form method="POST" class="d-flex justify-content-center gap-3 mb-4">';
      echo '<input type="hidden" name="scelta" value="'.$scelta.'">';
      echo '<button type="submit" name="Marcatori" class="btn btn-success px-4">';
      echo '<i class="bi bi-person-badge me-2"></i>Marcatori';
      echo '</button>';
      echo '<button type="submit" name="indietro" class="btn btn-secondary px-4">';
      echo '<i class="bi bi-arrow-left-circle me-2"></i>Torna al Menu';
      echo '</button>';
      echo '</form>';

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
            echo '<div class="event-card">';
            echo '<div class="card-header">Girone '.$girone.'</div>';
            echo '<div class="card-body p-0">';
            echo '<div class="table-responsive">';
            echo '<table class="data-table">';
            echo '<thead><tr>
                    <th>Squadra</th>
                    <th>PT</th>
                    <th>G</th>
                    <th>V</th>
                    <th>N</th>
                    <th>P</th>
                    <th>DR</th>
                  </tr></thead><tbody>';

            $query_classifica = "SELECT Nome AS squadra, PT, G, V, N, P, DR
                               FROM squadre 
                               WHERE Cod_campionato = ? AND Girone = ?
                               ORDER BY PT DESC, DR DESC";
            $stmt = $conn->prepare($query_classifica);
            $stmt->bind_param("is", $id_campionato, $girone);
            $stmt->execute();
            $result_classifica = $stmt->get_result();

            $posizione = 0;
            $num_squadre = $result_classifica->num_rows;
            while ($row = $result_classifica->fetch_assoc()) {
              $posizione++;
              $rowClass = '';
              if ($posizione < 5) {
                $rowClass = 'top-player';
              } elseif ($posizione >= $num_squadre - 1) {
                $rowClass = 'relegation';
              }
              
              echo '<tr class="'.$rowClass.'">
                      <td class="text-start">'.$row['squadra'].'</td>
                      <td><strong>'.$row['PT'].'</strong></td>
                      <td>'.$row['G'].'</td>
                      <td>'.$row['V'].'</td>
                      <td>'.$row['N'].'</td>
                      <td>'.$row['P'].'</td>
                      <td>'.$row['DR'].'</td>
                    </tr>';
            }
            echo '</tbody></table></div></div></div>';
          }
        } else {
          echo '<div class="alert alert-warning">Nessun girone trovato per questo campionato.</div>';
        }
      } else {
        echo '<div class="alert alert-danger">Campionato non trovato.</div>';
      }
    }
    elseif (isset($_POST['Marcatori'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);
      
      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center">';
      echo '<h4 class="mb-0">'.$scelta.' - Classifica Marcatori</h4>';
      echo '</div>';
      echo '<div class="card-body">';
      
      echo '<form method="POST" class="d-flex justify-content-center gap-3 mb-4">';
      echo '<input type="hidden" name="scelta" value="'.$scelta.'">';
      echo '<button type="submit" name="Classifica" class="btn btn-primary px-4">';
      echo '<i class="bi bi-table me-2"></i>Classifica';
      echo '</button>';
      echo '<button type="submit" name="indietro" class="btn btn-secondary px-4">';
      echo '<i class="bi bi-arrow-left-circle me-2"></i>Torna al Menu';
      echo '</button>';
      echo '</form>';

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
          echo '<div class="event-card">';
          echo '<div class="card-header">Classifica Marcatori</div>';
          echo '<div class="card-body p-0">';
          echo '<div class="table-responsive">';
          echo '<table class="data-table">';
          echo '<thead><tr>
                  <th>Pos</th>
                  <th>Giocatore</th>
                  <th>Squadra</th>
                  <th>Gol</th>
                </tr></thead><tbody>';

          $posizione = 1;
          while ($row = $result_marcatori->fetch_assoc()) {
            $nome_completo = trim($row['Nome'] . ' ' . $row['Cognome']);
            $rowClass = $posizione <= 3 ? 'top-player' : '';
            echo '<tr class="'.$rowClass.'">
                    <td>'.$posizione.'</td>
                    <td class="text-start">'.$nome_completo.'</td>
                    <td>'.$row['squadra'].'</td>
                    <td><strong>'.$row['totale_goal'].'</strong></td>
                  </tr>';
            $posizione++;
          }
          echo '</tbody></table></div></div></div>';
        } else {
          echo '<div class="alert alert-warning">Nessun marcatore trovato per questo campionato.</div>';
        }
      } else {
        echo '<div class="alert alert-danger">Campionato non trovato.</div>';
      }
    }
    elseif (isset($_POST['indietro'])) {
      header("Location: Eventi_passati1.php");
      exit();
    }

    $conn->close();
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>