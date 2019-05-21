<?php 
 
 include("modele/requeteActualites.php");

 function afficheDernierTitre($bdd){
    echo dernierTitre($bdd);
 }

 function afficheDernierArticle($bdd) {
    echo dernierArticle($bdd);
 }

try {
    if (!empty($_POST["numArticle"])){
      include("../modele/connexion.php");  
        include("../modele/requeteActualites.php");
        $numArticle = $_POST["numArticle"];
        echo $numArticle;
        echo "&&";
        getUnArticle($bdd, $numArticle);
     }
} catch (Exception $e){
    echo $e;
}
 

?>