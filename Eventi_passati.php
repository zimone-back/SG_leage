<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>San Giorgio League - Eventi Passati</title>
  <link rel="icon" type="image/svg+xml" href="./immagini/logosgl.jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
  <style>
    body {
        padding-top: 10px;
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    }
    
    .classifica-table thead th {
        background-color: #2c4fa6;
        color: white;
        padding: 12px 8px;
        text-align: center;
        font-weight: 600;
        vertical-align: middle;
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
    
    
    .primo {
        background-color: #e6f7ff;
        font-weight: bold;
    }
    
    /* Stile per le prime tre posizioni */
    .classifica-table tbody tr:nth-child(-n+3) {
        font-weight: 500;
    }
    
   
    .retrocessione {
        background-color: #fff0f0;
        color: #d32f2f;
    }
    
    @media (max-width: 768px) {
        .classifica-table th, .classifica-table td {
            padding: 8px 5px;
            font-size: 0.9rem;
        }
    }
  </style>
</head>

<body class="bg-light">
  <div class="container">

    <!-- Pulsanti indietro/home -->
    <div class="btn-back-home d-flex gap-2 mb-3">
      <a href="index.php" class="btn btn-outline-dark">⬅️ Home</a>
      <button onclick="history.back()" class="btn btn-outline-secondary">🔙 Indietro</button>
    </div>

    <h1 class="text-center mb-4">Eventi Passati</h1>

    <form method="post" class="btn-top d-flex justify-content-center gap-2 mb-4">
      <input type="submit" name="Classifica" value="Classifica" class="btn btn-primary px-4" />
      <input type="submit" name="Marcatori" value="Marcatori" class="btn btn-success px-4" />
    </form>

    <div class="alert alert-info text-center">
      In questa sezione puoi consultare le <strong>classifiche finali</strong> e i <strong>marcatori</strong> dei campionati già conclusi.
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['Classifica'])) {
        ?>
        <form method="post" class="card p-3 shadow-sm mb-4">
          <input type="hidden" name="Classifica" value="1">
          <div class="mb-3">
            <label for="scelta" class="form-label">Campionato:</label>
            <select name="scelta" id="scelta" class="form-select" required>
              <option value="">Seleziona</option>
              <option value="sangiorgileague">San Giorgio League 2025</option>
            </select>
          </div>
          <button type="submit" class="btn btn-outline-primary w-100">Mostra Classifiche Complete</button>
        </form>
        <?php

        if (!empty($_POST['scelta'])) {
          include 'connessione.php';
          $scelta = $conn->real_escape_string($_POST['scelta']);

          $stmt = $conn->prepare("SELECT ID_campionato FROM campionati WHERE Nome = ? LIMIT 1");
          $stmt->bind_param("s", $scelta);
          $stmt->execute();
          $resultCampionato = $stmt->get_result();

          if ($resultCampionato->num_rows > 0) {
            $idCampionato = $resultCampionato->fetch_assoc()['ID_campionato'];

            $stmt = $conn->prepare("SELECT DISTINCT Girone FROM squadre WHERE Cod_campionato = ? ORDER BY Girone");
            $stmt->bind_param("i", $idCampionato);
            $stmt->execute();
            $resultGironi = $stmt->get_result();

            $gironi = [];
            while ($row = $resultGironi->fetch_assoc()) {
              $gironi[] = $row['Girone'];
            }

            if (!empty($gironi)) {
              echo "<h2 class='text-center mb-4'>$scelta - Classifica per Girone</h2>";

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

                $stmt = $conn->prepare("SELECT Nome AS squadra, PT, G, V, N, P, DR
                                         FROM squadre 
                                         WHERE Cod_campionato = ? AND Girone = ?
                                         ORDER BY PT DESC, DR DESC");
                $stmt->bind_param("is", $idCampionato, $girone);
                $stmt->execute();
                $result = $stmt->get_result();

                $posizione = 0;
                while ($row = $result->fetch_assoc()) {
    $posizione++;
    $rowClass = '';
    if ($posizione <5) {
        $rowClass = 'primo';
    } elseif ($posizione >= count($gironi)) {
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

          $conn->close();
        }
      }
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>