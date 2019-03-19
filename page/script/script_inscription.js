var conteneur=document.getElementById("conteneur");

function ajouterChamps(){
    conteneur.appendChild(creerChamps(dernierChamps()+1));
}

function dernierChamps(){
    return(conteneur.childNodes.length-2);
}

function supprimer(){
    conteneur.removeChild(conteneur.childNodes[dernierChamps()]);
}

function creerChamps(ID){
    var champs = document.createElement("div");
    champs.setAttribute("id", "champs"+ID);
    var input = document.createElement("input");
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'input' + ID);
    input.setAttribute('id', 'input' + ID);

    var Delete = document.createElement('input');
    Delete.setAttribute('type', 'button');
    Delete.setAttribute('value', 'Supprimer'+ID);
    Delete.setAttribute('id', 'delete' + ID);
    Delete.onclick = supprimer;
    champs.appendChild(input);
    champs.appendChild(Delete);
    return champs;
}