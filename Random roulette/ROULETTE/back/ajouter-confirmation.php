<?php
    include('veriflogin.php');

    include ('entete.php');

    include('connectPDO.inc.php');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $droits = $_POST['droits'];

    $requete = $bdd->prepare("INSERT INTO users (nom, prenom, login, password, droits) VALUES (:nom, :prenom, :login, :password, :droits)");

    $requete->execute(array(
        "nom"=>$nom,
        "prenom"=>$prenom,
        "login"=>$login,
        "password"=>$password,
        "droits"=>$droits
    ));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carré l'ajout</title>
</head>
<body>
    <section>
        <h2>Vous venez d'ajouter l'utilisateur <?= $_POST['prenom'] ?> ! Bravo à lui.</h2>
        <a href="user.php" class="retour">Retour</a>
    </section>
</body>
</html>