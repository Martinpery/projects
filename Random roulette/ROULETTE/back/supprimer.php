<?php

include ('veriflogin.php');

include ('entete.php');

include ('connectPDO.inc.php');

$supprimer_user = $_GET['id'];

if (isset($_GET['supprimer'])) {
    $requete_supprimer = $bdd->query("DELETE FROM users WHERE id=$supprimer_user;");
    header('location: user.php');
}

else {
    $requete_prenom = $bdd->query("SELECT prenom FROM  users WHERE id=$supprimer_user;");
    $lourd = $requete_prenom->fetch();
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carre.css"/>
        <title>Supprimer Utilisateur</title>
    </head>
    
    <body>
        
        <h2>Voulez-vous vraiment supprimer l'utilisateur <?= $lourd["prenom"]; ?> ?</h2>
        <a href="supprimer.php?id=<?= $supprimer_user ?>&amp;supprimer" class="left-btn">OUI</a>
        <a href="user.php" class="right-btn">NON</a>
        
    </body>

</html>