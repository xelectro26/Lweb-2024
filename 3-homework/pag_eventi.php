<?php
session_start();

// Percorso del file XML
$file_xml = "../3-homework/res/XML/eventi.xml";

if (!file_exists($file_xml)) {
    die("<p>Errore: Il file XML degli eventi non esiste.</p>");
}

// Carica il file XML
$xml = simplexml_load_file($file_xml);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eventi Culturali di Roma</title>
    <link rel="stylesheet" href="res/css/stile-pag_eventi.css"/>
</head>

<body>
     <!-- Contenitore titolo e pulsante -->
<div class="header">
    <h1>Pagina degli Eventi della Città Eterna</h1>
    
    <!-- Pulsante per aprire il menu -->
    <div class="menu-button" onclick="openMenu()">
        <img src="img\menu icona.png" alt="Menu">
    </div>
</div>

    <!-- Menu laterale -->
    <div id="sideMenu" class="menu">
        <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
        <a href="Homepage.php">Cultura Romana</a>
        <a href="Colosseo.php">Il Colosseo</a>
        <a href="Libri.php">Libri Storici</a>
        <a href="pag_eventi.php">EVENTI: Roma</a>
        <a href="Recensioni.php">Recensioni Utenti</a>

        <?php if (isset($_SESSION['loggato']) && $_SESSION['loggato'] === true): ?>
            <div class="username-container" style="text-align: center; margin-top: 20px; padding: 10px; background-color: #f0f0f0; border-radius: 5px;">
                <strong><?php echo $_SESSION['username']; ?></strong>
            </div>
            <a href="Inserimento.php">Aggiungi Recensione</a>
            <a href="aggEventi.php">Aggiungi Eventi</a>
            <a href="res/PHP/log-out.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <p class="introduzione">
        Benvenuti nella sezione dedicata agli eventi culturali di Roma! Qui potete scoprire mostre, concerti, spettacoli teatrali e molte altre attività che rendono la città eterna una delle capitali della cultura mondiale.
    </p>

    <!-- SEZIONE EVENTI -->
    <?php
    if ($xml->count() > 0) {
        echo '<div id="eventi" class="sezione">';

        foreach ($xml->event as $evento) {
            echo '<div class="evento">';

            // Sezione immagine
            echo '<div class="immagine">';
            if (!empty($evento->img) && file_exists((string)$evento->img)) {
                echo '<img src="' . $evento->img . '" alt="' . $evento->titolo . '" width="400" />';
            } else {
                echo '<p><em>Nessuna immagine disponibile</em></p>';
            }
            echo '</div>';

            // Sezione informazioni evento
            echo '<div class="info-evento">';
            echo '<h2>' . $evento->titolo . '</h2>';

            // Converti la data dal formato XML a quello desiderato
            $data_originale = (string)$evento->data; // Prendi la data dal file XML
            $data_formattata = str_replace("T", " ", $data_originale); // Rimuovi la "T"
            $data_formattata = date("Y-m-d H:i", strtotime($data_formattata)); // Rimuovi i secondi
            echo '<p><strong>Data:</strong> ' . $data_formattata . '</p>';
        
            echo '<p><strong>Luogo:</strong> ' . $evento->luogo . '</p>';
            echo '<p><strong>Descrizione:</strong> ' . $evento->descrizione . '</p>';
            echo '<p><strong>Organizzatore:</strong> ' . $evento->organizzatore . '</p>';
            echo '</div>';

            echo '<hr />';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo "<p>Nessun evento trovato.</p>";
    }
    ?>

    <!-- Collegamento al file JavaScript -->
    <script src="res/js/script.js" defer></script>

</body>
</html>
