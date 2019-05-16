<?php

include 'connexion.php';

function getProduit(PDO $bdd, String $ref) {
    $req = $bdd->prepare("SELECT * FROM produit WHERE n°produit = ?");
    $req->execute(array($ref));
    return $req;
}
