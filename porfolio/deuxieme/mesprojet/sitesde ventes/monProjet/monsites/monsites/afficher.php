<?php 
session_start();
// si la session existe

if(!isset($_SESSION["pseudo"])) {
    header("location:index.php");
}

require("config/ajouter.php");
error_reporting(E_ERROR |  E_PARSE);
$Produits = afficher();
?>
<<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attire Home</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                  
             
                <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="deconnection.php">Se Deconnecter</a>
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
                        <a class = "nav-link text-uppercase text-dark" href = "#">Supprimer</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#">Modifier</a>
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

<!-- Navbar -->
<br/>
<br/>
<br/>
<br/>
<br/>

  <div class="album py-5 bg-light">
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach ($Produits as  $Produit): ?>
    <tr>
      <th scope="row"><?php echo  $Produit->id ?></th>
      <td><img src="images/Produits/<?= $Produit->image ?>"width="10%" height="10%">
    </td>
      <td><?= $Produit->nom ?></td>
      <td style="font-weight : bold; color: green;"><?= $Produit->prix ?></td>
      <td><?= substr($Produit->description, 0, 100 );?>...</td>
      <td>
        <a href="#?pdt=<?= $Produit->id ?>" ><i class="fa fa-pencil" style="font-size: 30px;"></i></a>
      </td>
    </tr>
    
    <?php endforeach ?>
  </tbody>
</table>

  
</body>
</html>
