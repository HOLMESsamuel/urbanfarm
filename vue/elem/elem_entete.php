<?php 
session_start();
 if (strpos(basename($_SERVER['PHP_SELF']), 'admin')==true) { 
  echo '<span id="deconnecte" onclick="retour();"><img src = "img/deconnect.png" height="20"/></span>';
}
 if (isset($_SESSION['mail']) && strpos(basename($_SERVER['PHP_SELF']), 'admin')==false){
  echo '<span id="panier"><img src = "img/boutique.png" height="30"/></span>';
}
 if (basename($_SERVER['PHP_SELF'])== 'page_accueil.php' || isset($_SESSION['mail'])) {
  echo '<span id="btn_accueil" onclick="retour();"> <img src = "img/logo.png" height="100" alt="logo"/> </span>';
}


?>

<script>
function comfirmDeco(){
  var txt;
  var r = confirm("Es tu sur de vouloir continuer ? Retourner a l'accueil vas te déconneter ");
  if(r==true){
    document.location.href = "./page_accueil.php";
  }
}

function retour(){
    document.location.href = "./page_accueil.php";
}
</script>

