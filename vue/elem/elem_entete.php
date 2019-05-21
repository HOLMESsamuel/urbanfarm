<?php 
session_start();
 if (isset($_SESSION['mail'])) { 
  echo '<span id="deconnecte" onclick="retour();"><img src = "vue/img/deconnect.png" height="20"/></span>';
  echo '<span id="btn_accueil" onclick="comfirmDeco();"> <img src = "vue/img/logo.png" height="100" alt="logo"/> </span>';
  if (strpos(basename($_SERVER['PHP_SELF']), 'admin') == false){
    echo '<span id="panier"><img src = "vue/img/boutique.png" height="30"/></span>';
  }
} else {
  echo '<span id="btn_accueil" onclick="retour();"> <img src = "vue/img/logo.png" height="100" alt="logo"/> </span>';
}

  



?>

<script>
function comfirmDeco(){
  var txt;
  var r = confirm("Es tu sur de vouloir continuer ? Retourner a l'accueil vas te déconneter ");
  if(r==true){
    document.location.href = "vue/page_accueil.php";
  }
}

function retour(){
    document.location.href = "vue/page_accueil.php";
}
</script>

