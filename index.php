<?php
//On démarre la session
session_start();

 
//on se connecte à la bdd
include("modele/connexion.php");
 
 
//On inclut la vue si elle existe et si elle est spécifiée
if (!empty($_GET['page']) && is_file('vue/page_'.$_GET['page'].'.php'))
{
        include 'vue/page_'.$_GET['page'].'.php';
}
else
{
        session_destroy();
        session_start();
        include 'vue/page_accueil.php';
        
}
 

