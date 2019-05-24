<?php
include("../modele/connexion.php");
$capteur = $_POST["capteur"];
$tab = explode("-", $capteur);
$numero = $tab[2];

$requete = $bdd->prepare("SELECT * FROM data WHERE n°capteur=?");
$requete->execute(array($numero));
$valeur = array();
while ( $res =  $requete->fetch() )
	{
        $couple = array();
		array_push($valeur, $res["timestamp"]."-".$res["valeur"]);
    }


    
echo json_encode($valeur);