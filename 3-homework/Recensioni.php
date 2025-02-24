<?php
session_start();

// Percorso del file XML
$file_xml = "res/XML/eventi.xml";

if (!file_exists($file_xml)) {
    die("<p>Errore: Il file XML delle recensioni non esiste.</p>");
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
    <title>Recensioni Utenti</title>
    <link rel="stylesheet" href="res/css/stile-recensioni.css"/>
</head>

<body>
  <!-- Contenitore titolo e pulsante -->
<div class="header">
    <h1>Pagina delle recensioni utenti</h1>
    
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

    <!-- SEZIONE RECENSIONI -->
    <div id="recensioni" class="sezione">
        <?php
        $recensioni_trovate = false;
        foreach ($xml->event as $evento) {
            if (!empty($evento->recensioni->recensione)) {
                foreach ($evento->recensioni->recensione as $recensione) {
                    $recensioni_trovate = true;
                    echo '<div class="recensione-blocco">';
                    echo '<div class="immagine">';
                    if (!empty($evento->img) && file_exists((string)$evento->img)) {
                        echo '<img src="' . $evento->img . '" alt="' . $evento->titolo . '" />';
                    } else {
                        echo '<p><em>Nessuna immagine disponibile</em></p>';
                    }
                    echo '</div>';
                    echo '<div class="info-recensione">';
                    echo '<h2>' . $evento->titolo . '</h2>';
                    echo '<p><strong>Recensito da:</strong> ' . $recensione->utente . '</p>';
                    echo '<p><strong>Data:</strong> ' . $recensione->data . '</p>';
                    echo '<p class="recensione-testo"><strong>Recensione:</strong> ' . $recensione->pensiero . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
        if (!$recensioni_trovate) {
            echo "<p>Nessuna recensione disponibile.</p>";
        }
        ?>
    </div>
    <script src="res/js/script.js" defer></script>
</body>
</html>
