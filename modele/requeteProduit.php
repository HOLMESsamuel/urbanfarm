<?php
include 'connexion.php';

/**
 * recupere tous les produits
 *
 * @param PDO $bdd
 * @return bool|PDOStatement
 */
function getProduits(PDO $bdd) {
    $req = $bdd->query('SELECT * FROM produit');
    return $req;
}

/**
 * recupere le produit en fonction de la reference
 *
 * @param PDO $bdd
 * @param String $ref
 * @return bool|PDOStatement
 */
function getProduit(PDO $bdd, String $ref) {
    $req = $bdd->prepare("SELECT * FROM produit WHERE n°produit = ?");
    $req->execute(array($ref));
    return $req;
}

/**
 * recupere un produit aleatoire
 *
 * @param PDO $bdd
 * @return bool|PDOStatement
 */
function getRandomProduit(PDO $bdd) {
    $req = $bdd->query("SELECT * FROM produit ORDER BY RAND() LIMIT 1");
    return $req;
}

?>