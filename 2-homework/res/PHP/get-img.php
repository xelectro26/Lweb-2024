<?php
require("res/PHP/connection.php");
$connessione = new mysqli($host, $user, $password, $db);

// Controllo connessione
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $connessione->prepare("SELECT immagine FROM eventi WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($immagine);
    $stmt->fetch();
    
    // Controlla se l'immagine è stata trovata
    if ($stmt->num_rows > 0) {
        header("Content-Type: image/jpg"); // Cambia il tipo di contenuto se le tue immagini sono in un altro formato
        echo $immagine; // Mostra l'immagine
    } else {
        // Immagine non trovata
        http_response_code(404);
        echo "Immagine non trovata.";
    }
    exit();
}

// Chiudo la connessione
$connessione->close();
?>