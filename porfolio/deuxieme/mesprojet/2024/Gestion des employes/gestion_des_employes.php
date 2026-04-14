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

    if (!empty($_POST)) {
  // Données à insérer (par exemple, issues d’un formulaire)
  $nom = $_POST["nom"];
  $prenom = $_POST["prénom"];
  $date_naissance = $_POST["date_naissance"];
  $email = $_POST["email"];
  $matricule = $_POST["matriculation"];
  $date_embauche = $_POST["date_embauche"];
  $id_service = $_POST["service"];
  $type_contrat = $_POST["type_contrat"];
  $ajouter_document = $_POST["ajouter_document"];
  $photo = $_POST["photo"];
  $motDePasse = password_hash("motdepasse123", PASSWORD_DEFAULT); // Sécurisation du mot de passe
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion des employés</title>
  <link rel="stylesheet" href="style/gestion_des_employer.css">
</head>
<body>

  <div class="dashboard">
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
        <h1>Gestion des employés</h1>
        <a href="ajouter_un_employer.php" class="btn-add">Ajouter un employé</a>
      </div>

      <div class="search-bar">
        <input type="text" placeholder="Rechercher un employé...">
      </div>

      <table class="employee-table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Service</th>
            <th>Poste</th>
            <th>Date d'embauche</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Diallo</td>
            <td>Fatou</td>
            <td>RH</td>
            <td>Assistante</td>
            <td>12/02/2020</td>
          </tr>
          <tr>
            <td>Nguyen</td>
            <td>Minh</td>
            <td>Informatique</td>
            <td>Développeur</td>
            <td>03/03/2022</td>
          </tr>
          <!-- Tu peux ajouter plus de lignes ici -->
        </tbody>
      </table>
    </main>
  </div>

</body>
</html>