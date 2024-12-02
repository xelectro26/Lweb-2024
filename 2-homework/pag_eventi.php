<?php
// Includi la connessione al database
require("res/PHP/connection.php");
$connessione = new mysqli($host, $user, $password, "cultura_lweb2");
session_start();

// Controllo connessione
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

// Query per estrarre gli eventi
$sql = "SELECT id, titolo, DATE_FORMAT(data_evento, '%Y-%m-%d %H:%i') AS data_evento, luogo, descrizione, immagine FROM eventi";
$result = $connessione->query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<!-- HEAD -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eventi Culturali di Roma</title>
    <link rel="stylesheet" href="res/css/stile-pag_eventi.css"/>
</head>

<!-- BODY -->
<body>
    <!-- HEADER: contiene il titolo della pagina -->
    <div class="header">
        <h1>Catalogo Eventi Culturali a Roma</h1>
        <div class="separator"></div> <!-- Aggiunta della linea come div -->
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
            <a href="agg_Eventi.php">Aggiungi Eventi</a>
            <a href="res/PHP/log-out.php">Logout</a>
        <?php else: ?>
            <!-- Mostra solo il link di Login se l'utente non è loggato -->
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <p class="introduzione">
        Benvenuti nella sezione dedicata agli eventi culturali di Roma! Qui potete scoprire mostre, concerti, spettacoli teatrali e molte altre attività che rendono la città eterna una delle capitali della cultura mondiale.
    </p>

    <?php
    // Controlla se ci sono risultati
    if ($result && $result->num_rows > 0) {
        echo '<div id="eventi" class="sezione">';
        
        // Ciclo su ogni riga (evento) del risultato
        while ($evento = $result->fetch_assoc()) {
            echo '<div class="evento">';
            echo '<div class="immagine">';
            // Controllo se il campo immagine è di tipo path o BLOB
            echo '<img src="data:image/jpeg;base64,' . base64_encode($evento['immagine']) . '" alt="' . htmlspecialchars($evento['titolo']) . '" width="400" />';
            echo '</div>';
            echo '<div class="info-evento">';
            echo '<h2>' . htmlspecialchars($evento['titolo']) . '</h2>';
            echo '<p><strong>Data:</strong> ' . htmlspecialchars($evento['data_evento']) . '</p>'; // Visualizza data e ora senza secondi
            echo '<p><strong>Luogo:</strong> ' . htmlspecialchars($evento['luogo']) . '</p>';
            echo '<p><strong>Descrizione:</strong> ' . htmlspecialchars($evento['descrizione']) . '</p>';
            echo '</div>';
            echo '<hr />';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<p>Nessun evento trovato.</p>";
    }
    $connessione->close();
    ?>

    <!-- Collegamento al file JavaScript -->
    <script src="res/js/script.js" defer></script>

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
        <span class="tooltip" style="top: -120px; margin-left: 25px;"><strong>Capitello Dorico Modificato:</strong> piú semplice con elementi decorativi a piccoli dentelli</span>
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
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Dorico Modificato:</strong> piú semplice con elementi decorativi a piccoli dentelli</span>
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
