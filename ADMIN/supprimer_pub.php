<?php
	if (isset($_GET['idpub'])) 
	{
		include '../CONTROLEUR/database_connexion.php';
		include '../CONTROLEUR/remove_dir.php';

#Suppression de l'image de la publication
		$path = '../MODELE/publication/'.$_GET['idpub'].'.jpg';
		unlink($path);

/*
	Suppression du dossier contenant les resultats de cette pub
*/
		$path = '../MODELE/resultat/'.$_GET['idpub'];
		rrmdir($path);
//Supprimer la pub
		$requete = $db->prepare('DELETE FROM publication WHERE id_publication = :id_pub');
		$requete->execute(array('id_pub' => $_GET['idpub']));
//Supprimer tous les resultats de cette pub
		$requete = $db->prepare('DELETE FROM resultat WHERE id_publication = :id_pub');
		$requete->execute(array('id_pub' => $_GET['idpub']));
		header('Location:../ADMIN/supprimer.php?delpub=1');
	}
	else
	{
		header('Location:../ADMIN/supprimer.php?delpub=0');
	}
?>