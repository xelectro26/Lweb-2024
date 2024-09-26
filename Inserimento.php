<?php
// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recupera i dati dal form
    $nome_utente = htmlspecialchars($_POST['nome_utente']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $paese = htmlspecialchars($_POST['paese']);
    
    // Verifica se la checkbox è stata accettata
    if (isset($_POST['termini'])) {
        $termini_accettati = "Sì";
    } else {
        $termini_accettati = "No";
    }

    // Mostra i dati raccolti
    echo "<h1>Registrazione Completata</h1>";
    echo "<p>Nome Utente: " . $nome_utente . "</p>";
    echo "<p>Email: " . $email . "</p>";
    echo "<p>Paese di Origine: " . $paese . "</p>";
    echo "<p>Termini accettati: " . $termini_accettati . "</p>";
    
    // Qui puoi inserire del codice per salvare questi dati in un database
    // Ad esempio, puoi usare MySQLi o PDO per interagire con un database MySQL

    // Connessione al database (esempio con MySQLi)
    
    $servername = "localhost";
    $username = "root";
    $password_db = "password";
    $dbname = "nome_database";
    
    // Crea la connessione
    $conn = new mysqli($servername, $username, $password_db, $dbname);
    
    // Controlla la connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Inserisce i dati nella tabella "utenti"
    $sql = "INSERT INTO utenti (nome_utente, email, password, paese, termini)
    VALUES ('$nome_utente', '$email', '$password', '$paese', '$termini_accettati')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrazione avvenuta con successo!";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }

    // Chiude la connessione
    $conn->close();
    
} else {
    // Se il form non è stato inviato, reindirizza alla pagina del form
    header("Location: index.html");
    exit();
}
?>
