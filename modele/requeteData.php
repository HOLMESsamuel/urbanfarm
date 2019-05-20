<?php
function dernierTimestamp(PDO $bdd): int {
    $req = $bdd->prepare("SELECT * FROM data ORDER BY n°data DESC");
    $req->execute();
    return ($req->fetch()["timestamp"]);
}

function ajoutData(PDO $bdd, int $timestamp, int $typeCapteur, int $valeur){
    $req = $bdd->prepare("INSERT INTO data(n°capteur, timestamp, valeur) VALUES (?,?,?)");
    $req->execute(array("45", $timestamp, $valeur));
}