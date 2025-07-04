<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>San Giorgio League - Eventi Passati</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
</head>

<style>
    body{
        padding-top: 10px;
    }
</style>

<body class="bg-light">
  <div class="container">

    <!-- Pulsanti indietro/home -->
    <div class="btn-back-home d-flex gap-2 mb-3">
      <a href="index.php" class="btn btn-outline-dark">⬅️ Home</a>
      <button onclick="history.back()" class="btn btn-outline-secondary">🔙 Indietro</button>
    </div>

    <h1 class="text-center">Eventi Passati</h1>

   
    <form method="post" class="btn-top d-flex justify-content-center gap-2 mb-3">
      <input type="submit" name="Classifica" value="Classifica" class="btn btn-primary" />
      <input type="submit" name="Marcatori" value="Marcatori" class="btn btn-success" />
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
              echo "<h2 class='text-center mb-3'>$scelta - Classifica per Girone</h2>";

              foreach ($gironi as $girone) {
                echo "<h4 class='mt-4'>Girone: <strong>$girone</strong></h4>";
                echo "<div class='table-responsive mb-4'>";
                echo "<table class='table table-bordered table-hover text-center'>";
                echo "<thead class='table-dark'><tr>
                        <th>Squadra</th><th>PT</th><th>G</th><th>V</th><th>N</th><th>P</th><th>DR</th>
                      </tr></thead><tbody>";

                $stmt = $conn->prepare("SELECT Nome AS squadra, PT, G, V, N, P, DR
                                         FROM squadre 
                                         WHERE Cod_campionato = ? AND Girone = ?
                                         ORDER BY PT DESC, DR DESC");
                $stmt->bind_param("is", $idCampionato, $girone);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['squadra']}</td>
                          <td>{$row['PT']}</td>
                          <td>{$row['G']}</td>
                          <td>{$row['V']}</td>
                          <td>{$row['N']}</td>
                          <td>{$row['P']}</td>
                          <td>{$row['DR']}</td>
                        </tr>";
                }

                echo "</tbody></table></div>";
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

      if (isset($_POST['Marcatori'])) {
        ?>
        <form method="post" class="card p-3 shadow-sm mb-4">
          <input type="hidden" name="Marcatori" value="1">
          <div class="mb-3">
            <label for="scelta" class="form-label">Campionato:</label>
            <select name="scelta" id="scelta" class="form-select" required>
              <option value="">Seleziona</option>
              <option value="sangiorgileague">San Giorgio League 2025</option>
            </select>
          </div>
          <button type="submit" class="btn btn-outline-success w-100">Mostra Marcatori</button>
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

            $query = "SELECT giocatori.Nome, giocatori.Cognome, squadre.Nome AS squadra, SUM(cont_goal.Goal) AS totale_goal
                      FROM giocatori
                      JOIN squadre ON giocatori.Cod_squadre = squadre.ID_squadre
                      JOIN cont_goal ON giocatori.ID_giocatori = cont_goal.Cod_giocatori
                      WHERE squadre.Cod_campionato = ?
                      GROUP BY giocatori.ID_giocatori, giocatori.Nome, giocatori.Cognome, squadre.Nome
                      ORDER BY totale_goal DESC";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $idCampionato);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
              echo "<h2 class='text-center mb-3'>Classifica Marcatori - $scelta</h2>";
              echo '<div class="table-responsive">';
              echo '<table class="table table-bordered table-hover text-center">';
              echo '<thead class="table-dark"><tr><th>Giocatore</th><th>Squadra</th><th>Gol</th></tr></thead><tbody>';

              while ($row = $result->fetch_assoc()) {
                $nomeCompleto = $row['Nome'] . ' ' . $row['Cognome'];
                echo "<tr><td>$nomeCompleto</td><td>{$row['squadra']}</td><td>{$row['totale_goal']}</td></tr>";
              }

              echo '</tbody></table></div>';
            } else {
              echo '<div class="alert alert-warning">Nessun dato disponibile sui marcatori.</div>';
            }

            $stmt->close();
          } else {
            echo '<div class="alert alert-danger">Campionato non trovato.</div>';
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
