//funzione js per aprire menu laterale
function openMenu() {
    document.getElementById("sideMenu").style.width = "250px";
    // Scorri verso il contenuto principale
    document.querySelector('.container').scrollIntoView({ behavior: 'smooth' });
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