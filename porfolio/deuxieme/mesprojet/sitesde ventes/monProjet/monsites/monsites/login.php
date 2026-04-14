<?php 
session_start();
 
include "config/ajouter.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login</title>

    <style>

        .a{
            position: absolute;
            margin-top: -2%;
            margin-left: 8%;
            width: 20%;
        }
        .a a{
            text-decoration: none;
            margin: 2%;
        }

    </style>

</head>
<body>

<br>
<br>
<br>
<br>

<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">

        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Login</label>
                <input type="email" name="email" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control" style="width: 350%;">
            </div>
            <br>
            <input type="submit" name="envoyer" class="btn btn-info" value="Se connecter">
            <div class="a">
                <b><a href="inscription.php">Inscrivez-vous</a></b>
                <b><a href="index.php">annuler</a></b>
            </div>
        </form>

        </div>
    </div>
</div>
    
</body>
</html>
<?php 
// si le formulaire est envoyer
// if (isset($_POST['envoyer'])){
//si le formulaire est non vide
//     if (!empty($_POST['email']) AND !empty($_POST['motdepasse'])){

//        $email =htmlspecialchars($_POST['email']);
//        $motdepasse =htmlspecialchars($_POST['motdepasse']);

//        $admin = getAdmin($email, $motdepasse);

//        if($admin){
        
//         $_SESSION['zWpppkkpppp44'] = $admin;

//         header("location:manu.php");

//        }else{
//             echo "Information incorecte !";
//        }
      
//     }

// }

// if(isset($_POST["envoyer"])){
//     $email = $_POST["email"];
//     $motdepasse = $_POST["motdepasse"];
//     getAdmin($email, $motdepasse);
// }

// if(isset($_POST["envoyer"])){
	
//     $mail = $_POST["email"];
//     $mdp = $_POST["motdepasse"];
//     $mail = addslashes($mail);
//     $req = "select * from users where email = '$mail' and password = '$mdp'";
//     $id = mysqli_connect("localhost", "root", "", "monsite");
//     $resultat = mysqli_query($id, $req);
//     if(mysqli_num_rows($resultat)>0){
    
// while($ligne = mysqli_fetch_assoc($resultat)){

//      $mail = $ligne["email"];
//      $nom = $ligne["nom"];
//      $_SESSION["mail"] = $mail;
//      $_SESSION["nom"] = $nom;

//     if(isset($_POST["envoyer"])){

//         $conn= "connexion en cours ...";
//         header("location:manu.php");
//     }

// }

//     }else{
//         echo "Mot de passe ou identifiant non valide";
//     }
// }

// if(isset($_POST["envoyer"])){
	
//     $mail = $_POST["email"];
//     $mdp = $_POST["motdepasse"];
//     $mail = addslashes($mail);
//     $req2 = "select * from admin where email = '$mail' and password = '$mdp'";
//     $id2 = mysqli_connect("localhost", "root", "", "monsite");
//     $resultat2 = mysqli_query($id2, $req2);
//     if(mysqli_num_rows($resultat2)>0){
    
// while($ligne2 = mysqli_fetch_assoc($resultat2)){

//      $mail = $ligne2["email"];
//      $nom = $ligne2["nom"];
//      $_SESSION["mail"] = $mail;
//      $_SESSION["nom"] = $nom;

//     if(isset($_POST["envoyer"])){

//         $conn2= "connexion en cours ...";
//         header("location:manu.php");
       
//     }

// }

//     }else{
//         echo "Mot de passe ou identifiant non valide";
//     }
// }

if(isset($_POST["envoyer"])) {
    $mail = $_POST["email"];
    $mdp = $_POST["motdepasse"];
    $mail = addslashes($mail);
    $req = "SELECT * FROM users WHERE email = '$mail' AND password = '$mdp'";
    $id = mysqli_connect("localhost", "root", "", "monsite");
    $resultat = mysqli_query($id, $req);

    if(mysqli_num_rows($resultat) > 0) {
        while($ligne = mysqli_fetch_assoc($resultat)) {
            $mail = $ligne["email"];
            $nom = $ligne["nom"];
            $_SESSION["mail"] = $mail;
            $_SESSION["nom"] = $nom;
        }

        $conn = "connexion en cours ...";
        header("location: index.php");
    } else {
        // Deuxième requête si la première n'est pas valide
        $mail = $_POST["email"];
        $mdp = $_POST["motdepasse"];
        $mail = addslashes($mail);
        $req2 = "SELECT * FROM admin WHERE email = '$mail' AND motdepasse = '$mdp'";
        $id = mysqli_connect("localhost", "root", "", "monsite");
        $resultat2 = mysqli_query($id, $req2);

        if(mysqli_num_rows($resultat2) > 0) {
            while($ligne2 = mysqli_fetch_assoc($resultat2)) {
                $mail = $ligne2["email"];
                $nom = $ligne2["nom"];
                $pseudo = $ligne2["pseudo"];
                $_SESSION["pseudo"] = $pseudo;
                $_SESSION["mail"] = $mail;
                $_SESSION["nom"] = $nom;
            }

            $conn = "connexion en cours ...";
            header("location: index.php");
        } else {
            echo "Mot de passe ou identifiant non valide";
        }
    }
} 
// else {
//     echo "Le formulaire n'a pas été soumis.";
// } Si le bouton envoyer n'est pas actif



?>
