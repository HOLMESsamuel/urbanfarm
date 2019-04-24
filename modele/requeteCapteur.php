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

    function changeStateCapteur(PDO $bdd, String $state, String $n°capteur){
        $req = $bdd->prepare("UPDATE capteur SET etat=? WHERE n°capteur=?");
        if($state == 'false'){
            $newState = 'off';
        } else {
            $newState = 'on';   
        }
        $req->execute(array($newState, $n°capteur));
    }

    function changeStateActionneur(PDO $bdd, String $state, String $n°actionneur){
        $req = $bdd->prepare("UPDATE actionneur SET etat=? WHERE n°actionneur=?");
        if($state == 'false'){
            $newState = 'off';
        } else {
            $newState = 'on';   
        }
        $req->execute(array($newState, $n°actionneur));
    }
?>