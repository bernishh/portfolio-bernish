<?php 

session_start();
// Vérifier si le panier existe dans la session
if (!isset($_SESSION['panier'])) {

        $_SESSION['panier'] = array();

}

if(isset($_SESSION["connexion"])) if(isset($_SESSION["connexion2"])) {
    echo "<script>
            alert('Une inscription ou une connexion est nécessaire pour cette action')
        </script>";
        session_destroy();
}

// connection admin

// if (!isset($_SESSION['nom'])) if(!isset($_SESSION['pseudo'])) {
//     header("location:login.php");
// }
// if (empty($_SESSION['nom'])) if (empty($_SESSION['pseudo'])) {
//     header("location:login.php");
// }

require("config/ajouter.php");

$Produits = afficher();
// session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS VOUS ETES</title>
    <!-- fontawesome cdn -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <style>
        #Emma{
            /* background: purple; */
            width: 100px;
            height: 50px;
            margin-top: 1%;
        }
    </style>
</head>
<body>
      <!-- navbar -->
     <nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0" href = "index.html">
                <img src = "images/shopping-bag-icon.png" alt = "site icon">
                <span class = "text-uppercase fw-lighter ms-2">CS13 VOUS ETES BELLES</span>
            </a>

            <div class = "order-lg-2 nav-btns">
                <button type = "button" class = "btn position-relative">
                    <?php if (!isset($_SESSION['nom']) || !isset($_SESSION['pseudo'])) {} if (isset($_SESSION['nom']) || isset($_SESSION['pseudo'])) { echo '<a href="panier.php"><i class = "fa fa-shopping-cart"><span></span></a></i>'; } ?>
                    <?php 
                        if(isset($_SESSION['panier'])):
                    ?>
                    <?php if (!isset($_SESSION['nom']) || !isset($_SESSION['pseudo'])) {} if (isset($_SESSION['nom']) || isset($_SESSION['pseudo'])) { echo '<span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">
                         '.count($_SESSION['panier']); } ?>
                    </span>
                    <?php 
                        endif
                    ?>
                </button>
                <button type = "button" class = "btn position-relative">
                    <?php if (!isset($_SESSION['nom']) || !isset($_SESSION['pseudo'])) {} if (isset($_SESSION['nom']) || isset($_SESSION['pseudo'])) { echo '<i class = "fa fa-heart"><span></span></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>';} ?> 
                  
                </button>
             <button type = "button" class = "btn position-relative">
                    <a href="bareder.php"><i class = "fa fa-search"><span>Mes recherche</span></a></i>
                </button> 
                
                <button type = "button" class = "btn position-relative">
                <?php if (!isset($_SESSION['nom']) || !isset($_SESSION['pseudo'])) { echo '<a href="inscription.php" id="conn"><i class = "fa fa-user"><span></a></i>'; } if (isset($_SESSION['nom']) || isset($_SESSION['pseudo'])){ echo '<style> #conn{ display: none; cursor: initial; } </style>';} ?>   
                    
                </button>
                
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "index.php">home</a>
                    </li>
            
                   <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "colection.php">collection</a>
                    </li>  
                   
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#about">About us</a>
                    </li>
                   <li class = "nav-item px-2 py-2">
                            <?php if(isset($_SESSION["pseudo"])){ echo '<a class = "nav-link text-uppercase text-dark" href = "manu.php">Ajouter Produit</a>'; } ?>
                        </li>
                        <div class = "nav-item px-2 py-2" id="Emma"><p><?php if(isset($_SESSION["nom"])){ echo $_SESSION["nom"]; } if(isset($_SESSION["pseudo"])){ echo $_SESSION["pseudo"]; } ?></p></div>

                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "deconnexion.php"><?php if(isset($_SESSION["nom"]) || isset($_SESSION["pseudo"])) {echo 'Déconnexion';} else { echo 'Quitter';} ?></a>
                    </li>
                    

                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- header -->
    <header id = "header" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px;">
        <div class = "container h-100 d-flex align-items-center carousel-inner">
            <div class = "text-center carousel-item active">
                
                <h1 class = "text-uppercase py-2 fw-bold text-white">Nouvelle collection</h1>
                <!-- <a href = "#" class = "btn mt-3 text-uppercase">shop now</a> -->
            </div>
             <div class = "text-center carousel-item">
                 <h2 class = "text-capitalize text-white">Meilleure Prix & offre</h2> 
                <!-- <h1 class = "text-uppercase py-2 fw-bold text-white"></h1> 
                <a href = "#" class = "btn mt-3 text-uppercase"></a> -->
            </div> 
        </div>

        <button class = "carousel-control-prev" type = "button" data-bs-target="#header" data-bs-slide = "prev">
            <span class = "carousel-control-prev-icon"></span>
        </button>
        <button class = "carousel-control-next" type = "button" data-bs-target="#header" data-bs-slide = "next">
            <span class = "carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->

    <!-- special products -->
    

    <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

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
    
     <?php   error_reporting(E_ERROR |  E_PARSE);?>
     
      </div>
    </div>
  </div>

</main>


    </section>
        
    <!-- end of newsletter -->

    <!-- footer -->
    <footer class = "bg-dark py-5">
        <div class = "container">
            <div class = "row text-white g-4">
                <div class = "col-md-6 col-lg-3">
                    <a class = "text-uppercase text-decoration-none brand text-white" href = "index.html">Attire</a>
                    <p class = "text-white text-muted mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum mollitia quisquam veniam odit cupiditate, ullam aut voluptas velit dolor ipsam?</p>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light">Links</h5>
                    <ul class = "list-unstyled">
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Collection
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Blogs
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> About Us
                            </a>
                        </li>
                    </ul>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Contact Us</h5>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-map-marked-alt"></i>
                        </span>
                        <span class = "fw-light">
                            ivry sur seine 942000
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span class = "fw-light">
                           c13@gmail.com
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span class = "fw-light">
                            01255663335
                        </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class = "list-unstyled d-flex">
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "https://www.instagram.com/cs13vousetesbelles/?hl=fr" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
      </body>
      </html>


















































































































































































































































































































































































































































































































        </div>
    </footer>
    <!-- end of footer -->




    <!-- jquery -->
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
</body>
</html>