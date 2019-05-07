<?php

function myFunction() {
    $requete=$bdd->prepare("INSERT INTO produit(type, description, prix) VALUES (?, ?, ?)");
        $requete->execute(array($nom, $description, $prix));
    }
    
?>