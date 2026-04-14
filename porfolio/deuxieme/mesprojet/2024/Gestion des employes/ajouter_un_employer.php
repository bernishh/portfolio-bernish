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
<?php

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


  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifie si un fichier a bien été envoyé
    if (isset($_FILES['ajouter_document']) && $_FILES['ajouter_document']['error'] === 0) {
      $nomTemporaire = $_FILES['ajouter_document']['tmp_name'];
      $nomOriginal = basename($_FILES['ajouter_document']['name']);
      $dossierCible = "uploads/"; // Assure-toi que ce dossier existe et est accessible en écriture
      $cheminFinal = $dossierCible . $nomOriginal;

      // Tu peux ajouter ici une vérification de l'extension et de la taille
      $extensionsAutorisees = ['jpg', 'jpeg', 'png', 'pdf'];
      $extension = strtolower(pathinfo($nomOriginal, PATHINFO_EXTENSION));

      if (in_array($extension, $extensionsAutorisees)) {
        // Déplace le fichier depuis le répertoire temporaire vers le dossier final
        if (move_uploaded_file($nomTemporaire, $cheminFinal)) {
          //echo "Fichier uploadé avec succès : $nomOriginal";
          $ajouter_document = $cheminFinal;
        } else {
          echo "Erreur lors du déplacement du fichier.";
        }
      } else {
        echo "Extension de fichier non autorisée.";
      }
    } else {
      echo "Aucun fichier envoyé ou une erreur est survenue.";
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
      $nomTemporaire = $_FILES['photo']['tmp_name'];
      $nomOriginal = basename($_FILES['photo']['name']);
      $dossierCible = "photo/"; // Assure-toi que ce dossier existe et est accessible en écriture
      $cheminFinal = $dossierCible . $nomOriginal;

      // Tu peux ajouter ici une vérification de l'extension et de la taille
      $extensionsAutorisees = ['jpg', 'jpeg', 'png'];
      $extension = strtolower(pathinfo($nomOriginal, PATHINFO_EXTENSION));

      if (in_array($extension, $extensionsAutorisees)) {
        // Déplace le fichier depuis le répertoire temporaire vers le dossier final
        if (move_uploaded_file($nomTemporaire, $cheminFinal)) {
          //echo "Fichier uploadé avec succès : $nomOriginal";
          $photo = $cheminFinal;
        } else {
          echo "Erreur lors du déplacement du fichier.";
        }
      } else {
        echo "Extension de fichier non autorisée.";
      }
    } else {
      echo "Aucun fichier envoyé ou une erreur est survenue.";
    }
  } else {
    echo "Accès non autorisé.";
  }

  // Requête préparée
  $sql = "INSERT INTO employe (nom, prenom, email, password, date_naissance, photo, matricule, id_service, type_contrat, date_embauche) VALUES (:nom, :prenom, :email, :password, :date_naissance, :photo, :matricule, :id_service, :type_contrat, :date_embauche)";
  $stmt = $pdo->prepare($sql);

  // Exécution avec les paramètres
  $stmt->execute([
    ':photo' => $photo,
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':email' => $email,
    ':password' => $motDePasse,
    ':date_naissance' => $date_naissance,
    ':date_embauche' => $date_embauche,
    ':matricule' => $matricule,
    ':id_service' => $id_service,
    ':type_contrat' => $type_contrat,
  ]);

  echo "Utilisateur ajouté avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Ajouter un employé</title>
  <link rel="stylesheet" href="style/ajouter_employer.css">
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
    <form action="./ajouter_un_employer.php" method="POST" class="main-content">
      <h1>Ajouter un employé</h1>

      <!-- Section Informations personnelles -->
      <h2>Informations personnelles</h2>
      <div class="form-section">
        <div class="form-left">
          <label>photo</label>
          <input name="photo" type="file" placeholder="photo" required>

          <label>Nom</label>
          <input name="nom" type="text" placeholder="Nom" required>

          <label>Prénom</label>
          <input name="prénom" type="text" placeholder="Prénom" required>

          <label>Date de naissance</label>
          <input name="date_naissance" type="date" required>

          <label>email</label>
          <input name="email" type="email" placeholder="exemple@email.com" required>
        </div>

        <div class="form-right">
          <i class="fas fa-camera fa-3x photo-icon"></i>
        </div>
      </div>

      <!-- Section Informations professionnelles -->
      <h2>Informations professionnelles</h2>
      <div class="form-section">
        <div class="form-left">
          <label>Matricule</label>
          <input name="matriculation" type="text" placeholder="EMP001" required>

          <label>Date d'embauche</label>
          <input name="date_embauche" type="date">

          <label>Type_contrat</label>
          <select name="type_contrat" required>
            <option value="cdi">CDI</option>
            <option value="cdd">CDD</option>
            <option value="alternance">Alternance</option>
            <option value="stage">Stage</option>
          </select>

          <label>Service</label>
          <select name="service" required>
            <?php
            // Préparation de la requête
            $stmt = $pdo->prepare("SELECT * FROM services");

            // Exécution avec les paramètres
            $stmt->execute([]);

            // Récupération du résultat
            $services = $stmt->fetchAll();

            ?>
            <?php foreach ($services as $service): ?>
              <option value="<?php echo $service["id"] ?>"><?php echo $service["lib"] ?></option>
            <?php endforeach; ?>
          </select>

        </div>
      </div>

      <!-- Section Documents -->
      <h2>Documents et justificatifs</h2>
      <div class="form-section">
        <div class="form-left">
          <label>Ajouter_document</label>
          <input name="ajouter_document" type="file" required>

          <label>Mot de passe</label>
          <input name="" type="password" placeholder="Mot de passe">
        </div>
      </div>

      <!-- Boutons -->
      <div class="button-group">
        <a href="gestion_des_employes.php" class="btn cancel">Annuler</a>
        <button type="submit" class="btn save">Enregistrer</button>
      </div>
    </form>
  </div>
</body>

</html>