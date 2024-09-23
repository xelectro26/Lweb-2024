function openMenu() {
    document.getElementById("sideMenu").style.width = "250px";
    // Scorri verso il contenuto principale
    document.querySelector('.container').scrollIntoView({ behavior: 'smooth' });
}

function closeMenu() {
    document.getElementById("sideMenu").style.width = "0";
}