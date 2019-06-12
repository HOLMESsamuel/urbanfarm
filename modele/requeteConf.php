<?php 

function valMail (PDO $bdd, String $input_mail, String $input_code){
    $requete=$bdd->prepare("SELECT * FROM utilisateur WHERE email=?");
    $requete->execute(array($input_mail));
    $row=$requete->fetch();
    if (exist($bdd, $input_mail)==0){
        echo "Email inconu";
    } else if ($row['etat']=='confirme'){
        echo "Email déja confirmé";
    } else if (!($row['code_validation']==$input_code)){
        echo "Code de validation erroné";
    } else {
        $req=$bdd->prepare("UPDATE utilisateur SET is_mail_conf = 'oui' WHERE email=?");
        $req->execute(array($input_mail));
        echo "Votre Email a bien été confirmé";
    } 
    
}

function exist (PDO $bdd, String $mail ) : String{
    $requete=$bdd->prepare("SELECT COUNT(*) FROM utilisateur WHERE email=?");
    $requete->execute(array($mail));
    $nb=$requete->fetch()[0];
    return $nb ;
    
}



