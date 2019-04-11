<?php 
    function ajoutCapteur(PDO $bdd, String $type, String $etat, int $n°installation){
        $req = $bdd->prepare("INSERT INTO capteur(type, etat, n°installation) VALUES (?,?,?)");
        $req->execute(array($type, $etat, $n°installation));
    }

    function ajoutActionneur(PDO $bdd, String $type, String $etat, int $n°installation){
        $req = $bdd->prepare("INSERT INTO actionneur(type, etat, n°installation) VALUES (?,?,?)");
        $req->execute(array($type, $etat, $n°installation));
    }
?>