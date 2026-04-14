<?php
require "require("config/PDO.php");"


<?php foreach($Produits as $produit): ?> 
    <div class="col">
      <div class="card shadow-sm" align="center">
        <tilte><?= $produit->nom ?></tilte>
        <a href="images/produits/<?= $produit->image ?>" target="_blanck"><img src="images/produits/<?= $produit->image ?>" style="width: 100%"></a>
        <div class="card-body">
          <p class="card-text"><?= substr($produit->description, 0, 160); ?>...</p>
          <div class="d-flex justify-content-between align-items-center">
            <!-- <div class="btn-group">
              <a href="/ajouter_panier.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm btn-success">Ajouter au Panier</button></a> -->
              <!-- <a href="ajouter_panier.php?id=<?=$row['id']?>" class="id_product">Ajouter au panier</a> -->

            <!-- </div> -->
            <form action="panier.php" method="post" >
                <input type="hidden" name="id" value="<?= $produit->id ?>" >
                <input type="hidden" name="nom" value="<?= $produit->nom ?>">
                <input type="hidden" name="prix" value="<?= $produit->prix ?>">
                <input type="hidden" name="image" value="<?= $produit->image ?>">
                <input type="submit" value="Ajouter au panier" class="btn btn-sm btn-success">
            </form>
            <small class="text" style="font-weight: bold;"><?= $produit->prix ?>€</small>
            <i class = "fa fa-heart" color= white><span></span></i>
          </div>
        </div>
      </div>
    </div>
 <?php endforeach; ?>
?>
