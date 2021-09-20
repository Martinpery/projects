<?php

include('veriflogin.php');

include ('entete.php');

include('connectPDO.inc.php');

$modifier_eleve = $_GET['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$annee = $_POST['annee'];
$image = $_POST['image'];
$affichage = $_POST['affichage'];

$requete = $bdd->prepare("UPDATE eleves SET nom=:nom, prenom=:prenom, annee=:annee, image=:image, affichage=:affichage WHERE id=:id");

$requete->execute(array(
    "id"=>$modifier_eleve,
    "nom"=>$nom,
    "prenom"=>$prenom,
    "annee"=>$annee,
    "image"=>$image,
    "affichage"=>$affichage
    
));

echo "LETS GO";

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carre.css"/>
        <title>Carré la modification</title>
    </head>
    
    <body>
        <h2>Les modifications ont été accepté ! Merci à vous.</h2>
        <a href="eleve.php" class="retour">Retourner en arrière</a>
        
    </body>

</html>