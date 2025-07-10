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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
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
        background: rgba(255, 255, 255, 0.7);
      }
    }
  </style>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="
    background: rgba(30, 58, 138, 0.8);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.1);
  ">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
        <img src="./immagini/logosgl.jpg" alt="Logo" width="30" height="30" class="rounded-circle me-2 hvr-grow-rotate">
        San Giorgio League
      </a>
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
        <p class="lead fs-4 animate__animated animate__fadeInUp">Rivivi le competizioni concluse e scopri tutti i
          vincitori delle passate edizioni</p>
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
    if (!isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori']) && !isset($_POST['Partite'])) {
      echo '<div class="card shadow-lg border-0 animate__animated animate__fadeIn animate__delay-1s" style="border-radius: 16px; overflow: hidden;">';
      echo '  <div class="card-header text-white text-center py-3 position-relative" style="';
      echo '    background: linear-gradient(135deg, #1e3a8a, #2c4fa6);';
      echo '    border-bottom: none;';
      echo '    box-shadow: 0 4px 12px rgba(0,0,0,0.1);';
      echo '  ">';
      echo '    <h4 class="mb-0 fw-bold"><i class="bi bi-trophy-fill me-2" style="color: gold;"></i>Campionati disponibili</h4>';
      echo '  </div>';

      echo '  <div class="card-body bg-light" style="background: rgba(255,255,255,0.95);">';
      echo '    <div class="alert alert-warning d-flex align-items-center mt-3 animate__animated animate__fadeIn animate__delay-2s" role="alert" style="';
      echo '      border-left: 4px solid #ffc107;';
      echo '      border-radius: 4px;';
      echo '    ">';
      echo '      <i class="bi bi-exclamation-triangle-fill me-2 fs-5" style="color: #ffc107;"></i>';
      echo '      <div>';
      echo '        <strong>Attenzione:</strong> Solo le competizioni concluse sono disponibili in questa sezione';
      echo '      </div>';
      echo '    </div>';

      echo '    <form method="POST" class="text-center mt-4 animate__animated animate__fadeIn animate__delay-3s">';
      echo '      <div class="mx-auto col-12 col-sm-10 col-md-8 col-lg-6 px-2">';

      echo '        <button type="submit" name="scelta" value="San Giorgio League 2025" class="btn btn-event btn-lg mb-3 w-100 py-3">';

      echo '          <background: linear-gradient(135deg, #1e3a8a, #3b82f6);';
      echo '          color: white;';
      echo '          border: none;';
      echo '          border-radius: 50px;';
      echo '          font-weight: 600;';
      echo '          letter-spacing: 0.5px;';
      echo '          box-shadow: 0 6px 15px rgba(30, 58, 138, 0.3);';
      echo '          transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);';
      echo '          overflow: hidden;';
      echo '          position: relative;';
      echo '        ">';
      echo '          <img src="./immagini/logoprimario.jpg" alt="Logo" width="30" height="30" class="rounded-circle border me-2 me-sm-3" style="';
      echo '            transition: transform 0.3s ease;';
      echo '            box-shadow: 0 2px 8px rgba(0,0,0,0.2);';
      echo '          ">';
      echo '          <span class="fw-bold fs-6 fs-sm-5">San Giorgio League 2025</span>';
      echo '          <span class="position-absolute top-0 start-0 w-100 h-100" style="';
      echo '            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);';
      echo '            transform: translateX(-100%);';
      echo '            transition: transform 0.6s ease;';
      echo '          "></span>';
      echo '        </button>';
      echo '      </div>';
      echo '    </form>';

      echo '  </div>';
      echo '</div>';

    } elseif (isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori']) && !isset($_POST['Partite'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);

      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center">';
      echo '<h4 class="mb-0">' . $scelta . '</h4>';
      echo '</div>';
      echo '<div class="card-body text-center">';
      echo '<form method="POST" class="d-flex justify-content-center gap-3">';
      echo '<input type="hidden" name="scelta" value="' . $scelta . '">';
      echo '<button type="submit" name="Classifica" class="btn btn-primary px-4 py-2">';
      echo '<i class="bi bi-table me-2"></i>Classifica';
      echo '</button>';
      echo '<button type="submit" name="Marcatori" class="btn btn-success px-4 py-2">';
      echo '<i class="bi bi-person-badge me-2"></i>Marcatori';
      echo '</button>';
      echo '<button type="submit" name="Partite" class="btn btn-info px-4 py-2">';
      echo '<i class="bi bi-calendar-event me-2"></i>Partite';
      echo '</button>';
      echo '</form>';
      echo '</div>';
      echo '</div>';

      // Aggiunta della legenda
      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
      echo '<h4 class="mb-0">' . $scelta . ' - Classifica</h4>';
      echo '</div>';
      echo '<div class="card-body px-1">';

      // Aggiunta della legenda
      echo '<style>
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
        </style>';

      echo '<div class="legenda-classifica">';
      echo '<h6><i class="bi bi-info-circle me-2"></i>Legenda:</h6>';
      echo '<div class="d-flex flex-wrap gap-3">';
      echo '<div class="d-flex align-items-center"><span class="legenda-color primo"></span>Qualificate ai quarti</div>';
      echo '<div class="d-flex align-items-center"><span class="legenda-color retrocessione"></span>Eliminata</div>';
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
            echo '<div class="classifica-card mb-3" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">';
            echo '  <div class="classifica-header py-2 px-3" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
            echo '    <h5 class="mb-0 font-weight-bold"><i class="bi bi-trophy-fill text-warning me-2"></i>Girone ' . $girone . '</h5>';
            echo '  </div>';
            echo '  <div class="table-container">';
            echo '    <table class="table-classifica mb-0" style="width: 100%; border-collapse: collapse; font-size: 0.8rem;">';
            echo '      <thead>';
            echo '        <tr style="background-color: #f8f9fa; color: #495057;">';
            echo '          <th style="padding: 8px 4px; text-align: left; border-bottom: 2px solid #dee2e6; width: 40%;">Squadra</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">PT</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">G</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">V</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">N</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">P</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">DR</th>';
            echo '        </tr>';
            echo '      </thead>';
            echo '      <tbody>';

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
                $rowClass = 'primo';
              } elseif ($posizione >= $num_squadre - 1) {
                $rowClass = 'retrocessione';
              }

              echo '<tr class="' . $rowClass . '" style="transition: all 0.2s;">';
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: left;">' . $row['squadra'] . '</td>';
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: center; color: #1e3a8a;">' . $row['PT'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['G'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['V'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['N'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['P'] . '</td>';
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: center;">' . $row['DR'] . '</td>';
              echo '</tr>';
            }
            echo '      </tbody>';
            echo '    </table>';
            echo '  </div>';
            echo '</div>';
          }
        }
      }
    } elseif (isset($_POST['Classifica'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);
      // Aggiunta della legenda
      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
      echo '<h4 class="mb-0">' . $scelta . ' - Classifica</h4>';
      echo '</div>';
      echo '<div class="card-body px-1">';

     echo '
      <form method="POST" class="d-flex justify-content-center gap-3 mb-4">
        <input type="hidden" name="scelta" value="' . $scelta . '">
        
        <button type="submit" name="Classifica" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-table me-2"></i>Classifica
        </button>
        
        <button type="submit" name="Marcatori" class="btn btn-success px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-person-badge me-2"></i>Marcatori
        </button>
        
        <button type="submit" name="Partite" class="btn btn-info px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-calendar-event me-2"></i>Partite
        </button>
      </form>

      <style>
        .btn-hover-effect {
          transition: all 0.3s ease;
          transform: translateY(0);
          border: none;
          font-weight: 500;
          letter-spacing: 0.5px;
          position: relative;
          overflow: hidden;
        }
        
        .btn-hover-effect:hover {
          transform: translateY(-3px);
          box-shadow: 0 7px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-hover-effect:active {
          transform: translateY(-1px);
        }
        
        .btn-primary {
          background: linear-gradient(135deg, #3a7bd5, #00d2ff);
          color: white;
        }
        
        .btn-success {
          background: linear-gradient(135deg, #02aab0, #00cdac);
          color: white;
        }
        
        .btn-info {
          background: linear-gradient(135deg, #00c6ff, #0072ff);
          color: white;
        }
        
        .btn i {
          transition: transform 0.3s ease;
        }
        
        .btn:hover i {
          transform: scale(1.1);
        }
        
        .btn:focus {
          box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
      </style>
      ';

      // Aggiunta della legenda
      echo '<style>
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
        </style>';

      echo '<div class="legenda-classifica">';
      echo '<h6><i class="bi bi-info-circle me-2"></i>Legenda:</h6>';
      echo '<div class="d-flex flex-wrap gap-3">';
      echo '<div class="d-flex align-items-center"><span class="legenda-color primo"></span>Qualificate ai quarti</div>';
      echo '<div class="d-flex align-items-center"><span class="legenda-color retrocessione"></span>Eliminata</div>';
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
            echo '<div class="classifica-card mb-3" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">';
            echo '  <div class="classifica-header py-2 px-3" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
            echo '    <h5 class="mb-0 font-weight-bold"><i class="bi bi-trophy-fill text-warning me-2"></i>Girone ' . $girone . '</h5>';
            echo '  </div>';
            echo '  <div class="table-container">';
            echo '    <table class="table-classifica mb-0" style="width: 100%; border-collapse: collapse; font-size: 0.8rem;">';
            echo '      <thead>';
            echo '        <tr style="background-color: #f8f9fa; color: #495057;">';
            echo '          <th style="padding: 8px 4px; text-align: left; border-bottom: 2px solid #dee2e6; width: 40%;">Squadra</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">PT</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">G</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">V</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">N</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">P</th>';
            echo '          <th style="padding: 8px 4px; text-align: center; border-bottom: 2px solid #dee2e6; width: 10%;">DR</th>';
            echo '        </tr>';
            echo '      </thead>';
            echo '      <tbody>';

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
                $rowClass = 'primo';
              } elseif ($posizione >= $num_squadre - 1) {
                $rowClass = 'retrocessione';
              }

              echo '<tr class="' . $rowClass . '" style="transition: all 0.2s;">';
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: left;">' . $row['squadra'] . '</td>';
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: center; color: #1e3a8a;">' . $row['PT'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['G'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['V'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['N'] . '</td>';
              echo '  <td style="padding: 8px 4px; text-align: center;">' . $row['P'] . '</td>';
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: center;">' . $row['DR'] . '</td>';
              echo '</tr>';
            }
            echo '      </tbody>';
            echo '    </table>';
            echo '  </div>';
            echo '</div>';
          }
        } else {
          echo '<div class="alert alert-warning text-center">Nessun girone trovato per questo campionato.</div>';
        }
      } else {
        echo '<div class="alert alert-danger text-center">Campionato non trovato.</div>';
      }

      echo '</div></div>';


      echo '<style>
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
        
        @media (max-width: 576px) {
            .event-card {
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
        </style>';
    } elseif (isset($_POST['Marcatori'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);

      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '  <div class="card-header text-center py-3" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
      echo '    <h4 class="mb-0 fw-bold"><i class="bi bi-trophy-fill me-2" style="color: gold;"></i>' . $scelta . ' - CLASSIFICA MARCATORI</h4>';
      echo '  </div>';
      echo '  <div class="card-body">';

      // Pulsanti navigazione
      echo '
      <form method="POST" class="d-flex justify-content-center gap-3 mb-4">
        <input type="hidden" name="scelta" value="' . $scelta . '">
        
        <button type="submit" name="Classifica" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-table me-2"></i>Classifica
        </button>
        
        <button type="submit" name="Marcatori" class="btn btn-success px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-person-badge me-2"></i>Marcatori
        </button>
        
        <button type="submit" name="Partite" class="btn btn-info px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-calendar-event me-2"></i>Partite
        </button>
      </form>

      <style>
        .btn-hover-effect {
          transition: all 0.3s ease;
          transform: translateY(0);
          border: none;
          font-weight: 500;
          letter-spacing: 0.5px;
          position: relative;
          overflow: hidden;
        }
        
        .btn-hover-effect:hover {
          transform: translateY(-3px);
          box-shadow: 0 7px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-hover-effect:active {
          transform: translateY(-1px);
        }
        
        .btn-primary {
          background: linear-gradient(135deg, #3a7bd5, #00d2ff);
          color: white;
        }
        
        .btn-success {
          background: linear-gradient(135deg, #02aab0, #00cdac);
          color: white;
        }
        
        .btn-info {
          background: linear-gradient(135deg, #00c6ff, #0072ff);
          color: white;
        }
        
        .btn i {
          transition: transform 0.3s ease;
        }
        
        .btn:hover i {
          transform: scale(1.1);
        }
        
        .btn:focus {
          box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
      </style>
      ';

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
          echo '<div class="scorers-table">';

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
            echo '      <div class="player-name fw-bold" style="color: #343a40;">' . $nome_completo . '</div>';
            echo '      <div class="team-name small" style="color: #6c757d;">' . $squadra . '</div>';
            echo '    </div>';
            echo '  </div>';
            echo '  <span class="goals-count fw-bold" style="width: 30%; text-align: right; color: #1e3a8a; font-size: 1.1rem;">' . $row['totale_goal'] . '</span>';
            echo '</div>';

            $posizione++;
          }

          echo '</div>'; // chiusura scorers-table
    

        } else {
          echo '<div class="alert alert-warning">Nessun marcatore trovato per questo campionato.</div>';
        }
      } else {
        echo '<div class="alert alert-danger">Campionato non trovato.</div>';
      }

      echo '  </div>'; // chiusura card-body
      echo '</div>'; // chiusura event-card
    
      echo '<style>
    .filters {
        background-color: rgba(248, 249, 250, 0.8);
    }
    
    .filter-btn {
        color: #6c757d;
        text-decoration: none;
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    
    .filter-btn.active {
        color: white;
        background: linear-gradient(135deg, #1e3a8a, #2c4fa6);
        box-shadow: 0 2px 8px rgba(30, 58, 138, 0.2);
    }
    
    .scorer-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        background-color: white !important;
    }
    
    .top-scorer {
        background-color: rgba(30, 58, 138, 0.05) !important;
        border-left: 4px solid #1e3a8a;
    }
    
    @media (max-width: 576px) {
        .player-name {
            font-size: 0.9rem;
        }
        
        .team-name {
            font-size: 0.8rem;
        }
        
        .goals-count {
            font-size: 1rem;
        }
    }
    </style>';
    } elseif (isset($_POST['Partite'])) {
        $scelta = $conn->real_escape_string($_POST['scelta']);

        echo '<div class="event-card animate__animated animate__fadeIn">';
        echo '<div class="card-header text-center">';
        echo '<h4 class="mb-0">' . $scelta . ' - Calendario Partite</h4>';
        echo '</div>';
        echo '<div class="card-body">';

        echo '
        <form method="POST" class="d-flex justify-content-center gap-3 mb-4">
          <input type="hidden" name="scelta" value="' . $scelta . '">
          
          <button type="submit" name="Classifica" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
            <i class="bi bi-table me-2"></i>Classifica
          </button>
          
          <button type="submit" name="Marcatori" class="btn btn-success px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
            <i class="bi bi-person-badge me-2"></i>Marcatori
          </button>
          
          <button type="submit" name="Partite" class="btn btn-info px-4 py-2 rounded-pill shadow-sm btn-hover-effect">
            <i class="bi bi-calendar-event me-2"></i>Partite
          </button>
        </form>

        <style>
          /* Stili esistenti mantenuti */
          .btn-hover-effect {
            transition: all 0.3s ease;
            transform: translateY(0);
            border: none;
            font-weight: 500;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
          }
          
          /* Nuovi stili per il carosello avanzato */
          .match-carousel {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            border: none;
          }
          
          .carousel-indicators {
            bottom: -50px;
          }
          
          .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(0,0,0,0.2);
            border: none;
          }
          
          .carousel-indicators button.active {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
          }
          
          .match-day-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transform: scale(0.95);
            transition: all 0.4s ease;
            opacity: 0.9;
            min-height: 500px; /* ⬅️ altezza fissa */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
          }
          
          .carousel-item.active .match-day-card {
            transform: scale(1);
            opacity: 1;
          }
          
          .day-header {
            background: linear-gradient(135deg, #3a7bd5, #00d2ff);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
          }
          
          .match-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
          }
          
          .match-table tr {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
          }
          
          .match-table tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
          }
          
          .match-table td {
            padding: 15px;
            vertical-align: middle;
          }
          
          .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
          }
          
          .badge-finished {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: white;
          }
          
          .badge-live {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            animation: pulse 1.5s infinite;
          }
          
          .badge-postponed {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
          }
          
          .badge-scheduled {
            background: linear-gradient(135deg, #95a5a6, #7f8c8d);
            color: white;
          }
          
          .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.8);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            opacity: 1;
          }
          
          .carousel-control-prev { left: -25px; }
          .carousel-control-next { right: -25px; }
          
          .carousel-control-prev-icon, 
          .carousel-control-next-icon {
            filter: brightness(0) saturate(100%) invert(26%) sepia(89%) saturate(2596%) hue-rotate(197deg) brightness(98%) contrast(91%);
            width: 2rem;
            height: 2rem;
          }
          
          @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
          }
        </style>';

        $query_campionato = "SELECT campionati.ID_campionato, campionati.Nome 
                          FROM campionati 
                          WHERE campionati.Nome = ? 
                          LIMIT 1";
        $stmt = $conn->prepare($query_campionato);
        $stmt->bind_param("s", $scelta);
        $stmt->execute();
        $result_campionato = $stmt->get_result();

        if ($result_campionato->num_rows > 0) {
            $campionato = $result_campionato->fetch_assoc();

            $query_giornate = "SELECT giornate.ID_giornata, giornate.Numero, giornate.Data_inizio, giornate.Data_fine 
                            FROM giornate 
                            WHERE giornate.Cod_campionato = ? 
                            ORDER BY giornate.Numero";
            $stmt = $conn->prepare($query_giornate);
            $stmt->bind_param("i", $campionato['ID_campionato']);
            $stmt->execute();
            $result_giornate = $stmt->get_result();

            if ($result_giornate->num_rows > 0) {
                echo '<div id="matchCarousel" class="carousel slide match-carousel" data-bs-ride="carousel">';
                echo '<div class="carousel-inner">';
                
                $first = true;
                while ($giornata = $result_giornate->fetch_assoc()) {
                    echo '<div class="carousel-item ' . ($first ? 'active' : '') . '">';
                    echo '<div class="match-day-card">';
                    echo '<div class="day-header">';
                    echo '<h5>Giornata ' . $giornata['Numero'] . '</h5>';
                    echo '<p class="mb-0">' . date('d/m/Y', strtotime($giornata['Data_inizio'])) . '</p>';
                    echo '</div>';
                    
                    $query_partite = "SELECT partite.ID_partita, partite.Data, partite.Stato, partite.Gol_casa, partite.Gol_ospite,
                                    squadre_casa.Nome AS squadra_casa, squadre_ospite.Nome AS squadra_ospite
                              FROM partite
                              JOIN squadre AS squadre_casa ON partite.Squadra_casa = squadre_casa.ID_squadre
                              JOIN squadre AS squadre_ospite ON partite.Squadra_ospite = squadre_ospite.ID_squadre
                              WHERE partite.Cod_giornata = ?
                              ORDER BY partite.Data";
                    $stmt = $conn->prepare($query_partite);
                    $stmt->bind_param("i", $giornata['ID_giornata']);
                    $stmt->execute();
                    $result_partite = $stmt->get_result();

                    if ($result_partite->num_rows > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table class="table match-table">';
                        echo '<tbody>';

                        while ($partita = $result_partite->fetch_assoc()) {
                            echo '<tr>';
                            
                            // Stato partita
                            echo '<td class="text-center">';
                            switch ($partita['Stato']) {
                                case 'terminata':
                                    echo '<span class="status-badge badge-finished">FINITO</span>';
                                    break;
                                case 'in corso':
                                    echo '<span class="status-badge badge-live">LIVE</span>';
                                    break;
                                case 'rinviata':
                                    echo '<span class="status-badge badge-postponed">RINVIATA</span>';
                                    break;
                                default:
                                    echo '<span class="status-badge badge-scheduled">' . date('H:i', strtotime($partita['Data'])) . '</span>';
                            }
                            echo '</td>';
                            
                            // Squadra casa
                            echo '<td class="text-end fw-bold">' . $partita['squadra_casa'] . '</td>';
                            
                            // Risultato
                            echo '<td class="text-center">';
                            if ($partita['Stato'] == 'terminata') {
                                echo '<span class="score-display">' . $partita['Gol_casa'] . ' - ' . $partita['Gol_ospite'] . '</span>';
                            } else {
                                echo '<span class="vs-display">VS</span>';
                            }
                            echo '</td>';
                            
                            // Squadra ospite
                            echo '<td class="fw-bold">' . $partita['squadra_ospite'] . '</td>';
                            
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-info text-center">Nessuna partita programmata</div>';
                    }
                    
                    echo '</div>'; // match-day-card
                    echo '</div>'; // carousel-item
                    $first = false;
                }
                
                echo '</div>'; // carousel-inner
                
                // Controlli di navigazione
                echo '<button class="carousel-control-prev" type="button" data-bs-target="#matchCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>';
                echo '<button class="carousel-control-next" type="button" data-bs-target="#matchCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>';
                
                // Indicatori
                echo '<div class="carousel-indicators">';
                for ($i = 0; $i < $result_giornate->num_rows; $i++) {
                    echo '<button type="button" data-bs-target="#matchCarousel" data-bs-slide-to="' . $i . '" ' . ($i == 0 ? 'class="active"' : '') . '></button>';
                }
                echo '</div>';
                
                echo '</div>'; // carousel
            } else {
                echo '<div class="alert alert-warning">Nessuna giornata trovata per questo campionato.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Nessun campionato attivo trovato.</div>';
        }
        
        echo '</div>'; // card-body
        echo '</div>'; // event-card
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