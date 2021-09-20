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
        <title>Ajouter Utilisateur</title>
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
                <th class="m-th">Ajouter</th>
            </tr>
                    <?php 
                    $row = $bdd->query("SELECT * FROM users");
                    $lourd = $row -> fetch();
                            
                    echo "<tr><form action='ajouter-confirmation.php' method='POST'>";
                    
                    echo "<td><input type='text' name='nom' id='nom' required></td>";
                    
                    echo "<td><input type='text' name='prenom' id='prenom' required></td>";
                    
                    echo "<td><input type='text' name='login' id='login' required></td>";
                    
                    echo "<td><input type='text' name='password' id='password' required></td>";
                    
                    echo "<td><select name='droits' id='droits'>
                                        
                    <option value='Admin'>Admin</option>
                    <option value='Sbire' selected='selected'>Sbire</option>
                                        
                    </select></td>";
                    
                    echo "<td><input type='submit' name='ajouter' value='Ajouter' /></form></td></tr>";
                    
                    ?>
            </table>
        </div>
        
        <a href="user.php" class="retour-small">Annuler</a>
            
    </body>

</html>