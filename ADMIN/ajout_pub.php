<?php
	include '../CONTROLEUR/database_connexion.php';
	include '../CONTROLEUR/write_file.php';
	if (isset($_POST['id_publication'])) 
	{//Modification d'une pub qui existe deja
			$req = $db->prepare('UPDATE publication SET titre_publication = :titre_pub, description_publication = :descpub WHERE id_publication = :idpub');

			$req->execute(array(
						'idpub' => $_POST['id_publication'],
						'titre_pub' => $_POST['titre_publication'],
						'descpub' => $_POST['description_publication']
					));
			if(isset($_FILES['img_pub']))
			{
				// Testons si le fichier n'est pas trop gros
				if ($_FILES['img_pub']['size']<=1000000) 
				{
					// printf("Votre photo a un volume moins de 1 Mo\n");
					// printf("Votre photo a été téléchargée avec succès\n");
					#Testons si l'extension est autorisee
					$infosfichier = pathinfo($_FILES['img_pub']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg');
					if(in_array($extension_upload, $extensions_autorisees))
					{
						// On peut valider le fichier et le stocker definitivement
						$_FILES['img_pub']['name'] = $_POST['id_publication'].'.jpg';
						move_uploaded_file($_FILES['img_pub']['tmp_name'], '../MODELE/publication/'.
						basename($_FILES['img_pub']['name']));
					}//endif in_array()
				}//endif $_FILES[][size]
			}//endif  isset($_FILES[])
		header('Location:../ADMIN/modifier.php?modpub=1');
	}
	else if(isset($_POST['titre_publication']) AND isset($_POST['description_publication']) AND isset($_FILES['img_pub']) AND $_FILES['img_pub']['error']== 0)
	{
			$requete='SELECT MAX(id_publication) AS last_id_pub FROM publication';
			$reponse = $db->query($requete);
			while($donnees=$reponse->fetch())
			{
				$id_new_pub = $donnees['last_id_pub']+1;
				$reponse->closeCursor();
				#Préparation de la requête(SQL Injection)
				$requete = $db->prepare('INSERT INTO publication(id_publication, titre_publication, description_publication) VALUES(:id, :titre, :description)');
				$requete->execute(array('id'=> $id_new_pub, 'titre' => $_POST['titre_publication'], 'description' => $_POST['description_publication']));

				// Testons si le fichier n'est pas trop gros
				if ($_FILES['img_pub']['size']<=1000000) 
				{
					// printf("Votre photo a un volume moins de 1 Mo\n");
					// printf("Votre photo a été téléchargée avec succès\n");
					#Testons si l'extension est autorisee
					$infosfichier = pathinfo($_FILES['img_pub']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg');
					if(in_array($extension_upload, $extensions_autorisees))
					{
						// On peut valider le fichier et le stocker definitivement
						$_FILES['img_pub']['name'] = $id_new_pub.'.jpg';
						move_uploaded_file($_FILES['img_pub']['tmp_name'], '../MODELE/publication/'.
						basename($_FILES['img_pub']['name']));
			/*
				Creation d'un dossier qui contiendra les resultats
				associes a cette nouvelle pub
			*/
					$path = '../MODELE/resultat/'.$id_new_pub;
					mkdir($path, 0700);

					$path .='/index.php';
					$contents = "<?php header(\"Location:../../../\");?>";
					file_force_contents($path, $contents, FILE_APPEND | LOCK_EX);


						header('Location:../ADMIN/ajouter.php?ajpub=1&fold='.$id_new_pub);
					}//endif in_array()
				}//endif $_FILES[]
			}//Fin while affichage
	}#Fin else if isset post titre description file
	else{
		header("Location:../ADMIN/ajouter.php?ajpub=0");
	}
?>