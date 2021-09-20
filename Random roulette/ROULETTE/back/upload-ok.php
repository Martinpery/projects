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
    <title>Upload Image</title>
</head>
<body>
    
<?php
    
    //Initialisation d'un variable qui autorisera ou non l'enregistrement dans la base
    $uploaded=0;
    
    $fichier_size = $_FILES['media']['size'];
    $fichier_name = $_FILES['media']['name'];
	$fichier_tmp  = $_FILES['media']['tmp_name'];
    
    //Si le fichier a une taille
	if($fichier_size>0) {
        
        //Répertoire où sera stocké ce fichier (le répertoire doit avoir les droits 0777) -- $varFolder est set dans verifLogin
			$rep="../front/images/";
        
        //On remplace les éventuels espaces dans le nom du fichier par des underscore
		$fichier_name = str_replace (" ", "_", $fichier_name);
		
		//On remplace les éventuels quote dans le nom du fichier par des underscore
		$fichier_name = str_replace ("'", "_", $fichier_name);

		//On remplace les A avec accent par un A normal
		$a = array("ä", "â", "à");
		$fichier_name = str_replace ($a, "a", $fichier_name);
			
		//On remplace les E avec accent par un E normal
		$e = array("é", "è", "ê", "ë");
		$fichier_name = str_replace ($e, "e", $fichier_name);
		
		//On remplace les I avec accent par un I normal
		$i = array("ï", "î");
		$fichier_name = str_replace ($i, "i", $fichier_name);
		
		//On remplace les O avec accent par un O normal
		$o = array("ö", "ô");
		$fichier_name = str_replace ($o, "o", $fichier_name);
		
		//On remplace les U avec accent par un U normal
		$u = array("ù", "û", "ü");
		$fichier_name = str_replace ($u, "u", $fichier_name);
		
		//On met le nom du fichier dans la variable $newfichier
		$newfichier=$fichier_name;
        
        //on sépare en deux le nom et l'extension
		list($nomFichier, $ext) = explode(".", $newfichier);

		// on place en minuscules les extensions
		$ext = strtolower($ext);

		// on rajoute le type pour éviter l'écrasement de fichiers
		$nomFichier = "Eleve_".$nomFichier;

		//On lui rajoute l'extension pour la copie dans le dossier
		$savefile= $rep.$nomFichier.".".$ext;
        
        // SI IMAGE PNG il faut la retailler, l'uploader et ensuite insérer dans la base
		if ($ext == "jpg") {

			// si Retaillage de l'image
			if(preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $fichier_name)) {
					exit("<div class='results'>Nom de fichier non valide (Vérifiez les apostrophes et guillemets)</div>");
				}
			$taillePaysage=320;
			$taillePortrait=240;
			$donnees=getimagesize($fichier_tmp);

			// Check de la taille de l'image
			if (($donnees[0] != 320) || ($donnees[1] != 240)) {
				exit("<div class='results'>Taille de fichier non valide (320x240 px obligatoire)<br><br><a href='upload.php' class='lienRouge'>Retour à la page d'upload de fichiers</a></p></div>");
			}
            
            $image = imagecreatefromjpeg($fichier_tmp);
            
            //portrait
			if ($donnees[0] < $donnees[1]) {
				$largeur_finale=round(($taillePortrait/$donnees[1])*$donnees[0]);
				$hauteur_finale=$taillePortrait;
			}
			else
			{//paysage
				$hauteur_finale=round(($taillePaysage/$donnees[0])*$donnees[1]);
				$largeur_finale=$taillePaysage;
			}
			$imageResized = imagecreatetruecolor($largeur_finale, $hauteur_finale); //création image finale retaillée
			imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $largeur_finale, $hauteur_finale, $donnees[0], $donnees[1]);//copie avec redimensionnement
            
            if (imagejpeg ($imageResized, $savefile, 80)) { // la fonction envoie l'image avec la compression
				imagedestroy ($image);
				//On passe la variable à 1
				$uploaded=1;

				$year = date("Y");
				
                $req = $bdd->prepare("INSERT INTO medias (nom) VALUES (:nom)");
                
                $req->execute(array(
                    "nom"=>$nomFichier.".".$ext
                ));

				echo ('<div class="results">Votre fichier a été uploadé correctement.<br><br>Vous l\'avez appelé <font color="red"><strong>"');
				echo ("$nomFichier."."$ext");
				echo ('"</strong></font> afin de le choisir dans le menu déroulant prévu à cet effet.</div>');
			}
		}
        
    } else { //Sinon, si le fichier n'a pas de taille, la variable reste à zéro pour empêcher l'écriture dans la base
        $uploaded = 0;
        echo ('<div class="results"<br><br><br><br>Votre fichier ne semble pas conforme.<br><br></div>');
	}
	?> 
	<?php if ($uploaded == 0) { echo ("<div class='results'Veuillez sélectionner le bon fichier à uploader.<br></div>"); } ?>
	<br /><p><a href="upload.php" class="retour">Retour</a></p>
    
    </body>
</html>