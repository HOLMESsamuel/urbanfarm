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
</header>

<body>
<div class="container">
    <div id="col1">
        <?php include("elem/elem_menu.php"); ?>
    </div>
    <div id="col2">

        <!-- cellule d'un produit de la boutique -->
        <div class="box_product">
            <!-- intitule du produit -->
            <h1>Lorem Ipsum</h1>
            <!-- numero de reference -->
            <h3>ref 0000</h3>
            <!-- contenu descriptif du produit -->
            <div class="information">
                <!-- case representant la photo du produit -->
                <div class="photo">
                </div>
                <!-- description du produit -->
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <!-- partie liee a l'achat -->
                <div class="achat">
                    <!-- prix du produit -->
                    <h2>00,00€</h2>
                    <form method="post" action="">
                        <!-- possibilite de choisir le nombre d'unites du produit -->
                        <label>
                            unités<input type="number" name="number" id="number1" min="1" max="99" step="1">
                        </label>
                        <!-- bouton 'Ajouter au panier' -->
                        <input type="submit" id="submit1" value="Ajouter au panier">
                    </form>
                </div>
            </div>
        </div>

        <!-- cellule d'un produit de la boutique -->
        <div class="box_product">
            <!-- intitule du produit -->
            <h1>Lorem Ipsum</h1>
            <!-- numero de reference -->
            <h3>ref 0000</h3>
            <!-- contenu descriptif du produit -->
            <div class="information">
                <!-- case representant la photo du produit -->
                <div class="photo">
                </div>
                <!-- description du produit -->
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <!-- partie liee a l'achat -->
                <div class="achat">
                    <!-- prix du produit -->
                    <h2>00,00€</h2>
                    <form method="post" action="">
                        <!-- possibilite de choisir le nombre d'unites du produit -->
                        <label>
                            unités<input type="number" name="number" id="number2" min="1" max="99" step="1">
                        </label>
                        <!-- bouton 'Ajouter au panier' -->
                        <input type="submit" id="submit2" value="Ajouter au panier">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</body>

<footer>
    <?php include("elem/elem_pied.php"); ?>
</footer>
</html>