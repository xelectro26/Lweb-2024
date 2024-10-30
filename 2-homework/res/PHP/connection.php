<?php
$host = "localhost"; // Indirizzo del server MySQL
$user = "root";      // Nome utente di MySQL
$password = "";      // Password di MySQL
$db = "cultura_lweb2";

// Crea la connessione×
$conn = new mysqli($host, $user, $password, $db);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Imposta il charset per evitare problemi con i caratteri speciali
$conn->set_charset("utf8");
?>
