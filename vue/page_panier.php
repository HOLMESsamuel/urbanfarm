<!DOCTYPE HTML>
<html>
<head> <meta charset = utf-8>
    <title> Urban Farm</title>
    <link rel = "stylesheet" href = "vue/style/style.css"/>
    <link rel = "stylesheet" href = "vue/style/style_panier.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        setInterval(function(){
            $.post('controleur/ct_trame.php', //envoie par post au fichier controleur
                        {
                            
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            console.log(data);
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
            );}
        , 10000);
    });
    </script>
</head>
<header>
    <?php include("vue/elem/elem_entete.php"); ?>
    <?php include("controleur/ct_panier.php"); ?>
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

        <a href="index.php?page=boutique">Retour à la boutique</a><br>

        <?php

        creePanier(); //cree le panier
        ajouteProduitPanier(); //ajoute le produit ajoute depuis la boutique
        supprimeProduitPanier();
        modifieProduitPanier();

        $panier = $_SESSION['panier'];

        //si le panier n'est pas vide
        if (!empty($panier)) {

            echo
            '<table>
            <tr>
                <th>ref.</th>
                <th>type</th>
                <th>description</th>
                <th>prix</th>
                <th>quantité</th>
                <th>montant</th>
            </tr>';

            $total = 0;

            //affiche les produits ajoutes au panier
            foreach ($panier as $ref => $quantite) {
                $produit = getProduit($bdd,$ref)->fetch();
                $type = $produit['type'];
                $description = $produit['description'];
                if (strlen($description) > 128) {
                    $description = substr($description,0,128).'...';
                }
                $prix = $produit['prix'];
                $montant = $quantite * $prix;

                echo
                '<tr>
                <td class="ref">'.$ref.'</td>
                <td class="type">'.$type.'</td>
                <td class="description">'.$description.'</td>
                <td class="prix">' . number_format($prix, 2,',',' ') .'€</td>
                <td class="quantite">' .
                    $quantite .
                    '<a class="plus" href="index.php?page=panier&plus=' . $ref .'">+</a> / 
                     <a class="moins" href="index.php?page=panier&moins=' . $ref .'">_</a> 
                </td>
                <td class="montant">' .
                    number_format($montant, 2,',',' ') . '€
                    <a class="supprimer" href="index.php?page=panier&supprimer=' . $ref .'">&times;</a>
                </td>
                
                </tr>';

                $total += $quantite * $prix;
            }

        echo
        '</table>
        <p id="total">
            Total : ' . number_format($total,2,',',' ') . '€
        </p>

        <p align="right">
            <button id="commander">Passer à la caisse</button>
        </p>
        ';

        } else {
            echo '<p align="center">Votre panier est vide</p>';
        }
        ?>

    </div>
</div>

<!--modal-->
<div id="commande">
    <div id="modal-content">
        <div id="modal-header">
            <span class="close">&times;</span>
            <h1 align="center">Votre commande</h1>
        </div>
        <div id="modal-body">
            <p>text</p>
        </div>
        <div id="modal-footer">
            <h3>modal footer</h3>
        </div>
    </div>
</div>

</body>

<script src="vue/script/script_panier.js"></script>

<footer>
    <?php include("vue/elem/elem_pied.php"); ?>
</footer>
</html>