<?php 
$host = "mysql:host=sql201.infinityfree.com";
$dbname = "épiz_34162232_monsite";
$srv_username = "épiz_34162232";
$srv_password = "gd3kT6XwIH";

try {
    $db = new PDO("$host;dbname=$dbname", $srv_username, $srv_password);
} catch (PDOException $e) {
    die("Erreur !: " . $e->getMessage());
}

?>