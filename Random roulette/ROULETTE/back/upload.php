<?php

include('veriflogin.php');

include ('entete.php');

include('connectPDO.inc.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carre.css"/>
    <title>Images</title>
</head>
<body>
    <div class="upb">
        <div>
            <h2>Uploader des images</h2>
        
            <h5>.jpg uniquement, 10 Millions de pixels max (askip)</h5>
        </div>
    
        <div>
            <h6>Dépose la photo des futurs élèves</h6>
            <form action="upload-ok.php" method="POST" enctype="multipart/form-data">
                <div>
                    <input type="file" name="media" id="media">
                    <p>320x240 zbi</p>
                </div>
                <input type="submit" value="Confirmer l'envoi de la photo">
            </form>
        </div>
    </div>
    
    <div>
        <a href="upload-list.php" class="ajout-btn">Voir la liste des images</a>
    </div>
    
</body>
</html>