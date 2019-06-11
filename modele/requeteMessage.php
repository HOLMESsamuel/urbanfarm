<?php 

function afficheMsg(PDO $bdd, String $mail) {
    $req=$bdd->prepare("SELECT * FROM conversation WHERE mail_utilisateur=?");
    $req->execute(array($mail));  
    $nb=$req->fetch();

    $req2=$bdd->prepare("SELECT * FROM messages WHERE id_conv=? ORDER BY id DESC");
    $req2->execute(array($nb['id'])); 
    while ($row= $req2->fetch()) {
        if ($row['admin']=='oui'){
            echo "Admin :<br>";
        } else {
            echo recupereInfo($bdd, $mail, 'nom')." ".recupereInfo($bdd, $mail,'prenom')." :<br>";
        }        
        echo $row['texte']."<br><br>";
    }
}

function nvMsg (PDO $bdd, String $mail, String $texte, String $date){
    $req=$bdd->prepare("SELECT * FROM conversation WHERE mail_utilisateur=?");
    $req->execute(array($mail));  
    $nb=$req->fetch();

    $req = $bdd->prepare("INSERT INTO `messages` (`texte`, `admin`, `id_conv`, `lu`, `date`) 
    VALUES (?, 'non', ?, 'non', ?);");
        $req->execute(array($texte, $nb['id'], $date));
        
}
