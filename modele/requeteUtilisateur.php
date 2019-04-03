<?php
    function ajoutUtilisateur(PDO $bdd, String $mail, String $nom, String $prenom, String $civilite, String $adresse, String $mdp){
        $req = $bdd->prepare('INSERT INTO utilisateur(email, nom, prenom, civilité, adresse, motdepasse, propriétaire) VALUES (?,?,?,?,?,?,?)');
        $req->execute(array($mail,$nom,$prenom,$civilite,$adresse,$mdp,"non"));
    }

    function estInscrit(PDO $bdd, $mail, $mdp): bool {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=? AND motdepasse=?");
		$req->execute(array($mail,$mdp));
        $exist = $req->rowCount();
        return ($exist == 1);
    }

    function estAdmin(PDO $bdd, String $mail):bool {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=? AND administrateur=?");
        $req->execute(array($mail, "oui"));
        $exist = $req->rowCount();
        return ($exist == 1);
    }

    function mailDejaPris(PDO $bdd, String $mail):bool {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=?");
        $req->execute(array($mail));
        $exist = $req->rowCount();
        return ($exist == 1);
    }
?>