<?php
session_start(); // Abilitare l'accesso alle variabili di sessione.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aggiungi Eventi - Bellezze di Roma</title>
    <link rel="stylesheet" href="res/css/stile-aggEventi.css">
    <script src="res/js/script.js" defer></script> <!-- Script JavaScript -->
</head>

<body>
    <div class="header">
        <h1>Aggiungi Eventi</h1>
    </div>
    <hr/>

    <!-- Pulsante per aprire il menu -->
    <div class="menu-button" onclick="openMenu()">
        <img src="img/menu icona.png" alt="Menu">
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
                <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
            </div>
            <a href="Inserimento.php">Aggiungi Recensione</a>
            <a href="aggEventi.php">Aggiungi Eventi</a>
            <a href="res/PHP/log-out.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <!-- Contenuto principale -->
    <div class="container">
        <form action="res/PHP/agg-Evento.php" method="POST" enctype="multipart/form-data">
            <label for="titolo">Titolo Evento:</label>
            <input type="text" id="titolo" name="titolo" required>

            <label for="luogo">Luogo:</label>
            <input type="text" id="luogo" name="luogo" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>

            <label for="ora">Ora Evento:</label>
            <input type="time" id="ora" name="ora" required step="60"> <!-- step="60" esclude i secondi -->

            <label for="descrizione">Descrizione:</label>
            <textarea id="descrizione" name="descrizione" required></textarea>

            <label for="immagine">Immagine:</label>
            <input type="file" id="immagine" name="immagine" accept="image/*">

            <button type="submit">Aggiungi Evento</button>
        </form>
    </div>

    <!-- Creazione di un'area dedicata e posizionata sopra i capitelli con breve descrizione tramite tooltip -->
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
