<?php 
    function ajoutInstallation(PDO $bdd, String $nom, String $type, String $adresse, String $mail){
        $req = $bdd->prepare("INSERT INTO installation(nom, type, adresse, email) VALUES (?,?,?,?)");
        $req->execute(array($nom, $type, $adresse, $mail));
    }

    function derniereInstallation(PDO $bdd): int {
        $dernierIndice = $bdd->lastInsertId();
        return $dernierIndice;
    }

    function recupereInfoInstall(PDO $bdd, String $mail, String $info): String {
        $req = $bdd->prepare("SELECT ".$info." FROM installation WHERE email=?");
        $req->execute(array($mail));
        $row = $req->fetch();
        return $row[$info];
    }
?>