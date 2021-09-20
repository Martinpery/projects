<?php

include ("connectPDO.inc.php");

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {
    
    extract($_POST);
    // On récupère le password de la table qui correspond au login du visiteur
    
    $requete = $bdd->query("SELECT password FROM users WHERE login='".$login."'");
    $data = $requete -> fetch();
    
    if($data['password'] != $password) {
        
        $message = '<p id="message">Mauvais login/password. Merci de recommencer</p>';
    }
    
    else {
        session_start();
        $_SESSION['login'] = $login;
        echo '<meta http-equiv="refresh" content="0; URL=index2.php">';
        // Ici on peut afficher un lien pour renvoyer vers la page d'acceuil de notre espace membres
    }
}
    
else {
    $message = '<p id="message">Vous avez oublié de remplir un champ.</p>';
}

?>