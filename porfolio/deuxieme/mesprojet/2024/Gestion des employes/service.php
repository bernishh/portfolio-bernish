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

    if (empty($_SESSION) || !isset($_SESSION['employe'])) {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Services</title>
  <link rel="stylesheet" href="style/service.css">
</head>
<body>

  <div class="container">
    <!-- Menu latéral -->
    <aside class="sidebar">
      <h2><i class="fas fa-users-cog"></i> Gestion d'employés</h2>
      <ul>
        <li><a href="tableau_de_bord.php" class="add-button">Tableau de bord</a></li>
        <li><a href="gestion_des_employes.php" class="add-button">Employés</a></li>
        <li><a href="service.php" class="add-button">Service</a></li>
        <li><a href="deconnexion.php" class="add-button">Déconnexion</a></li>
      </ul>
    </aside>

    <!-- Contenu principal -->
    <main class="main-content">
      <div class="header">
        <h1>Services</h1>
        <a href="ajoute_service_for" class="btn-add">ajouter_un_service</a>
      </div>

      <table class="services-table">
        <thead>
          <tr>
            <th>Nom du service</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Ressources humaines</td></tr>
          <tr><td>Marketing</td></tr>
          <tr><td>Vente</td></tr>
          <tr><td>Support</td></tr>
          <tr><td>Informatique</td></tr>
        </tbody>
      </table>
    </main>
  </div>

</body>
</html>