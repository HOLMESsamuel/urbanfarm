<?php 
session_start();
if(isset($_SESSION['mail'])){
  echo '<span id="btn_accueil" onclick="comfirmDeco();"> <img src = "img/logo.png" height="100" alt="logo"/> </span>';
} else {
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

