<?php

include('veriflogin.php');

include ('entete.php');

include('connectPDO.inc.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$annee = $_POST['annee'];
$image = $_POST['image'];
$affichage = $_POST['affichage'];

$requete = $bdd->prepare("INSERT INTO eleves (nom, prenom, annee, image, affichage) VALUES (:nom, :prenom, :annee, :image, :affichage)");

$requete->execute(array(
    "nom"=>$nom,
    "prenom"=>$prenom,
    "annee"=>$annee,
    "image"=>$image,
    "affichage"=>$affichage
));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carre.css"/>
    <title>Carré l'ajout</title>
</head>
<body>
    <section>
        <h2>L'élève <?= $_POST['prenom'] ?> fait son entrée ! Bienvenue à lui.</h2>
        <a href="eleve.php" class="retour">Retour</a>
    </section>
</body>
</html>