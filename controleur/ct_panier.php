<?php
include "../modele/requetePanier.php";

function creePanier() {
    if (!isset($_SESSION['panier'])) {

        $_SESSION['panier'] = array();
        //$_SESSION['panier']['ref'] = array();
        /*
        $_SESSION['panier']['type'] = array();
        $_SESSION['panier']['description'] = array();
        $_SESSION['panier']['prix'] = array();

        $_SESSION['panier']['quantite'] = array();
        */
    }
}


//is_numeric
function ajouteProduitPanier() {

    creePanier();

    if (isset($_GET['ref']) && isset($_POST['quantite'])) {
        $ref = htmlspecialchars($_GET['ref']);
        $quantite = htmlspecialchars($_POST['quantite']);
        $_SESSION['panier'][$ref] = $quantite;
    } else {
        echo "Le produit n'a pas été ajouté au panier";
    }

}

function modifieProduitPanier() {

}

function supprimeProduitPanier() {

}

?>