<?php
session_start();
include "connect.php";
if(isset($_POST["bout"])){
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
    $requete = "select * from users where pseudo='$pseudo' and mdp='$mdp'";
    $resultat = mysqli_query($id, $requete);
    if(mysqli_num_rows($resultat)>0){
        $_SESSION["pseudo"] = $pseudo;
        header("location:chat.php");
    }else{
        $erreur = "Erreur de pseudo ou de mot de passe!!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class="main">
    
<div class="enfant"><h1 style =" text-align: center;  color: blue">Formulaire de connexion</h1>
<br>
    <form action="" method="post" style="text-align: center">
        <input type="text" name="pseudo" placeholder="Entrez votre pseudo :" required  style="pading-top: 5px 10px 0px 10px"><br><br>
        <input type="password" name="mdp" placeholder="Mot de passe :" required><br><br>
        <?php if(isset($erreur)) echo "<b>$erreur</b>";?><br><br>
        <input type="submit" value="Connexion" name="bout">
    </form></div>
 <!-- <div class="deux">
   
   </div> -->
   </div>
</body>
</html>