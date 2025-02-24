<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $titolo = $_POST['titolo'];
    $luogo = $_POST['luogo'];
    $data = $_POST['data'];
    $ora = $_POST['ora'];  // Recupera l'ora dal form
    $descrizione = $_POST['descrizione'];
    $organizzatore = isset($_SESSION['username']) ? $_SESSION['username'] : "Anonimo";

    // Combina data e ora in formato ISO (xsd:dateTime)
    $dataOra = $data . "T" . $ora . ":00";

    // Percorso del file XML
    $file_xml = "../../res/XML/eventi.xml";

    if (!file_exists($file_xml)) {
        die("Errore: Il file XML degli eventi non esiste.");
    }

    // Carica il file XML
    $xml = simplexml_load_file($file_xml);

    // Creazione del nuovo evento
    $nuovoEvento = $xml->addChild("event");
    $nuovoEvento->addChild("titolo", htmlspecialchars($titolo));
    $nuovoEvento->addChild("data", $dataOra);
    $nuovoEvento->addChild("luogo", htmlspecialchars($luogo));
    $nuovoEvento->addChild("descrizione", htmlspecialchars($descrizione));
    $nuovoEvento->addChild("organizzatore", htmlspecialchars($organizzatore));

    // Gestione immagine
    if (isset($_FILES['immagine']) && $_FILES['immagine']['tmp_name']) {
        $cartellaImmagini = "../../img/img_eventi/";
        if (!file_exists($cartellaImmagini)) {
            mkdir($cartellaImmagini, 0777, true);
        }
        $nome_file = time() . "_" . basename($_FILES['immagine']['name']);
        $percorsoCompleto = $cartellaImmagini . $nome_file;
        if (move_uploaded_file($_FILES['immagine']['tmp_name'], $percorsoCompleto)) {
            $nuovoEvento->addChild("img", "img/img_eventi/" . $nome_file);
        } else {
            $nuovoEvento->addChild("img", "");
        }
    } else {
        $nuovoEvento->addChild("img", "");
    }

    // Salva il file XML aggiornato
    $xml->asXML($file_xml);

    // Reindirizza alla pagina eventi
    header("Location: ../../pag_eventi.php");
    exit();
} else {
    echo "Errore: Richiesta non valida.";
}
?>
