<?php

function addVal(PDO $bdd, String $titre, String $contenu, String $date) {
    $requete=$bdd->prepare("INSERT INTO article(titre, contenu, date) VALUES (?, ?, ?)");
    $requete->execute(array($titre, $contenu, $date));
}

function suppVal(PDO $bdd, String $ref) {
    $requete=$bdd->prepare("DELETE FROM article WHERE n°article=?");
    $requete->execute(array($ref));
}
    
function cherVal(PDO $bdd, String $ref) {
    $requete=$bdd->prepare("SELECT * FROM article WHERE n°article=?");
    $requete->execute(array($ref));
    $row=$req->fetch();
    echo $row['titre'];
    echo "&&";
    echo $row['contenu'];
}

function modVal(PDO $bdd, String $ref, String $titre, String $contenu) {
    $requete=$bdd->prepare("UPDATE article SET titre = ? AND contenu = ? WHERE n°article=?");
    $requete->execute(array($titre, $contenu, $ref));
    echo $ref."modif";
}
?>