<?php
    function ajoutUtilisateur(PDO $bdd, String $mail, String $nom, String $prenom, String $civilite, String $adresse, String $mdp){
        $req = $bdd->prepare('INSERT INTO utilisateur(email, nom, prenom, civilité, adresse, motdepasse, administrateur) VALUES (?,?,?,?,?,?,?)');
        $req->execute(array($mail,$nom,$prenom,$civilite,$adresse,$mdp,"non"));
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
            SET administrateur = 'oui'
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

    function modifProfil(PDO $bdd, String $mail, String $prenom, String $nom, String $adresse){
        $req = $bdd->prepare("UPDATE utilisateur SET prenom=?, nom=?, adresse=? WHERE email=?");
        $req->execute(array($prenom, $nom, $adresse, $mail));
    }

    function modifMdp(PDO $bdd, String $mail, String $mdp){
        $req = $bdd->prepare("UPDATE utilisateur SET motdepasse=? WHERE email=?");
        $req->execute(array($mdp, $mail));
    }
    
?>