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
    $service = $_POST["service"];
    $Type_contrat = $_POST["Type_contrat"];
    $ajouter_document = $_POST["ajouter_document"];
    $motDePasse = password_hash("motdepasse123", PASSWORD_DEFAULT); // Sécurisation du mot de passe
   }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Fiche Employé</title>
  <link rel="stylesheet" href="style/fiche_employer.css">
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
      <h1>Fiche Employé</h1>

      <div class="employee-header">
        <img src="https://via.placeholder.com/120" alt="Photo employé" class="employee-photo">
        <div class="employee-info">
          <h2>Jean Dupont</h2>
          <p class="fonction">RH</p>
        </div>
      </div>

      <!-- Informations personnelles -->
      <h3>Informations personnelles</h3>
      <table class="info-table">
        <tr>
          <th>E-mail</th>
          <td>jean.dupont@email.com</td>
        </tr>
        <tr>
          <th>Date de naissance</th>
          <td>15 mars 1985</td>
        </tr>
        <tr>
          <th>Numéro téléphone</th>
          <td>06 12 34 56 78</td>
        </tr>
      </table>

      <!-- Informations professionnelles -->
      <h3>Informations professionnelles</h3>
      <table class="info-table">
        <tr>
          <th>Matricule</th>
          <td>EMP0045</td>
        </tr>
        <tr>
          <th>Date d'embauche</th>
          <td>03 février 2020</td>
        </tr>
        <tr>
          <th>Type de contrat</th>
          <td>CDI</td>
        </tr>
      </table>

      <!-- Documents -->
      <h3>Documents et justificatifs</h3>
      <div class="document-section">
        <label for="document">document_contrat.pdf</label>
        <input type="file" id="document" name="document_contrat.pdf">
      </div>

      <!-- Boutons -->
      <div class="button-group">
        <button class="btn cancel">Annuler</button>
        <button class="btn save">Enregistrer</button>
      </div>
    </main>
  </div>
</body>
</html>