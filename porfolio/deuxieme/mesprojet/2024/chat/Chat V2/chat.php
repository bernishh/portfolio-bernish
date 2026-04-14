<?php
session_start();
if(!isset($_SESSION["pseudo"])){
    header("location:connexion.php");
}
$pseudo = $_SESSION["pseudo"];
include "connect.php";
if(isset($_POST["bout"])){
    $destinataire = $_POST["destinataire"];
    $message = $_POST["message"];
    $requete = "insert into messages values (null,'$pseudo','$message', now(), '$destinataire')";
    mysqli_query($id, $requete);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Bonjour <?=$pseudo?>, Chattez'en direct! ChatBox </h1>
        </header>
        <a href="deconnexion.php">Deconnexion</a>
        <div class="messages">
            <ul>
                <?php
                $requete = "select * from messages 
                            where destinataire = '$pseudo'
                            or destinataire = 'tous'";
                $resultat = mysqli_query($id, $requete);//execution de la requete
                while($ligne = mysqli_fetch_assoc($resultat)){ ?>

                    <li class="message"><span class="date"><?=$ligne["date"]?>
                                        </span> - <b><?=$ligne["pseudo"]?></b> - 
                                        <i><?=$ligne["message"]?></i>.
                    <?php if($ligne["destinataire"] == "tous") echo "*";?> 
                    <a href="sup.php?idm=<?=$ligne["idm"]?>"><img src="sup.png" width="20px">  </a>
                    </li>
                    
                    <?php } ?>
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <select name="destinataire">
                    <option value="tous"> Tous </option>
                    <?php
                        $req = "select pseudo from users order by pseudo";
                        $res = mysqli_query($id, $req);
                        while($ligne = mysqli_fetch_assoc($res)){
                            echo "<option>".$ligne["pseudo"]."</option>";
                        }
                    ?>
                </select>
                <input type="text" name="message" placeholder="Message : " required><br>
                <input class="bout" type="submit" value="Envoyer" name="bout"><br>
            </form>
        </div>
    </div>
</body>
</html>