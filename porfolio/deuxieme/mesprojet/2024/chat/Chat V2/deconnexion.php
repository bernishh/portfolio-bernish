<?php
session_start();
echo "Au revoir ".$_SESSION["pseudo"].", Deconnexion en cours.......";
session_destroy();
header("refresh:3; url=connexion.php");
?>