<?php
require("res/PHP/connection.php");
session_start();

// Connessione al database
$connessione = new mysqli($host, $user, $password, $db);

// Controllo connessione
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

// Query per recuperare le recensioni con dati utente ed evento
$sql = "SELECT recensioni.commento, recensioni.data, utenti.username, eventi.titolo, eventi.immagine 
        FROM recensioni
        JOIN utenti ON recensioni.utente_id = utenti.id
        JOIN eventi ON recensioni.evento_id = eventi.id
        ORDER BY recensioni.data DESC";

$result = $connessione->query($sql);

// Controllo errori nella query
if (!$result) {
    die("Errore nella query: " . $connessione->error);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni Utenti</title>
    <link rel="stylesheet" href="res/css/stile-recensioni.css">
</head>
<body>

<!-- Contenitore titolo e pulsante -->
<div class="header">
    <h1>Recensioni Utenti</h1>
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
        <a href="aggEventi.php">Aggiungi Eventi</a>
        <a href="res/PHP/log-out.php">Logout</a>
    <?php else: ?>
        <!-- Mostra solo il link di Login se l'utente non è loggato -->
        <a href="login.php">Login</a>
    <?php endif; ?>
</div>

<!-- Contenuto principale -->
<div class="container">
    <hr class="title-line" />
    <p class="descrizione">In questa sezione potete leggere le esperienze e i commenti dei partecipanti ai nostri eventi. Speriamo che queste recensioni vi ispirino a vivere a pieno la cultura romana e partecipare ai prossimi eventi!</p>
    <p class="ringraziamenti">Un sentito ringraziamento a tutti i nostri utenti che hanno condiviso le loro impressioni e hanno contribuito a rendere questa piattaforma più ricca e coinvolgente.</p>
    <div class="separator"></div> <!-- Aggiunta della linea come div -->
</div>

<div class="recensioni-lista">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="recensione">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['immagine']); ?>" alt="Immagine Evento" class="immagine-evento">
                <div class="recensione-content">
                    <div class="recensione-header">
                        <p class="scritto-da">Scritto da: <strong class="username"><?php echo htmlspecialchars($row['username']); ?></strong></p>
                        <p class="data"><?php echo htmlspecialchars(date("d-m-Y H:i", strtotime($row['data']))); ?></p>
                    </div>
                    <h3 class="titolo"><?php echo htmlspecialchars($row['titolo']); ?></h3>
                    <p class="commento"><?php echo htmlspecialchars($row['commento']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Nessuna recensione disponibile</p>
    <?php endif; ?>
</div>

<!-- Script JavaScript -->
<script src="res/js/script.js" defer></script>

<!--- Creazione di un'area dedicata e posizionata sopra i capitelli con breve descrizione tramite tooltip --->
<div class="image-line">
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 19px; "></div>
        <span class="tooltip"  style="top: -100px; margin-left: 25px;"><strong>Capitello Ionico:</strong> caratterizzato da due grandi volute, elegante e simmetrico</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Corinzio:</strong> decorato in modo elaborato con foglie di acanto</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip"  style="top: -120px; margin-left: 25px; "><strong>Capitello Dorico Modificato:</strong> piú semplice con elementi decorativi a piccoli dentelli</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 26px;"></div>
        <span class="tooltip"  style="top: -170px; margin-left: 25px; "><strong>Capitello Corinzio Variato:</strong> è una variazione dello stile corinzio, con elementi floreali e foglie di acanto.</span>
    </div>
    <div class="capitello"> 
        <div class="area" style="margin-top: 35px; margin-left: 18px;"></div>
        <span class="tooltip"  style="top: -100px; margin-left: 25px;"><strong>Capitello Composito:</strong> è una fusione degli stili ionico e corinzio</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 37px; "></div>
        <span class="tooltip"  style="top: -100px; margin-left: 25px;"><strong>Capitello Ionico:</strong> caratterizzato da due grandi volute, elegante e simmetrico</span>
    </div> 
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip" style="top: -100px; margin-left: 25px;"><strong>Capitello Corinzio:</strong> decorato in modo elaborato con foglie di acanto</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 34px;"></div>
        <span class="tooltip"  style="top: -100px; margin-left: 25px; "><strong>Capitello Dorico Modificato:</strong> piú semplice con elementi decorativi a piccoli dentelli</span>
    </div>
    <div class="capitello">
        <div class="area" style="margin-top: 35px; margin-left: 26px;"></div>
        <span class="tooltip"  style="top: -170px; margin-left: 25px; "><strong>Capitello Corinzio Variato:</strong> è una variazione dello stile corinzio, con elementi floreali e foglie di acanto.</span>
    </div>
    <div class="capitello"> 
        <div class="area" style="margin-top: 35px; margin-left: 18px;"></div>
        <span class="tooltip"  style="top: -100px; margin-left: 25px;"><strong>Capitello Composito:</strong> è una fusione degli stili ionico e corinzio</span>
    </div>
</div>

<hr/>
<p class="frase-finale">Per qualsiasi segnalazione relativa al funzionamento rivolgersi a: boitor.1918720@studenti.uniroma1.it</p>

</body>
</html>

<?php
// Chiudi la connessione
$connessione->close();
?>
