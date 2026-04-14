<?php/*
require ("admin/navbar.php");*/
?>
<!-- panier.php -->

<?php

// Démarrage de la session pour stocker le panier

error_reporting(E_ERROR |  E_PARSE);
session_start();
 
// Vérification si un produit a été ajouté au panier
if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['image'])) {
    // Initialisation du panier si nécessaire
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    // Ajout du produit au panier
    if(isset($_SESSION["nom"]) || isset($_SESSION["pseudo"])){

        // $_SESSION['panier'] = array();
        $product = array(
        'id' => $_POST['id'],
        'nom' => $_POST['nom'],
        'prix' => $_POST['prix'],
        'image' => $_POST['image']
    );
    array_push($_SESSION['panier'], $product);
    }else{
    if(!isset($_SESSION["nom"]) || !isset($_SESSION["pseudo"])) {
        $_SESSION["connexion"] = "connexion";
        $_SESSION["connexion2"] = "connexion2";
        header("location:index.php");
    }
}
}

// Supprimer un produit


if(isset($_POST['supprimer'])){
    foreach ($_SESSION['panier'] as $index => $product) {
        if ($product['id'] == $_POST['delete_id']) {
            // Supprimer le produit du panier
            unset($_SESSION['panier'][$index]);
            break;
        }
    }
}

// Affichage du contenu du panier
if (isset($_SESSION['panier'])) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css">   -->
    <title>mon panier</title>
</head>

<body class="panier">
    <a href="index.hp">retour</a>

 <section> 
<h2 class="titre">Panier</h2>

    <table>
        <tr><th>Nom</th><th>Prix</th><th>Image</th><th></th></tr>
        <?php
            foreach ($_SESSION['panier'] as $product):
        ?> 
           
           <form method="post">
                        <tr>
                            <td><?=$product['nom']?></td>
                            <td><?=$product['prix']?> €</td>
                            <td><img src="images/produits/<?=$product['image']?>" width="10%" height="10%"></td>
                            <td>
                                <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">

                                <input type="submit" name="supprimer" value="supprimer">
                            </td>
                        </tr>
            </form>
           </div>
                    
        <?php endforeach ?>
    </table>

<?php endif ?>
</section> 
</body>
</html>