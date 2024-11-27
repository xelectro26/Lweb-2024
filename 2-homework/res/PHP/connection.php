<?php
require_once('datiConnessione.php');

// Crea la connessione
$conn = new mysqli($host, $user, $password, "cultura_lweb2");

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Imposta il charset per evitare problemi con i caratteri speciali
$conn->set_charset("utf8");
?>
