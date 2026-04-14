<?php
include 'connect.php';
$idm = $_GET["idm"];
$req = "delete from messages where idm = $idm";
mysqli_query($id, $req);
header("location:chat.php");
?>