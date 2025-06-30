<html>
<head>
    <title>San Giorgio League</title>
</head>
<body>
    <form action="" method="post">
        <select name="scelta" id="">
            <option value="">seleziona</option>
            <option value="sangiorgileague">San Giorgio Leage</option>
        </select>
        <select name="girone" id="">
            <option value="">seleziona</option>
            <option value="A">A</option>
            <option value="B">B</option>
        </select>
        <input type="submit" value="invia">
    </form>
</body>
</html>
<?php
include 'connessione.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['scelta']) && isset($_POST['girone']) && !empty($_POST['scelta']) && !empty($_POST['girone'])) {
        $girone = $_POST['girone'];
        $scelta = $_POST['scelta'];

        $stmt = $conn->prepare("SELECT ID_campionato FROM campionati WHERE Nome = ? LIMIT 1");
        $stmt->bind_param("s", $scelta);
        $stmt->execute();
        $resultCampionato = $stmt->get_result();

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
                echo "<h2>Classifica - Girone $girone</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Squadra</th><th>PT</th><th>G</th><th>V</th><th>N</th><th>P</th><th>DR</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>" . "<td>".$row['squadra']."</td>" . "<td>".$row['PT']."</td>" . "<td>".$row['G']."</td>" . "<td>".$row['V']."</td>" . "<td>".$row['N']."</td>" . "<td>".$row['P']."</td>" . "<td>".$row['DR']."</td>" . "</tr>";
                }
                echo "</table><br>";
            } else {
                echo "<p>Nessuna squadra trovata per il girone $girone.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Seleziona un campionato valido.</p>";
        }
        $conn->close();
    } else {
        echo "<p>Seleziona sia il campionato che il girone.</p>";
    }
}
?>