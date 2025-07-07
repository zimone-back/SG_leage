<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>San Giorgio League - Eventi Passati</title>
  <link rel="icon" type="image/svg+xml" href="./immagini/logosgl.jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./style.css">
  <style>
    body {
      padding-top: 10px;
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    
    /* Nuova soluzione adattiva */
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

/* Ottimizzazione per orientamento mobile */
@media (max-width: 767px) and (orientation: portrait) {
    body::before {
        background-size: 100% auto; /* Adatta alla larghezza */
        min-height: 100vh;
    }
}

@media (max-width: 767px) and (orientation: landscape) {
    body::before {
        background-size: auto 100%; /* Adatta all'altezza */
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

    .classifica-container {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin-bottom: 30px;
    }

    .classifica-header {
      background-color: #1e3a8a;
      color: white;
      padding: 15px;
      text-align: center;
      font-weight: bold;
      font-size: 1.2rem;
    }

    .classifica-table {
      width: 100%;
      margin-bottom: 0;
      border-collapse: separate;
      border-spacing: 0;
    }

    .classifica-table thead th {
      background-color: #2c4fa6;
      color: white;
      padding: 12px 8px;
      text-align: center;
      font-weight: 600;
      vertical-align: middle;
      position: sticky;
      top: 0;
    }

    .classifica-table tbody tr {
      transition: background-color 0.2s;
    }

    .classifica-table tbody tr:hover {
      background-color: #f1f5ff;
    }

    .classifica-table td {
      padding: 10px 8px;
      text-align: center;
      vertical-align: middle;
      border-top: 1px solid #e9ecef;
    }

    .classifica-table tbody tr.primo {
      background-color: #e6f7ff;
    }

    .classifica-table tbody tr:nth-child(1) {
      font-weight: bold;
      background-color: #d4edff;
    }

    .classifica-table tbody tr:nth-child(2), 
    .classifica-table tbody tr:nth-child(3), 
    .classifica-table tbody tr:nth-child(4) {
      font-weight: 600;
      background-color: #e6f7ff;
    }

    .classifica-table tbody tr.retrocessione {
      background-color: #fff0f0;
      color: #d32f2f;
      font-weight: 500;
    }

    .classifica-table tbody tr:nth-child(even):not(.primo):not(.retrocessione) {
      background-color: #f8f9fa;
    }

    .marcatori-container {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin-bottom: 30px;
    }

    .marcatori-header {
      background-color: #1e3a8a;
      color: white;
      padding: 15px;
      text-align: center;
      font-weight: bold;
      font-size: 1.2rem;
    }

    .marcatori-table {
      width: 100%;
      margin-bottom: 0;
      border-collapse: separate;
      border-spacing: 0;
    }

    .marcatori-table thead th {
      background-color: #2c4fa6;
      color: white;
      padding: 12px 8px;
      text-align: center;
      font-weight: 600;
      vertical-align: middle;
      position: sticky;
      top: 0;
    }

    .marcatori-table tbody tr {
      transition: background-color 0.2s;
    }

    .marcatori-table tbody tr:hover {
      background-color: #f1f5ff;
    }

    .marcatori-table td {
      padding: 10px 8px;
      text-align: center;
      vertical-align: middle;
      border-top: 1px solid #e9ecef;
    }

    .marcatori-table tbody tr:nth-child(1) {
      font-weight: bold;
      background-color: #d4edff;
    }

    .marcatori-table tbody tr:nth-child(2), 
    .marcatori-table tbody tr:nth-child(3) {
      font-weight: 600;
      background-color: #e6f7ff;
    }

    .marcatori-table tbody tr:nth-child(even) {
      background-color: #f8f9fa;
    }

    .btn-campionato {
      padding: 10px 20px;
      margin: 5px;
      font-size: 1.1rem;
      border-radius: 6px;
    }

    .btn-group-vertical {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    @media (max-width: 768px) {
      .classifica-table th, 
      .classifica-table td,
      .marcatori-table th,
      .marcatori-table td {
        padding: 8px 5px;
        font-size: 0.9rem;
      }
      
      .classifica-header,
      .marcatori-header {
        font-size: 1rem;
        padding: 10px;
      }
      
      .btn-campionato {
        padding: 8px 15px;
        font-size: 1rem;
      }
    }
  </style>
</head>

<body class="bg-light">
  <div class="container">

    <!-- Pulsanti indietro/home -->
    <div class="navigation-buttons">
  <a href="index.php" class="nav-btn home-btn">
    <i class="bi bi-house-door"></i>
    <span>Home</span>
  </a>
  <button onclick="history.back()" class="nav-btn back-btn">
    <i class="bi bi-arrow-left"></i>
    <span>Indietro</span>
  </button>
</div>
<style>
  .navigation-buttons {
    display: flex;
    gap: 10px;
    margin-bottom: 1rem;
    justify-content: center;
  }

  .nav-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s ease;
    border: 1px solid transparent;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }

  .home-btn {
    background-color: #1e3a8a;
    color: white;
  }

  .home-btn:hover {
    background-color: #2c4fa6;
    transform: translateY(-2px);
  }

  .back-btn {
    background-color: white;
    color: #1e3a8a;
    border-color: #1e3a8a;
  }

  .back-btn:hover {
    background-color: #f1f5ff;
    transform: translateY(-2px);
  }

  .nav-btn i {
    margin-right: 6px;
    font-size: 1rem;
  }

  /* Ottimizzazione mobile */
  @media (max-width: 576px) {
    .navigation-buttons {
      gap: 8px;
      padding: 0 10px;
    }
    
    .nav-btn {
      padding: 6px 10px;
      font-size: 0.85rem;
      flex-grow: 1;
      max-width: 120px;
    }
    
    .nav-btn i {
      font-size: 0.9rem;
      margin-right: 5px;
    }
  }

  /* Animazione al click */
  .nav-btn:active {
    transform: translateY(1px);
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  }
</style>

    <?php
    include 'connessione.php';
    if (!isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori'])) {
    echo "<div class='text-center mb-5'>";
    echo "<h1 class='mb-3'>Archivio Storico Campionati</h1>";
    
    echo "<div class='alert alert-info mx-auto' style='max-width: 600px;'>";
    echo "<h4 class='alert-heading'><i class='bi bi-info-circle-fill'></i> Esplora la storia del torneo</h4>";
    echo "<hr>";
    echo "<p class='mb-0'>Seleziona una competizione conclusa per visualizzare:</p>";
    echo "<ul class='text-start'>";
    echo "<li>Classifiche finali</li>";
    echo "<li>Statistiche dei marcatori</li>";
    echo "<li>Tutti i dati storici</li>";
    echo "</ul>";
    echo "</div>";
    
    echo "<div class='card mx-auto mb-4' style='max-width: 600px;'>";
    echo "<div class='card-header bg-primary text-white'>";
    echo "<h5 class='mb-0'><i class='bi bi-trophy-fill'></i> Campionati disponibili</h5>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<form method='POST'>";
    echo "<div class='d-grid gap-3'>";
    echo "<button type='submit' name='scelta' value='San Giorgio League 2025' class='btn btn-primary btn-lg'>";
    echo "<i class='bi bi-archive-fill'></i> San Giorgio League 2025";
    echo "</button>";
    
    // L'HO COMMENTATO COSì LO RICHIAMIAMO QUANDO LA KINGS SARà UN'EVENTO PASSATO
    // echo "<button type='submit' name='scelta' value='king' class='btn btn-primary btn-lg'>";
    // echo "<i class='bi bi-archive-fill'></i> King";
    // echo "</button>";
    
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "<div class='card-footer text-muted small'>";
    echo "Scegli un campionato per visualizzare i dati storici";
    echo "</div>";
    echo "</div>";
    
    echo "<div class='text-muted small'>";
    echo "<div class='d-flex align-items-center p-3 mb-3 rounded-3' style='background-color: #fff5f5; border-left: 4px solid #dc3545; box-shadow: 0 2px 8px rgba(220, 53, 69, 0.15)'>
        <i class='bi bi-exclamation-octagon-fill text-danger fs-4 me-3'></i>
        <div>
            <p class='text-dark-emphasis mb-0 fw-medium'>Solo le competizioni concluse sono disponibili in questa sezione</p>
        </div>
      </div>";
    echo "</div>";
    echo "</div>";
}
    elseif (isset($_POST['scelta']) && !isset($_POST['Classifica']) && !isset($_POST['Marcatori'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);

      echo "<h1 class='text-center mb-4'>$scelta</h1>";
      
      echo "<form method='POST' class='d-flex justify-content-center gap-3 mb-4'>";
      echo "<input type='hidden' name='scelta' value='$scelta'>";
      echo "<button type='submit' name='Classifica' class='btn btn-primary px-4'>Classifica</button>";
      echo "<button type='submit' name='Marcatori' class='btn btn-success px-4'>Marcatori</button>";
      echo "</form>";
      
      echo "<div class='text-center'>";
      echo "</div>";


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
            echo "<div class='classifica-container mb-5'>";
            echo "<div class='classifica-header'>Girone $girone</div>";
            echo "<div class='table-responsive'>";
            echo "<table class='classifica-table'>";
            echo "<thead><tr>
                    <th>Squadra</th>
                    <th>PT</th>
                    <th>G</th>
                    <th>V</th>
                    <th>N</th>
                    <th>P</th>
                    <th>DR</th>
                  </tr></thead><tbody>";

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
              
              echo "<tr class='" . $rowClass . "'>
                      <td class='text-start'>" . $row['squadra'] . "</td>
                      <td><strong>" . $row['PT'] . "</strong></td>
                      <td>" . $row['G'] . "</td>
                      <td>" . $row['V'] . "</td>
                      <td>" . $row['N'] . "</td>
                      <td>" . $row['P'] . "</td>
                      <td>" . $row['DR'] . "</td>
                    </tr>";
            }
            echo "</tbody></table></div></div>";
          }
        } else {
          echo "<div class='alert alert-warning'>Nessun girone trovato per questo campionato.</div>";
        }
      } else {
        echo "<div class='alert alert-danger'>Campionato non trovato.</div>";
      }

    }
    elseif (isset($_POST['Classifica'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);
      
      echo "<h1 class='text-center mb-4'>$scelta - Classifica</h1>";
      
      echo "<form method='POST' class='d-flex justify-content-center gap-3 mb-4'>";
      echo "<input type='hidden' name='scelta' value='$scelta'>";
      echo "<button type='submit' name='Marcatori' class='btn btn-success px-4'>Vedi Marcatori</button>";
      echo "<button type='submit' name='indietro' class='btn btn-secondary px-4'>Torna al Menu</button>";
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
            echo "<div class='classifica-container mb-5'>";
            echo "<div class='classifica-header'>Girone $girone</div>";
            echo "<div class='table-responsive'>";
            echo "<table class='classifica-table'>";
            echo "<thead><tr>
                    <th>Squadra</th>
                    <th>PT</th>
                    <th>G</th>
                    <th>V</th>
                    <th>N</th>
                    <th>P</th>
                    <th>DR</th>
                  </tr></thead><tbody>";

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
              
              echo "<tr class='" . $rowClass . "'>
                      <td class='text-start'>" . $row['squadra'] . "</td>
                      <td><strong>" . $row['PT'] . "</strong></td>
                      <td>" . $row['G'] . "</td>
                      <td>" . $row['V'] . "</td>
                      <td>" . $row['N'] . "</td>
                      <td>" . $row['P'] . "</td>
                      <td>" . $row['DR'] . "</td>
                    </tr>";
            }
            echo "</tbody></table></div></div>";
          }
        } else {
          echo "<div class='alert alert-warning'>Nessun girone trovato per questo campionato.</div>";
        }
      } else {
        echo "<div class='alert alert-danger'>Campionato non trovato.</div>";
      }
    }
    elseif (isset($_POST['Marcatori'])) {
      $scelta = $conn->real_escape_string($_POST['scelta']);
      
      echo "<h1 class='text-center mb-4'>$scelta - Classifica Marcatori</h1>";
      
      echo "<form method='POST' class='d-flex justify-content-center gap-3 mb-4'>";
      echo "<input type='hidden' name='scelta' value='$scelta'>";
      echo "<button type='submit' name='Classifica' class='btn btn-primary px-4'>Vedi Classifica</button>";
      echo "<button type='submit' name='indietro' class='btn btn-secondary px-4'>Torna al Menu</button>";
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
          echo "<div class='marcatori-container'>";
          echo "<div class='marcatori-header'>Classifica Marcatori</div>";
          echo "<div class='table-responsive'>";
          echo "<table class='marcatori-table'>";
          echo "<thead><tr>
                  <th>Pos</th>
                  <th>Giocatore</th>
                  <th>Squadra</th>
                  <th>Gol</th>
                </tr></thead><tbody>";

          $posizione = 1;
          while ($row = $result_marcatori->fetch_assoc()) {
            $nome_completo = trim($row['Nome'] . ' ' . $row['Cognome']);
            $rowClass = $posizione <= 3 ? 'primo' : '';
            echo "<tr class='$rowClass'>
                    <td>$posizione</td>
                    <td class='text-start'>$nome_completo</td>
                    <td>{$row['squadra']}</td>
                    <td><strong>{$row['totale_goal']}</strong></td>
                  </tr>";
            $posizione++;
          }
          echo "</tbody></table></div></div>";
        } else {
          echo "<div class='alert alert-warning'>Nessun marcatore trovato per questo campionato.</div>";
        }
      } else {
        echo "<div class='alert alert-danger'>Campionato non trovato.</div>";
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