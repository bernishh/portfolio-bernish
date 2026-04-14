<!-- panier.php -->

<?php
// Démarrage de la session pour stocker le panier
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
<a href="index.php">Retour</a>

    <h2>Panier</h2>
    <table>
        <tr><th>Nom</th><th>Prix</th><th>Image</th><th></th></tr>
        <?php
            foreach ($_SESSION['panier'] as $product):
        ?> 
            <form method="post">
                        <tr>
                            <td><?=$product['nom']?></td>
                            <td><?=$product['prix']?> €</td>
                            <td><img src="images/produits/<?=$product['image']?>" style="width : 80px"></td>
                            <td>
                                <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">

                                <input type="submit" name="supprimer" value="supprimer">
                            </td>
                        </tr>
            </form>
                    
        <?php endforeach ?>
    </table>

<?php endif ?> 