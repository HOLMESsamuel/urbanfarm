<?php
include("../modele/requeteActualites.php");

// php search data in mysql database using PDO
// set data in input text

// connect to mysql
try {
    $pdoConnect = new PDO('mysql:host=localhost;dbname=urbanfarm;charset=utf8', 'root', '');
} catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
}

// id to search
$id = $_POST['id'];

if (strlen($id)<3){
    echo 'Recherche trop courte';
} else {
    // mysql search query
    $pdoQuery = $pdoConnect->prepare('SELECT * FROM article WHERE titre LIKE LOWER(:id) OR contenu  LIKE LOWER(:id)');
    $pdoQuery->execute(array(':id' => '%'.strtolower($id).'%', ':id' => '%'.strtolower($id).'%'));
    
    // if id exist 
    // show data in inputs
    $n=$pdoQuery->rowCount();
    if($n>0) {
        foreach($pdoQuery as $row) {
            echo recupereArticle($pdoConnect, $row['titre']);
        }
    }
    // if the id not exist
    // show a message and clear inputs
    else{
        echo 'Pas d articles corespondant';
    }
}
?>