<?php

include ('veriflogin.php');

include ('entete.php');

include ('connectPDO.inc.php');

if (isset($_GET['id']) && isset($_GET['login'])) :
$modifier_user = $_GET['id'];

endif;

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carre.css"/>
        <title>Modifier Utilisateur</title>
    </head>
    
    <body>
    
        <div class="tableau">
            <table class="m-ta">
                <tr>
                    <th class="m-th">Nom</th>
                    <th class="m-th">Prenom</th>
                    <th class="m-th">Login</th>
                    <th class="m-th">Password</th>
                    <th class="m-th">Droits</th>
                    <th class="m-th">Valider</th>
                </tr>

                <?php

                    $requete_modifier = $bdd->query("SELECT * FROM users WHERE id='".$modifier_user."'");
                    $lourd = $requete_modifier -> fetch();

                    if($lourd['droits'] == "Admin") {
                        $selected_admin = "selected=selected";
                    } 
                    else {
                        $selected_admin = "";
                    }

                    if($lourd['droits'] == "Sbire") {
                        $selected_sbire = "selected=selected";
                    }
                    else {
                        $selected_sbire = "";
                    }

                    echo "<tr><form action='modifier-confirmation.php?id=".$lourd['id']."' method='POST'>";

                    echo "<td><input type='text' name='nom' id='nom' value='".$lourd['nom']."'></td>";

                    echo "<td><input type='text' name='prenom' id='prenom' value='".$lourd['prenom']."'></td>";

                    echo "<td><input type='text' name='login' id='login' value='".$lourd['login']."'></td>";

                    echo "<td><input type='text' name='password' id='password' value='".$lourd['password']."'></td>";

                    echo "<td><select name='droits' id='droits' value='".$lourd['droits']."'>

                    <option value='Admin'".$selected_admin.">Admin</option>
                    <option value='Sbire'".$selected_sbire.">Sbire</option>

                    </select></td>";

                    echo "<td><input type='submit' name='valider' value='Valider'/></form></td></tr>";

                ?>

            </table>
        </div>
        
        <a href="user.php" class="retour-small">Annuler</a>
        
    </body>

    
</html>