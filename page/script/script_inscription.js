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
    var lblLumiere = document.createElement('label');
    lblLumiere.innerHTML = 'lumiere';
    var lumiere = document.createElement("input");
    lumiere.setAttribute('type', 'checkbox');
    lumiere.setAttribute('name', 'input' + ID);
    lumiere.setAttribute('id', 'input' + ID);
    lblLumiere.appendChild(lumiere);

    var champs = document.createElement("div");
    champs.setAttribute("class", "champs");
    champs.setAttribute("id", "champs" + ID);
    var lblMouvement = document.createElement('label');
    lblMouvement.innerHTML = 'mouvement';
    var mouvement = document.createElement("input");
    mouvement.setAttribute('type', 'checkbox');
    mouvement.setAttribute('name', 'input' + ID);
    mouvement.setAttribute('id', 'input' + ID);
    lblMouvement.appendChild(mouvement);

    var champs = document.createElement("div");
    champs.setAttribute("class", "champs");
    champs.setAttribute("id", "champs" + ID);
    var lblTemperature = document.createElement('label');
    lblTemperature.innerHTML = 'temperature';
    var temperature = document.createElement("input");
    temperature.setAttribute('type', 'checkbox');
    temperature.setAttribute('name', 'input' + ID);
    temperature.setAttribute('id', 'input' + ID);
    lblTemperature.appendChild(temperature);

    var Delete = document.createElement('input');
    Delete.setAttribute('type', 'button');
    Delete.setAttribute('value', 'Supprimer' + ID);
    Delete.setAttribute('id', 'supprimer' + ID);
    Delete.onclick = supprimer;
    champs.appendChild(lblLumiere);
    champs.appendChild(lblMouvement);
    champs.appendChild(lblTemperature);
    champs.appendChild(Delete);
    return champs;
}