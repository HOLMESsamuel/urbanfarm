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

/**
 * modifie la quantite d'un article du panier
 */
function modifieProduitPanier() {
    if (isset($_GET['plus'])) {
        $ref = htmlspecialchars($_GET['plus']);
        $_SESSION['panier'][$ref] += 1; //incremente la quantite de l'acticle
    }
    if (isset($_GET['moins'])) {
        $ref = htmlspecialchars($_GET['moins']);
        $_SESSION['panier'][$ref] -= 1; //decremente la quantite de l'article
        //si la quantite est nulle
        if ($_SESSION['panier'][$ref] == 0) {
            unset($_SESSION['panier'][$ref]); //supprime l'article du panier
        }
    }
}

/**
 * supprime un article du panier
 */
function supprimeProduitPanier() {
    if (isset($_GET['supprimer'])) {
        $ref = htmlspecialchars($_GET['supprimer']);
        unset($_SESSION['panier'][$ref]);
    }
}

?>