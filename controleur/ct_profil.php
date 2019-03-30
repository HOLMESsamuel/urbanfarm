<?php 
    if(isset($_GET['nouveau'])){
        $message = "compte crée";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>