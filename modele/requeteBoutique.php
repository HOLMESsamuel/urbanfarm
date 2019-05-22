<?php
include 'connexion.php';

function getProduits(PDO $bdd) {
    $req = $bdd->query('SELECT * FROM produit');
    return $req;
}


?>