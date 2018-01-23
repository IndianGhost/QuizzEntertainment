<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php include 'database_connexion.php'; ?>
<?php
	if (!isset($_GET['n']) OR !isset($_POST['contenu_message']))
	{
		echo "makayn walo";
	header('Location:../index.php?send_succes=0');
	}
	else
	{
		echo "lbdya d else";
		$n = (int)$_GET['n'];
		#Préparation de la requête(SQL Injection)
		$requete = $db->prepare('INSERT INTO message(contenu_message, date_message) VALUES(:msg, NOW())');
		$requete->execute(array('msg' => $_POST['contenu_message']));

		switch ($n)
		{
			case '1':
				header('Location:../index.php?send_succes=1');
				echo "switch 1";
				break;
			case '2':
				header('Location:../pricing.php?send_succes=1');
				echo "switch 2";
				break;
			case '3':
				header('Location:../about.php?send_succes=1');
				echo "switch 3";
				break;
			default:
				header('Location:../index.php?send_succes=0');
				echo "switch default";
				break;
		}
	}
?>
</head>
<body>

</body>
</html>