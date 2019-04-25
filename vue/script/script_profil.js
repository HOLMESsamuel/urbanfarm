var modalProfil = document.getElementById("modalProfil");
var modalMdp = document.getElementById("modalMdp");

var conteneurMdp = document.getElementById("conteneurMdp");

function modifProfil() {
    modalProfil.style.display = "block";
}

function closeModalProfil() {
    modalProfil.style.display = "none";
}

function modifMdp() {
    for (var i = 0; i < conteneurMdp.childNodes.length; i++) {
        conteneurMdp.removeChild(conteneurMdp.childNodes[i]);
    }
    var nouveauMdp = document.createElement('input');
    nouveauMdp.setAttribute('type', 'text');
    nouveauMdp.setAttribute('placeholder', 'Nouveau mot de passe');
    nouveauMdp.setAttribute('id', 'nouveauMdp');

    var confNouveauMdp = document.createElement('input');
    confNouveauMdp.setAttribute('type', 'text');
    confNouveauMdp.setAttribute('placeholder', 'Confirmer mot de passe');
    confNouveauMdp.setAttribute('id', 'confNouveauMdp');

    conteneurMdp.appendChild(nouveauMdp);
    conteneurMdp.appendChild(confNouveauMdp);

    modalMdp.style.display = "block";
}

function closeModalMdp() {
    modalMdp.style.display = "none";
    for (var i = 0; i < conteneurMdp.childNodes.length; i++) {
        conteneurMdp.removeChild(conteneurMdp.childNodes[i]);
    }
    for (var i = 0; i < conteneurMdp.childNodes.length; i++) {
        conteneurMdp.removeChild(conteneurMdp.childNodes[i]);
    }
}