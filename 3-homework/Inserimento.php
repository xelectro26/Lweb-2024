<?php
session_start();

// Percorso del file XML
$file_xml = "res/XML/eventi.xml";

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
    <title>Scrivi una Recensione</title>
    <link rel="stylesheet" href="res/css/stile-inserimento.css"/>
    <script src="res/js/script.js" defer></script>
</head>
<body>
    <div class="header">
        <h1>Pagina dedicata alle recensioni utente</h1>
         <!-- Pulsante per aprire il menu -->
 <div class="menu-button" onclick="openMenu()">
     <img src="img\menu icona.png" alt="Menu">
</div>
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

    <!-- Form per l'inserimento della recensione -->
    <div class="recensione-container">
        <h2>Seleziona un evento e scrivi la tua recensione</h2>
        <form action="res/PHP/salva_recensioni.php" method="POST">
            <label for="evento">Evento:</label>
            <select name="evento" id="evento" required onchange="mostraImmagine()">
                <option value="" disabled selected>-- Seleziona un evento --</option>
                <?php
                foreach ($xml->event as $evento) {
                    echo '<option value="' . $evento->titolo . '" data-img="' . $evento->img . '">' . $evento->titolo . '</option>';
                }
                ?>
            </select>

            <!-- Mostra l'immagine dell'evento selezionato -->
            <div class="evento-img-container">
                <img id="evento-img" src="" alt="Immagine evento selezionato" style="display: none;" />
            </div>

            <label for="recensione">Scrivi la tua recensione:</label>
            <textarea name="recensione" id="recensione" required placeholder="Lascia qui la tua recensione..."></textarea>

            <button type="submit">Invia Recensione</button>
        </form>
    </div>

    <script>
        function mostraImmagine() {
            var select = document.getElementById("evento");
            var img = document.getElementById("evento-img");
            var selectedOption = select.options[select.selectedIndex];
            if (selectedOption.dataset.img) {
                img.src = selectedOption.dataset.img;
                img.style.display = "block";
            } else {
                img.style.display = "none";
            }
        }
    </script>
</body>
</html>
