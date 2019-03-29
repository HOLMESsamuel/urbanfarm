<?php
    include("connexion.php");

    function recupereTitre(PDO $bdd){
        $req=$bdd->prepare("SELECT titre FROM article ORDER BY date");
        $req->excute;
    }

    function recupereDate(PDO $bdd){
        $req=$bdd->prepare("SELECT date FROM article");
        $req->excute;
    }
    function recupereArticle(PDO $bdd){
        $req="SELECT * FROM article";
        $resultat=$bdd->query($req);
        while ($row=$resultat->fetch()){
            echo "<a href='titre'>".$row['titre']."</a>";
            echo " ";
            echo "<a href='date'>".$row['date']."</a>";
            echo "<br>";
        }
    }

?>