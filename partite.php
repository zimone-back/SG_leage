<!DOCTYPE html>
<html>
<head>
    <title>Partite - San Giorgio League</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Calendario Partite</h1>
    
    <a href="index.php">Torna alla Home</a>
    
    <?php
    include 'connessione.php';
    
    $query_campionato = "SELECT campionati.ID_campionato, campionati.Nome 
                         FROM campionati 
                         WHERE campionati.ID_campionato = 1 
                         LIMIT 1";
    $result_campionato = $conn->query($query_campionato);
    
    if ($result_campionato->num_rows > 0) {
        $campionato = $result_campionato->fetch_assoc();
        echo "<h2>".$campionato['Nome']."</h2>";
        
        $query_giornate = "SELECT giornate.ID_giornata, giornate.Numero, giornate.Data_inizio, giornate.Data_fine 
                           FROM giornate 
                           WHERE giornate.Cod_campionato = ".$campionato['ID_campionato']." 
                           ORDER BY giornate.Numero";
        $result_giornate = $conn->query($query_giornate);
        
        if ($result_giornate->num_rows > 0) {
            while($giornata = $result_giornate->fetch_assoc()) {
                echo "<h3>Giornata ".$giornata['Numero']."</h3>";
                
                $query_partite = "SELECT partite.ID_partita, partite.Data, partite.Stato, partite.Gol_casa, partite.Gol_ospite,squadre_casa.Nome AS squadra_casa, squadre_ospite.Nome AS squadra_ospite
                                  FROM partite
                                  JOIN squadre AS squadre_casa ON partite.Squadra_casa = squadre_casa.ID_squadre
                                  JOIN squadre AS squadre_ospite ON partite.Squadra_ospite = squadre_ospite.ID_squadre
                                  WHERE partite.Cod_giornata = ".$giornata['ID_giornata']."
                                  ORDER BY partite.Data";
                $result_partite = $conn->query($query_partite);
                
                if ($result_partite->num_rows > 0) {
                    echo "<table border='1'>";
                    while($partita = $result_partite->fetch_assoc()) {
                        echo "<tr>";
                        
                        switch($partita['Stato']) {
                            case 'terminata':
                                echo "<td>Finale</td>";
                                echo "<td>".$partita['squadra_casa']."</td>";
                                echo "<td>".$partita['Gol_casa']."</td>";
                                echo "</tr><tr>";
                                echo "<td></td>";
                                echo "<td>".$partita['squadra_ospite']."</td>";
                                echo "<td>".$partita['Gol_ospite']."</td>";
                                break;
                            case 'rinviata':
                                echo "<td>Rinviata</td>";
                                echo "<td>".$partita['squadra_casa']."</td>";
                                echo "<td>-</td>";
                                echo "</tr><tr>";
                                echo "<td></td>";
                                echo "<td>".$partita['squadra_ospite']."</td>";
                                echo "<td>-</td>";
                                break;
                            case 'in corso':
                                echo "<td>In corso</td>";
                                echo "<td>".$partita['squadra_casa']."</td>";
                                echo "<td>-</td>";
                                echo "</tr><tr>";
                                echo "<td></td>";
                                echo "<td>".$partita['squadra_ospite']."</td>";
                                echo "<td>-</td>";
                                break;
                            default: 
                                echo "<td>".date('H:i', strtotime($partita['Data']))."</td>";
                                echo "<td>".$partita['squadra_casa']."</td>";
                                echo "<td>-</td>";
                                echo "</tr><tr>";
                                echo "<td></td>";
                                echo "<td>".$partita['squadra_ospite']."</td>";
                                echo "<td>-</td>";
                        }
                        
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Nessuna partita programmata per questa giornata.</p>";
                }
            }
        } else {
            echo "<p>Nessuna giornata trovata per questo campionato.</p>";
        }
    } else {
        echo "<p>Nessun campionato attivo trovato.</p>";
    }
    
    $conn->close();
    ?>
</body>
</html>