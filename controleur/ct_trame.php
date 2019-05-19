<?php
function recupereTrame():array {

    $ch = curl_init();

    $name = 'projets-tomcat.isep.fr';//nom du site

    $numeroPort = ':8080';//numero de port du serveur

    $dossier = "appService";

    $parametre = "ACTION=GETLOG&TEAM=G10E";

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,'http://'.$name.$numeroPort.'/'.$dossier.'/?'.$parametre);


    $content = curl_exec($ch);
    $longueur = strlen($content);

    $trame = explode("G10E", $content); // forme un tableau avec tous les elements séparés par G10E
    $nbTrame = count($trame);

    $tabTrame = array();
    for($i=1; $i<$nbTrame-1; $i++){
        $buffer = "";
        $buffer = $buffer.substr($trame[$i-1], strlen($trame[$i-1])-1)."G10E".substr($trame[$i], 0, strlen($trame[$i])-1);
        array_push($tabTrame, $buffer);
    }
    array_push($tabTrame, substr($trame[$nbTrame-2], strlen($trame[$nbTrame-2])-1)."G10E".$trame[$nbTrame-1]);

    return  $tabTrame;
}

function afficheTab(array $tab){
    $n=count($tab);
    for($i=0; $i<$n; $i++){
        echo $tab[$i];
        echo "<br>";
    }
}

afficheTab(recupereTrame());

function decomposeTrame(String $trame){
    $longueur = strlen($trame);
    if($longueur == 25){

    } else {
        
    }
}

?>

