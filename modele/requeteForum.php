<?php 
    function shownom(PDO $bdd, String $n_question) {
        $req = $bdd->prepare("SELECT * FROM questions WHERE n_question=?");
        $req->execute(array($n_question));
        $row = $req->fetch();
        echo $row['nom'];
        echo '<br>';
    }
    
    function showcontenu(PDO $bdd, String $n_question) {
        $requete = $bdd->prepare("SELECT * FROM questions WHERE n_question=?");
        $requete->execute(array($n_question));
        $row = $req->fetch();
            echo $row['contenu'];
    }
?>