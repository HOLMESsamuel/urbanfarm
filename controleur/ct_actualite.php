<?php 
 include("../modele/requeteActualites.php"); 
 function afficheDernierTitre($bdd){
     echo dernierTitre($bdd);
 }

 function afficheDernierArticle($bdd) {
     echo dernierArticle($bdd);
 }


?>