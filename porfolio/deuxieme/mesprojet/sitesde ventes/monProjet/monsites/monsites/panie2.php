
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
    $product = array(
        'id' => $_POST['id'],
        'nom' => $_POST['nom'],
        'prix' => $_POST['prix'],
        'image' => $_POST['image']
    );
    array_push($_SESSION['panier'], $product);
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
    
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Description</th>
    </tr>
        <?php
            foreach ($_SESSION['panier'] as $product):
        ?>
        <form method="post">
                        <tr>
                        <th scope="row"><?= $Produit->id ?></th>                            <td><?=$product['nom']?></td>
                            <td><?=$product['prix']?> €</td>
                            <td><img src="images/produits/<?=$product['image']?>"  width="10%" height="10%"></td>
                            <td>
                                <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">

                                <input type="submit" name="supprimer" value="supprimer">
                            </td>
                        </tr>
            </form>
           </div>
                    
        <?php endforeach ?>
  </thead>
  </tbody>

  <?php endif ?>
</body>
</html>