<?php
session_start();

// Controlla se l'utente è loggato
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    die("Errore: Devi essere loggato per inserire una recensione.");
}

// Controlla se i dati sono stati inviati correttamente
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["evento"], $_POST["recensione"])) {
    die("Errore: Dati mancanti.");
}

// Percorso del file XML
$file_xml = "../../res/XML/eventi.xml";

// Verifica l'esistenza del file XML
if (!file_exists($file_xml)) {
    die("Errore: Il file XML degli eventi non esiste.");
}

// Carica il file XML
$xml = simplexml_load_file($file_xml);

// Recupera i dati dal form
$titoloEvento = $_POST["evento"];
$recensioneTesto = trim($_POST["recensione"]);
$utente = $_SESSION["username"];
$dataRecensione = date("Y-m-d");

// Cerca l'evento corrispondente
$eventoTrovato = false;
foreach ($xml->event as $evento) {
    if ((string)$evento->titolo === $titoloEvento) {
        $eventoTrovato = true;
        if (!isset($evento->recensioni)) {
            $evento->addChild("recensioni");
        }
        $recensione = $evento->recensioni->addChild("recensione");
        $recensione->addChild("utente", htmlspecialchars($utente));
        $recensione->addChild("data", $dataRecensione);
        $recensione->addChild("pensiero", htmlspecialchars($recensioneTesto));
        break;
    }
}

if (!$eventoTrovato) {
    die("Errore: L'evento selezionato non è stato trovato.");
}

// Salva il file XML aggiornato
$xml->asXML($file_xml);

// Reindirizza alla pagina delle recensioni
header("Location: ../../Recensioni.php");
exit();
?>
