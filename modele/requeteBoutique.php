<?php
include 'connexion.php';

function getProduits(PDO $bdd) {
    $req = $bdd->query('SELECT * FROM produit');
    return $req;
}

function getRandomProduit(PDO $bdd) {
    $req = $bdd->query("SELECT * FROM produit ORDER BY RAND() LIMIT 1");
    return $req;
}

?>