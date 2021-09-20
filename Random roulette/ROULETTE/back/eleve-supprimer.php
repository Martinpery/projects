<?php

include ('veriflogin.php');

include ('entete.php');

include ('connectPDO.inc.php');

$supprimer_eleve = $_GET['id'];

if (isset($_GET['supprimer'])) {
    $requete_supprimer = $bdd->query("DELETE FROM eleves WHERE id=$supprimer_eleve;");
    header('location: eleve.php');
}

else {
    $requete_prenom = $bdd->query("SELECT prenom FROM eleves WHERE id=$supprimer_eleve;");
    $lourd = $requete_prenom->fetch();
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carre.css"/>
        <title>Supprimer Elève</title>
    </head>
    
    <body>
        
        <h2>Tu veux vraiment supprimer l'élève <?= $lourd["prenom"]; ?> ?</h2>
        <a href="eleve-supprimer.php?id=<?= $supprimer_eleve ?>&amp;supprimer" class="left-btn">OUI</a>
        <a href="eleve.php" class="right-btn">NON</a>
        
    </body>

</html>