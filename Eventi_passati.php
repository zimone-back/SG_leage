<?php
include 'connessione.php';
require_once 'utility.php';
?>
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
            <img src="./immagini/logosgl.jpg" alt="Logo" width="30" height="30" class="rounded-circle me-2">
            San Giorgio League
        </a>
        
        <!-- Bottone hamburger -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="ms-2 d-none d-sm-inline text-white">Menu</span>
        </button>

        <!-- Menu a tendina mobile -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-lg-none mt-2">
                <div class="dropdown-menu-mobile p-0">
                    <a href="Notizie.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-newspaper"></i> Notizie
                    </a>
                    <a href="partite.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-calendar-event"></i> Calendario
                    </a>
                    <a href="Classifica.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-list-ol"></i> Classifica
                    </a>
                    <a href="Eventi_passati.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-clock-history"></i> Eventi Passati
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Aggiungi questo stile nella sezione <style> del tuo head -->
<style>
    /* Stili per il menu mobile */
    .dropdown-menu-mobile {
        background-color: rgba(30, 58, 138, 0.95);
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }
    
    .dropdown-item-mobile {
        display: block;
        padding: 12px 16px;
        color: white;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .dropdown-item-mobile:last-child {
        border-bottom: none;
    }
    
    .dropdown-item-mobile:hover {
        background-color: rgba(255, 255, 255, 0.1);
        padding-left: 20px;
    }
    
    .dropdown-item-mobile i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    /* Miglioramenti per il toggler */
    .navbar-toggler {
        border: none;
        padding: 8px 12px;
    }
    
    .navbar-toggler:focus {
        box-shadow: none;
    }
    
    /* Animazione per l'icona hamburger */
    .navbar-toggler.collapsed .navbar-toggler-icon {
        transition: transform 0.3s ease;
    }
    
    .navbar-toggler:not(.collapsed) .navbar-toggler-icon {
        transform: rotate(90deg);
    }
</style>

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
    include 'utility.php';
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

      // Aggiunta della legenda
      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
      echo '<h4 class="mb-0">' . $scelta . ' - Classifica</h4>';
      echo '</div>';
      echo '<div class="card-body px-1">';

      echo '
      <form method="POST" class="d-flex justify-content-center gap-1 gap-md-3 mb-2 mb-md-4 flex-wrap pt-0">
        <input type="hidden" name="scelta" value="' . $scelta . '">
        
        <button type="submit" name="Classifica" class="btn btn-primary px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-table me-1 me-md-2"></i>Classifica
        </button>
        
        <button type="submit" name="Marcatori" class="btn btn-success px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-person-badge me-1 me-md-2"></i>Marcatori
        </button>
        
        <button type="submit" name="Partite" class="btn btn-info px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-calendar-event me-1 me-md-2"></i>Partite
        </button>
      </form>

      <style>
        .btn-hover-effect {
          transition: all 0.3s ease;
          transform: translateY(0);
          border: none;
          font-weight: 500;
          letter-spacing: 0.3px;
          position: relative;
          overflow: hidden;
          font-size: 0.85rem;
          white-space: nowrap;
        }
        
        @media (min-width: 768px) {
          .btn-hover-effect {
            font-size: 1rem;
            letter-spacing: 0.5px;
          }
        }
        
        .btn-hover-effect:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .btn-hover-effect:active {
          transform: translateY(0);
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
          font-size: 0.9rem;
        }
        
        @media (min-width: 768px) {
          .btn i {
            font-size: 1rem;
          }
        }
        
        .btn:hover i {
          transform: scale(1.05);
        }
        
        .btn:focus {
          box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
      </style>
      

    <style>
      /* Stili ottimizzati per mobile */
      .match-carousel {
        background: white;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0,0,0,0.05);
        padding: 8px;
        margin: 0 4px;
      }
      
      .day-header {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        padding: 8px 10px;
        border-radius: 6px;
        margin-bottom: 8px;
        text-align: center;
        font-weight: 600;
        font-size: 0.85rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      }
      
      .simple-match-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.8rem;
      }
      
      .simple-match-table tr {
        border-bottom: 1px solid #f0f0f0;
      }
      
      .simple-match-table tr:last-child {
        border-bottom: none;
      }
      
      .simple-match-table td {
        padding: 8px 4px;
        vertical-align: middle;
      }
      
      .simple-match-table td:first-child {
        text-align: right;
        width: 40%;
        font-weight: 500;
        color: #333;
        padding-right: 8px;
      }
      
      .simple-match-table td:nth-child(2) {
        text-align: center;
        width: 20%;
        font-weight: 700;
        color: #222;
        min-width: 60px;
      }
      
      .simple-match-table td:last-child {
        text-align: left;
        width: 40%;
        font-weight: 500;
        color: #333;
        padding-left: 8px;
      }
      
      .match-status {
        display: inline-block;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
      }
      
      .status-terminata {
        background-color: #e9ecef;
        color: #6c757d;
      }
      
      .status-in-corso {
        background-color: #dc3545;
        color: white;
        animation: pulse 1.5s infinite;
      }
      
      .status-programmata {
        background-color: #6c757d;
        color: white;
      }
      
      /* Navigazione carosello mobile più compatta */
      .carousel-control-prev, .carousel-control-next {
        width: 28px;
        height: 28px;
        background: white;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        box-shadow: 0 1px 5px rgba(0,0,0,0.1);
        opacity: 1;
      }
      
      .carousel-control-prev { left: -8px; }
      .carousel-control-next { right: -8px; }
      
      .carousel-control-prev-icon, 
      .carousel-control-next-icon {
        filter: brightness(0) saturate(100%) invert(26%) sepia(89%) saturate(2596%) hue-rotate(197deg) brightness(98%) contrast(91%);
        width: 1rem;
        height: 1rem;
      }
      
      .carousel-indicators {
        bottom: -15px;
      }
      
      .carousel-indicators button {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: #adb5bd;
        border: none;
        margin: 0 2px;
      }
      
      .carousel-indicators button.active {
        background-color: #4361ee;
        transform: scale(1.2);
      }
      
      @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.7; }
        100% { opacity: 1; }
      }
      
      /* Media query per tablet e desktop */
      @media (min-width: 768px) {
        .card-body {
          padding: 1rem !important;
        }
        
        .match-carousel {
          padding: 16px;
          margin: 0 12px;
        }
        
        .day-header {
          padding: 10px 16px;
          font-size: 1rem;
        }
        
        .simple-match-table {
          font-size: 0.9rem;
        }
        
        .simple-match-table td {
          padding: 12px 8px;
        }
        
        .carousel-control-prev, .carousel-control-next {
          width: 36px;
          height: 36px;
        }
        
        .carousel-control-prev { left: -16px; }
        .carousel-control-next { right: -16px; }
      }
    </style>';

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
            echo '<h5 class="mb-0 font-weight-bold"><img src="./immagini/logoprimario.jpg" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;"> Girone ' . $girone . '</h5>';
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
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: left;"><div style="display: flex; align-items: center;"><img src="' . getLogoPath($row['squadra'], $conn) . '" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;">' . $row['squadra'] . '</div></td>';
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
    } elseif (isset($_POST['Classifica'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);
      // Aggiunta della legenda
      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white;">';
      echo '<h4 class="mb-0">' . $scelta . ' - Classifica</h4>';
      echo '</div>';
      echo '<div class="card-body px-1">';

      echo '
      <form method="POST" class="d-flex justify-content-center gap-1 gap-md-3 mb-2 mb-md-4 flex-wrap pt-0">
        <input type="hidden" name="scelta" value="' . $scelta . '">
        
        <button type="submit" name="Classifica" class="btn btn-primary px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-table me-1 me-md-2"></i>Classifica
        </button>
        
        <button type="submit" name="Marcatori" class="btn btn-success px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-person-badge me-1 me-md-2"></i>Marcatori
        </button>
        
        <button type="submit" name="Partite" class="btn btn-info px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-calendar-event me-1 me-md-2"></i>Partite
        </button>
      </form>

      <style>
        .btn-hover-effect {
          transition: all 0.3s ease;
          transform: translateY(0);
          border: none;
          font-weight: 500;
          letter-spacing: 0.3px;
          position: relative;
          overflow: hidden;
          font-size: 0.85rem;
          white-space: nowrap;
        }
        
        @media (min-width: 768px) {
          .btn-hover-effect {
            font-size: 1rem;
            letter-spacing: 0.5px;
          }
        }
        
        .btn-hover-effect:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .btn-hover-effect:active {
          transform: translateY(0);
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
          font-size: 0.9rem;
        }
        
        @media (min-width: 768px) {
          .btn i {
            font-size: 1rem;
          }
        }
        
        .btn:hover i {
          transform: scale(1.05);
        }
        
        .btn:focus {
          box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
      </style>
      

      <style>
        /* Stili ottimizzati per mobile */
        .match-carousel {
          background: white;
          border-radius: 10px;
          box-shadow: 0 1px 5px rgba(0,0,0,0.05);
          padding: 8px;
          margin: 0 4px;
        }
        
        .day-header {
          background: linear-gradient(135deg, #4361ee, #3a0ca3);
          color: white;
          padding: 8px 10px;
          border-radius: 6px;
          margin-bottom: 8px;
          text-align: center;
          font-weight: 600;
          font-size: 0.85rem;
          box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .simple-match-table {
          width: 100%;
          border-collapse: collapse;
          font-size: 0.8rem;
        }
        
        .simple-match-table tr {
          border-bottom: 1px solid #f0f0f0;
        }
        
        .simple-match-table tr:last-child {
          border-bottom: none;
        }
        
        .simple-match-table td {
          padding: 8px 4px;
          vertical-align: middle;
        }
        
        .simple-match-table td:first-child {
          text-align: right;
          width: 40%;
          font-weight: 500;
          color: #333;
          padding-right: 8px;
        }
        
        .simple-match-table td:nth-child(2) {
          text-align: center;
          width: 20%;
          font-weight: 700;
          color: #222;
          min-width: 60px;
        }
        
        .simple-match-table td:last-child {
          text-align: left;
          width: 40%;
          font-weight: 500;
          color: #333;
          padding-left: 8px;
        }
        
        .match-status {
          display: inline-block;
          padding: 2px 6px;
          border-radius: 4px;
          font-size: 10px;
          font-weight: 700;
          text-transform: uppercase;
        }
        
        .status-terminata {
          background-color: #e9ecef;
          color: #6c757d;
        }
        
        .status-in-corso {
          background-color: #dc3545;
          color: white;
          animation: pulse 1.5s infinite;
        }
        
        .status-programmata {
          background-color: #6c757d;
          color: white;
        }
        
        /* Navigazione carosello mobile più compatta */
        .carousel-control-prev, .carousel-control-next {
          width: 28px;
          height: 28px;
          background: white;
          border-radius: 50%;
          top: 50%;
          transform: translateY(-50%);
          box-shadow: 0 1px 5px rgba(0,0,0,0.1);
          opacity: 1;
        }
        
        .carousel-control-prev { left: -8px; }
        .carousel-control-next { right: -8px; }
        
        .carousel-control-prev-icon, 
        .carousel-control-next-icon {
          filter: brightness(0) saturate(100%) invert(26%) sepia(89%) saturate(2596%) hue-rotate(197deg) brightness(98%) contrast(91%);
          width: 1rem;
          height: 1rem;
        }
        
        .carousel-indicators {
          bottom: -15px;
        }
        
        .carousel-indicators button {
          width: 5px;
          height: 5px;
          border-radius: 50%;
          background-color: #adb5bd;
          border: none;
          margin: 0 2px;
        }
        
        .carousel-indicators button.active {
          background-color: #4361ee;
          transform: scale(1.2);
        }
        
        @keyframes pulse {
          0% { opacity: 1; }
          50% { opacity: 0.7; }
          100% { opacity: 1; }
        }
        
        /* Media query per tablet e desktop */
        @media (min-width: 768px) {
          .card-body {
            padding: 1rem !important;
          }
          
          .match-carousel {
            padding: 16px;
            margin: 0 12px;
          }
          
          .day-header {
            padding: 10px 16px;
            font-size: 1rem;
          }
          
          .simple-match-table {
            font-size: 0.9rem;
          }
          
          .simple-match-table td {
            padding: 12px 8px;
          }
          
          .carousel-control-prev, .carousel-control-next {
            width: 36px;
            height: 36px;
          }
          
          .carousel-control-prev { left: -16px; }
          .carousel-control-next { right: -16px; }
        }
      </style>';

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
              echo '  <td style="padding: 8px 4px; font-weight: bold; text-align: left;"><div style="display: flex; align-items: center;"><img src="' . getLogoPath($row['squadra'], $conn) . '" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;">' . $row['squadra'] . '</div></td>';
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
      echo '    <h4 class="mb-0 fw-bold"><img src="./immagini/logoprimario.jpg" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;">' . $scelta . ' - CLASSIFICA MARCATORI</h4>';
      echo '  </div>';
      echo '  <div class="card-body">';

      // Pulsanti navigazione
      echo '
      <form method="POST" class="d-flex justify-content-center gap-1 gap-md-3 mb-2 mb-md-4 flex-wrap pt-0">
        <input type="hidden" name="scelta" value="' . $scelta . '">
        
        <button type="submit" name="Classifica" class="btn btn-primary px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-table me-1 me-md-2"></i>Classifica
        </button>
        
        <button type="submit" name="Marcatori" class="btn btn-success px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-person-badge me-1 me-md-2"></i>Marcatori
        </button>
        
        <button type="submit" name="Partite" class="btn btn-info px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
          <i class="bi bi-calendar-event me-1 me-md-2"></i>Partite
        </button>
      </form>

      <style>
        .btn-hover-effect {
          transition: all 0.3s ease;
          transform: translateY(0);
          border: none;
          font-weight: 500;
          letter-spacing: 0.3px;
          position: relative;
          overflow: hidden;
          font-size: 0.85rem;
          white-space: nowrap;
        }
        
        @media (min-width: 768px) {
          .btn-hover-effect {
            font-size: 1rem;
            letter-spacing: 0.5px;
          }
        }
        
        .btn-hover-effect:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .btn-hover-effect:active {
          transform: translateY(0);
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
          font-size: 0.9rem;
        }
        
        @media (min-width: 768px) {
          .btn i {
            font-size: 1rem;
          }
        }
        
        .btn:hover i {
          transform: scale(1.05);
        }
        
        .btn:focus {
          box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
      </style>
      

    <style>
      /* Stili ottimizzati per mobile */
      .match-carousel {
        background: white;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0,0,0,0.05);
        padding: 8px;
        margin: 0 4px;
      }
      
      .day-header {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        padding: 8px 10px;
        border-radius: 6px;
        margin-bottom: 8px;
        text-align: center;
        font-weight: 600;
        font-size: 0.85rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      }
      
      .simple-match-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.8rem;
      }
      
      .simple-match-table tr {
        border-bottom: 1px solid #f0f0f0;
      }
      
      .simple-match-table tr:last-child {
        border-bottom: none;
      }
      
      .simple-match-table td {
        padding: 8px 4px;
        vertical-align: middle;
      }
      
      .simple-match-table td:first-child {
        text-align: right;
        width: 40%;
        font-weight: 500;
        color: #333;
        padding-right: 8px;
      }
      
      .simple-match-table td:nth-child(2) {
        text-align: center;
        width: 20%;
        font-weight: 700;
        color: #222;
        min-width: 60px;
      }
      
      .simple-match-table td:last-child {
        text-align: left;
        width: 40%;
        font-weight: 500;
        color: #333;
        padding-left: 8px;
      }
      
      .match-status {
        display: inline-block;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
      }
      
      .status-terminata {
        background-color: #e9ecef;
        color: #6c757d;
      }
      
      .status-in-corso {
        background-color: #dc3545;
        color: white;
        animation: pulse 1.5s infinite;
      }
      
      .status-programmata {
        background-color: #6c757d;
        color: white;
      }
      
      /* Navigazione carosello mobile più compatta */
      .carousel-control-prev, .carousel-control-next {
        width: 28px;
        height: 28px;
        background: white;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        box-shadow: 0 1px 5px rgba(0,0,0,0.1);
        opacity: 1;
      }
      
      .carousel-control-prev { left: -8px; }
      .carousel-control-next { right: -8px; }
      
      .carousel-control-prev-icon, 
      .carousel-control-next-icon {
        filter: brightness(0) saturate(100%) invert(26%) sepia(89%) saturate(2596%) hue-rotate(197deg) brightness(98%) contrast(91%);
        width: 1rem;
        height: 1rem;
      }
      
      .carousel-indicators {
        bottom: -15px;
      }
      
      .carousel-indicators button {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: #adb5bd;
        border: none;
        margin: 0 2px;
      }
      
      .carousel-indicators button.active {
        background-color: #4361ee;
        transform: scale(1.2);
      }
      
      @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.7; }
        100% { opacity: 1; }
      }
      
      /* Media query per tablet e desktop */
      @media (min-width: 768px) {
        .card-body {
          padding: 1rem !important;
        }
        
        .match-carousel {
          padding: 16px;
          margin: 0 12px;
        }
        
        .day-header {
          padding: 10px 16px;
          font-size: 1rem;
        }
        
        .simple-match-table {
          font-size: 0.9rem;
        }
        
        .simple-match-table td {
          padding: 12px 8px;
        }
        
        .carousel-control-prev, .carousel-control-next {
          width: 36px;
          height: 36px;
        }
        
        .carousel-control-prev { left: -16px; }
        .carousel-control-next { right: -16px; }
      }
    </style>';

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
                          ORDER BY totale_goal DESC
                          LIMIT 10";

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
            echo '<div class="player-name" style="
       font-weight: 700 !important;
       font-size: 1.2rem;
       color: #212529 !important;
       text-shadow: 0 1px 2px rgba(0,0,0,0.1);
       letter-spacing: 0.5px;
       margin: 8px 0;
       line-height: 1.3;
     ">' . $nome_completo . '</div>';
            echo '      <div class="team-name small" style="color: #6c757d;"> <img src="' . getLogoPath($row['squadra'], $conn) . '" style="width: 25px; height: 25px; margin-right: 8px; border-radius: 50%; object-fit: cover;">' . $squadra . '</div>';
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
        .team-logo {
          width: 20px;
          height: 20px;
          margin: 0 4px;
          object-fit: contain;
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
        @media (max-width: 767px) {
        .simple-match-table {
          font-size: 0.75rem;
        }
        
        .team-logo {
          width: 16px;
          height: 16px;
        }
        
        .simple-match-table td:nth-child(2) {
          flex: 0 0 50px; /* Larghezza più stretta su mobile */
        }
      }
    </style>';
    } elseif (isset($_POST['Partite'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);

      echo '<div class="event-card animate__animated animate__fadeIn">';
      echo '<div class="card-header text-center bg-primary text-white">';
      echo '<h4 class="mb-0">' . $scelta . ' - Calendario Partite</h4>';
      echo '</div>';
      echo '<div class="card-body p-1">';

      // Pulsanti di navigazione
      echo '
    <form method="POST" class="d-flex justify-content-center gap-1 gap-md-3 mb-2 mb-md-4 flex-wrap pt-3">
      <input type="hidden" name="scelta" value="' . $scelta . '">
      
      <button type="submit" name="Classifica" class="btn btn-primary px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
        <i class="bi bi-table me-1 me-md-2"></i>Classifica
      </button>
      
      <button type="submit" name="Marcatori" class="btn btn-success px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
        <i class="bi bi-person-badge me-1 me-md-2"></i>Marcatori
      </button>
      
      <button type="submit" name="Partite" class="btn btn-info px-2 px-md-4 py-1 py-md-2 rounded-pill shadow-sm btn-hover-effect">
        <i class="bi bi-calendar-event me-1 me-md-2"></i>Partite
      </button>
    </form>

    <style>
      .btn-hover-effect {
        transition: all 0.3s ease;
        transform: translateY(0);
        border: none;
        font-weight: 500;
        letter-spacing: 0.3px;
        position: relative;
        overflow: hidden;
        font-size: 0.85rem;
        white-space: nowrap;
      }
      
      @media (min-width: 768px) {
        .btn-hover-effect {
          font-size: 1rem;
          letter-spacing: 0.5px;
        }
      }
      
      .btn-hover-effect:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }
      
      .btn-hover-effect:active {
        transform: translateY(0);
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
        font-size: 0.9rem;
      }
      
      @media (min-width: 768px) {
        .btn i {
          font-size: 1rem;
        }
      }
      
      .btn:hover i {
        transform: scale(1.05);
      }
      
      .btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
      }

      /* Stili per le immagini delle squadre */
      .team-logo {
        width: 20px;
        height: 20px;
        margin: 0 4px;
        object-fit: contain;
      }
      
      .team-name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
    </style>
    
    <style>
      /* Stili ottimizzati per il carosello */
      .match-carousel {
        background: white;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0,0,0,0.05);
        padding: 8px;
        margin: 0 4px;
      }
      
      .day-header {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        padding: 8px 10px;
        border-radius: 6px;
        margin-bottom: 8px;
        text-align: center;
        font-weight: 600;
        font-size: 0.85rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      }
      
      .simple-match-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.8rem;
      }
      
      .simple-match-table tr {
        display: flex;
        align-items: center;
        min-height: 40px;
        border-bottom: 1px solid #f0f0f0;
      }
      
      .simple-match-table tr:last-child {
        border-bottom: none;
      }
      
      .simple-match-table td {
        display: flex;
        align-items: center;
        padding: 8px 4px !important;
        vertical-align: middle;
      }
      
      .simple-match-table td:first-child {
        justify-content: flex-end;
        text-align: right !important;
        flex: 1;
        min-width: 0;
      }
      
      .simple-match-table td:nth-child(2) {
        justify-content: center;
        flex: 0 0 60px;
        text-align: center !important;
        font-weight: 700;
        color: #222;
      }
      
      .simple-match-table td:last-child {
        justify-content: flex-start;
        text-align: left !important;
        flex: 1;
        min-width: 0;
      }
      
      .match-status {
        display: inline-block;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
      }
      
      .status-terminata {
        background-color: #e9ecef;
        color: #6c757d;
      }
      
      .status-in-corso {
        background-color: #dc3545;
        color: white;
        animation: pulse 1.5s infinite;
      }
      
      .status-programmata {
        background-color: #6c757d;
        color: white;
      }
      
      /* Navigazione carosello */
      .carousel-control-prev, .carousel-control-next {
        width: 28px;
        height: 28px;
        background: white;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        box-shadow: 0 1px 5px rgba(0,0,0,0.1);
        opacity: 1;
      }
      
      .carousel-control-prev { left: -8px; }
      .carousel-control-next { right: -8px; }
      
      .carousel-control-prev-icon, 
      .carousel-control-next-icon {
        filter: brightness(0) saturate(100%) invert(26%) sepia(89%) saturate(2596%) hue-rotate(197deg) brightness(98%) contrast(91%);
        width: 1rem;
        height: 1rem;
      }
      
      .carousel-indicators {
        bottom: -15px;
      }
      
      .carousel-indicators button {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: #adb5bd;
        border: none;
        margin: 0 2px;
      }
      
      .carousel-indicators button.active {
        background-color: #4361ee;
        transform: scale(1.2);
      }
      
      @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.7; }
        100% { opacity: 1; }
      }
      
      /* Media query per mobile */
      @media (max-width: 767px) {
        .simple-match-table {
          font-size: 0.75rem;
        }
        
        .team-logo {
          width: 16px;
          height: 16px;
        }
        
        .simple-match-table td:nth-child(2) {
          flex: 0 0 50px;
        }
      }
      
      /* Media query per tablet e desktop */
      @media (min-width: 768px) {
        .card-body {
          padding: 1rem !important;
        }
        
        .match-carousel {
          padding: 16px;
          margin: 0 12px;
        }
        
        .day-header {
          padding: 10px 16px;
          font-size: 1rem;
        }
        
        .simple-match-table {
          font-size: 0.9rem;
        }
        
        .simple-match-table td {
          padding: 12px 8px !important;
        }
        
        .carousel-control-prev, .carousel-control-next {
          width: 36px;
          height: 36px;
        }
        
        .carousel-control-prev { left: -16px; }
        .carousel-control-next { right: -16px; }
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
          echo '<div id="matchCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">';
          echo '<div class="carousel-inner">';

          $first = true;
          while ($giornata = $result_giornate->fetch_assoc()) {
            echo '<div class="carousel-item ' . ($first ? 'active' : '') . '">';
            echo '<div class="match-carousel">';
            if ($giornata['Numero'] == 8) {
              echo '<div class="day-header">Quarti di finale • ' . date('d/m/y', strtotime($giornata['Data_inizio'])) . '</div>';
            } elseif ($giornata['Numero'] == 9) {
              echo '<div class="day-header">Semifinali andata • ' . date('d/m/y', strtotime($giornata['Data_inizio'])) . '</div>';
            } elseif ($giornata['Numero'] == 10) {
              echo '<div class="day-header">Semifinali ritorno • ' . date('d/m/y', strtotime($giornata['Data_inizio'])) . '</div>';
            } elseif ($giornata['Numero'] == 11) {
              echo '<div class="day-header">Finale • ' . date('d/m/y', strtotime($giornata['Data_inizio'])) . '</div>';
              echo '<div class="text-center my-3 py-2" style="background: linear-gradient(135deg, #1e3a8a, #2c4fa6); color: white; border-radius: 8px; font-weight: bold; font-size: 1.2rem; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            <i class="bi bi-trophy-fill text-warning me-2"></i>AL BARETTO vince 3-1 ai calci di rigore
                          </div>';
            } else {
              echo '<div class="day-header">Giornata ' . $giornata['Numero'] . ' • ' . date('d/m/y', strtotime($giornata['Data_inizio'])) . '</div>';
            }

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
              echo '<table class="simple-match-table">';
              echo '<tbody>';

              while ($partita = $result_partite->fetch_assoc()) {
                echo '<tr>';

                // Squadra casa
                echo '<td>' . displaySquadraWithLogo($partita['squadra_casa'], $conn) . '</td>';

                // Risultato/Stato
                echo '<td>';
                if ($partita['Stato'] == 'terminata') {
                  echo '<span class="text-dark">' . $partita['Gol_casa'] . ' - ' . $partita['Gol_ospite'] . '</span>';
                } elseif ($partita['Stato'] == 'in corso') {
                  echo '<span class="match-status status-in-corso">LIVE</span>';
                } else {
                  echo '<span class="match-status status-programmata">' . date('H:i', strtotime($partita['Data'])) . '</span>';
                }
                echo '</td>';

                // Squadra ospite
                echo '<td>' . displaySquadraWithLogo($partita['squadra_ospite'], $conn) . '</td>';

                echo '</tr>';
              }

              echo '</tbody>';
              echo '</table>';
            } else {
              echo '<div class="alert alert-info text-center py-2 my-2">Nessuna partita programmata</div>';
            }

            echo '</div>'; // match-carousel
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
          echo '<div class="carousel-indicators mt-2">';
          for ($i = 0; $i < $result_giornate->num_rows; $i++) {
            echo '<button type="button" data-bs-target="#matchCarousel" data-bs-slide-to="' . $i . '" ' . ($i == 0 ? 'class="active"' : '') . '></button>';
          }
          echo '</div>';

          echo '</div>'; // carousel
        } else {
          echo '<div class="alert alert-warning text-center py-2">Nessuna giornata trovata per questo campionato.</div>';
        }
      } else {
        echo '<div class="alert alert-danger text-center py-2">Nessun campionato attivo trovato.</div>';
      }

      echo '</div>'; // card-body
      echo '</div>'; // event-card
    } elseif (isset($_POST['indietro'])) {
      header("Location: Eventi_passati1.php");
      exit();
    }

    $conn->close();
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>