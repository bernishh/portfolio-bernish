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
  <title>Ajouter un service</title>
  <link rel="stylesheet" href="style/ajouter_un_service.css">
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
      <h1>Ajouter un service</h1>

      <div class="form-section">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Nom du service">
      </div>

      <div class="form-section">
        <label for="recherche">Rechercher</label>
        <input type="text" id="recherche" name="recherche" placeholder="Rechercher un service...">
      </div>

      <div class="button-group">
        <button class="btn cancel">Annuler</button>
        <button class="btn save">Enregistrer</button>
      </div>
    </main>
  </div>
</body>

</html>