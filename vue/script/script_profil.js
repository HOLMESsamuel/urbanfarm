var modalProfil = document.getElementById("modalProfil");
var modalMdp = document.getElementById("modalMdp");

var conteneurProfil = document.getElementById("conteneurProfil");

function modifProfil() {
    for (var i = 0; i < conteneurProfil.childNodes.length; i++) {
        conteneurProfil.removeChild(conteneurProfil.childNodes[i]);
        conteneurProfil.removeChild(conteneurProfil.childNodes[i]);
    }
    var prenom = document.createElement('input');
    prenom.setAttribute('type', 'text');
    prenom.setAttribute('placeholder', 'prenom');

    var nom = document.createElement('input');
    nom.setAttribute('type', 'text');
    nom.setAttribute('placeholder', 'nom');

    var adresse = document.createElement('input');
    adresse.setAttribute('type', 'text');
    adresse.setAttribute('placeholder', 'adresse');

    conteneurProfil.appendChild(prenom);
    conteneurProfil.appendChild(nom);
    conteneurProfil.appendChild(adresse);

    modalProfil.style.display = "block";
}

function closeModalProfil() {
    for (var i = 0; i < conteneurProfil.childNodes.length; i++) {
        conteneurProfil.removeChild(conteneurProfil.childNodes[i]);
    }
    modalProfil.style.display = "none";
}

function modifMdp() {
    modalMdp.style.display = "block";
}

function closeModalMdp() {
    modalMdp.style.display = "none";
}