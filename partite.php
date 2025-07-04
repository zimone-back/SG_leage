<html>

<head>
    <title>San Giorgio League - Partite</title>
</head>

<body>
    <h1>Partite</h1>
    <nav>
        <a href="index.php">Home</a>&nbsp;&nbsp;&nbsp;
        <a href="Notizie.php">Notizie</a>&nbsp;&nbsp;&nbsp;
        <a href="Classifica.php">Classifica</a>&nbsp;&nbsp;&nbsp;
        <a href="Eventi_passati.php">Eventi passati</a>
    </nav>

    <form action="" method="post">
        <label for="scelta">Campionato:</label>
        <select name="scelta" id="scelta" required>
            <option value="">Seleziona</option>
            <option value="sangiorgileague" <?= (isset($scelta) && $scelta == 'sangiorgileague') ? 'selected' : '' ?>>San Giorgio League</option>
        </select>

        <label for="data_giornata">Data giornata:</label>
        <input type="date" name="data_giornata" id="data_giornata" value="<?= $data_ricerca ?>">

        <input type="submit" value="Cerca partite">
    </form>
    <?php
    include 'connessione.php';

    $data_oggi = date('Y-m-d');
    $data_ricerca = $data_oggi;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $scelta = $conn->real_escape_string($_POST['scelta'] ?? '');
        $data_input = $conn->real_escape_string($_POST['data_giornata'] ?? '');

        $data_ricerca = empty($data_input) ? $data_oggi : $data_input;
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($scelta)) {
        $stmt = $conn->prepare("SELECT campionati.ID_campionato 
                                       FROM campionati 
                                       WHERE campionati.Nome = ? 
                                       LIMIT 1");
        $stmt->bind_param("s", $scelta);
        $stmt->execute();
        $resultCampionato = $stmt->get_result();

        if ($resultCampionato->num_rows > 0) {
            $rowCampionato = $resultCampionato->fetch_assoc();
            $idCampionato = $rowCampionato['ID_campionato'];

            $stmt = $conn->prepare("SELECT * FROM giornate 
                                           WHERE Cod_campionato = ? AND ? BETWEEN Data_inizio AND Data_fine
                                           LIMIT 1");
            $stmt->bind_param("is", $idCampionato, $data_ricerca);
            $stmt->execute();
            $resultGiornata = $stmt->get_result();

            if ($resultGiornata->num_rows > 0) {
                $giornata = $resultGiornata->fetch_assoc();

                echo "<h2>Partite della giornata {$giornata['Numero']} - {$scelta}</h2>";
                echo "<p>Dal {$giornata['Data_inizio']} al {$giornata['Data_fine']}</p>";

                $stmt = $conn->prepare("SELECT partite.*, squadre.Nome AS squadra_casa, squadre_ospite.Nome AS squadra_ospite, squadre.Girone AS girone
                                               FROM partite
                                               JOIN squadre ON partite.Squadra_casa = squadre.ID_squadre
                                               JOIN squadre AS squadre_ospite ON partite.Squadra_ospite = squadre_ospite.ID_squadre
                                               WHERE partite.Cod_giornata = ?");
                $stmt->bind_param("i", $giornata['ID_giornata']);
                $stmt->execute();
                $resultPartite = $stmt->get_result();

                if ($resultPartite->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Girone</th><th>Data/Ora</th><th>Squadra Casa</th><th>Risultato</th><th>Squadra Ospite</th><th>Stato</th></tr>";

                    while ($partita = $resultPartite->fetch_assoc()) {
                        $risultato = ($partita['Stato'] == 'terminata')
                            ? "{$partita['Gol_casa']} - {$partita['Gol_ospite']}"
                            : "vs";

                        echo "<tr>
                                <td>{$partita['girone']}</td>
                                <td>{$partita['Data']}</td>
                                <td>{$partita['squadra_casa']}</td>
                                <td>$risultato</td>
                                <td>{$partita['squadra_ospite']}</td>
                                <td>{$partita['Stato']}</td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Nessuna partita trovata per questa giornata.</p>";
                }
            } else {
                echo "<p class='error'>Nessuna giornata trovata per la data selezionata.</p>";
            }
        } else {
            echo "<p class='error'>Campionato non trovato.</p>";
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
        echo "<p class='error'>Seleziona un campionato.</p>";
    }

    $conn->close();
    ?>
</body>

</html>