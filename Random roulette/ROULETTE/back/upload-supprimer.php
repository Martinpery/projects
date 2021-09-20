<?php

include ('veriflogin.php');

include ('entete.php');

include ('connectPDO.inc.php');

$supprimer_photo = $_GET['id'];

if (isset($_GET['supprimer'])) {
    $requete_supprimer = $bdd->query("DELETE FROM medias WHERE id=$supprimer_photo;");
    header('location: upload-list.php');
}

else {
    $requete_nom = $bdd->query("SELECT nom FROM medias WHERE id=$supprimer_photo;");
    $lourd = $requete_nom->fetch();
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carre.css"/>
        <title>Supprimer Image</title>
    </head>
    
    <body>
        
        <h2>Tu veux vraiment supprimer la belle image de <?= $lourd["nom"]; ?> ?</h2>
        <a href="upload-supprimer.php?id=<?= $supprimer_photo ?>&amp;supprimer" class="left-btn">OUI</a>
        <a href="upload-list.php" class="right-btn">NON</a>
        
    </body>

</html>