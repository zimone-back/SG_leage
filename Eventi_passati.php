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

        <div class="alert alert-info text-center">
            In questa sezione puoi consultare le classifiche finali dei campionati già conclusi. 
            Seleziona il campionato e il girone per visualizzare la classifica completa.
        </div>

        <form action="" method="post" class="card p-3 shadow-sm mb-4">
            <div class="mb-3">
                <label for="scelta" class="form-label">Campionato:</label>
                <select name="scelta" id="scelta" class="form-select" required>
                    <option value="">Seleziona</option>
                    <option value="sangiorgileague">San Giorgio League 2025</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="girone" class="form-label">Girone:</label>
                <select name="girone" id="girone" class="form-select" required>
                    <option value="">Seleziona</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Mostra Classifica</button>
        </form>

        <?php
        include 'connessione.php';

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($_POST['scelta']) && !empty($_POST['girone'])) {
                $girone = $conn->real_escape_string($_POST['girone']);
                $scelta = $conn->real_escape_string($_POST['scelta']);

                $stmt = $conn->prepare("SELECT ID_campionato FROM campionati WHERE Nome = ? LIMIT 1");
                $stmt->bind_param("s", $scelta);
                $stmt->execute();
                $resultCampionato = $stmt->get_result();
                $stmt->close();

                if ($resultCampionato->num_rows > 0) {
                    $rowCampionato = $resultCampionato->fetch_assoc();
                    $idCampionato = $rowCampionato['ID_campionato'];

                    $stmt = $conn->prepare("SELECT Nome AS squadra, PT, G, V, N, P, DR
                                            FROM squadre 
                                            WHERE Cod_campionato = ? AND Girone = ? 
                                            ORDER BY PT DESC, DR DESC");
                    $stmt->bind_param("is", $idCampionato, $girone);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<h2 class='text-center mb-3'>Classifica - Girone $girone</h2>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-hover text-center'>";
                        echo "<thead class='table-dark'>
                                <tr>
                                    <th>Squadra</th>
                                    <th>PT</th>
                                    <th>G</th>
                                    <th>V</th>
                                    <th>N</th>
                                    <th>P</th>
                                    <th>DR</th>
                                </tr>
                              </thead><tbody>";
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
                    } else {
                        echo "<div class='alert alert-warning'>Nessuna squadra trovata per il girone $girone.</div>";
                    }
                    $stmt->close();
                } else {
                    echo "<div class='alert alert-danger'>Seleziona un campionato valido.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Seleziona sia il campionato che il girone.</div>";
            }
            $conn->close();
        }
        ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
