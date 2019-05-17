<!DOCTYPE HTML>
<html>
<head> <meta charset = utf-8>
    <title> Urban Farm</title>
    <link rel = "stylesheet" href = "style/style.css"/>
    <link rel = "stylesheet" href = "style/style_panier.css"/>
</head>
<header>
    <?php include("elem/elem_entete.php"); ?>
    <?php include("../controleur/ct_panier.php"); ?>
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

        <a href="page_boutique.php">Retour à la boutique</a>

        <table>
            <tr>
                <th>ref.</th>
                <th>type</th>
                <th>description</th>
                <th>prix</th>
                <th>quantité</th>
                <th>montant</th>
            </tr>


            <?php
            ajouteProduitPanier();
            $panier = $_SESSION['panier'];

            foreach ($panier as $ref => $quantite) {
                $produit = getProduit($bdd,$ref)->fetch();
                $type = $produit['type'];
                $description = $produit['description'];
                if (strlen($description) > 64) {
                    $description = substr($description,0,64).'...';
                }
                $prix = $produit['prix'];
                $montant = number_format($quantite * $prix,2,"."," ");

                echo
                '<tr>
                <td>'.$ref.'</td>
                <td>'.$type.'</td>
                <td>'.$description.'</td>
                <td class="prix">'.$prix.'€</td>
                <td class="quantite">'.$quantite.'</td>
                <td class="montant">'.$montant.'€</td>
                </tr>';
            } ?>
        </table>
    </div>
</div>
</body>

<footer>
    <?php include("elem/elem_pied.php"); ?>
</footer>
</html>