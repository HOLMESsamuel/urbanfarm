<?php

function addVal(PDO $bdd, String $nom, String $description, String $prix) {
    $requete=$bdd->prepare("INSERT INTO produit(type, description, prix) VALUES (?, ?, ?)");
    $requete->execute(array($nom, $description, $prix));
}

function suppVal(PDO $bdd, String $ref) {
    $requete=$bdd->prepare("DELETE FROM produit WHERE n°produit=?");
    $requete->execute(array($ref));
}
    
?>