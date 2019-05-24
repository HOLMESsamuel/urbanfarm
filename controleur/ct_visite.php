<?php
$ip = $_SERVER['REMOTE_ADDR'];
$req = $bdd->prepare("SELECT * FROM visite WHERE ip=?");
$req->execute(array($ip));
$date = date('YmdHis', time()); 
$exist = $req->rowCount();

if($exist == 1){
    $visiteur = $req->fetch();
    if($visiteur["time"]<time()-24*60*60){
        $maj = $bdd->prepare("INSERT INTO visite(ip, timestamp, time) VALUES(?,?,?)");
        $maj->execute(array($ip, $date, time()));
    }  
} else {
    $maj = $bdd->prepare("INSERT INTO visite(ip, timestamp, time) VALUES (?,?,?)");
    $maj->execute(array($ip, $date, time()));
}

$sup = $bdd->prepare("DELETE FROM visite WHERE time<?");
$sup->execute(array(time()-24*60*60*7));