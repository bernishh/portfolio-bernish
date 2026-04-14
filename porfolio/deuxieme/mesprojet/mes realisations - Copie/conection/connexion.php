<?php 
$connexion =new PDO('mysql:host=localhost;dbname=mes_realisation','root',"");

if($connexion)

{
    echo" bien connecter";
}

?>