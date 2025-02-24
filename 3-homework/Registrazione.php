<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form di Registrazione</title>
    <link rel="stylesheet" href="res/css/stile-registrazione.css"> 
</head>
<body>

 <!-- Pulsante per aprire il menu -->
  <a href="Homepage.php" title="Homepage">
    <div class="menu-button" onclick="openMenu()" title="Homepage">
        <img src="img/home.png" alt="Homepage"> 
    </div>
  </a>

    <div class="form-container">
        <h2>Registrazione Utente</h2>
        <form action="res/PHP/reg.php" method="POST"> 

        <!-- GESTIONE ERRORI PHP  -->
        <?php
            if(isset($_SESSION['errore']) && $_SESSION['errore'] == 'true'){ //isset verifica se errore è settata
                echo "<h3>USERNAME GIÀ INSERITO!</h3>";
                unset($_SESSION['errore']); //la unsetto altrimenti rimarrebbe la scritta
            }

            if(isset($_SESSION['errore_e']) && $_SESSION['errore_e'] == 'true'){ //isset verifica se errore è settata
                echo "<h3>EMAIL GIÀ ESISTENTE!</h3>";
                unset($_SESSION['errore_e']); //la unsetto altrimenti rimarrebbe la scritta
            }
        
            if(isset($_SESSION['errore_p']) && $_SESSION['errore_p'] == 'true'){
                echo "<h3>LE PASSWORD NON SONO UGUALI!</h3>";
                unset($_SESSION['errore_p']);
            }
        ?>

            <!-- Nome Utente -->
            <label for="nome">Nome Utente (username):</label>
            <input type="text" id="nome" name="nome_utente" required>
            
            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <!-- Password -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <!-- Password di controllo -->
            <label for="password">Conferma password</label>
            <input type="password" id="password2" name="password2" required>
            
            <!-- Accettazione Termini -->
            <div class="checkbox">
                <input type="checkbox" id="termini" name="termini" required>
                <label for="termini">Accetto i Termini e le Condizioni</label>
            </div>
            
            <p>Sei gia registrato? Fai il<a href="login.php"> LOGIN</a></p>
            <!-- Pulsante di Invio -->
            <input type="submit" value="Registrati">
        </form>
    </div>

<!-- Collegamento al file JavaScript -->
<script src="res/js/script.js" defer></script>

</body>
</html> 
