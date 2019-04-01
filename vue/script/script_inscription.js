var modalInfo = document.getElementById('modalInfo');

window.addEventListener('click', closeModalExtInfo);

function closeModalInfo() {
    modalInfo.style.display = 'none';
}

function closeModalExtInfo(e) {
    if (e.target == modalInfo) {
        modalInfo.style.display = 'none';
    }
}


function openModalInfo() {
    modalInfo.style.display = "block";
}

//partie pour le modale des cgu

var modal = document.getElementById('modal');
var close = document.getElementById('close');

window.addEventListener('click', closeModalExt)

function openModal() {
    modal.style.display = 'block';
}

function closeModal() {
    modal.style.display = 'none';
}

function closeModalExt(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}




//la partie suivante gere l'ajout de champs au formulaire


var conteneur = document.getElementById("conteneur");
var n = 0;
var deletePattern = /^supprimer(\d+)$/
var elementPattern = /^champs(\d+)$/
var nb = 0;

function ajouterChamps() {
    conteneur.appendChild(creerChamps(dernierChamps() + 1));
}

function dernierChamps() {
    var conteneur = document.getElementById('conteneur');
    return conteneur.childNodes.length - 1;
}

function supprimer() {
    var conteneur = document.getElementById('conteneur');
    var n = parseInt(this.id.replace(deletePattern, '$1'));
    if (!isNaN(n)) {
        var elementID, elementNo;
        if (conteneur.childNodes.length > 0) {
            for (var i = 0; i < conteneur.childNodes.length; i++) {
                elementID = (conteneur.childNodes[i].getAttribute) ? conteneur.childNodes[i].getAttribute('id') : false;
                if (elementID) {
                    elementNo = parseInt(elementID.replace(elementPattern, '$1'));
                    if (!isNaN(elementNo) && elementNo == n) {
                        conteneur.removeChild(conteneur.childNodes[i]);
                        return;
                    }
                }
            }
        }
    }
}




function creerChamps(ID) {
    var champs = document.createElement("div");
    champs.setAttribute("class", "champs");
    champs.setAttribute("id", "champs" + ID);

    var titre = document.createElement('input');
    titre.setAttribute('class', 'titre');
    titre.setAttribute('type', 'text');
    titre.setAttribute('value', 'installation ' + ID);
    titre.setAttribute('name', 'titre' + ID);
    titre.setAttribute('id', 'titre' + ID);

    var contenu = document.createElement('div');
    contenu.setAttribute('class', 'contenu');

    var titreCapteur = document.createElement('h4');
    titreCapteur.innerHTML = "Choisissez vos capteurs";

    var titreActionneur = document.createElement("h4");
    titreActionneur.innerHTML = "Choisissez vos actionneurs"

    var adresse = document.createElement('input');
    adresse.setAttribute('type', 'text');
    adresse.setAttribute('class', 'adresse');
    adresse.setAttribute('id', 'adresse' + ID);
    adresse.setAttribute('name', 'adresse' + ID);
    adresse.setAttribute('placeholder', 'adresse');

    var liste = document.createElement('select');
    liste.setAttribute('name', 'liste' + ID);
    liste.setAttribute('id', 'liste' + ID);
    var optionPoulailler = document.createElement('option');
    optionPoulailler.innerHTML = 'poulailler';
    var optionSerre = document.createElement('option');
    optionSerre.innerHTML = 'serre';
    liste.appendChild(optionPoulailler);
    liste.appendChild(optionSerre);

    var champsTemperature = document.createElement('p');
    var lblTemperature = document.createElement('label');
    lblTemperature.innerHTML = 'temperature    ';
    lblTemperature.setAttribute('for', 'temperature' + ID);
    var temperature = document.createElement("input");
    temperature.setAttribute('type', 'checkbox');
    temperature.setAttribute('name', 'temperature' + ID);
    temperature.setAttribute('class', 'temperature');
    temperature.setAttribute('id', 'temperature' + ID);
    champsTemperature.appendChild(temperature);
    champsTemperature.appendChild(lblTemperature);

    var champsMouvement = document.createElement('p');
    var lblMouvement = document.createElement('label');
    lblMouvement.innerHTML = 'mouvement';
    lblMouvement.setAttribute('for', 'mouvement' + ID);
    var mouvement = document.createElement("input");
    mouvement.setAttribute('type', 'checkbox');
    mouvement.setAttribute('name', 'mouvement' + ID);
    mouvement.setAttribute('class', 'mouvement');
    mouvement.setAttribute('id', 'mouvement' + ID);
    champsMouvement.appendChild(mouvement);
    champsMouvement.appendChild(lblMouvement);

    var champsLumiere = document.createElement('p');
    var lblLumiere = document.createElement('label');
    lblLumiere.innerHTML = 'lumiere';
    lblLumiere.setAttribute('for', 'lumiere' + ID);
    var lumiere = document.createElement("input");
    lumiere.setAttribute('type', 'checkbox');
    lumiere.setAttribute('name', 'lumiere' + ID);
    champsLumiere.setAttribute('class', 'lumiere');
    lumiere.setAttribute('id', 'lumiere' + ID);
    champsLumiere.appendChild(lumiere);
    champsLumiere.appendChild(lblLumiere);

    var champsMoteur = document.createElement('p');
    var lblMoteur = document.createElement('label');
    lblMoteur.innerHTML = 'moteur';
    lblMoteur.setAttribute('for', 'moteur' + ID);
    var moteur = document.createElement("input");
    moteur.setAttribute('type', 'checkbox');
    moteur.setAttribute('name', 'moteur' + ID);
    champsMoteur.setAttribute('class', 'moteur');
    moteur.setAttribute('id', 'moteur' + ID);
    champsMoteur.appendChild(moteur);
    champsMoteur.appendChild(lblMoteur);

    var champsVentilateur = document.createElement('p');
    var lblVentilateur = document.createElement('label');
    lblVentilateur.innerHTML = 'ventilateur';
    lblVentilateur.setAttribute('for', 'ventilateur' + ID);
    var ventilateur = document.createElement("input");
    ventilateur.setAttribute('type', 'checkbox');
    ventilateur.setAttribute('name', 'ventilateur' + ID);
    champsVentilateur.setAttribute('class', 'ventilateur');
    ventilateur.setAttribute('id', 'ventilateur' + ID);
    champsVentilateur.appendChild(ventilateur);
    champsVentilateur.appendChild(lblVentilateur);

    var champsLampe = document.createElement('p');
    var lblLampe = document.createElement('label');
    lblLampe.innerHTML = 'lampe';
    lblLampe.setAttribute('for', 'lampe' + ID);
    var lampe = document.createElement("input");
    lampe.setAttribute('type', 'checkbox');
    lampe.setAttribute('name', 'lampe' + ID);
    champsLampe.setAttribute('class', 'lampe');
    lampe.setAttribute('id', 'lampe' + ID);
    champsLampe.appendChild(lampe);
    champsLampe.appendChild(lblLampe);

    var Delete = document.createElement('input');
    Delete.setAttribute('type', 'button');
    Delete.setAttribute('value', 'Supprimer');
    Delete.setAttribute('id', 'supprimer' + ID);
    Delete.onclick = supprimer;
    champs.appendChild(titre);
    contenu.appendChild(titreCapteur);
    contenu.appendChild(titreActionneur);
    contenu.appendChild(champsTemperature);
    contenu.appendChild(champsMouvement);
    contenu.appendChild(champsLumiere);
    contenu.appendChild(champsMoteur);
    contenu.appendChild(champsVentilateur);
    contenu.appendChild(champsLampe);
    contenu.appendChild(adresse);
    contenu.appendChild(liste);
    champs.appendChild(contenu);
    champs.appendChild(Delete);

    return champs;
}

function nombreDeFormulaires() {
    nb = dernierChamps();
}