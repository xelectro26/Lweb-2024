<?php
// Impostazioni database
define("DB_HOST", "localhost");
define("DB_USER", "root"); 
define("DB_PASSWORD", ""); 
define("DB_NAME", "homework3");

// Connessione al server MySQL (senza selezionare il database)
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);

// Controllo della connessione
if ($conn->connect_error) {
    die("Errore di connessione al server MySQL: " . $conn->connect_error);
}

// Creazione del database se non esiste
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if ($conn->query($sql) === TRUE) {
    echo "Database creato con successo o già esistente.<br>";
} else {
    die("Errore nella creazione del database: " . $conn->error);
}

// Seleziona il database
$conn->select_db(DB_NAME);

// Creazione della tabella utenti
$sql = "CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

if ($conn->query($sql) === TRUE) {
    echo "Tabella 'utenti' creata con successo o già esistente.<br>";
} else {
    die("Errore nella creazione della tabella: " . $conn->error);
}

// Inserimento dati di default solo se la tabella è vuota
$sql_check = "SELECT COUNT(*) as count FROM utenti";
$result = $conn->query($sql_check);
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    $sql_insert = "INSERT INTO `utenti` (`username`, `email`, `password`) VALUES
    ('denis', 'denis@denis', '\$2y\$10\$McSu3AcNzNJ/HW0J2w.dCOBZzeRLc625rbQ6i2AkjL/w03.i4OVv2'),
    ('kila', 'kila@kila', '\$2y\$10\$VANUM/tpO4NTkHu4fyqTKeuiDdRgKni7Z7DsPOb774fQR7RoZ3MeW'),
    ('den', 'den@den', '\$2y\$10\$PU/uK9sl3bOScjUanPqTyuwGMbEIwn6UqMc9UhfrkHXpZ1zdpnt6y');";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Dati predefiniti inseriti con successo.<br>";
    } else {
        echo "Errore nell'inserimento dei dati: " . $conn->error;
    }
} else {
    echo "Dati già presenti nella tabella utenti.<br>";
}

// Chiudi la connessione
$conn->close();
?>
