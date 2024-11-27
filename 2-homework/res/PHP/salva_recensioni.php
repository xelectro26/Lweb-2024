<?php
session_start();
require("connection.php");
$connessione = new mysqli($host, $user, $password, $db);

print_r($_SESSION); // Stampa tutte le variabili di sessione (usato per il debug)

// Controllo connessione
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

// Verifica se l'utente è loggato
if (isset($_SESSION['loggato']) && $_SESSION['loggato'] === true) {
    // Verifica la presenza di 'utente_id' nella sessione
    if (isset($_SESSION['utente_id'])) {
        // Recupera l'ID dell'evento e il commento dal form
        $evento_id = $_POST['evento'];
        $utente_id = $_SESSION['utente_id'];
        $commento = $_POST['recensione'];
        
        // Utilizzo di prepared statements per l'inserimento
        $stmt = $connessione->prepare("INSERT INTO recensioni (evento_id, utente_id, commento) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $evento_id, $utente_id, $commento);

        if ($stmt->execute()) {
            header("Location: ../../Recensioni.php");
        } else {
            echo "Errore nel salvataggio della recensione: " . $stmt->error;
        }

        // Chiude lo statement
        $stmt->close();
    } else {
        echo "Errore: ID utente non trovato nella sessione. Assicurati di essere loggato.";
    }
} else {
    echo "Devi essere loggato per inserire una recensione.";
}

// Chiudi la connessione
$connessione->close();
?>
