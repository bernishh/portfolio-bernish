<?php 
session_start();
// connection admin
error_reporting(E_ERROR |  E_PARSE);
if(!isset($_SESSION["pseudo"])) {
    header("location:index.php");
}

if (!isset($_GET['pdt'])){
  header  ("location:afficher.php");
}
if(!empty($_GET['pdt']) AND !is_numeric($_GET['pdt'])){
    header  ("location:afficher.php");
  }
  $id = $_GET['pdt'];

require("config/ajouter.php");

$Produits = getproduit($id);

foreach($Produits as $Produit){
  $nom = $Produit->nom;
  $image =$Produit->image;
  $prix = $Produit->prix;
  $description = $Produit->description;
  $idpdt = $Produit->id;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifieer nos articles</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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
                  
             
                <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="deconnexion.php">Se Deconnecter</a>
                <!-- <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-search"><span>Mes recherche</span></i>
                </button> -->
                <!--  <button type = "button" class = "btn position-relative">
                    <a href="inscription.php"><i class = "fa fa-user"><span></a></i>   
                     -->
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
                        <a class = "nav-link text-uppercase text-dark" href = "delete.php">Supprimer</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark " href = "modifier.php"  >Modifier</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "manu.php">Ajouter</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "afficher.php">afficher</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <br/>
<br/>
<br/>
<br/>
<br/>
<!-- Navbar -->
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  
      
<form method="post" enctype='multipart/form-data'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
    <input type="text" class="form-control" name="image" value="<?= $image ?>" required>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom"value="<?= $nom ?>"  required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="number" class="form-control" name="prix"value="<?= $prix ?>" required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" required><?= $description ?></textarea>
  </div>

  <button type="submit" name="clik" class="btn btn-primary">Enregistrer</button>
</form>


      </div></div></div>

</body>
</html>
<?php 

    if(isset ($_POST['clik']))
    { //echo $_POST['image'].' '.$_POST['nom'].' '.$_POST['prix'].' '.$_POST['desc'];
        $image = $_POST['image']; $nom = $_POST['nom']; $prix = $_POST['prix']; $desc = $_POST['desc'];

        if (isset($image) AND isset($nom) AND isset($prix) AND isset($desc))
        { //echo " bien";
            if (!empty($image) AND !empty($nom) AND!empty($prix) AND!empty($desc))
            { //echo " encore bien";
                $id = $_GET['pdt'];
                $image = htmlspecialchars($_POST['image']);
                $nom = htmlspecialchars($_POST['nom']);
                $prix = htmlspecialchars($_POST['prix']);
                $desc = htmlspecialchars($_POST['desc']);
              
                modifier($image, $nom, $prix, $desc, $id);
                 echo("<h2 class='alert'>Article modifier avec succès!</h2>");
                 header("location:afficher.php");
              

                
            }else{
                echo("<h2 class='alert'>Veuillez saisir quelque chose !</h2>");
            }
        }
    }

?>

