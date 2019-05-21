<?php
include("modele/requeteForum.php");
include("modele/connexion.php");

// php search data in mysql database using PDO
// set data in input text
try {
    $pdoConnect = new PDO('mysql:host=localhost;dbname=urbanfarm;charset=utf8', 'root', '');
} catch (PDOException $exc) {
    echo $exc->getMessage();
    exit(); 
}
// connect to mysql
$ques = $_POST['id'];

if (strlen($ques)<3) {
    echo 'Recherche trop courte';
} else {
    // mysql search query
    $pdoQuery = $pdoConnect->prepare('SELECT * FROM questions WHERE contenu LIKE LOWER(:id)');
    $pdoQuery->execute(array(':id' => '%'.strtolower($ques).'%', ':id' => '%'.strtolower($ques).'%'));
    
    // if id exist 
    // show data in inputs
    $n=$pdoQuery->rowCount();
    if ($n>0) {
        foreach($pdoQuery as $row) {
            echo recupereArticle($pdoConnect, $row['titre']);
        }
    }
    // if the id not exist
    // show a message and clear inputs
    else {
        echo 'Pas d articles corespondant';
    }
}

?>