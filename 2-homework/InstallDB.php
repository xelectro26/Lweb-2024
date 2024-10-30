<?php

require_once('res/PHP/connection.php');

// Crea la connessione col server
$conn = new mysqli($host, $user, $password);

// Controllo sulla connessione
if($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Crea il database se non esiste già
$sql = "CREATE DATABASE IF NOT EXISTS `cultura_lweb2`";
if ($conn->query($sql) === FALSE) {
    die("Errore nella creazione del database: " . $conn->error);
}

// Seleziona il database
$conn->select_db('cultura_lweb2');

// Crea la tabella `eventi`
$tab_eventi = "CREATE TABLE IF NOT EXISTS `eventi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(100) NOT NULL,
  `descrizione` text NOT NULL,
  `data_evento` datetime NOT NULL,
  `luogo` varchar(100) DEFAULT NULL,
  `creatore_id` int(11) DEFAULT NULL,
  `immagine` mediumblob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creatore_id` (`creatore_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if ($conn->query($tab_eventi) === FALSE) {
    die("Errore nella creazione della tabella eventi: " . $conn->error);
}

// Crea la tabella `recensioni`
$tab_recensioni = "CREATE TABLE IF NOT EXISTS `recensioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento_id` int(11) DEFAULT NULL,
  `utente_id` int(11) DEFAULT NULL,
  `commento` text DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `evento_id` (`evento_id`),
  KEY `utente_id` (`utente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if ($conn->query($tab_recensioni) === FALSE) {
    die("Errore nella creazione della tabella recensioni: " . $conn->error);
}

// Crea la tabella `utenti`
$tab_utenti = "CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `paese` varchar(50) DEFAULT NULL,
  `termini` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if ($conn->query($tab_utenti) === FALSE) {
    die("Errore nella creazione della tabella utenti: " . $conn->error);
}

// Percorsi delle immagini
$immagine1 = file_get_contents('img/MuseiCapitolini2.jpg'); 
$immagine2 = file_get_contents('img/teatro.jpg'); 
$immagine3 = file_get_contents('img/teatro.jpg'); 
$immagine4 = file_get_contents('img/museo2.jpg'); 

// Inserisci i dati nella tabella `eventi` con le immagini
$ins_eventi = "INSERT INTO `eventi` (`id`, `titolo`, `descrizione`, `data_evento`, `luogo`, `creatore_id`, `immagine`) VALUES
(1, 'Mostra Archeologica: Le Meraviglie di Roma Antica', 'Una mostra che espone reperti unici dell\'antica Roma, con una collezione di statue, mosaici e artefatti mai visti prima.', '2024-11-28 16:30:00', 'Musei Capitolini', NULL, '" . mysqli_real_escape_string($conn, $immagine1) . "'),
(2, 'Spettacolo Teatrale: Giulio Cesare', 'Un adattamento moderno del dramma shakespeariano, ambientato nella Roma contemporanea.', '2024-11-26 18:45:00', 'Teatro di Roma', NULL, '" . mysqli_real_escape_string($conn, $immagine2) . "'),
(3, 'Concerto Sinfonico: Le Quattro Stagioni di Vivaldi', 'Un\'emozionante esecuzione dal vivo della famosa opera di Vivaldi, diretta dal Maestro Riccardo Muti.', '2024-11-26 15:50:08', 'Auditorium Parco della Musica', NULL, '" . mysqli_real_escape_string($conn, $immagine3) . "'),
(4, 'Mostra di Arte Contemporanea: Visioni Urbane', 'Una collezione di opere d\'arte contemporanea che riflettono sulla vita urbana e sulle sue dinamiche.', '2024-12-26 15:50:45', 'MAXXI - Museo nazionale delle arti del XXI', NULL, '" . mysqli_real_escape_string($conn, $immagine4) . "')";

if ($conn->query($ins_eventi) === FALSE) {
    die("Errore nell'inserimento degli eventi: " . $conn->error);
}

// Inserisci i dati nella tabella `recensioni`
$ins_recensioni = "INSERT INTO `recensioni` (`id`, `evento_id`, `utente_id`, `commento`, `data`) VALUES
(14, 1, 24, 'La Mostra Archeologica è un viaggio affascinante nel passato. Ogni pezzo esposto racconta una storia unica, e la cura dei dettagli nella presentazione rende l\'esperienza ancora più coinvolgente. Assolutamente da non perdere per gli amanti della storia!', '2024-10-30 15:56:20'),
(15, 2, 25, 'Lo spettacolo teatrale è una performance straordinaria che combina talento, passione e una scenografia mozzafiato. Gli attori riescono a trasmettere emozioni intense e il pubblico è completamente rapito dalla trama avvincente. Un\'esperienza indimenticabile!', '2024-10-30 15:56:38'),
(16, 3, 23, 'Il concerto sinfonico è stata un\'esperienza magica! La musica dal vivo ha riempito la sala di emozioni e armonie avvolgenti. L\'orchestra ha suonato con maestria, portandoci in un viaggio sonoro che ha lasciato tutti senza parole. Un evento che celebra la bellezza della musica!', '2024-10-30 15:56:52'),
(17, 4, 26, 'La mostra \'Visioni Urbane\' di arte contemporanea offre una riflessione profonda sulla vita nelle città moderne. Le opere esposte, ricche di colore e innovazione, invitano a esplorare la relazione tra l\'uomo e l\'ambiente urbano. Un\'esperienza stimolante per chiunque sia appassionato di arte!', '2024-10-30 15:57:04')";

if ($conn->query($ins_recensioni) === FALSE) {
    die("Errore nell'inserimento delle recensioni: " . $conn->error);
}

// Inserisci i dati nella tabella `utenti`
$ins_utenti = "INSERT INTO `utenti` (`id`, `username`, `email`, `password`, `paese`, `termini`) VALUES
(23, 'kila', 'kila@kila', '$2y$10$HBjyHLt36v0r05khLlx7Re7ZGU0FJPmHYu0mzvk9Rkp6Eg0zOrfTe', 'Italia', 0),
(24, 'denis', 'denis@denis', '$2y$10$S33iGm/XaZ/Jp9IE/m1y7eHaprdNcZdjf7F42tvInXCY3fggYEmgy', 'Italia', 0),
(25, 'carmela', 'carmela@carmela.it', '$2y$10$4bouOJKYraKZxQ2N/1.N1us8OY4uFjmJxcoFDbYT2DRWIk6NwBgb2', 'Italia', 0),
(26, 'gio', 'gio@gio.com', '$2y$10$iIMKxMpLDo4eCO9AX.9qE.L1S86iCG7nmX64nS8UFVkIoqCcGVCY.', 'Italia', 0)";

if ($conn->query($ins_utenti) === FALSE) {
    die("Errore nell'inserimento degli utenti: " . $conn->error);
}

// Chiude la connessione al database
$conn->close();

// Reindirizza alla homepage o a una pagina di successo
header('Location: homepage.php');
exit;

?>
