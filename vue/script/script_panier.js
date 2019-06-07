//recupere le modal de la commande
var modal = document.getElementById('commande');

//recupere pour passer a la caisse
var bouton = document.getElementById('commander');

//recupere le span qui ferme le modal
var span = document.getElementsByClassName('close')[0];

//si l'utilisateur clique le bouton, ouvre le modal
bouton.addEventListener('click',openModal);

//si l'utilisateur clique sur span (x), ferme le modal
span.addEventListener('click',closeModalSpan);

//si l'utilisateur clique en dehors du modal, ferme le modal
window.addEventListener('click', closeModalWindow);

/*
    affiche le modal
 */
function openModal() {
    modal.style.display = 'block';
    console.log("affiche modal");
}

/*
    cache le modal
 */
function closeModalSpan() {
    modal.style.display = 'none';
    console.log("clique (x) + ferme modal");
}

/*
    cache le modale si la cible est en dehors du modal
 */
function closeModalWindow(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
        console.log("clique extérieur + ferme modal");
    }
}

