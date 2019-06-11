<?php 
include("modele/requeteUtilisateur.php");
if (isset($_SESSION['mail'])) { 
  echo '<p id="bjr">Bonjour '.recupereInfo( $bdd, $_SESSION["mail"], "prenom").'!</p>';
  echo '<span id="btn_accueil" onclick="comfirmDeco();"> <img src = "vue/img/logo.png" 
    onmouseover="this.src=\'vue/img/logoPoussin.gif\';" onmouseout="this.src=\'vue/img/logo.png\';" 
    height="100" alt="logo"/> </span><br>';
  echo '<span id="deconnecte" onclick="retour();"><img src = "vue/img/deconnect.png" height="20"/></span>';

  if (substr($_SESSION['mail'], -9)!= "@urban.fr"){
    echo '<span id="panier"><a href="index.php?page=panier"><img src = "vue/img/boutique.png" height="30" title="Panier"/></a></span>';
  }
} else {
  echo '<span id="btn_accueil" onclick="retour();"> <img src = "vue/img/logo.png" 
    onmouseover="this.src=\'vue/img/logoPoussin.gif\';" onmouseout="this.src=\'vue/img/logo.png\';" 
    height="100" alt="logo"/> </span><br>';
}

if (isset($_GET["page"])){
  if ($_GET["page"]== 'actualite'){
    echo 'Notre actualité';
  } else if ($_GET["page"]== 'admin_actu'){
    echo 'Gestion des actualités';
  }else if ($_GET["page"]== 'admin_boutique'){
    echo 'Gestion de notre boutique';
  }else if ($_GET["page"]== 'admin_forum'){
    echo 'Gestion de notre forum';
  }else if ($_GET["page"]== 'admin_gestionUtilisateurs'){
    echo 'Gestion des utilisateurs';
  }else if ($_GET["page"]== 'admin_stat'){
    echo 'Statistiques sur le site';
  }else if ($_GET["page"]== 'boutique'){
    echo 'Boutique';
  }else if ($_GET["page"]== 'commande'){
    echo 'Gerez vos capteurs';
  }else if ($_GET["page"]== 'consommation'){
    echo 'Observez vos données';
  }else if ($_GET["page"]== 'contact'){
    echo 'Contactez notre équipe';
  }else if ($_GET["page"]== 'discussion'){
    echo 'Prenez contact avec le communauté';
  }else if ($_GET["page"]== 'forum'){
    echo 'Questions courantes';
  }else if ($_GET["page"]== 'inscription'){
    echo 'Rejoignez notre communauté';
  }else if ($_GET["page"]== 'panier'){
    echo 'Votre liste d\'achat';
  }else if ($_GET["page"]== 'profil'){
    echo 'Vos informations personnelles';
  }else if ($_GET["page"]== 'admin_message'){
    echo 'Gestion des discussions';
  }else if ($_GET["page"]== 'message'){
    echo 'Vos echanges avec les administrateurs';
  }
}
echo '<br> ';



?>

<script>
function comfirmDeco(){
  var txt;
  var r = confirm("Etes vous sûr de vouloir continuer ? Retourner à l'accueil va vous déconnecter ");
  if(r==true){
    document.location.href = "index.php";
  }
}

function retour(){
    document.location.href = "index.php";
}
</script>

