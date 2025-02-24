<?php
define("DB_HOST", "localhost");
define("DB_USER", "root"); // Cambia se usi un server diverso
define("DB_PASSWORD", ""); // Inserisci la password del tuo database
define("DB_NAME", "homework3");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Controlla la connessione
if ($conn->connect_error) {
    die("Errore di connessione al database: " . $conn->connect_error);
}
?>
