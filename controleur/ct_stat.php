<?php
include("../modele/connexion.php");
$req = $bdd->prepare("SELECT COUNT(*) FROM visite GROUP BY SUBSTRING(timestamp, 7, 2)");
$req->execute();
$nombre = array();
while($row = $req->fetch()){
    array_push($nombre, $row[0]);
}

$req2 = $bdd->prepare("SELECT timestamp FROM visite GROUP BY SUBSTRING(timestamp, 7, 2)");
$req2->execute();
$date = array();
while($row = $req2->fetch()){
    array_push($date, substr($row[0], 6, 2)."/".substr($row[0], 4, 2));
}

$reponse = array();
for($i=0; $i<count($nombre); $i++){
    $buffer = array();
    array_push($buffer, $nombre[$i]);
    array_push($buffer, $date[$i]);
    array_push($reponse, $buffer);
}

echo json_encode($reponse);
 