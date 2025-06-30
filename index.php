<html>
    <head>
        <title>San Giorgio Leage</title>
        <body>
            <select name="" id="">
                <option value="">seleziona</option>
                <option value="Sangiorgioleage">San Giorgio Leage</option>
            </select>
        </body>
    </head>
</html>
<?php
include 'connessione.php';

$queryCampionato = "SELECT ID_campionato FROM Campionati WHERE Nome = 'Sangiorgioleage' LIMIT 1";
$resultCampionato = $conn->query($queryCampionato);

if ($resultCampionato->num_rows > 0) {
    $rowCampionato = $resultCampionato->fetch_assoc();
    $idCampionato = $rowCampionato['ID_campionato'];

    $queryClassifica = "SELECT Squadre.Nome AS nome_squadra,COUNT(Cont_goal.ID_cont_goal) AS totale_goal
                        FROM Squadre
                        LEFT JOIN Giocatori ON Giocatori.Cod_squadre = Squadre.ID_squadre
                        LEFT JOIN Cont_goal ON Cont_goal.Cod_giocatori = Giocatori.ID_giocatori
                        WHERE Squadre.Cod_campionato = $idCampionato
                        GROUP BY Squadre.ID_squadre
                        ORDER BY totale_goal DESC";

    $resultClassifica = $conn->query($queryClassifica);

    if ($resultClassifica && $resultClassifica->num_rows > 0) {
        echo "<h2>Classifica - sangiorgio League</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Squadra</th><th>Gol Segnati</th></tr>";

        while ($row = $resultClassifica->fetch_assoc()) {
            echo "<tr>"."<td>" . $row['nome_squadra'] . "</td>" . "<td>" . $row['totale_goal'] . "</td>" . "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nessuna squadra trovata nel campionato.</p>";
    }
} else {
    echo "<p>Campionato 'Sangiorgio League' non trovato.</p>";
}
$conn->close();
?>

