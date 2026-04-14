
<!DOCTYPE html>
<html>
<head>
    <title>Barre de recherche en PHP avec POST</title>
</head>
<body>
<form action="recherche.php" method="post">
	        <input type="text" placeholder="type des produits" name="type" required>
	        <input type="submit" value="affiche" name="send" class="see">
	    </form>

	    <div class="show">

	                          <h3>vetment</h3>

		    <div class='types'>


		        <?php

		            if(isset($_POST["send"])){
		                
		                $types = $_POST["type"];

		                $req = "select * from produits where types = '$types'";
                        <?php 
$host = "localhost";
$dbname = "monsite";
$srv_username = "root";
$srv_password = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $srv_username, $srv_password);
} catch (PDOException $e) {
    die("Erreur !: " . $e->getMessage());
}

?>
		                $resultat = mysqli_query($id, $req);
		                if(mysqli_num_rows($resultat)>0){
		              
		            while($ligne = mysqli_fetch_assoc($resultat)){

		                $ligne["prix"];
		                $price = $ligne["prix"];
		                $name = $ligne["name"];
		                $val = $ligne["valeur"];
		                $type = $ligne["types"];

		                echo "<li> Nom : ".$name." - Prix : ".$price."€"." - Reste : ".$val." ".$name."</li><br>";
		            }
		                }else{
		                    echo "Le type de produit demandé est indisponible";
		                }
		            }

		        ?>

</body>
</html>
