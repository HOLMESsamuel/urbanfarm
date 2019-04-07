<?php
    include("connexion.php");

    function recupereArticle(PDO $bdd, String $titre){
        $req="SELECT contenu FROM article WHERE titre=.$titre.";
        $resultat=$bdd->query($req);
        while ($row=$resultat->fetch()){
            echo "<a href='titre'>".$row['titre']."</a>";
        }
    }

    function recupereTitre(PDO $bdd){ //recupere tous les titres avec leur date
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

    function dernierTitre(PDO $bdd): String{
        $req = $bdd->prepare("SELECT * FROM article");
        $req->execute();
        $nbTitre = $req->rowCount();
        while ($nbTitre > 1){
            $row = $req->fetch();
            $nbTitre = $nbTitre-1;
        }
        $row = $req->fetch();
        return $row['titre'];    
    }

    function dernierArticle(PDO $bdd): String {
        $req = $bdd->prepare("SELECT * FROM article");
        $req->execute();
        $nbTitre = $req->rowCount();
        while ($nbTitre > 1){
            $row = $req->fetch();
            $nbTitre = $nbTitre-1;
        }
        $row = $req->fetch();
        return $row['contenu'];
    }

?>