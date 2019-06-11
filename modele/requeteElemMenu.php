<?php

function nonLu(PDO $bdd) : String {
    $requete = $bdd->prepare("SELECT COUNT(*) FROM messages WHERE lu='non'");
    $requete->execute(array());
    $nb = $requete->fetch()[0];    
    if ($nb==0){
        return " ";
    }else {
        return " (".$nb.")";
    }
}



