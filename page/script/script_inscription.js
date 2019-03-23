var conteneur = document.getElementById("conteneur");
var n = 0;
var deletePattern = /^supprimer(\d+)$/
var elementPattern = /^champs(\d+)$/

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
    titre.setAttribute('type', 'text');
    titre.setAttribute('value', 'installation ' + ID);
    titre.setAttribute('name', 'titre' + ID);

    var contenu = document.createElement('div');
    contenu.setAttribute('class', 'contenu');

    var liste = document.createElement('select');
    liste.setAttribute('name', 'liste' + ID);
    var optionPoulailler = document.createElement('option');
    optionPoulailler.innerHTML = 'poulailler';
    var optionSerre = document.createElement('option');
    optionSerre.innerHTML = 'serre';
    liste.appendChild(optionPoulailler);
    liste.appendChild(optionSerre);

    var champsTemperature = document.createElement('p');
    var lblTemperature = document.createElement('label');
    lblTemperature.innerHTML = 'temperature';
    lblTemperature.setAttribute('for', 'temperature' + ID);
    var temperature = document.createElement("input");
    temperature.setAttribute('type', 'checkbox');
    temperature.setAttribute('name', 'temperature' + ID);
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
    lumiere.setAttribute('id', 'lumiere' + ID);
    champsLumiere.appendChild(lumiere);
    champsLumiere.appendChild(lblLumiere);


    var Delete = document.createElement('input');
    Delete.setAttribute('type', 'button');
    Delete.setAttribute('value', 'Supprimer');
    Delete.setAttribute('id', 'supprimer' + ID);
    Delete.onclick = supprimer;
    champs.appendChild(titre);
    contenu.appendChild(champsTemperature);
    contenu.appendChild(champsMouvement);
    contenu.appendChild(champsLumiere);
    contenu.appendChild(liste);
    champs.appendChild(contenu);
    champs.appendChild(Delete);

    return champs;
}