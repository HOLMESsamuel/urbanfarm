var modalProfil = document.getElementById("modalProfil");
var modalMdp = document.getElementById("modalMdp");

var conteneurProfil = document.getElementById("conteneurProfil");
var conteneurMdp = document.getElementById("conteneurMdp");

function modifProfil(prenomPrec, nomPrec, adressePrec) {
    for (var i = 0; i < conteneurProfil.childNodes.length; i++) {
        conteneurProfil.removeChild(conteneurProfil.childNodes[i]);
    }
    for (var i = 0; i < conteneurProfil.childNodes.length; i++) {
        conteneurProfil.removeChild(conteneurProfil.childNodes[i]);
    }
    var prenom = document.createElement('input');
    prenom.setAttribute('type', 'text');
    prenom.setAttribute('placeholder', 'prenom');
    prenom.setAttribute('value', prenomPrec);

    var nom = document.createElement('input');
    nom.setAttribute('type', 'text');
    nom.setAttribute('placeholder', 'nom');
    nom.setAttribute('value', nomPrec);

    var adresse = document.createElement('input');
    adresse.setAttribute('type', 'text');
    adresse.setAttribute('placeholder', 'adresse');
    adresse.setAttribute('value', adressePrec);

    conteneurProfil.appendChild(prenom);
    conteneurProfil.appendChild(nom);
    conteneurProfil.appendChild(adresse);


    modalProfil.style.display = "block";
}

function closeModalProfil() {
    for (var i = 0; i < conteneurProfil.childNodes.length; i++) {
        conteneurProfil.removeChild(conteneurProfil.childNodes[i]);
    }
    for (var i = 0; i < conteneurProfil.childNodes.length; i++) {
        conteneurProfil.removeChild(conteneurProfil.childNodes[i]);
    }
    modalProfil.style.display = "none";
}

function modifMdp() {
    for (var i = 0; i < conteneurMdp.childNodes.length; i++) {
        conteneurMdp.removeChild(conteneurMdp.childNodes[i]);
    }
    var nouveauMdp = document.createElement('input');
    nouveauMdp.setAttribute('type', 'text');
    nouveauMdp.setAttribute('placeholder', 'Nouveau mot de passe');
    var confNouveauMdp = document.createElement('input');
    confNouveauMdp.setAttribute('type', 'text');
    confNouveauMdp.setAttribute('placeholder', 'Confirmer mot de passe');

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