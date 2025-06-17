<?php
require_once('./res/PHP/datiConnessione.php');

// Connessione al server
$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Crea il database
$conn->query("CREATE DATABASE IF NOT EXISTS cultura_lweb2") or die("Errore creazione DB: " . $conn->error);
$conn->select_db('cultura_lweb2');

// Tabella utenti
$conn->query("
    CREATE TABLE IF NOT EXISTS utenti (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        paese VARCHAR(50),
        termini TINYINT(1) DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
") or die("Errore tabella utenti: " . $conn->error);

// Tabella eventi
$conn->query("
    CREATE TABLE IF NOT EXISTS eventi (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titolo VARCHAR(100) NOT NULL,
        descrizione TEXT NOT NULL,
        data_evento DATETIME NOT NULL,
        luogo VARCHAR(100),
        creatore_id INT,
        immagine MEDIUMBLOB
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
") or die("Errore tabella eventi: " . $conn->error);

// Tabella recensioni
$conn->query("
    CREATE TABLE IF NOT EXISTS recensioni (
        id INT AUTO_INCREMENT PRIMARY KEY,
        evento_id INT,
        utente_id INT,
        commento TEXT,
        data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
") or die("Errore tabella recensioni: " . $conn->error);

// Carica immagini
$img = function($path) use ($conn) {
    return mysqli_real_escape_string($conn, file_get_contents($path));
};

// Inserisci eventi solo se non esistono
$check = $conn->query("SELECT COUNT(*) as count FROM eventi");
$row = $check->fetch_assoc();
if ((int)$row['count'] === 0) {
    $conn->query("
        INSERT INTO eventi (titolo, descrizione, data_evento, luogo, immagine) VALUES
        ('Mostra Archeologica: Le Meraviglie di Roma Antica', 'Una mostra che espone reperti unici...', '2024-11-28 16:30:00', 'Musei Capitolini', '{$img("img/MuseiCapitolini2.jpg")}'),
        ('Spettacolo Teatrale: Giulio Cesare', 'Un adattamento moderno...', '2024-11-26 18:45:00', 'Teatro di Roma', '{$img("img/teatro.jpg")}'),
        ('Concerto Sinfonico: Le Quattro Stagioni', 'Un\'emozionante esecuzione dal vivo...', '2024-11-26 15:50:08', 'Auditorium', '{$img("img/teatro.jpg")}'),
        ('Mostra di Arte Contemporanea: Visioni Urbane', 'Una collezione di opere d\'arte...', '2024-12-26 15:50:45', 'MAXXI', '{$img("img/museo2.jpg")}')
    ") or die("Errore inserimento eventi: " . $conn->error);
}

// Inserisci utenti solo se non esistono
$check = $conn->query("SELECT COUNT(*) as count FROM utenti");
$row = $check->fetch_assoc();
if ((int)$row['count'] === 0) {
    $conn->query("
        INSERT INTO utenti (username, email, password, paese, termini) VALUES
        ('kila', 'kila@kila', '$2y$10\$HBjyHLt36v0r05khLlx7Re7ZGU0FJPmHYu0mzvk9Rkp6Eg0zOrfTe', 'Italia', 1),
        ('denis', 'denis@denis', '$2y$10\$S33iGm/XaZ/Jp9IE/m1y7eHaprdNcZdjf7F42tvInXCY3fggYEmgy', 'Italia', 1),
        ('carmela', 'carmela@carmela.it', '$2y$10\$4bouOJKYraKZxQ2N/1.N1us8OY4uFjmJxcoFDbYT2DRWIk6NwBgb2', 'Italia', 1),
        ('gio', 'gio@gio.com', '$2y$10\$iIMKxMpLDo4eCO9AX.9qE.L1S86iCG7nmX64nS8UFVkIoqCcGVCY.', 'Italia', 1)
    ") or die("Errore inserimento utenti: " . $conn->error);
}

// Inserisci recensioni se vuote
$check = $conn->query("SELECT COUNT(*) as count FROM recensioni");
$row = $check->fetch_assoc();
if ((int)$row['count'] === 0) {
    $conn->query("
        INSERT INTO recensioni (evento_id, utente_id, commento) VALUES
        (1, 1, 'La Mostra Archeologica è un viaggio affascinante nel passato.'),
        (2, 2, 'Lo spettacolo teatrale è una performance straordinaria.'),
        (3, 3, 'Il concerto sinfonico è stata un\'esperienza magica!'),
        (4, 4, 'La mostra Visioni Urbane offre una riflessione profonda.')
    ") or die("Errore inserimento recensioni: " . $conn->error);
}

$conn->close();
header('Location: homepage.php');
exit;
?>
