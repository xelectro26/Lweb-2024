<?php
session_start();
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT id, password FROM utenti WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggato'] = true;
            $_SESSION['username'] = $username; // Salva il nome utente in sessione
            $_SESSION['id_utente'] = $id; // Nel caso salvo anche l-id

            header("Location: ../../Homepage.php"); // Reindirizza alla homepage
            exit();
        } else {
            $_SESSION['errore'] = "Password errata!";
        }
    } else {
        $_SESSION['errore'] = "Utente non trovato!";
    }
    header("Location: ../../login.php");
    exit();
}
?>
