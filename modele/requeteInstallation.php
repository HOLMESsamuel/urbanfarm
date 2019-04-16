<?php 
    function ajoutInstallation(PDO $bdd, String $nom, String $type, String $adresse, String $mail){
        $req = $bdd->prepare("INSERT INTO installation(nom, type, adresse, email) VALUES (?,?,?,?)");
        $req->execute(array($nom, $type, $adresse, $mail));
    }

    function derniereInstallation(PDO $bdd): int {
        $dernierIndice = $bdd->lastInsertId();
        return $dernierIndice;
    }

    function recupereInfoInstall(PDO $bdd, String $mail, String $info, Int $numero): String {
        $req = $bdd->prepare("SELECT ".$info." FROM installation WHERE email=?");
        $n = 0;
        $req->execute(array($mail));
        while ($n<$numero){
            $row = $req->fetch();
            $n = $n+1; 
        }
        $row = $req->fetch();
        return $row[$info];
    }

    function recupereCapteurInstall(PDO $bdd, String $numero) {
        $req = $bdd->prepare("SELECT type FROM capteur WHERE n°installation=?");
        $req->execute(array($numero));
        while($row = $req->fetch()){
            echo $row["type"];
            echo " ";
        }  
    }

    function recupereActionneurInstall(PDO $bdd, String $numero) {
        $req = $bdd->prepare("SELECT type FROM actionneur WHERE n°installation=?");
        $req->execute(array($numero));
        while($row = $req->fetch()){
            echo $row["type"];
            echo " ";
        }  
    }

    function supprimerInstallation(PDO $bdd, String $numero){
        $req = $bdd->prepare("DELETE FROM installation WHERE n°installation = ?");
        $req->execute(array($numero));
    }

    function recupereInfoCapteur(PDO $bdd, String $mail, String $info, Int $numero): String {
        $req = $bdd->prepare("SELECT capteur.".$info." FROM capteur 
        INNER JOIN installation ON capteur.n°installation = installation.n°installation WHERE email=?");
        $n = 0;
        $req->execute(array($mail));
        while ($n<$numero){
            $row = $req->fetch();
            $n = $n+1; 
        }
        $row = $req->fetch();
        return $row[$info];
    }

    function recupereInfoActionneur(PDO $bdd, String $mail, String $info, Int $numero): String {
        $req = $bdd->prepare("SELECT actionneur.".$info." FROM actionneur 
        INNER JOIN installation ON actionneur.n°installation = installation.n°installation WHERE email=?");
        $n = 0;
        $req->execute(array($mail));
        while ($n<$numero){
            $row = $req->fetch();
            $n = $n+1; 
        }
        $row = $req->fetch();
        return $row[$info];
    }
?>