<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sangiorgioleague";
        
    $conn = new mysqli($host, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }
?>