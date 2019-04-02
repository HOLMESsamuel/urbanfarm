<?php
    include("connexion.php");

    function recupereArticle(PDO $bdd, String $titre){
        $req="SELECT contenu FROM article WHERE titre=.$titre.";
        $resultat=$bdd->query($req);
        while ($row=$resultat->fetch()){
            echo "<a href='titre'>".$row['titre']."</a>";
        }
    }

    function recupereTitre(PDO $bdd){
        $req="SELECT * FROM article";
        $resultat=$bdd->query($req);
        $n=0;
        while ($row=$resultat->fetch()){
            $n=$n+1;
            echo "<a class='titre' href='titre.$n'>".$row['titre']."</a>";
            echo " ";
            echo "<a class='date'>".$row['date']."</a>";
            echo "<br>";
            echo "<a class='contenu'>".substr($row['contenu'],0,100)."</a>";
            echo "... <br>";
        }
    }

    function dernierTitre(PDO $bdd){
        $req="SELECT COUNT(*) FROM article ";
        $dernierTitre=$bdd->query($req);
        $row=$dernierTitre->fetch();
        echo $row;
        $req="SELECT titre FROM article WHERE n°article=.$row";
        $resultat=$bdd->query($req);
        $row=$resultat->fetch();
        echo $row;
    }

?>