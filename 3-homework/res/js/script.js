//funzione js per aprire menu laterale
function openMenu() {
    document.getElementById("sideMenu").style.width = "250px";
}
//funzione js per chiudere menu laterale
function closeMenu() {
    document.getElementById("sideMenu").style.width = "0";
}

//gestione del tooltip tramite codice js (al posto di usare :hover)
const tooltips = document.querySelectorAll('.tooltip');
tooltips.forEach(tooltip => {
    tooltip.addEventListener('mouseenter', () => {
        tooltip.style.display = 'block';
    });
    tooltip.addEventListener('mouseleave', () => {
        tooltip.style.display = 'none';
    });
});

// Funzione per impostare il nome utente e mostrare l'area utente
function setUserArea(username) {
    var userArea = document.getElementById('userArea');
    var usernameElement = document.getElementById('username');
    var usernameInMenu = document.getElementById('usernameInMenu'); // Aggiunto

    usernameElement.textContent = username; // Imposta il nome utente
    usernameInMenu.textContent = username; // Imposta il nome utente nel menu laterale
    userArea.style.display = 'block'; // Mostra l'area utente
}

// Gestione del carousel 
let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll(".galleria");
    if (index >= slides.length) currentIndex = 0;
    if (index < 0) currentIndex = slides.length - 1;

    const offset = -currentIndex * 100;
    document.querySelector(".carousel").style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    currentIndex++;
    showSlide(currentIndex);
}

function prevSlide() {
    currentIndex--;
    showSlide(currentIndex);
}