<?php
session_start();
require("res/PHP/connection.php");
$connessione = new mysqli($host, $user, $password, "cultura_lweb2");

// Controllo connessione
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

// Recupera gli eventi dal database
$sql = "SELECT id, titolo, immagine FROM eventi"; // Assicurati che 'eventi' sia il nome corretto della tua tabella
$result = $connessione->query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<!-- HEAD -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recensione Eventi Culturali</title>
    <link rel="stylesheet" href="res/css/stile-inserimento.css"/>
</head>

<!-- BODY -->
<body>

<!-- HEADER: contiene il titolo della pagina -->
<div class="header">
    <h1>Recensione Eventi Culturali a Roma</h1>
    <div class="separator"></div>
</div>

<!-- Pulsante per aprire il menu -->
<div class="menu-button" onclick="openMenu()">
    <img src="img/menu icona.png" alt="Menu">
</div>

<!-- Menu laterale -->
<div id="sideMenu" class="menu">
    <!-- Pulsante per chiudere il menu laterale -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
    <a href="Homepage.php">Cultura Romana</a>
    <a href="Colosseo.php">Il Colosseo</a>
    <a href="Libri.php">Libri Storici</a>
    <a href="pag_eventi.php">EVENTI: Roma</a>
    <a href="Recensioni.php">Recensioni Utenti</a>

    <?php if (isset($_SESSION['loggato']) && $_SESSION['loggato'] === true): ?>
        <!-- Mostra l'area utente e le opzioni solo se l'utente è loggato -->
        <div class="username-container" style="text-align: center; margin-top: 20px; padding: 10px; background-color: #f0f0f0; border-radius: 5px;">
            <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
        </div>
        <a href="Inserimento.php">Aggiungi Recensione</a>
        <a href="aggEventi.php">Aggiungi Eventi</a>
        <a href="res/PHP/log-out.php">Logout</a>
    <?php else: ?>
        <!-- Mostra solo il link di Login se l'utente non è loggato -->
        <a href="login.php">Login</a>
    <?php endif; ?>
</div>

<!-- Introduzione alla pagina di recensioni -->
<p>
    Seleziona un evento cliccando sulla sua immagine e scrivi la tua recensione! I tuoi feedback ci aiutano a migliorare la qualità dei nostri eventi.
</p>

<!-- Sezione per le immagini degli eventi -->
<div class="event-images">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Codifica l'immagine in base64 per visualizzarla
            $img_bin = base64_encode($row['immagine']);
            echo '<div class="event-container" onclick="selectEvent(this)">
                    <img src="data:image/jpeg;base64,' . $img_bin . '" alt="' . htmlspecialchars($row['titolo']) . '" data-id="' . $row['id'] . '" />
                    <h3>' . htmlspecialchars($row['titolo']) . '</h3>
                  </div>';
        }
    } else {
        echo '<p>Nessun evento disponibile</p>';
    }
    ?>
</div>

<!-- Modulo di recensione -->
<div class="recensione-container" id="recensione-form" style="display: none;">
    <div class="recensione-title">Scrivi recensione</div>
    <form action="res/PHP/salva_recensioni.php" method="post">
        <input type="hidden" name="evento" id="selected-event" value="" />
        <textarea name="recensione" id="recensione" class="recensione-textbox" rows="4" required placeholder="Lascia qui la tua recensione..."></textarea>
        <input type="submit" value="Invia Recensione" class="recensione-button">
    </form>
</div>

<!-- Collegamento al file JavaScript -->
<script src="res/js/script.js" defer></script>
<script>
    function selectEvent(container) {
        // Deseleziona tutte le immagini
        const containers = document.querySelectorAll('.event-container');
        containers.forEach(item => {
            const img = item.querySelector('img');
            img.classList.remove('selected');
        });

        // Seleziona l'immagine cliccata
        const img = container.querySelector('img');
        img.classList.add('selected');

        // Mostra il modulo di recensione
        document.getElementById('selected-event').value = img.getAttribute('data-id'); // Imposta l'ID dell'evento selezionato
        document.getElementById('recensione-form').style.display = 'block';
    }
</script>

<!--- Creazione di un'area dedicata e posizionata sopra i capitelli con breve descrizione tramite tooltip --->

<div class="image-line">
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 19px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Ionico:</strong> caratterizzato da due grandi volute, elegante e simmetrico</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Corinzio:</strong> decorato in modo elaborato con foglie di acanto</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip" style="top: -120px; margin-left: 25px;"><strong>Capitello Dorico Modificato:</strong> più semplice con elementi decorativi a piccoli dentelli</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 26px;"></div>
        <span class="tooltip" style="top: -170px; margin-left: 25px;"><strong>Capitello Corinzio Variato:</strong> è una variazione dello stile corinzio, con elementi floreali e foglie di acanto.</span>
    </div>
    <div class="capitello"> 
        <div class="area" style="margin-top: 35px; margin-left: 18px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Composito:</strong> è una fusione degli stili ionico e corinzio</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 37px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Ionico:</strong> caratterizzato da due grandi volute, elegante e simmetrico</span>
    </div> 
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Corinzio:</strong> decorato in modo elaborato con foglie di acanto</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Dorico Modificato:</strong> più semplice con elementi decorativi a piccoli dentelli</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 26px;"></div>
        <span class="tooltip" style="top: -170px; margin-left: 25px;"><strong>Capitello Corinzio Variato:</strong> è una variazione dello stile corinzio, con elementi floreali e foglie di acanto.</span>
    </div>
    <div class="capitello"> 
        <div class="area" style="margin-top: 35px; margin-left: 18px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Composito:</strong> è una fusione degli stili ionico e corinzio</span>
    </div>
</div>

</body>

</html>

<?php
// Chiudo la connessione
$connessione->close();
?>
