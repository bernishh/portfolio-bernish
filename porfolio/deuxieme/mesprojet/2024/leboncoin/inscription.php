<?php
include_once("config/PDO.php");

if (isset($_POST['inscription'])) {
    if($_POST['password1']=== $_POST['password2']){
        $user_name = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $emailchek = $db->prepare("SELECT * FROM users WHERE email = ?");
    $emailchek->execute([$email]);

    if ($emailchek->rowCount() == 0) {
        $stmt = $db->prepare("INSERT INTO `users`(`username`, `email`, `password`) VALUES (?, ?, ?)");
        $stmt->execute([$user_name, $email, $password]);
        $error = true;
        header('refresh:5; url=connexion.php');
    } else {
        $error = "L'email existe déja";
    }
    }else {
        $error2 = "Les deux mot de passe ne sont pas identique";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css"/>
<title><?= $page_title ?></title>
<link rel="stylesheet" href="styles/inscription.css">
</head>
<body>
    <header>
      <a href="index.php">
        <i class="fa-regular fa-arrow-left"></i>
      </a>
      <div class="center">
        <img src="images/logo.png" alt="logo" class="logo" />
        <i class="fa-thin fa-pipe"></i>
        <div>
          <i class="fa-solid fa-shield-check"></i>
          <span class="con">Inscription</span>
        </div>
      </div>
    </header>

    <div class="contenue">
      <section class="ensemble">
        <img class="ime" src="images/1.png" alt="" />
        <div class="containe">
          <h3>Bonjour !</h3>
          <p class="texte">
            Inscrivez-vous pour suivre toutes nos fonctionnalités.
          </p>
    
          <?php if (isset($error2)) : ?>
        <span class="erreur"><?= $error2 ?></span>
    <?php endif ?>
        
          <form action="" method="post">
          <div class="labels">
              <label>Nom</label> 
              <span>Champ requis</span>
            </div>
            <input type="text" name="username" id="nom" class="text" value="<?php if (isset($email)) {echo $email;} ?>">
            <div class="labels">
              <label>E-mail</label>
              <span>Champ requis</span>
            </div>
            <input type="email" name="email" id="email" class="text" value="<?php if (isset($email)) {echo $email;} ?>">
            <div class="labels">
              <label>Entrez un mot de passe</label>
              <span>Champ requis</span>
            </div>
            <input type="password" name="password1" class="text2" id="password">
            <div class="labels">
              <label>Confirmez le mot de passe</label>
              <span>Champ requis</span>
            </div>
            <input type="password" name="password2" class="text2" id="password">
            <input type="submit"  name="inscription" class="send" value="Inscription">

          </form>

          <div class="compte">
            <p>Déja avec nous ?</p>
            <a href="connexion.php">Se connecter</a>
          </div>
        </div>

        <img class="ime" src="images/2.png" alt="" />
      </section>
    </div>
    
</body>

</html>

