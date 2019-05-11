<?php 
session_start();

include("../modele/requeteContact.php");

if(isset($_SESSION['mail'])){
    $titre = htmlspecialchars($_POST['titre']); 
    $texte = htmlspecialchars($_POST['texte']); 
    $mail = htmlspecialchars($_POST['mail']);;
} else {
    echo "il faut être connecté pour envoyer un message";
}

if(!empty($_POST['mail']) AND !empty($_POST['titre']) AND !empty($_POST['texte'])){
    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        echo "Adresse mail incorrecte";
    }
    else {
        try {
            $header = "MIME-Version: 1.0\r\n";
            $header.='From:"urbanfarm.fr"<'.$mail.'>'."\n";
            $header.='Content-Type:text/html; charset="utf-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';

            $message='
            <html>
                <body>
                    <div align="center">
                    '.$texte.'
                    <br>
                    </div>
                </body>
            </html>
            ';

            mail("sam.holmes@live.fr", $titre, $message, $header);
            echo "ok";
        } catch (Exception $e) {
            echo $e;
        }
    }

} else {
    echo "tous les champs doivent être remplis";
}
?>