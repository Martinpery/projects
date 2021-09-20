<?php

include('veriflogin.php');

include ('entete.php');

include('connectPDO.inc.php');

$modifier_user = $_GET['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];
$droits = $_POST['droits'];

$requete = $bdd->prepare("UPDATE users SET nom=:nom, prenom=:prenom, login=:login, password=:password, droits=:droits WHERE id=:id");

$requete->execute(array(
    "id"=>$modifier_user,
    "nom"=>$nom,
    "prenom"=>$prenom,
    "login"=>$login,
    "password"=>$password,
    "droits"=>$droits
    
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
        <div class="main">
            <div class="second">
                <h2>Les modifications ont été accepté ! Merci à vous.</h2>
                <a href="user.php" class="retour">Retourner en arrière</a>
            </div>
        </div>
    </body>

</html>