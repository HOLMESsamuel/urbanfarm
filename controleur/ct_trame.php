<?php
include("../modele/connexion.php");
include("../modele/requeteData.php");

/**
 * ecrit la requete html nécessaire pour aller l=chercher le fichier de log associé au
 * nom d'equipe puis lexecute sépare les trames les unes des autres et renvoie un tableau
 * donc chaque élement est une trame
 */
function recupereTrame():array {

    $ch = curl_init();

    $name = 'projets-tomcat.isep.fr';//nom du site

    $numeroPort = ':8080';//numero de port du serveur

    $dossier = "appService";

    $nomEquipe = "G10E";

    $parametre = "ACTION=GETLOG&TEAM=".$nomEquipe;

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,'http://'.$name.$numeroPort.'/'.$dossier.'/?'.$parametre);


    $content = curl_exec($ch);
    $longueur = strlen($content);

    $trame = explode($nomEquipe, $content); // forme un tableau avec tous les elements séparés par G10E
    $nbTrame = count($trame);

    $tabTrame = array();
    for($i=1; $i<$nbTrame-1; $i++){
        $buffer = "";
        $buffer = $buffer.substr($trame[$i-1], strlen($trame[$i-1])-1).$nomEquipe.substr($trame[$i], 0, strlen($trame[$i])-1);
        array_push($tabTrame, $buffer);
    }
    array_push($tabTrame, substr($trame[$nbTrame-2], strlen($trame[$nbTrame-2])-1).$nomEquipe.$trame[$nbTrame-1]);

    return  $tabTrame;
}

/**
 * parcours le tableau et affiche chaque élément suivi d'un
 * retour a la ligne
 */
function afficheTab(array $tab){
    $n=count($tab);
    for($i=0; $i<$n; $i++){
        echo $tab[$i];
        echo "<br>";
    }
}

function recupereDerniereTrame(): String {
    $tabTrame = recupereTrame();
    $taille = count($tabTrame);
    return($tabTrame[$taille-1]);
}

echo "hello";

/**
 * Decompose chaque trame quu'elle soit courante ou rapide en tous ses éléments
 * (type, donnée, etc) renvoie un tableau donc les clés sont les nom des données
 * d'une trame et les attributs les données
 * ex : decomposeTrame(trame)[TRA] = 1 pour une trame courante
 */
function decomposeTrame(String $trame):array {
    $longueur = strlen($trame);
    $trameDecompose = array();
    if($longueur == 34){
        $trameDecompose = array(
            "TRA"    => substr($trame, 0, 1),
            "OBJ"  => substr($trame, 1, 4),
            "REQ" => substr($trame, 5, 1),
            "TYP"  => substr($trame, 6, 1),
            "NUM" => substr($trame, 7, 2),
            "VAL" => substr($trame, 9, 4),            
            "TIM" => substr($trame, 13, 4),
            "CHK" =>  substr($trame, 17, 2),
            "timestamp" => substr($trame, 19, 14)
        );
    } else {
        $trameDecompose = array(
            "TRA"    => substr($trame, 0, 1),
            "OBJ"  => substr($trame, 1, 4),
            "TYP"  => substr($trame, 5, 1),
            "NBR" => substr($trame, 6, 1),
            "DAT" => substr($trame, 7, 2),
            "CHK" =>  substr($trame, 9, 2),
            "timestamp" => substr($trame, 11, 14)
        );
    }
    return $trameDecompose;
}

function estPlusRecent(String $trame, int $timestamp): bool {
    $aTester = (int)decomposeTrame($trame)["timestamp"];
    return ($aTester-$timestamp > 0);
}

function trameNonLue($bdd): array {
    $tabTrame = recupereTrame();
    $trameNonLue = array();
    $nombreTrame = count($tabTrame);
    $dernierTimestamp = dernierTimestamp($bdd);
    $indice = 0;
    $plusAncient = true;
    while($indice < $nombreTrame && $plusAncient){
        if(estPlusRecent($tabTrame[$indice], $dernierTimestamp)){
            $plusAncient = false;
        } else {
            $indice ++;
        }
    }
    for($i = $indice; $i < $nombreTrame; $i++){
        array_push($trameNonLue, $tabTrame[$i]);
    }

    return $trameNonLue;
}

function majData($bdd){
    $trameNonLue = trameNonLue($bdd);
    $nbTrame = count($trameNonLue);
    for($i = 0; $i<$nbTrame; $i++){
        if(strlen($trameNonLue[$i])>27){
            $timestamp = (int)decomposeTrame($trameNonLue[$i])["timestamp"];
            $typeCapteur = (int)decomposeTrame($trameNonLue[$i])["NUM"];
            $valeur = (int)decomposeTrame($trameNonLue[$i])["VAL"];
            ajoutData($bdd, $timestamp, $typeCapteur, $valeur);
        }
    }
}




?>

