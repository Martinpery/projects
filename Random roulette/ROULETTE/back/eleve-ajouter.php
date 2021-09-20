<?php

include('veriflogin.php');

include ('entete.php');

include('connectPDO.inc.php');
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carre.css"/>
        <title>Ajouter Elève</title>
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
                    <th class="m-th">Ajouter</th>
                </tr>
                
                <?php 
                $row = $bdd->query("SELECT * FROM eleves");
                $lourd = $row -> fetch();
                            
                echo "<tr><form action='eleve-ajouter-ok.php' method='POST'>";
                    
                echo "<td><input type='text' name='nom' id='nom' required></td>";
                    
                echo "<td><input type='text' name='prenom' id='prenom' required></td>";
                    
                echo "<td><input type='text' name='annee' id='annee' required></td>";
                    
                echo "<td><select name='image' id='image'>";

                $requete_image = $bdd->query("SELECT * FROM medias");
                while($photo = $requete_image->fetch()) : ?>

                <option value="<?= $photo['nom']; ?>"><?= $photo['nom']; ?></option>
                <?php endwhile;
                echo "</select></td>";
                    
                echo "<td><select name='affichage' id='affichage'>
                                        
                <option value='Oui'>Oui</option>
                <option value='Non'>Non</option>
                                        
                </select></td>";
                    
                echo "<td><input type='submit' name='ajouter' value='Ajouter' /></form></td></tr>";
                    
                ?>
            </table>
        </div>
        
        <a href="eleve.php" class="retour-small">Annuler</a>
            
    </body>

</html>