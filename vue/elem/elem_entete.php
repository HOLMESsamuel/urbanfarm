<?php 
 if (isset($_SESSION['mail'])) { 
  echo '<span id="deconnecte" onclick="retour();"><img src = "vue/img/deconnect.png" height="20"/></span>';
  echo '<span id="btn_accueil" onclick="comfirmDeco();"> <img src = "vue/img/logo.png" 
    onmouseover="this.src=\'vue/img/logoPoussin.gif\';" onmouseout="this.src=\'vue/img/logo.png\';" 
    height="100" alt="logo"/> </span>';
  if (strpos(basename($_SERVER['PHP_SELF']), 'admin') == false){
    echo '<span id="panier"><a href="index.php?page=panier"><img src = "vue/img/boutique.png" height="30" title="Panier"/></a></span>';
  }
} else {
  echo '<span id="btn_accueil" onclick="retour();"> <img src = "vue/img/logo.png" 
    onmouseover="this.src=\'vue/img/logoPoussin.gif\';" onmouseout="this.src=\'vue/img/logo.png\';" 
    height="100" alt="logo"/> </span>';
}

  



?>

<script>
function comfirmDeco(){
  var txt;
  var r = confirm("Es tu sur de vouloir continuer ? Retourner a l'accueil vas te déconneter ");
  if(r==true){
    document.location.href = "index.php";
  }
}

function retour(){
    document.location.href = "index.php";
}
</script>

