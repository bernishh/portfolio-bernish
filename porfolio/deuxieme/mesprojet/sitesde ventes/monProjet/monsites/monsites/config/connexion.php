<?php
session_start();

if (isset($_POST['connexion'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['motdepasse1'];

    $stmt = $db->prepare("SELECT password, nom FROM `users` WHERE email = ?");
    $stmt->execute([$email]);

    $data = $stmt->fetch();

    $nom = $data['nom'];
    $password_hash = $data['password'];

    if (password_verify($password, $password_hash)) {
        $_SESSION['email'] = $email;
        $_SESSION['nom'] = $nom;
        header("location: ../index.php");
    } else {
         $error = "Identifiant ou mot de passe incorrect";
     }
}
?>
<!DOCTYPE html>
<html lang="fr">
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
        <h2>Connexion</h2>
        <form method="post">
        
            <div class="mb-3">
                <label for="email" class="form-label">E-MAIL</label>
                <input type="email" name="email" class="form-control" style="width: 350%;" value="<?php if (isset($email)) {echo $email;} ?>">
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control" style="width: 350%;">
            </div>
            
            <br>
            <input type="submit" name="connexion" class="btn btn-info" value="Se connecter">
        </form>
        <div class="compte">
            <p>etes vous nouveau ?</p>
            <a href="inscription.php">Creer un compte</a>
          </div>

        </div>
    </div>
</div>
<?php if (isset($error)) : ?>
        <span><?= $error ?></span>
    <?php endif ?>
    
</body>
</html>