<?php 
    function recupereSujet(PDO $bdd, String $id) {
        $req = $bdd->prepare("SELECT * FROM annonce WHERE id=?");
        $req->execute(array($id));
        $row = $req->fetch();
        echo $row['sujet'];
        echo "<br>";
        echo "posté par ".$row['mail_utilisateur'];
    }
    
    function recupereCom(PDO $bdd, String $id_annonce) {
        $requete = $bdd->prepare("SELECT * FROM commentaire WHERE id_annonce=?");
        $requete->execute(array($id_annonce));

        while ($row=$requete->fetch()){
            echo "Reponse de : ".$row['mail_utilisateur'];
            echo '<br>';
            echo $row['texte'];
            echo '<br><br>';
        }
    }

    function postCom(PDO $bdd, String $id_annonce, String $com, String $mail){
        $requete=$bdd->prepare("INSERT INTO commentaire(id_annonce, texte, mail_utilisateur) VALUES (?, ?, ?)");
        $requete->execute(array($id_annonce, $com, $mail));
    }

    function postSuj(PDO $bdd, String $sujet, String $mail){
        $requete=$bdd->prepare("INSERT INTO annonce(sujet, mail_utilisateur) VALUES (?, ?)");
        $requete->execute(array($sujet, $mail));
    }
?>