
<?php
session_start(); // abilitare l'accesso alle variabili di sessione.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<!-- HEAD -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cultura Romana</title>
    <link rel="stylesheet" href="res/css/stile-libri.css">
</head>

<!-- BODY -->
<body>

    <!-- HEADER: contiene il titolo della pagina e il pulsante per aprire il menu laterale -->
    <div class="header">
        <h1>Raccolta di libri</h1>

        <!-- Pulsante che apre il menu laterale -->
        <div class="menu-button" onclick="openMenu()">
            <img src="img\menu icona.png" alt="Menu">
        </div>
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


    <!-- Contenitore principale per il contenuto -->
    <div class="container">
        <!-- Linea orizzontale come separatore sotto il titolo -->
        <hr class="title-line" />
    </div>

    <!-- Paragrafi introduttivi che spiegano il contenuto della sezione -->
    <p>
        In questa sezione, troverete un elenco di libri che trattano vari aspetti della civiltà romana, dalla sua storia affascinante alle opere letterarie che hanno segnato il suo sviluppo. Questi testi offrono approfondimenti sulle conquiste, la cultura e l'eredità che Roma ha lasciato nel mondo moderno.
    </p>
    <p>
        Sia che siate appassionati di storia, archeologia o semplicemente curiosi di scoprire di più su uno dei più grandi imperi della storia, questa raccolta di libri vi guiderà attraverso i vari aspetti della vita e della cultura romana.
    </p>
    <p>
        Esplorate i libri elencati qui sotto e immergetevi nella straordinaria eredità della civiltà romana.
    </p>

    <p style="color: blue;">
        Se ti interessa uno dei seguenti libri clicca sull'immagine
    </p>

    <!-- Sezione che contiene i libri -->
    <div id="libri" class="sezione">
        <!-- Primo libro -->
        <div class="libro">
            <!-- Immagine e link al libro -->
            <div class="immagine">
                <a href="https://www.amazon.it/Quando-eravamo-padroni-mondo-Roma/dp/B0C6LCSYSQ" target="_blank">
                    <img src="img\libro1.jpg" alt="copertina libro 1">
                </a>
            </div>
            <!-- Informazioni dettagliate sul libro -->
            <div class="info-libro">
                <h2>Quando eravamo i padroni del mondo</h2>
                <p><strong>Nome Autore:</strong> Aldo Cazullo</p>
                <p><strong>Anno di pubblicazione:</strong> 2023</p>
                <p><strong>Genere:</strong> Saggio</p>
                <p><strong>Breve descrizione:</strong> L'autore fa un excursus su alcuni dei personaggi e dei periodi cruciali della storia di Roma mostrando analogie e differenze con il mondo odierno.</p>
            </div>
        </div>

        <!-- Secondo libro -->
        <div class="libro">
            <div class="immagine">
                <a href="https://www.amazon.it/Roma-cristiana-Corrado-Augias/dp/8806254367/ref=asc_df_8806254367" target="_blank">
                    <img src="img\libro2.jpg" alt="copertina libro 2">
                </a>
            </div>
            <div class="info-libro">
                <h2>La fine di Roma</h2>
                <p><strong>Nome Autore:</strong> Corrado Augias</p>
                <p><strong>Anno di pubblicazione:</strong> 2022</p>
                <p><strong>Genere:</strong> Storico</p>
                <p><strong>Breve descrizione:</strong> Augias presenta un affresco storico della Roma cristiana, raccontando le storie che caratterizzarono la fine del vecchio mondo.</p>
            </div>
        </div>

        <!-- Terzo libro -->
        <div class="libro">
            <div class="immagine">
                <a href="https://www.lafeltrinelli.it/barbari-immigrati-profughi-deportati-nell-libro-alessandro-barbero" target="_blank">
                    <img src="img\libro3.jpg" alt="copertina libro 3">
                </a>
            </div>
            <div class="info-libro">
                <h2>Barbari</h2>
                <p><strong>Nome Autore:</strong> Alessandro Barbero</p>
                <p><strong>Anno di pubblicazione:</strong> 2010</p>
                <p><strong>Genere:</strong> Storico</p>
                <p><strong>Breve descrizione:</strong> Barbero racconta come l'Impero romano si relazionava con i "barbari", popolazioni esterne in cerca di asilo e integrazione.</p>
            </div>
        </div>

        <!-- Quarto libro -->
        <div class="libro">
            <div class="immagine">
                <a href="https://www.lafeltrinelli.it/giulio-cesare-dittatore-democratico-libro-luciano-canfora" target="_blank">
                    <img src="img\libro4.jpg" alt="copertina libro 4">
                </a>
            </div>
            <div class="info-libro">
                <h2>Giulio Cesare: Il dittatore democratico</h2>
                <p><strong>Nome Autore:</strong> Luciano Canfora</p>
                <p><strong>Anno di pubblicazione:</strong> 2020</p>
                <p><strong>Genere:</strong> Storico</p>
                <p><strong>Breve descrizione:</strong> Biografia dettagliata di Giulio Cesare, esplorando la sua vita politica e il suo assassinio.</p>
            </div>
        </div> 
    </div>

    <!-- Separatore e citazione finale -->
    <hr/>
    <div class="frase-finale">
        <!-- Citazione in evidenza -->
        <h2>"Si vis pacem, para bellum."</h2>
        <p>Se vuoi la pace, prepara la guerra. Questa celebre frase latina sottolinea l'importanza della preparazione per prevenire conflitti.</p>
    </div>

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
    <p style="display: block; text-align: center;">Per qualsiasi segnalazione relativa al funzionamento rivolgersi a: boitor.1918720@studenti.uniroma1.it</p>

    <!-- Collegamento al file JavaScript -->
    <script src="res/js/script.js" defer></script> <!-- script viene scaricato in background mentre la pagina HTML viene processata e visualizzata dal browser -->

</body>
</html>
