<?php
include ('veriflogin.php');

include ('entete.php');

include ('connectPDO.inc.php');
$requete = $bdd->query("SELECT * FROM eleves");
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carre.css"/>
    <title>Elèves</title>
</head>
<body>
    
    <div class="tableau">
        <table class="m-ta">
            <tr>
                <th class="m-th">Nom</th>
                <th class="m-th">Prenom</th>
                <th class="m-th">Annee</th>
                <th class="m-th">Photo</th>
                <th class="m-th">Affichage</th>
                <th class="m-th">Modifier</th>
                <th class="m-th">Supprimer</th>
            </tr>
        
            <?php
            while($row = $requete->fetch()) : ?>
            <tr>
                <td><?= $row["nom"]; ?></td>
                <td><?= $row["prenom"]; ?></td>
                <td><?= $row["annee"]; ?></td>
                <td><img class="photo" src="../front/images/<?= $row["image"]; ?>"></td>
                <td><?= $row["affichage"]; ?></td>
                <td><a id="modifier-eleve" href="eleve-modifier.php?id=<?= $row["id"]; ?>"><img src="images/edit-icon.png" class="icon"/></a></td>
                <td><a id="supprimer-eleve" href="eleve-supprimer.php?id=<?= $row["id"]; ?>"><img src="images/delete-icon.jpg" class="icon"/></a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    
    <div class="ajouter-eleve">
        <a id="ajouter-eleve" href="eleve-ajouter.php" class="ajout-btn">Ajouter un élève</a>
    </div>
    
</body>
    
    
</html>