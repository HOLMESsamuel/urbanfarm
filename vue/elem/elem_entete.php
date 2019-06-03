<?php 
 if (isset($_SESSION['mail'])) { 
  echo '<span id="deconnecte" onclick="retour();"><img src = "vue/img/deconnect.png" height="20"/></span>';
  echo '<span id="btn_accueil" onclick="comfirmDeco();"> <img src = "vue/img/logo.png" 
    onmouseover="this.src=\'vue/img/logoPoussin.gif\';" onmouseout="this.src=\'vue/img/logo.png\';" 
    height="100" alt="logo"/> </span>';
    
  if (!substr($_SESSION['mail'], -9)== "@urban.fr"){
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
  var r = confirm("Etes vous sûr de vouloir continuer ? Retourner à l'accueil va vous déconnecter ");
  if(r==true){
    document.location.href = "index.php";
  }
}

function retour(){
    document.location.href = "index.php";
}
</script>

