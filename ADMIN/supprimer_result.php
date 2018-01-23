<?php
	if (isset($_GET['idrslt'])) {
		include '../CONTROLEUR/database_connexion.php';
		#Suppression de l'image du resultat
		$requete = 'SELECT id_publication AS idpub FROM resultat WHERE id_resultat = '.$_GET['idrslt'];
		$reponse = $db->query($requete);
		while ($donnees = $reponse->fetch()) 
		{
			#Suppression de l'image du resultat
			$image_rslt = '../MODELE/resultat/'.$donnees['idpub'].'/'.$_GET['idrslt'].'.jpg';
			unlink($image_rslt);
		}
		$reponse->closeCursor();

		#Preparation de la requete
		$requete = $db->prepare('DELETE FROM resultat WHERE id_resultat = :id_rslt');
		$requete->execute(array('id_rslt' => $_GET['idrslt']));

		header('Location:../ADMIN/supprimer.php?delrslt=1');
	}
	else
	{
		header('Location:../ADMIN/supprimer.php?delrslt=0');
	}
?>