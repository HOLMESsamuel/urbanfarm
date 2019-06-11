<?php
function dernierTimestamp(PDO $bdd): int {
    $req = $bdd->prepare("SELECT * FROM data ORDER BY n°data DESC");
    $req->execute();
    return ($req->fetch()["timestamp"]);
}

function ajoutData(PDO $bdd, int $timestamp, String $numeroCapteur, int $valeur){
    $req = $bdd->prepare("INSERT INTO data(n°capteur, timestamp, valeur) VALUES (?,?,?)");
    $req->execute(array($numeroCapteur, $timestamp, $valeur));
}

function numeroCapteur(PDO $bdd, String $mail):array {
    $req = $bdd->prepare("SELECT * FROM installation INNER JOIN capteur ON installation.n°installation = capteur.n°installation WHERE email = ? AND etat = ?");
    $req->execute(array($mail, "on"));
    $resultat = array();
    while($row = $req->fetch()){
        array_push($resultat, $row["n°capteur"]);
    }
    return $resultat;
}