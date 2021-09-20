<?php

include ('veriflogin.php');

include ('entete.php');

include ('connectPDO.inc.php');

if (isset($_GET['id'])) :
$modifier_eleve = $_GET['id'];

endif;

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carre.css"/>
        <title>Modifier Elève</title>
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
                    <th class="m-th">Valider</th>
                </tr>
    
            <?php

            $requete_modifier = $bdd->query("SELECT * FROM eleves WHERE id='".$modifier_eleve."'");
            $lourd = $requete_modifier -> fetch();

                if($lourd['affichage'] == "Oui") {
                    $selected_oui = "selected=selected";
                } 
                else {
                    $selected_oui = "";
                }

                if($lourd['affichage'] == "Non") {
                    $selected_non = "selected=selected";
                }
                else {
                    $selected_non = "";
                }

                echo "<tr><form action='eleve-modifier-ok.php?id=".$lourd['id']."' method='POST'>";

                echo "<td><input type='text' name='nom' id='nom' value='".$lourd['nom']."'></td>";

                echo "<td><input type='text' name='prenom' id='prenom' value='".$lourd['prenom']."'></td>";

                echo "<td><input type='text' name='annee' id='annee' value='".$lourd['annee']."'></td>"; ?>

                <div>
                    <img id="previewPhoto" src="../front/images/"/>
                </div>

                <?php

                echo "<td><select name='image' id='image'>";

                $requete_image = $bdd->query("SELECT * FROM medias");
                while($photo = $requete_image->fetch()) : ?>

                <option value="<?= $photo['nom']; ?>"><?= $photo['nom']; ?></option>
                <?php endwhile;
                echo "</select></td>";   

                echo "<td><select name='affichage' id='affichage' value='".$lourd['affichage']."'>

                <option value='Oui'".$selected_oui.">Oui</option>
                <option value='Non'".$selected_non.">Non</option>

                </select></td>";

                echo "<td><input type='submit' name='valider' value='Valider'/></form></td></tr>";

            ?>
                
            </table>
        </div>
        
        <a href="eleve.php" class="retour-small">Annuler</a>
        
    </body>
    
</html>

<!-- onchange="document.getElementById('previewPhoto').setAttribute('src','../front/images/' + this.value);