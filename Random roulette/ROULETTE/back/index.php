<?php

if (isset($_POST['login']) && isset($_POST['password'])){

    if ($_GET['login'] == "attempt") {
        $login = $_POST['login'];
        $password = $_POST['password'];
        include ("login.php");
    }
    
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/propre.css"/>
    <title>Connexion Backoffice</title>
</head>
<body>
    
    <div class="main">
        <p class="connect">Se connecter</p>
    
        <form id="form-login" name="form-login" method="POST" action="index.php?login=attempt">
        
            <div class="form-input"><input type="text" name="login" id="login" placeholder="Nom d'utilisateur"/></div> <br/>
        
            <div class="form-input"><input type="password" name="password" id="password" placeholder="Mot de passe"/></div> <br/>
        
            <div class="form-submit"><input class="envoie" type="submit" name="submit" value="Connexion"/></div>
            
            <?php if(isset($message)):?>
                <span>
                    <?php echo($message); ?>
                </span>
            <?php endif; ?>
            
            <?php
                if (isset($_GET['e'])) {
                    if ($_GET['e'] == "1") {
                        echo '<p class="erreur">AU VOLEUR !</p>';
                    }
                }
            ?>
    
        </form>
    </div>
</body>
    
    
</html>

<!-- ELEVE RECTANGLE -->
<!-- ELEVE MODIFIER RECTANGLE -->