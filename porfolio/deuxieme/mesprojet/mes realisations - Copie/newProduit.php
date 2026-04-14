<!-- <?php 

// Paramètres de connexion à la base de données
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$base_de_donnees = "boutique2024"; // Nom de la base de données

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

if(isset($_POST["ajouter"])){
    // Assurez-vous que les données envoyées via POST sont définies
    if(isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["prix"]) && isset($_POST["image"])) {
        // Échapper les données pour éviter les attaques par injection SQL
        $nom = $connexion->real_escape_string($_POST["nom"]);
        $description = $connexion->real_escape_string($_POST["description"]);
        $prix = $connexion->real_escape_string($_POST["prix"]);
        $image = $connexion->real_escape_string($_POST["image"]);

        // Requête pour insérer des données dans la table 'produits'
        $sql = "INSERT INTO produits (nom, description, prix, image) VALUES ('$nom', '$description', '$prix', '$image')";
        $resultat = $connexion->query($sql);

        if ($resultat) {
            echo "Succès!";
        } else {
            echo "Erreur lors de l'insertion: " . $connexion->error;
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

// Fermer la connexion à la base de données
$connexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <form method="post">
            <input type="text" name="nom">
            <input type="text" name="description">
            <input type="text" name="prix">
            <input type="text" name="image">
            <input type="submit" name="ajouter" value="ajouter">
        </form>
    
</body>
</html> -->