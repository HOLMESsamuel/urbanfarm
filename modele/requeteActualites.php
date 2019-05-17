<?php
    include("connexion.php");

    /**
     * recupere le contennu de l'article dont le titre est celui entré en paramètre
     */
    function recupereArticle(PDO $bdd, String $titre){
        $req = $bdd->prepare("SELECT * FROM article WHERE titre=?");
        $req->execute(array($titre));
        $row=$req->fetch();
        echo "<br><a class='titre' id=".$row['n°article']." >".$row['titre']."</a>";
        echo " ";
        echo "<a class='date'>".$row['date']."</a>";
        echo "<br>";
        echo "<a class='contenu'>".substr($row['contenu'],0,100)."</a>";
        echo "... <br>";
    } 

    function getUnArticle(PDO $bdd, String $numArticle){
        $req = $bdd->prepare("SELECT * FROM article WHERE n°article=?");
        $req->execute(array($numArticle));
        $row=$req->fetch();
        echo $row['titre'];
        echo "&&";
        echo $row['contenu']; 
    }

    function recupereTitre(PDO $bdd){ //recupere les cinq premiers titres avec leur date
        $req="SELECT * FROM article";
        $resultat=$bdd->query($req);
        $n=0;
        while ($row=$resultat->fetch() AND $n<5){
            $n=$n+1;
            echo "<a class='titre' id=".$row['n°article'].">".$row['titre']."</a>";
            echo " ";
            echo "<a class='date'>".$row['date']."</a>";
            echo "<br>";
            echo "<a class='contenu'>".substr($row['contenu'],0,80)."</a>";
            echo "... <br>";
        }
    }
    /**
     * compte le nombre d'articles 
     * parcours les articles et renvoie le titre du dernier ajouté
     */
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
    /**
     * compte le nombre d'articles 
     * parcours les articles et renvoie le contenu du dernier ajouté
     */
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