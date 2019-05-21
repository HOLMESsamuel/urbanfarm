<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8>
    <title> Urban Farm</title>
    <link rel="stylesheet" href="vue/style/style.css"/>
    <link rel="stylesheet" href="vue/style/style_boutique.css"/>
</head>
<header>
    <?php include("vue/elem/elem_entete.php"); ?>
    <?php include("controleur/ct_boutique.php"); ?>
</header>

<body>
<div class="container">
    <div id="col1">
        <?php include("vue/elem/elem_menu.php"); ?>
        <?php 
        if(isset($_SESSION['mail'])): ?>
            <style>
            .container {
                min-height: 06%;
                margin: 15px;
                display: -ms-grid;
                display: grid;
                -ms-grid-columns: 1fr 4fr;
                grid-template-columns: 1fr 4fr;
            }
            </style>
        <?php else: ?>
            <style>
            .container {
                min-height: 06%;
                margin: 15px;
                display: -ms-grid;
                display: grid;
                -ms-grid-columns: 1fr 150fr ;
                grid-template-columns: 1fr 150fr;
                }
            </style>
        <?php endif ?>
    </div>
    <div id="col2">

        <a href="index.php?page=panier">Votre panier</a>

        <?php while ($produit = $req->fetch()) {
            $type = $produit['type'];
            $ref = $produit['n°produit'];
            $prix = number_format($produit['prix'],2,',',' ');

            echo
                '<div class="box_product"> 
                    <h1>' . $type . '</h1>
                    <h3 class="ref"> ref ' . $ref . '</h3>
                    <div class="information">
                        <img class="photo_produit" src="vue/img/'.strtolower($type).'.jpg" width="200" height="200">
                        <p class="description">' . $produit['description'] . '</p>
                        <div class="achat">
                            <h2>' . $prix . '€</h2>
                            <form method="post" action="index.php?page=panier&ref=' . $ref . '">
                                <label>
                                    unités : <input type="number" name="quantite" id="number" min="1" max="99" step="1" value="1">
                                </label><br>
                                <input type="submit" id="submit" value="Ajouter au panier">
                            </form>
                        </div>
                    </div>
                </div>';
        } ?>
    </div>
</div>
</body>

<footer>
    <?php include("vue/elem/elem_pied.php"); ?>
</footer>
</html>