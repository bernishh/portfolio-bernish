<?php  
// Informations de connexion
$host = 'localhost';       // ou 127.0.0.1
$dbname = 'employer';
$username = 'root';        // ou ton nom d'utilisateur MySQL
$password = '';            // ou ton mot de passe MySQL

try {
    // Création de l'objet PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Configuration des erreurs en mode exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    // En cas d'erreur
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}

session_start();

if (!empty($_SESSION) && isset($_SESSION['employe'])) {
    header("Location: tableau_de_bord.php");
    exit();

}
$error = false;


if (!empty($_POST)){
 
    $email = $_POST["email"];
    $password  = $_POST["password"];
    // Préparation de la requête
    $stmt = $pdo->prepare("SELECT * FROM employe WHERE email = :email AND password = :password");

    // Exécution avec les paramètres
    $stmt->execute(['email' => $email, 'password' => $password]);

    // Récupération du résultat
    $employe = $stmt->fetch();

    if (empty($employe)){
        $error = true;
    }
    else{
        $_SESSION['employe'] = $employe;
        header("Location: tableau_de_bord.php");
        exit();

    }

    //echo "<pre>";
    //var_dump($employe);
    //echo "</pre>";
    //die();

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion d'employé</title>
    <link rel="stylesheet" href="page_connexion.css">
</head>
<body>
    <div class="login-container">
        <h1>GESTION D'EMPLOYER</h1>
        <h2>Connexion</h2>
        <form action="./index.php" method="POST">
            <div class="form-group">
                <label for="email">Nom d'utilisateur</label>
                <input type="email" id="email" name="email" placeholder="Nom d'utilisateur" required>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            </div>
                <?php
                    if(!empty($_POST) && $error){
                        echo "Identiffiants incorrects";
                    }           
                ?>
            <button type="submit">Se connecter</button>
        </form>
    </div>  
</body>
</html>