<?php

if(!empty($_POST)) {
    $stackEleves = "";
    foreach ($_POST as $key => $value) {
        $presence = strpos($key, 'chb');
        if ($presence === false) {
        } else {
            $stackEleves .= $value.", ";
        }
    }
    $stackEleves = substr($stackEleves, 0, -2);
}

include('../back/connectPDO.inc.php');

$requete1 = $bdd->query("SELECT id, prenom, image FROM eleves WHERE affichage = 'Oui' ORDER BY prenom ASC");

$j=1;
$i=1;

?>

<html>
    <head>
        <title>RANDOMIZE SINGERIE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/slot.js"></script>
    </head>
    <body>
    
        <form action="index.php?defile=ok" method="POST" name="form">
            <div id="noms">
            
            
                <h1>SINGERIE</h1>
                    
                    <?php while($resultat1=$requete1 -> fetch()) :

                        $chb ="chb".$j;
                        if(isset($_POST[$chb])) :
                            $checkedChb ="checked";
                            else :
                                $checkedChb = "" ;
                            endif ;
                        
                        ?>
                        <div class="containerChb">
                            <input type="checkbox" class="checkNames" value="<?php echo $resultat1['id']; ?>" id="<?php echo $chb; ?>" name="<?php echo $chb; ?>" <?php echo $checkedChb; ?>> 
                            <?php echo utf8_decode($resultat1['prenom']); ?>&nbsp;&nbsp;
                        </div>
                        <?php 
                            $j++; 
                             endwhile;
                            $requete1->closeCursor();
                        
                        ?>
                <br/>
        
                <p>
                <input type="checkbox" class="checkAll" id="checkAll" name="checkAll"/>
                <span class="text12">CHECK ALL</span>
                </p>
        
                <br/>
        
                <button type="submit" id="fvj" class="bouton">FETE DES SINGES</button>
        
                <br/>
                <br/>
        
            </div>
        </form>
        
        <?php
        if (isset($_GET['defile'])) {
            if ($_GET['defile'] == "ok") {

                $requete2 = $bdd->query("SELECT id, image FROM eleves WHERE affichage = 'oui' and id IN ($stackEleves) ORDER BY nom ASC");
                $requete3 = $bdd->query("SELECT id, image FROM eleves WHERE affichage = 'oui' and id IN ($stackEleves) ORDER BY nom ASC");
                $row = $requete3->fetchAll();
                $num_rows = count($row);
                
        ?>
        
        <article>
            
            <div id="slot">
                
                
                
                <ul style="height:<?= $num_rows; ?>00%" class="blur genie">
                
                <?php
                while($resultat2 = $requete2 -> fetch()) { ?>
                    
                    <li style="display:inline-block;"><img id="<?= $resultat2['id']; ?>" src="images/<?= $resultat2['image'];?>" class="avatar"/></li>
                
                    <?php
                        $i++; }
                    $requete2->closeCursor();
                    ?>
                </ul>
        
            </div>
                
        </article>
        
        <article id="blockDown">
            <button id="choose" class="bouton">Choix du Singe</button>
            <p><a class="lien" href="index.php">Recharger la page</a></p>
        </article>
        
        <?php
            }
        }
        ?>
        
    </body>
</html>

<!-- AJAX RECTANGLE -->