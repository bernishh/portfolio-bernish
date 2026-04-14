<?php
require("config/PDO.php");
if (isset($_POST['inscription'])) {
    if($_POST['motdepasse1']=== $_POST['motdepasse2']){
        $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    // $motdepasse = password_hash($_POST['motdepasse1'], PASSWORD_DEFAULT);
    $motdepasse = ($_POST['motdepasse1']);

    $emailchek = $db->prepare("SELECT * FROM users WHERE email = ?");
    $emailchek->execute([$email]);

    if ($emailchek->rowCount() == 0) {  
        $stmt = $db->prepare("INSERT INTO `users`(`nom`, `email`, `password`) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $motdepasse]);
        $error = true;
        header('refresh:1; url=login.php');
    } else {
        $error = "L'email existe déja";
    }
    }else {
        $error2 = true;
    }
}
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
            margin-left: 6%;
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
        <h2>INSCRIPTION</h2>
        <form method="post">
            <div class="mb-3">
                <label for="text" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" style="width: 350%;" value="<?php if (isset($email)) {echo $email;} ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-MAIL</label>
                <input type="email" name="email" class="form-control" style="width: 350%;" value="<?php if (isset($email)) {echo $email;} ?>" >
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse1" class="form-control" style="width: 350%;"  value="<?php if (isset($email)) {echo $email;} ?>">
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label"> Confirmez le mot de passe</label>
                <input type="password" name="motdepasse2" class="form-control" style="width: 350%;">
            </div>
            <br>
            <input type="submit" name="inscription" class="btn btn-info" value="S'inscrire">
            <div class="a">
                <b><a href="login.php">deja client</a></b>
                <b><a href="index.php">annuler</a></b>
            </div>
        </form>

        </div>
    </div>
</div>
<?php if (isset($error)) : ?>
        <span><?= $error ?></span>
    <?php endif ?>
    
</body>
</html>