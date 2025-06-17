<?php
session_start();
require('connection.php'); // Usa $conn già definita

// Controlla se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Raccogli i dati dal modulo
    $username = $conn->real_escape_string($_POST['username']); 
    $password = $_POST['password'];

    // Controllo dell'username
    $controllo = "SELECT * FROM utenti WHERE username = '$username'";
    $ris = mysqli_query($conn, $controllo);

    if (mysqli_num_rows($ris) > 0) {
        $utente = mysqli_fetch_assoc($ris);
        
        // Verifica la password
        if (password_verify($password, $utente['password'])) {
            // Password corretta, avvia la sessione
            $_SESSION['loggato'] = true;
            $_SESSION['username'] = $utente['username'];
            $_SESSION['utente_id'] = $utente['id'];
            header('Location: ../../Homepage.php');
            exit();
        } else {
            // Password errata
            $_SESSION['errore'] = 'Password errata';
            header('Location: ../../login.php');
            exit();
        }
    } else {
        // Username non trovato
        $_SESSION['errore'] = 'Username non trovato';
        header('Location: ../../login.php');
        exit();
    }
}

$conn->close(); // Chiudi la connessione corretta
?>
