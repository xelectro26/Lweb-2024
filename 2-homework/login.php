<?php
// Avvia la sessione
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Utente</title>
    <link rel="stylesheet" href="res/css/stile-login.css">
</head>
<body>

    <!-- Pulsante per aprire il menu -->
    <a href="Homepage.php" title="Homepage">
        <div class="menu-button" onclick="openMenu()" title="Homepage">
            <img src="img/home.png" alt="Homepage">
            <div class="tooltip">Homepage</div>
        </div>
    </a>

    <!-- Form per Login -->
    <div class="form-container">
        <h2>Login Utente</h2>
        <form action="res/PHP/log-in.php" method="POST">
            <?php
                if (isset($_SESSION['errore'])) {
                    echo "<h3 style='color: red;'>".$_SESSION['errore']."</h3>";
                    unset($_SESSION['errore']); // Resetta l'errore
                }

                if (isset($_SESSION['errore_v'])) {
                    echo "<h3 style='color: red;'>ERRORE IN FASE DI LOGIN!</h3>";
                    unset($_SESSION['errore_v']); // Resetta l'errore
                }
            ?>

            <!-- Nome Utente -->
            <label for="nome">Nome Utente:</label>
            <input type="text" id="nome" name="username" required>
            
            <!-- Password -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <p>Non sei ancora registrato? <a href="Registrazione.php">Registrati</a></p>

            <!-- Pulsante di Invio -->
            <input type="submit" value="Accedi">
        </form>
    </div>

    <!-- Collegamento al file JavaScript -->
    <script src="res/js/script.js" defer></script>

</body>
</html>
