<?php
session_start();
include("config/PDO.php");
if(!isset($_SESSION['username'])){
    header("location:connexion.php");
    
}

$stmt = $db->query(
  "SELECT annonce_id, annonce_titre, description, prix, annonce_date, categorie_titre, username, user_id
  FROM annonces
  INNER JOIN categories
  ON annonces.categories_categorie_id = categories.categorie_id
  INNER JOIN users
  ON annonces.users_user_id = users.user_id
  ORDER BY annonces.annonce_date DESC");

$data = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Accueil</title>
  </head>
  <body>
    <header>
      <!-- Navbar -->
      <nav>
        <div class="left">
          <img src="logo.png" alt="logo" />
          <a href="create_annonce.php" class="annonce-link"
            ><i class="fa-regular fa-square-plus"></i>Déposer une annonce</a
          >
          <a href="#" class="search-link"
            ><i class="fa-solid fa-magnifying-glass"></i>Rechercher</a
          >
        </div>
        <div class="icons">
          <a href="#">
            <i class="fa-regular fa-bell"></i>
            <span>Mes recherches</span>
          </a>
          <a href="#">
            <i class="fa-regular fa-heart"></i>
            <span>Favoris</span>
          </a>
          <a href="#">
            <i class="fa-regular fa-message"></i>
            <span>Messages</span>
          </a>
          <a href="#">
            <i class="fa-regular fa-user"></i>
            <span><?=$_SESSION['username']?></span>
          </a>
          <a href="deconnexion.php">
          <i class="fa-solid fa-right-from-bracket"></i>
            <span>Deconnexion</span>
          </a>
        </div>
        <div class="links">
          <ul>
            <li><a href="#">Immobilier</a></li>
            <span></span>
            <li><a href="#">Véhicules</a></li>
            <span></span>
            <li><a href="#">Vacances</a></li>
            <span></span>
            <li><a href="#">Emploi</a></li>
            <span></span>
            <li><a href="#">Mode</a></li>
            <span></span>
            <li><a href="#">Maison</a></li>
            <span></span>
            <li><a href="#">Multimédia</a></li>
            <span></span>
            <li><a href="#">Loisirs</a></li>
            <span></span>
            <li><a href="#">Matériels professionel</a></li>
            <span></span>
            <li><a href="#">Autres</a></li>
          </ul>
        </div>

      </nav>
      <!-- Navbar Fin-->
    </header>
    <?php
    foreach ($data as $annonce):
      ?>
    <main>
        <section id="un">
          <div class="annonce">
              <div class="user">
                <img
                src="data:image/png;base64,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"
                />
                <h4>
                  <p>
                  <?= $annonce['username'] ?>
                    <!-- <img src="https://img.icons8.com/fluency/48/null/star.png" /> -->
                    4.5
                  </p>
                  <span>(7)</span>
                </h4>
              </div>
              <a href="annonce.php?annonce_id=<?=$annonce['annonce_id']?>">
              <div class="image">
              <img src="images/annonces/annonce<?= $annonce['annonce_id']?>_1.jpg" width="200px">
              </div></a>
              <div class="desc">
                <h3><?= $annonce['annonce_titre'] ?>  <?= $annonce['prix'] ?>€</h3>
              <div>
              <span>Livraison possible</span><br />
              <div class="desc1">
                <p>Catégorie: <?= $annonce['categorie_titre'] ?></p>
                <p><?= $annonce['annonce_date'] ?></p>
                <!-- <div class="like"></div> -->
              </div>
          </div>
      </section>
    </main>
    <?php
    endforeach
    ?>

    <!-- js -->
    <!-- <script>
        const like = document.querySelector('.like');

        let countLike = 0;
        like.addEventListener('click', () => {

            if(countLike === 0) {
                like.classList.toggle('anim-like');
                countLike = 1;
                like.style.backgroundPosition = 'right';
            } else {
                countLike = 0;
                like.style.backgroundPosition = 'left';
            }

        });

        like.addEventListener('animationend', () => {
            like.classList.toggle('anim-like');
        })
    </script> -->
    </body>
    </html>