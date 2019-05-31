<?php 
    function recupereSujet(PDO $bdd, String $id) {
        $req = $bdd->prepare("SELECT * FROM annonce INNER JOIN utilisateur ON annonce.mail_utilisateur = utilisateur.email WHERE id=?");
        $req->execute(array($id));
        $row = $req->fetch();
        echo $row['sujet'];
        echo "<br>";
        echo "posté par ".$row['prenom']; 
    }
    
    function recupereCom(PDO $bdd, String $id_annonce) {
        $requete = $bdd->prepare("SELECT * FROM commentaire INNER JOIN utilisateur ON commentaire.mail_utilisateur = utilisateur.email WHERE id_annonce=? ORDER BY id_annonce DESC");
        $requete->execute(array($id_annonce));

        while ($row=$requete->fetch()){
            echo "Reponse de : ".$row['prenom'];
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