
<?php
    function recupereContenu(PDO $bdd, String $contenu){
        $req = $bdd->prepare("SELECT contenu FROM questions");
        $req->execute(array($contenu));
        $row=$req->fetch();
        echo "<a class='contenu'>".substr($row['contenu'],0,200)."</a>";
    }

    function recupereQuestion(PDO $bdd){ //recupere tous les titres avec leur date
        $req="SELECT question FROM questions";
        $quest=$bdd->query($req);
        $req->execute(array($quest));
        $row=$req->fetch();
        echo "<a class='question'>".substr($row['question'],0,200)."</a>";
    }
?>