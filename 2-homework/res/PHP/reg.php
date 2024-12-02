<?php
session_start();
require('connection.php'); 

// Crea una nuova connessione al database
$connessione = new mysqli($host, $user, $password, $db);

// Controlla la connessione
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

// Raccogli i dati dal modulo, rimuovi spazi bianchi e protegge da SQL Injection (non il nostro caso poiche siamo in locale)
$username = $connessione->real_escape_string(trim($_POST['username']));
$email = $connessione->real_escape_string(trim($_POST['email']));
$password = $connessione->real_escape_string(trim($_POST['password']));
$password2 = $connessione->real_escape_string(trim($_POST['password2']));
$termini = isset($_POST['termini']) ? 1 : 0; // Verifica se i termini sono accettati
$paese = $connessione->real_escape_string(trim($_POST['paese']));

// Controlla se l'username esiste già
$controllo = "SELECT * FROM utenti WHERE username = '$username'";
$ris = mysqli_query($connessione, $controllo);

if (mysqli_num_rows($ris) > 0) {
    $_SESSION['errore'] = 'true';
    header('Location: ../../Registrazione.php'); // Reindirizza alla pagina di registrazione
    exit(1);
}

// Controlla se l'email esiste già
$controllo_email = "SELECT * FROM utenti WHERE email = '$email'";
$ris_e = mysqli_query($connessione, $controllo_email);

if (mysqli_num_rows($ris_e) > 0) {
    $_SESSION['errore_e'] = 'true';
    header('Location: ../../Registrazione.php'); // Reindirizza alla pagina di registrazione
    exit(1);
}

// Controllo delle password
if ($password !== $password2) {
    $_SESSION['errore_p'] = 'true';
    header('Location: ../../Registrazione.php'); // Reindirizza alla pagina di registrazione
    exit(1);
}

// Hash della password per la sicurezza
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Inserisci i dati nel database
$sql = "INSERT INTO utenti (username, email, password, paese) VALUES ('$username', '$email', '$hashed_password', '$paese')";
$ins = mysqli_query($connessione, $sql);

if ($ins) {
    // Recupera l'ID dell'utente appena inserito
    $utente_id = $connessione->insert_id; 

    // Salva l'ID dell'utente, il nome utente e il suo stato di login nella sessione
    $_SESSION['utente_id'] = $utente_id; // Salva l'ID dell'utente nella sessione
    $_SESSION['username'] = $username; // Salva il nome utente nella sessione
    $_SESSION['loggato'] = true; // Imposta la variabile di sessione per indicare che l'utente è loggato
    header('Location: ../../Homepage.php'); 
    exit();
} else {
    $_SESSION['errore_v'] = 'Errore durante la registrazione.';
    header('Location: ../../Registrazione.php'); 
    exit(1);

}

// Chiusura della connessione
$connessione->close();
?>
