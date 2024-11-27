<?php
session_start();
require('connection.php');
//stabilisci connessione con db
$connessione = new mysqli($host, $user, $password, "cultura_lweb2");

// Controlla se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Raccogli i dati dal modulo
    $username = $connessione->real_escape_string($_POST['username']); 
    $password = $_POST['password'];

    // Controllo dell'username
    $controllo = "SELECT * FROM utenti WHERE username = '$username'";
    $ris = mysqli_query($connessione, $controllo);

    if (mysqli_num_rows($ris) > 0) {
        $utente = mysqli_fetch_assoc($ris);
        
        // Verifica la password
        if (password_verify($password, $utente['password'])) {
            // Password corretta, avvia la sessione
            $_SESSION['loggato'] = true; // Imposta la variabile di sessione per indicare che l'utente è loggato
            $_SESSION['username'] = $utente['username']; // Salva il nome utente nella sessione
            $_SESSION['utente_id'] = $utente['id']; // Salva l'ID utente nella sessione
            header('Location: ../../Homepage.php'); // Reindirizza alla homepage
            exit();
        } else {
            // Password errata
            $_SESSION['errore'] = 'Password errata';
            header('Location: ../../login.php'); // Torna alla pagina di login
            exit();
        }
    } else {
        // Username non trovato
        $_SESSION['errore'] = 'Username non trovato';
        header('Location: ../../login.php'); // Torna alla pagina di login
        exit();
    }
}

$connessione->close();
