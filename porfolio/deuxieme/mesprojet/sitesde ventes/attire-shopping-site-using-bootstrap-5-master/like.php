
<?php require("config/PDO.php");   ?>
<?php 

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){
    error_reporting(E_ERROR |  E_PARSE);
    $get =(int) $_GET['id'];
    $gett =(int) $_GET['t'];
    $chek =$bdd->prepare('SELECT id FROM image WHERE id = ?');
    $chek->excute(array($getid));
    if ($chek->rowCount() == 1){
        if($grt == 1) {

            $ins = $bdd->prepare('INSERT INTO like (id_image) VALUES (?)');
            $ins->excute(array($getid));
        } 
        header('location: index.php?id='.$getid);
            

        }
    }

?>