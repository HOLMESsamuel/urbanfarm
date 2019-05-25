<?php
    function ajoutUtilisateur(PDO $bdd, String $mail, String $nom, String $prenom, String $civilite, String $adresse, String $mdp){
        $req = $bdd->prepare('INSERT INTO utilisateur(email, nom, prenom, civilité, adresse, motdepasse, administrateur, etat) VALUES (?,?,?,?,?,?,?,?)');
        $req->execute(array($mail,$nom,$prenom,$civilite,$adresse,$mdp,"non","attente"));
    }

    /**
     * compte le nombre de lignes de la tablee utilisateur dont el mail et le mdp sont ceux entrés en paramètre
     * si ce nombre est exactement 1 l'utilisateur est bien inscrit.
     */
    function estInscrit(PDO $bdd, String $mail,String $mdp): bool {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=? AND motdepasse=?");
		$req->execute(array($mail,$mdp));
        $exist = $req->rowCount();
        return ($exist == 1);
    }

    function passageAdmin(PDO $bdd, String $mail) {
        $req = $bdd->prepare("UPDATE utilisateur
            SET administrateur = 'oui', etat= 'confirme'
            WHERE email=?");
        $req->execute(array($mail));
    }

    function estAdmin(PDO $bdd, String $mail):bool {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=? AND administrateur=?");
        $req->execute(array($mail, "oui"));
        $exist = $req->rowCount();
        return ($exist == 1);
    }

    function countUtilisateur(PDO $bdd):int {
        $req = $bdd->prepare("SELECT * FROM utilisateur ");
        $req->execute();
        $nb = $req->rowCount();
        return ($nb);
    }

    function countAdmin(PDO $bdd):int {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE administrateur=?");
        $req->execute(array("oui"));
        $nb = $req->rowCount();
        return ($nb);
    }

    function mailDejaPris(PDO $bdd, String $mail):bool {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=?");
        $req->execute(array($mail));
        $exist = $req->rowCount();
        return ($exist == 1);
    }

    function recupereInfo(PDO $bdd, String $mail, String $info): String {
        $req = $bdd->prepare("SELECT ".$info." FROM utilisateur WHERE email=?");
        $req->execute(array($mail));
        $row = $req->fetch();
        return $row[$info];
    }

    function nbInstallations(PDO $bdd, String $mail): int{
        $req = $bdd->prepare("SELECT * FROM installation WHERE email=?");
        $req->execute(array($mail));
        $nbInstallations = $req->rowCount();
        return $nbInstallations;
    }

    function recupereCapteur(PDO $bdd, String $mail): int{
        $req = $bdd->prepare( "SELECT * FROM capteur 
        INNER JOIN installation ON capteur.n°installation = installation.n°installation WHERE email=?");
        $req->execute(array($mail));
        $nbCapt = $req->rowCount();
        return $nbCapt;
    }
    function supprimeCapteur(PDO $bdd, String $mail){
        $req = $bdd->prepare( "DELETE FROM capteur 
        INNER JOIN installation ON capteur.n°installation = installation.n°installation WHERE email=?");
        $req->execute(array($mail));
    }

    function recupereActionneur(PDO $bdd, String $mail): int{
        $req = $bdd->prepare( "SELECT * FROM actionneur 
        INNER JOIN installation ON actionneur.n°installation = installation.n°installation WHERE email=?");
        $req->execute(array($mail));
        $nbAct = $req->rowCount();
        return $nbAct; 
    }
    function supprimeActionneur(PDO $bdd, String $mail){
        $req = $bdd->prepare( "DELETE FROM actionneur WHERE n°actionneur=(SELECT n°actionneur FROM actionneur
        INNER JOIN installation ON actionneur.n°installation = installation.n°installation WHERE email=?)");
        $req->execute(array($mail));
    }

    function modifProfil(PDO $bdd, String $mail, String $prenom, String $nom, String $adresse){
        $req = $bdd->prepare("UPDATE utilisateur SET prenom=?, nom=?, adresse=? WHERE email=?");
        $req->execute(array($prenom, $nom, $adresse, $mail));
    }

    function modifMdp(PDO $bdd, String $mail, String $mdp){
        $req = $bdd->prepare("UPDATE utilisateur SET motdepasse=? WHERE email=?");
        $req->execute(array($mdp, $mail));
    }

    function estConfirme(PDO $bdd): Int {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE etat=?");
        $req->execute(array( "confirme"));
        $exist = $req->rowCount();
        return $exist;
    }

    function nonConfirme(PDO $bdd): Int {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE etat=?");
        $req->execute(array("attente"));
        $exist = $req->rowCount();
        return $exist;
    }

    function recupereInfoNonConfirme(PDO $bdd, String $info, Int $numero): String{
        $req = $bdd->prepare("SELECT ".$info." FROM utilisateur WHERE etat=?");
        $n = 0;
        $req->execute(array("attente"));
        while ($n<$numero){
            $row = $req->fetch();
            $n = $n+1; 
        }
        $row = $req->fetch();
        return $row[$info];
    }
     function recupereInfoEstConfirme(PDO $bdd, String $info, Int $numero): String{
        $req = $bdd->prepare("SELECT ".$info." FROM utilisateur WHERE etat=?");
        $n = 0;
        $req->execute(array("confirme"));
        while ($n<$numero){
            $row = $req->fetch();
            $n = $n+1; 
        }
        $row = $req->fetch();
        return $row[$info];
    }


    function confirmation(PDO $bdd, String $mail){
        $req = $bdd->prepare("UPDATE utilisateur SET etat=? WHERE email=?");
        $req->execute(array("confirme", $mail));
    }

    function supressionInstallation(PDO $bdd, String $mail){
        $req = $bdd->prepare("DELETE FROM installation WHERE email = ?");
        $req->execute(array($mail));
    }

    function supression(PDO $bdd, String $mail){
        $req = $bdd->prepare("DELETE FROM utilisateur WHERE email = ?");
        $req->execute(array($mail));
    }

    function verifConfirme(PDO $bdd, String $mail):bool{
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ? AND etat=?");
        $req->execute(array($mail, "confirme"));
        return($req->rowCount()==1);
    }
    
?>
