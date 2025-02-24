<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aggiungi Eventi</title>
    <link rel="stylesheet" href="res/css/stile-aggEventi.css">
    <script src="res/js/script.js" defer></script> 
</head>

<body>
    
  <!-- Contenitore titolo e pulsante -->
<div class="header">
    <h1>Pagina dedicata all'aggiunta degli eventi</h1>
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

    <!-- Collegamento al file JavaScript -->
    <script src="res/js/script.js" defer></script>
</body>
</html>
