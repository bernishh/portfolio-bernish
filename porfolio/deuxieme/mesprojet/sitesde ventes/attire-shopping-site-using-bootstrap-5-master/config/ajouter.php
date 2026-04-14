<?php 
//modifier un produit
function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("PDO.php"))
  {
    $req = $db->prepare("UPDATE produits SET  id=?, `image`=?, nom=?, prix=?,`description`=? WHERE id=?");

    $req->execute(array($id, $image, $nom, $prix, $desc));

    $req->closeCursor();
  }
}
//
function getproduit($id){
    if(require("PDO.php"))
    {
       $req = $db->prepare("SELECT * FROM `produits` WHERE id=?");

       $req->execute(array($id));

         if($req->rowCount() ==1){

        $data =$req->fetchall(PDO::FETCH_OBJ);
        return $data;
    
    }else{
        return false;
    }
    $req->closeCusor();
    }
}
// ajouter un utilisateur
function ajouterUser($nom, $prenom, $email, $motdepasse)
{
  if(require("PDO.php"))
  {
    $req = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");

    $req->execute(array($nom, $prenom, $email, $motdepasse));

    return true;

    $req->closeCursor();
  }
}

// permettre la connexion à l'administrateur
function getAdmin($email, $password) 
{
   if (require("PDO.php"))
   {
    $req = $db->prepare("SELECT * FROM admin WHERE email=? AND motdepasse=?");

        $req->execute(array($email, $password));

        if($req->rowCount() == 1){

            $data = $req->fetch();

            return $data;

        }else{
            return false;
        }
       
        $req->closeCursor();
    }
   }

//pour ajouter une image dans la basse de donnée
function ajouter($image, $nom, $prix, $desc)
{
    if (require("PDO.php"))
    {
        $req = $db->prepare("INSERT INTO produits(image, nom, prix, description) VALUES (?, ?, ?, ?)");

        $req->execute(array($image, $nom, $prix, $desc));

        $req->closeCursor();

    }
    
}
// afficher nos produits dans la basse de données
function afficher()
{
    if (require("PDO.php"))
    {
        $req=$db->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();
        $data = $req->fetchall(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
            
    }
}
function supprimer($id)

{
    if (require("PDO.php"))
    {
        $req= $db->prepare("DELETE  FROM produits WHERE  id=?");

        $req->execute(array($id));
    }
}
//inclure la page de connexion
 include_once "PDO.php";
 //verifier si une session existe
 if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
 }
 //creer la session
 if(!isset($_SESSION['panier'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['panier'] = array();
 }
 //récupération de l'id dans le lien
  if(isset($_GET['id'])){//si un id a été envoyé alors :
    $id = $_GET['id'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($con ,"SELECT * FROM products WHERE id = $id") ;
    if(empty(mysqli_fetch_assoc($produit))){
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['panier'][$id])){// si le produit est déjà dans le panier
        $_SESSION['panier'][$id]++; //Représente la quantité 
    }else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id]= 1 ;
    }

   //redirection vers la page index.php
   header("Location:index.php");


  }
  