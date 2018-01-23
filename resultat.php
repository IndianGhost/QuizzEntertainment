<?php include 'CONTROLEUR/database_connexion.php';?>
<?php include 'CONTROLEUR/lecture_donnees.php';?>
<?php
/*
*************Traitement de la valeur d'article*************
*/
	if(!(isset($_GET['pub']) && $_GET['rslt'])){
		echo "<h1>Ouuuuups !</h1>";
    	echo "<h3>Une erreur inattendue est survenue,</h3>";
    	echo "<h4>Aucun article n'est Selectionné !<h4>";
  	}
  	else
  	{
  		$_GET['pub'] = (int)abs($_GET['pub']);
     	$id_publication = $_GET['pub'];

     	$_GET['rslt'] = (int)abs($_GET['rslt']);
     	$id_resultat = $_GET['rslt'];
    	/*
      On prévient le cas où le visiteur change la valeur de n par une chaîne de caractères ou un autre type différent de int
    	*/

      	$requete = 'SELECT * FROM resultat WHERE id_resultat='.$id_resultat.' AND id_publication='.$id_publication;
		$reponse = $db->query($requete);
		while($donnees=$reponse->fetch())
		{//Debut de la boucle de lecture de donnees
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" > <!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo bye_XSS($donnees['titre_resultat']); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo bye_XSS($donnees['description_resultat']); ?>" />
	<meta name="keywords" content="ترفيه, ترفيهكوم, entertainment" />
	<meta name="author" content="BELLAALI Achraf" />

  <!-- 
	//////////////////////////////////////////////////////

	PLATEFORME HTML5
	CONÇUE ET DEVELOPPEE PAR BELLAALI Achraf

	HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by BELLAALI Achraf
	
	Web Site: 		achrafbellaali.comlu.com
	Email: 			achraf.bellaali@gmail.com
	Twitter: 		@achraf_bellaali
	LinkedIn: 		https://www.linkedin.com/in/bellaali-achraf

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="<?php echo bye_XSS($donnees['titre_resultat']); ?>"/>
	<!--On ajoute ici l'url de l'image-->
	<meta property="og:image" content=""/>
	<!--On ajoute ici l'url du site-->
	<meta property="og:url" content=""/>
	<!--On ajoute ici le nom du site-->
	<meta property="og:site_name" content=""/>
	<!--On ajoute ici la description-->
	<meta property="og:description" content="<?php echo bye_XSS($donnees['titre_resultat']); ?>"/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- L'icône de la page à déplacer ultérieurement dans le répertoire image -->
	<link rel="shortcut icon" type="x-icon" href="#">
	<!-- <link rel="stylesheet" type="text/css" href="css/form_style.css"/> -->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="image/icon.png"/>
	<style>
		.fh5co-right-position {
			margin-right: 5%;
			width: 65%;
			float: right;
			text-align: right;
			@media screen and (max-width: $screen-md) {
				width: 100%;
				text-align: left;
			}
		}
		.mybox{
			background-color: #ccc;
			box-shadow: 0 0 2em #777777;
		}
		.mybox img{
			padding-top: 15px;
		}
		.container{
			margin-top: 2.5%;
			margin-bottom: 2.5%;
		}
		.titre{
			font-weight: bold;
			color: #337ab7;
		}
		.description{
			font-size: large;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="mybox col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-xs-12">
			<div class="row">
				<img src="MODELE/resultat/<?php bye_XSS($donnees['id_publication']); ?>/<?php bye_XSS($donnees['id_resultat']); ?>.jpg" class="col-md-12 col-lg-12 col-xs-12" title="<?php bye_XSS($donnees['titre_resultat']); ?>">
			</div>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<h1 class="fh5co-right-position titre"><?php bye_XSS($donnees['titre_resultat']); ?></h1>
					<p class="fh5co-right-position description"><?php bye_XSS($donnees['description_resultat']); ?></p>
				</div>
			</div>
			<div class="row">
				<center>
					<p><a class="btn btn-lg btn-primary" href="https://www.facebook.com/sharer/sharer.php?u=<?php//lien_à_partager?>" target="_blank" role="button">أنشر نتيجتك على الفيسبوك</a></p>
				</center>
			</div>
		</div>
	</div>
</div>
<?php
			}//Fin de la boucle d'affichage while()
			$reponse->closeCursor();//Cloture de la boucle de lecture
		}//Fin de la condition else
 ?>
</body>
</html>