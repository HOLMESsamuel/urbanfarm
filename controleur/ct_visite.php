<?php
$req = $bdd->prepare("SELECT * FROM visite WHERE ip=?");
$req->execute(array($_SERVER['REMOTE_ADDR']));
$date = date('YmdHis', time()); 
$exist = $req->rowCount();
if($exist == 1){
    $maj = $bdd->prepare("UPDATE visite SET timestamp=?,time=? WHERE ip=?");
    $maj->execute(array($date,time(),$_SERVER['REMOTE_ADDR']));
} else {
    $maj = $bdd->prepare("INSERT INTO visite(ip, timestamp, time) VALUES (?,?,?)");
    $maj->execute(array($_SERVER['REMOTE_ADDR'], $date, time()));
}

$sup = $bdd->prepare("DELETE FROM visite WHERE time<?");
$sup->execute(array(time()-24*60*60*7));