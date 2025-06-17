<?php
session_start();
require('connection.php'); // Usa la connessione $conn già creata

// Raccogli i dati dal modulo e rimuovi spazi bianchi
$username = $conn->real_escape_string(trim($_POST['username']));
$email = $conn->real_escape_string(trim($_POST['email']));
$password = $conn->real_escape_string(trim($_POST['password']));
$password2 = $conn->real_escape_string(trim($_POST['password2']));
$termini = isset($_POST['termini']) ? 1 : 0;
$paese = $conn->real_escape_string(trim($_POST['paese']));

// Controlla se l'username esiste già
$controllo = "SELECT * FROM utenti WHERE username = '$username'";
$ris = mysqli_query($conn, $controllo);

if (mysqli_num_rows($ris) > 0) {
    $_SESSION['errore'] = 'true';
    header('Location: ../../Registrazione.php');
    exit(1);
}

// Controlla se l'email esiste già
$controllo_email = "SELECT * FROM utenti WHERE email = '$email'";
$ris_e = mysqli_query($conn, $controllo_email);

if (mysqli_num_rows($ris_e) > 0) {
    $_SESSION['errore_e'] = 'true';
    header('Location: ../../Registrazione.php');
    exit(1);
}

// Controllo delle password
if ($password !== $password2) {
    $_SESSION['errore_p'] = 'true';
    header('Location: ../../Registrazione.php');
    exit(1);
}

// Hash della password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Inserisci nel DB
$sql = "INSERT INTO utenti (username, email, password, paese) VALUES ('$username', '$email', '$hashed_password', '$paese')";
$ins = mysqli_query($conn, $sql);

if ($ins) {
    $utente_id = $conn->insert_id;
    $_SESSION['utente_id'] = $utente_id;
    $_SESSION['username'] = $username;
    $_SESSION['loggato'] = true;
    header('Location: ../../Homepage.php');
    exit();
} else {
    // Stampa errore MySQL se qualcosa va storto
    $_SESSION['errore_v'] = 'Errore durante la registrazione.';
    // Debug facoltativo:
    // die("Errore MySQL: " . mysqli_error($conn));
    header('Location: ../../Registrazione.php');
    exit(1);
}

$conn->close();
?>
