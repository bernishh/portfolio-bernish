<?php 
$mysqlClient = new PDO('mysql:host=sql.hebergeur.com;dbname=mabase;charset=utf8', 'pierre.durand', 's3cr3t');



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <label for="" >Name :</label>
        <input type="text" name="nom" value="">
        <label for="" >Prenom :</label>
        <input type="text" name="prenom" value="">
        <input type="submit" style="background:red ;">
    </form>
    
</body>
</html>