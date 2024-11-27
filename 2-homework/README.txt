Membri del gruppo: 

Denis Boitor - Boitor.1918720@studenti.uniroma1.it

Repository:

Denis Boitor - https://github.com/xelectro26/Lweb-2024


Descrizione:

Il topic principale è quello di voler creare un Blog informativo sulla civiltà romana e le sue bellezze.
Informando l'utente sia sulla storia sia su una futura scelta di un libro per approfondire.
L'esercizio da cui ho preso spunto è il "CSS-3" presente nella slide 41 del seguente pdf "lweb-part02-XHTML.CSS.2.pdf".
Ho scelto di ampliarlo, aggiungendo ulteriori pagine con diverse funzioni.
Ho preso come base di partenza il 1° homework ma con i dovuti aggiornamenti.

Homework 2 presenta diverse pagine in xhtml/php nel quale è possibile scorrere agevolmente tramite il menu laterale sx.
Una volta effettuato il Login/Registrazione, nel menu laterale appare la funzione di Aggiunta Recensione/Evento.
Le funzioni Aggiungi Recensioni/Eventi modificano dinamicamente il database il quale aggiorna le pagine Eventi: Roma / Recensioni Utenti
Nel caso in cui db non disponibili, si puo usare apposito codice InstallDB.php per potere creare il db EX-NOVO.

Feature:
 - Sistema di Registrazione e Login/Logout per gli utenti con password criptate (hashing)
 - Ogni utente ha la possibilità di aggiungere un evento compilando apposito FORM
 - Ogni utente può aggiungere una recensione scegliendo tra gli eventi disponibili, seleziona l'evento per il quale desidera aggiungere una recensione e successivamente spunta un'area di text dove aggiungere il proprio commento.
 
Distribuzione dei file:
	- Pagine XHTML contenenti script PHP
	- File connection.php codice di connessione al db richiamato quando necessario
	- File InstallDB.php che permette installazione del DB con tutti i dati
	- Directory res
		- Img (contenente immagini)
		- PHP (contenente codice backend o di supporto)
		- CSS (contenente codice css associato alle pagine XHTML)
	
