<?php 
    function ajoutCapteur(PDO $bdd, String $type, String $etat, int $n°installation){
        $req = $bdd->prepare("INSERT INTO capteur(type, etat, n°installation) VALUES (?,?,?)");
        $req->execute(array($type, $etat, $n°installation));
    }

    function ajoutActionneur(PDO $bdd, String $type, String $etat, int $n°installation){
        $req = $bdd->prepare("INSERT INTO actionneur(type, etat, n°installation) VALUES (?,?,?)");
        $req->execute(array($type, $etat, $n°installation));
    }

    function supprimerCapteur(PDO $bdd, String $numero){
        $req = $bdd->prepare("DELETE FROM capteur WHERE n°installation = ? ");
        $req->execute(array($numero)); 
    }

    function supprimerActionneur(PDO $bdd, String $numero){
        $req = $bdd->prepare("DELETE FROM actionneur WHERE n°installation = ? ");
        $req->execute(array($numero)); 
    }
?>