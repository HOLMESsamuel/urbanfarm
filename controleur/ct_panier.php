<?php
include "modele/requeteProduit.php";

/**
 * cree la panier
 */
function creePanier() {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }
}

/**
 * ajoute un produit au panier
 */
function ajouteProduitPanier() {
    if (isset($_GET['ref']) && isset($_POST['quantite'])) {
        $ref = htmlspecialchars($_GET['ref']);
        $quantite = htmlspecialchars($_POST['quantite']);
        $_SESSION['panier'][$ref] = $quantite;
    }
}

function modifieProduitPanier() {

}

function supprimeProduitPanier() {

}

?>