
var comboBox= document.getElementById("comboBox");
var graph= document.getElementById("chartContainer");

function createComboBox(n) {
    
    var liste = document.createElement('select');
    liste.setAttribute('name', 'liste' );
    liste.setAttribute('id', 'liste' );
    for (var i=0; i<5; i++){
        var optionCapteur = document.createElement('option');
        optionCapteur.innerHTML = 'capteur '+ i;
        liste.appendChild(optionCapteur);
    }
    comboBox.appendChild(liste);
    graph.appendChild(liste);
}
