<?php
include ('veriflogin.php');

include ('entete.php');

include ('connectPDO.inc.php');
$requete = $bdd->query("SELECT * FROM users");
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carre.css"/>
    <title>Utilisateurs</title>
</head>
<body>
    
    <div class="tableau">
        <table class="u-ta">
            <tr>
                <th class="u-th">Nom</th>
                <th class="u-th">Prenom</th>
                <th class="u-th">Login</th>
                <th class="u-th">Password</th>
                <th class="u-th">Droits</th>
                <th class="u-th">Modifier</th>
                <th class="u-th">Supprimer</th>
            </tr>
        
            <?php
            while($row = $requete->fetch()) : ?>
                <tr>
                    <td><?= $row["nom"]; ?></td>
                    <td><?= $row["prenom"]; ?></td>
                    <td><?= $row["login"]; ?></td>
                    <td><?= $row["password"]; ?></td>
                    <td><?= $row["droits"]; ?></td>
                    <td><a id="modifier-user" href="modifier.php?id=<?= $row["id"]; ?>&login=<?= $row['login']; ?>"><img src="images/edit-icon.png" class="icon"/></a></td>
                    <td><a id="supprimer-user" href="supprimer.php?id=<?= $row["id"]; ?>&login=<?= $row['login']; ?>"><img src="images/delete-icon.jpg" class="icon"/></a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    
    <div class="ajouter-user">
        <a id="ajouter-user" href="ajouter.php" class="ajout-btn">Ajouter un utilisateur</a>
    </div>
    
</body>
    
    
</html>