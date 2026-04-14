<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <title>Document</title>
</head>

<?php 
    function pagePoulet(){
        echo"
            <div class='containerPage' id='poulet'>
            <button id='boutonBouton' onClick='FermerPoulet()'>Fermer</button>
                <div class='pagePoulet'>
                
                </div>
            </div>
        ";
    }

?> 