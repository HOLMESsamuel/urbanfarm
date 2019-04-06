var formulaire = document.getElementById('formulaire');
var connexion = document.getElementById('connexion');

window.addEventListener('click', closeMenu);

function menuConnexion() {
    formulaire.style.display = "block";
    connexion.style.background = "rgb(145, 182, 129)";
}

function closeMenu(e) {
    if (e.target == formulaire) {
        formulaire.style.display = 'none';
        connexion.style.background = "#B6D7A8";
    }
}