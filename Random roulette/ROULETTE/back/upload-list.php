<?php

include('veriflogin.php');

include ('entete.php');

include('connectPDO.inc.php');
$requete = $bdd->query("SELECT * FROM medias");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carre.css"/>
    <title>Liste Images</title>
</head>
<body>
    
    <div class="tableau">
        <table class="m-ta">
            <tr>
                <th class="m-th">Nom</th>
                <th class="m-th">Photo</th>
                <th class="m-th">Supprimer</th>
            </tr>
        
            <?php
            while($row = $requete->fetch()) : ?>
                <tr>
                    <td><?= $row["nom"]; ?></td>
                    <td><img class="photo" src="../front/images/<?= $row["nom"]; ?>"></td>
                    <td><a id="supprimer-photo" href="upload-supprimer.php?id=<?= $row["id"]; ?>"><img src="images/delete-icon.jpg" class="icon"/></a></td></tr>
            <?php endwhile; ?>
        </table>
        
    </div>
    
    <div>
        <a id="retour-photo" href="upload.php" class="retour">Retour</a>
    </div>
    
</body>
    
    
</html>