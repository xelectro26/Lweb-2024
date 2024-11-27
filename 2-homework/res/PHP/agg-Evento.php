<?php
session_start();
require 'connection.php'; // Connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $luogo = $_POST['luogo'];
    $data = $_POST['data'];
    $ora = $_POST['ora']; // Recupera l'ora dal form
    $descrizione = $_POST['descrizione'];
    $immagineData = null;

    // Combina data e ora
    $dataOra = $data . ' ' . $ora;

    // Caricamento immagine
    if (isset($_FILES['immagine']['tmp_name']) && $_FILES['immagine']['tmp_name']) {
        $immagineData = file_get_contents($_FILES['immagine']['tmp_name']);
    }

    // Query preparata per inserire l'evento
    $sql = "INSERT INTO eventi (titolo, luogo, data_evento, descrizione, immagine) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $titolo, $luogo, $dataOra, $descrizione, $immagineData); // Usa $dataOra

    if ($stmt->execute()) {
        header("Location: ../../pag_eventi.php");
        exit();
    } else {
        echo "Errore nell'inserimento: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Richiesta non valida.";
}
?>
