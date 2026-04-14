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
        </form>

        </div>
    </div>
</div>
    
</body>
</html>
<?php 
// si le formulaire est envoyer
if (isset($_POST['envoyer'])){
//si le formulaire est non vide
    if (!empty($_POST['email']) AND !empty($_POST['motdepasse'])){

       $email =htmlspecialchars($_POST['email']);
       $motdepasse =htmlspecialchars($_POST['motdepasse']);

       $admin = getAdmin($email, $motdepasse);

       if($admin){
        
        $_SESSION['zWpppkkpppp44'] = $admin;

        header("location:manu.php");

       }else{
            echo "Information incorecte !";
       }
      
    }

}


?>
