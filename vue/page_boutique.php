<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8>
    <title> Urban Farm</title>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="stylesheet" href="style/style_boutique.css"/>
</head>
<header>
    <?php include("elem/elem_entete.php"); ?>
    <?php include("../controleur/ct_boutique.php"); ?>
</header>

<body>
<div class="container">
    <div id="col1">
        <?php include("elem/elem_menu.php"); ?>
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

        <a href="page_panier.php">Panier</a>

        <?php while ($produit = $req->fetch()) {
            echo
                '<div class="box_product"> 
                    <h1>' . $produit['type'] . '</h1>
                    <h3 class="ref"> ref ' . $produit['n°produit'] . '</h3>
                    <div class="information">
                        <div class="photo">
                        </div>
                        <p class="description">' . $produit['description'] . '</p>
                        <div class="achat">
                            <h2>' . $produit['prix'] . '€</h2>
                            <form method="post" action="page_panier.php?ref='.$produit['n°produit'].'">
                                <label>
                                    unités<input type="number" name="number" id="number" min="1" max="99" step="1" value="1">
                                </label>
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
    <?php include("elem/elem_pied.php"); ?>
</footer>
</html>