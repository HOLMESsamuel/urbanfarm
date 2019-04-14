<?php
    include("connexion.php");

    /**
     * recupere le contennu de l'article dont le titre est celui entré en paramètre
     */
    function recupereArticle(PDO $bdd, String $titre){
        $req = $bdd->prepare("SELECT * FROM article WHERE titre=?");
        $req->execute(array($titre));
        $row=$req->fetch();
        echo "<br><a class='titre' id=".$row['titre']." onclick='nouvelleActu();' >".$row['titre']."</a>";
        echo " ";
        echo "<a class='date'>".$row['date']."</a>";
        echo "<br>";
        echo "<a class='contenu'>".substr($row['contenu'],0,100)."</a>";
        echo "... <br>";
    }


    function recupereTitre(PDO $bdd){ //recupere tous les titres avec leur date
        $req="SELECT * FROM article";
        $resultat=$bdd->query($req);
        $n=0;
        while ($row=$resultat->fetch()){
            $n=$n+1;
            echo "<a class='titre' id=".$row['titre']." onclick='nouvelleActu();' href='titre.$n'>".$row['titre']."</a>";
            echo " ";
            echo "<a class='date'>".$row['date']."</a>";
            echo "<br>";
            echo "<a class='contenu'>".substr($row['contenu'],0,100)."</a>";
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