<?php
var_dump($_POST);
include "connect.php";
$note = 0;
foreach($_POST as $cle => $val){
   // echo "A la question numéro $cle tu as répondu $val<br>";
   $req = "select * from reponses where idr = $val";
   $res = mysqli_query($id, $req);
   $ligne = mysqli_fetch_assoc($res);
   if($ligne["verite"] == 1){
    $note += 2;
   } 
}
echo "$note / 20";
?>