<?php
session_start();
include_once("config/PDO.php");

$user_id_logged = $_SESSION['user_id-logged'];

// Selectionner toutes les annonces avec au moins un message envoyé par l'utilisateur ou destiné à l'utilisateur
$stmt = $db->prepare("
SELECT annonce_id, annonce_titre, m.expediteur_id FROM annonces a
JOIN messages m on m.annonces_annonce_id = a.annonce_id
WHERE (m.expediteur_id = ? OR m.destinataire_id = ?)
GROUP BY m.expediteur_id");
$stmt->execute([$user_id_logged, $user_id_logged]);
$annonces = $stmt->fetchAll();

// echo '<pre>' , print_r($annonces) , '</pre>';


// Selectionner les messages liés à une annonce
if(isset($_GET['annonce_id']) && !empty($_GET['annonce_id'])){
    $annonce_id = $_GET['annonce_id'];
    $stmt = $db->query("
    SELECT * FROM messages m
    INNER JOIN users u on u.user_id = m.expediteur_id
    WHERE (m.destinataire_id = $user_id_logged OR m.expediteur_id = $user_id_logged)
    AND annonces_annonce_id = $annonce_id");
    if($stmt->rowCount() != 0){
        $messages = $stmt->fetchAll();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php
$page_title = "Messages";
include_once('head.php');
?>
</head>
<body>
<!-- Affichage annonces -->
<?php
foreach ($annonces as $annonce):
?>
    <a href="messages.php?annonce_id=<?=$annonce['annonce_id']?>"><?=$annonce['annonce_titre']?></a><br>
    <img src="images/annonces/annonce<?=$annonce['annonce_id']?>_1.jpg" width="50px"><br>
<?php
endforeach
?>

<!-- Affichage messages liés à une annonce -->
<?php
if(isset($messages)):
    foreach ($messages as $message):
        if($message['expediteur_id'] == $user_id_logged):
?>
    <span>Vous:</span><br>
    <span><?=$message['message']?></span><br>
    <span><?=$message['message_date']?></span><br><br>
<?php
        else:
?>
    <span><?=$message['username']?></span><br>
    <span><?=$message['message']?></span><br>
    <span><?=$message['message_date']?></span><br><br>
<?php
        endif;
    endforeach;
?>

<?php
endif
?>
</body>
</html>