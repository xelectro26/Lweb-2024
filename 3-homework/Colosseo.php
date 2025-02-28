<?php
session_start(); // abilitare l'accesso alle variabili di sessione.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bellezze di Roma</title>
    <link rel="stylesheet" href="res\css\stile-colosseo.css">
</head>

<body>

<!-- Contenitore titolo e pulsante -->
<div class="header">
    <h1>Il Colosseo</h1>
    
    <!-- Pulsante per aprire il menu -->
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

<div class="galleria">
    <img src="img\colosseo.jpg" alt="Colosseo a Roma" />
    <img src="img\colosseo 9.avif" alt="Colosseo a Roma" />
    <img src="img\colosseo 2.jpg" alt="Colosseo a Roma" />
</div>

<p>Differenti viste del Amphitheatrum Flavium</p>

<div class="testo">
    <h2>Storia della costruzione in breve</h2>
    <p>
        La costruzione iniziò fra il 70 e il 72 sotto l'imperatore Vespasiano,
        della dinastia flavia. I lavori furono finanziati,
        come altre opere pubbliche del periodo,
        con il provento delle tasse provinciali e il bottino del saccheggio del tempio
        di Gerusalemme. Nel 1813 fu rinvenuto un blocco di marmo reimpiegato in epoca tarda,
        che recava ancora i fori delle lettere di bronzo dell'iscrizione dedicatoria,
        in origine posta sopra un ingresso: il testo è stato ricostruito nel modo seguente:   
    </p>
    <p>
        «L’imperatore Cesare
        Vespasiano Augusto
        fece erigere il nuovo anfiteatro
        con i proventi del bottino.»
    </p>
    <p>L'area scelta era una vallata tra la Velia,
        il colle Oppio e il Celio,
        in cui si trovava un lago artificiale
        (lo stagnum citato dal poeta Marziale),
        fatto scavare da Nerone per la propria Domus Aurea.
    </p>
    <p>
        Questo specchio d'acqua, alimentato da fonti che sgorgavano dalle fondazioni del Tempio del Divo Claudio
        sul Celio, venne ricoperto da Vespasiano con un gesto "riparatorio" contro la politica del "tiranno" Nerone,
        che aveva usurpato il terreno pubblico e lo aveva destinato a uso proprio,
        rendendo così evidente la differenza tra il vecchio e il nuovo principato. Vespasiano fece dirottare l'acquedotto per uso civile, bonificò il lago e vi fece gettare delle fondazioni,
        più resistenti nel punto in cui avrebbe dovuto essere edificata la cavea.
    </p>
    <p>
        Vespasiano vide la costruzione dei primi due piani e riuscì a dedicare l'edificio prima di morire nel 79. L'edificio era il primo grande anfiteatro stabile di Roma, dopo due strutture minori o provvisorie di epoca giulio-claudia (l'amphiteatrum Tauri e l'amphiteatrum Caligulae) e dopo 150 anni dai primi anfiteatri in Campania.
        Tito aggiunse il terzo e quarto ordine di posti e inaugurò l'anfiteatro con cento giorni di giochi nell'80. Poco dopo il secondo figlio di Vespasiano, l'imperatore Domiziano, operò notevoli modifiche, completando l'opera ad clipea (probabilmente scudi decorativi in bronzo dorato), aggiungendo forse il maenianum summum in ligneis e realizzando i sotterranei dell'arena: dopo il completamento dei lavori non fu più possibile tenere nell'anfiteatro le naumachie (rappresentazioni di battaglie navali), che invece le fonti riportano per l'epoca precedente.
    </p>
    <h2>Struttura</h2>
    <p>
        «Vedo una gran cerchia d'archi, e tutt'intorno giacciono pietre infrante che furono parte un tempo di una solida muraglia. Nelle fessure e sopra le volte cresce una foresta di arbusti, olivi selvatici, e mirti, e rovi intricati, e malerbe confuse... Le pietre sono massicce, immense, e sporgono l'una sull'altra. Vi sono terribili fenditure nelle mura, e ampie aperture da cui si vede il cielo azzurro ...» 
    </p>
    <p>
        L'edificio poggia su una piattaforma in travertino sopraelevata rispetto all'area circostante. Le fondazioni sono costituite da una grande platea in tufo di circa 13 m di spessore, foderata all'esterno da un muro in laterizio.
    </p>
    <p>
        Contemporaneamente all'anfiteatro furono innalzati alcuni edifici di servizio per i giochi: i ludi (caserme e luoghi di allenamento per i gladiatori, tra cui sono noti il Magnus, il Gallicus, il Matutinus e il Dacicus), la caserma del distaccamento dei marinai della Classis Misenensis (la flotta romana di base a Miseno) adibiti alla manovra del velarium (castra misenatium), il summum choragium e gli armamentaria (depositi delle armi e delle attrezzature), il sanatorium (luogo di cura per le ferite dei combattimenti) e lo spoliarum, un luogo in cui venivano trattate le spoglie dei gladiatori morti in combattimento.
    </p>
    <p>Per ulteriori informazioni puoi visitare la pagina <a href="https://it.wikipedia.org/wiki/Colosseo#Storia" target="_blank">Wikipedia</a>.
    </p>

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
<p class="frase-finale">Per qualsiasi segnalazione relativa al funzionamento rivolgersi a: boitor.1918720@studenti.uniroma1.it</p>

<!-- Collegamento al file JavaScript -->
<script src="res/js/script.js" defer></script>

</body>
</html>
