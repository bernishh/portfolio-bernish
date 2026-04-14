<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
</head>
<body>
  <h1>Bienvenue, <?= htmlspecialchars($_SESSION['user']['prenom']) ?> !</h1>
  <p>Vous êtes connecté avec l'email : <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
  <a href="logout.php">Se déconnecter</a>
</body>
</html>