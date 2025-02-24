<?php
session_start();
require_once("connection.php"); // Connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["nome_utente"]); // Corretto rispetto al form
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    // Controlla se le password corrispondono
    if ($password !== $password2) {
        $_SESSION['errore_p'] = "true";
        header("Location: ../../Registrazione.php");
        exit();
    }

    // Hash della password
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Controlla se username o email esistono già
    $stmt = $conn->prepare("SELECT id FROM utenti WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['errore'] = "true"; // Errore: utente già esistente
        header("Location: ../../Registrazione.php");
        exit();
    }
    
    // Inserisci il nuovo utente
    $stmt = $conn->prepare("INSERT INTO utenti (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hashed);

    if ($stmt->execute()) {
        $_SESSION['successo'] = "Registrazione completata! Effettua il login.";
        header("Location: ../../login.php");
        exit();
    } else {
        $_SESSION['errore'] = "Errore durante la registrazione.";
        header("Location: ../../Registrazione.php");
        exit();
    }
}
?>
