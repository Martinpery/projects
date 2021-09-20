<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carre.css"/>
</head>
<body>
    <div class="tete">
        <h1>RANDOMIZER POUR SINGE</h1>
    
        <h4>Bienvenue à toi <?php echo($_SESSION['login']) ?> !</h4>
    
        <div class="button">
            <table>
                <tr>
                    <th><a href="eleve.php" class="btn">Eleves</a></th>
                    <th><a href="upload.php" class="btn">Uploader image</a></th>
                    <th><a href="user.php" class="btn">Utilisateurs</a></th>
                    <th><a href="logout.php" class="btn">Déconnexion</a></th>
                </tr>
            </table>
        </div>
    </div>
</body>
    
</html>