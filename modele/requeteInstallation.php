<?php 
    function ajoutInstallation(PDO $bdd, String $nom, String $type, String $adresse, String $mail){
        $req = $bdd->prepare("INSERT INTO installation(nom, type, adresse, mail) VALUES (?,?,?,?)");
        $req->execute(array($nom, $type, $adresse, $mail));
    }

    function derniereInstalation(PDO $bdd): int {
        $req = $bdd->prepare('SELECT MAX(n°installation) FROM installation');
    }
?>