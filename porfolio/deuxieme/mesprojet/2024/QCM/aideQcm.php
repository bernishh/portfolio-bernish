
<form action="reponseQcm.php" method="post">
<?php
include "connect.php";
$req = "select * from questions order by rand() limit 10";
$res = mysqli_query($id, $req);
$i = 1;
while($ligne = mysqli_fetch_assoc($res)){
    echo "<h3>$i : ".$ligne["libelleQ"]."</h3>";
    $idq = $ligne["idq"];
    $req2 = "select * from reponses where idq=$idq";
    $res2 = mysqli_query($id, $req2);
    while($ligne2 = mysqli_fetch_assoc($res2)){
        $idr = $ligne2["idr"];
        echo "<input type='radio' name='$idq' value='$idr' checked> ".$ligne2["libeller"]."<br>";
    }
    $i++;
}
?>
<input type="submit" value="Verifier">
</form>