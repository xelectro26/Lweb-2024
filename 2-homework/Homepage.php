<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bellezze di Roma</title>
    <link rel="stylesheet" href="res\css\stile-cultura.css">
</head>

<body>

<!-- Contenitore titolo e pulsante -->
<div class="header">
    <h1>Cultura Romana</h1>
    
    <!-- Pulsante per aprire il menu -->
    <div class="menu-button" onclick="openMenu()">
        <img src="img\menu icona.png" alt="Menu">
    </div>
</div>

<!-- Menu laterale -->
<div id="sideMenu" class="menu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
    <a href="Homepage.html">Cultura Romana</a>
    <a href="Colosseo.html">Il Colosseo</a>
    <a href="Libri.html">Libri Storici</a>
</div>

<!-- Contenuto principale -->
<div class="container">
    <hr class="title-line" />
</div>

<div class="galleria">
    <img src="img\cultura1.webp" alt="Colosseo a Roma" />
</div>

<p>Fonte foto: google immagini</p>

<div class="testo">
    <h2>Storia della civiltà romana in breve</h2>
    <p>
        La civiltà romana è la civiltà fondata nell'antichità dai Romani, una popolazione indoeuropea di ceppo italico e appartenente nello specifico al gruppo dei popoli latino-falisci, stanziatisi in epoca protostorica nell'attuale Lazio. La suddetta civiltà, passata da una monarchia attraverso una repubblica oligarchica fino a un impero, plasmò l'immagine di quella che è oggi conosciuta come civiltà occidentale.
    </p>
    <p>
        Oltre al suo modello di potere, che è stato emulato o ispirato da innumerevoli principi, la civiltà romana ha contribuito enormemente allo sviluppo del diritto, delle istituzioni e della legislazione, nonché della guerra, dell'arte, della letteratura, dell'architettura, della tecnologia e delle lingue del mondo occidentale.
    </p>

    <h2>Forme di governo</h2>
    <ul>
        <li>Età regia</li>
        <p>
            Il rex era nella Roma arcaica il supremo magistrato, eletto dai patres, i capifamiglia delle gentes originarie, per reggere e governare la città. Non esistono riferimenti riguardanti un principio ereditario nell'elezione dei primi quattro re latini, mentre per i successivi tre re etruschi fu stabilito un principio di discendenza matrilineare. Le insegne del potere del re erano dodici littori recanti fasci dotati di asce, la sedia curule, toga rossa, le scarpe rosse e il diadema bianco sul capo.
        </p>
        
        <li>Età repubblicana</li>
        <p>
            Il comando dell'esercito e il potere giudiziario, che in età regia erano prerogativa del re, in epoca repubblicana furono assegnati a due consoli, mentre prerogative regie furono attribuite al pontifex maximus. Con la crescita di complessità dello Stato romano si rese necessaria l'istituzione di altre cariche (edili, censori, questori, tribuni della plebe) che andarono a costituire le magistrature.
        </p>
    </ul>

    <table class="centra-tabella">
        <thead>
            <tr>
                <th colspan="7">Cariche politiche della Repubblica</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Console</td>
                <td>Pretore</td>
                <td>Questore</td>
                <td>Censore</td>
                <td>Tribuni vari</td>
                <td>Dittatore</td>
                <td>Princeps Senatus</td>
            </tr>
        </tbody>
    </table>
</div>

<p style="margin-top: 20px;">
    Per saperne di più, visita la pagina relativa su <a href="https://it.wikipedia.org/wiki/Civiltà_romana" target="_blank">Wikipedia</a>
</p>


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
<p>
    Per qualsiasi segnalazione relativa al funzionamento rivolgersi a: boitor.1918720@studenti.uniroma1.it
</p>

<!-- Collegamento al file JavaScript -->
<script src="res\js\script.js" defer></script>

</body>
</html>




