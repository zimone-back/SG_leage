<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>San Giorgio League</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-4">
        <h1 class="text-center mb-4">Eventi Passati</h1>
        <input type="button" onclick="location.href='index.php'" value="home" />
        <div class="alert alert-info text-center">
            In questa sezione puoi consultare le classifiche finali dei campionati già conclusi.
            Seleziona il campionato e il girone per visualizzare la classifica completa.
        </div>
        <form action="" method="post" class="text-center mb-4">
            <input type="submit" name="Classifica" value="Classifica" />
            <input type="submit" name="Marcatori" value="Marcatori" />
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['Classifica'])) {
                ?>
                <input type="button" onclick="location.href='Eventi_passati.php'" value="indietro" />
                <form action="" method="post" class="card p-3 shadow-sm mb-4">
                    <input type="hidden" name="Classifica" value="1">
                    <div class="mb-3">
                        <label for="scelta" class="form-label">Campionato:</label>
                        <select name="scelta" id="scelta" class="form-select" required>
                            <option value="">Seleziona</option>
                            <option value="sangiorgileague">San Giorgio League 2025</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Mostra Classifiche Complete</button>
                </form>
                <?php

                if (isset($_POST['scelta']) && !empty($_POST['scelta'])) {
                    include 'connessione.php';

                    $scelta = $conn->real_escape_string($_POST['scelta']);

                    $stmt = $conn->prepare("SELECT ID_campionato FROM campionati WHERE Nome = ? LIMIT 1");
                    $stmt->bind_param("s", $scelta);
                    $stmt->execute();
                    $resultCampionato = $stmt->get_result();

                    if ($resultCampionato->num_rows > 0) {
                        $rowCampionato = $resultCampionato->fetch_assoc();
                        $idCampionato = $rowCampionato['ID_campionato'];

                        $stmt = $conn->prepare("SELECT DISTINCT Girone FROM squadre WHERE Cod_campionato = ? ORDER BY Girone");
                        $stmt->bind_param("i", $idCampionato);
                        $stmt->execute();
                        $resultGironi = $stmt->get_result();
                        $gironi = [];
                        while ($row = $resultGironi->fetch_assoc()) {
                            $gironi[] = $row['Girone'];
                        }
                        $stmt->close();

                        if (!empty($gironi)) {
                            echo "<h2 class='text-center mb-3'>Classifica Completa - $scelta</h2>";
                            echo "<div class='table-responsive'>";
                            echo "<table class='table table-bordered table-hover text-center'>";
                            echo "<thead class='table-dark'>
                                <tr>
                                    <th>Girone</th>
                                    <th>Squadra</th>
                                    <th>PT</th>
                                    <th>G</th>
                                    <th>V</th>
                                    <th>N</th>
                                    <th>P</th>
                                    <th>DR</th>
                                </tr>
                            </thead><tbody>";

                            foreach ($gironi as $girone) {
                                $stmt = $conn->prepare("SELECT Nome AS squadra, PT, G, V, N, P, DR
                                               FROM squadre 
                                               WHERE Cod_campionato = ? AND Girone = ? 
                                               ORDER BY PT DESC, DR DESC");
                                $stmt->bind_param("is", $idCampionato, $girone);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                    <td>$girone</td>
                                    <td>{$row['squadra']}</td>
                                    <td>{$row['PT']}</td>
                                    <td>{$row['G']}</td>
                                    <td>{$row['V']}</td>
                                    <td>{$row['N']}</td>
                                    <td>{$row['P']}</td>
                                    <td>{$row['DR']}</td>
                                </tr>";
                                }
                                $stmt->close();
                            }
                            echo "</tbody></table></div>";
                        } else {
                            echo "<div class='alert alert-warning'>Nessun girone trovato per il campionato selezionato.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Campionato non trovato.</div>";
                    }
                    $conn->close();
                } else {
                    echo "<div class='alert alert-warning'>Seleziona un campionato valido.</div>";
                }
            }

            if (isset($_POST['Marcatori'])) {
                ?>
                <input type="button" onclick="location.href='Eventi_passati.php'" value="indietro" />
                <form action="" method="post" class="card p-3 shadow-sm mb-4">
                    <input type="hidden" name="Marcatori" value="1">
                    <div class="mb-3">
                        <label for="scelta" class="form-label">Campionato:</label>
                        <select name="scelta" id="scelta" class="form-select" required>
                            <option value="">Seleziona</option>
                            <option value="sangiorgileague">San Giorgio League 2025</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Mostra Marcatori</button>
                </form>
                <?php
                if (isset($_POST['scelta']) && !empty($_POST['scelta'])) {
                    include 'connessione.php';
                    $scelta = $conn->real_escape_string($_POST['scelta']);

                    $stmt = $conn->prepare("SELECT ID_campionato FROM campionati WHERE Nome = ? LIMIT 1");
                    $stmt->bind_param("s", $scelta);
                    $stmt->execute();
                    $resultCampionato = $stmt->get_result();

                    if ($resultCampionato->num_rows > 0) {
                        $rowCampionato = $resultCampionato->fetch_assoc();
                        $idCampionato = $rowCampionato['ID_campionato'];

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
                            echo '<div class="table-responsive">';
                            echo '<table class="table table-bordered table-hover text-center">';
                            echo '<thead class="table-dark"><tr><th>Giocatore</th><th>Squadra</th><th>Gol</th></tr></thead>';
                            echo '<tbody>';

                            while ($row = $result->fetch_assoc()) {
                                $nomeCompleto = trim($row['Nome'] . ' ' . $row['Cognome']);
                                echo '<tr>';
                                echo '<td>' . $nomeCompleto . '</td>';
                                echo '<td>' . $row['squadra'] . '</td>';
                                echo '<td>' . $row['totale_goal'] . '</td>';
                                echo '</tr>';
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