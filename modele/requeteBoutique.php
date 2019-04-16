<?php
    include 'connexion.php';

    /*
     * recupere les informations d'un produit de la boutique
     */
    function recupereProduit(PDO $bdd) {
        $req = $bdd->query('SELECT * FROM produit');
        while ($produit = $req->fetch()) {
            echo
                '<div class="box_product"> 
                    <h1>' . $produit['type'] . '</h1>
                    <h3 class="ref"> ref ' .  $produit['n°produit'] . '</h3>
                    <div class="information">
                        <div class="photo">
                        </div>
                        <p class="description">' . $produit['description'] . '</p>
                        <div class="achat">
                            <h2>' . $produit['prix'] . '€</h2>
                            <form method="post" action="">
                                <label>
                                    unités<input type="number" name="number" id="number1" min="1" max="99" step="1">
                                </label>
                                <input type="submit" id="submit1" value="Ajouter au panier">
                            </form>
                        </div>
                    </div>
                </div>';
        }
    }






?>