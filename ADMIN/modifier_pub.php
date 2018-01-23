<?php
    if(isset($_GET['idpub']))
    {
      include '../CONTROLEUR/database_connexion.php';
      include '../CONTROLEUR/lecture_donnees.php';
      $requete = 'SELECT * FROM publication WHERE id_publication='.$_GET['idpub'];
      $reponse = $db->query($requete);
      while ($donnees=$reponse->fetch()) 
      {//Debut de la boucle while affichage
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content=""/>
    <meta name="author" content="BELLAALI Achraf"/>
    <link rel="icon" href="#">
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

    <title>ADMIN Interface</title>

    <!-- Personnalised stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="../css/justified-nav.css" rel="stylesheet">

    
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
      <div class="masthead">
      	<h3 class="text-muted">Interface d'administration</h3>
      	<nav>
        	<ul class="nav nav-justified">
          	<li><a href="index.php">Accueil</a></li>
          	<li><a href="ajouter.php">Ajouter</a></li>
          	<li class="active"><a href="modifier.php">Modifier</a></li>
          	<li><a href="supprimer.php">Supprimer</a></li>
        	</ul>
      	</nav>
      </div>

      <div class="jumbotron">
        <h1><h1>A vos <span id="marque">marque!</span>.. <span id="pret">Prêt!</span>.. <span id="partez">Partez!</span></h1></h1>
        <p class="lead">&laquo;<em>Modifier</em> n'importe quelle tables de votre <strong>base de données</strong> sans avoir à toucher le minimum du code&raquo;<br/>Vous n'avez qu'a taper sur Entrer après avoir modifier une ligne<br/>Bonne Continuation!</p>
      </div>

      <div class="row">
        <div class="col-lg-offset-3 col-lg-6 col-xs-12">
          <form method="post" action="ajout_pub.php" enctype="multipart/form-data">
            <fieldset>
              <legend>Modification de la publication <?php bye_XSS($donnees['id_publication']);?></legend>
              <input type="hidden" name="id_publication" value="<?php bye_XSS($donnees['id_publication']);?>">
              <div class="row labeldiv">
                <label for="titre_publication" class="col-xs-6">Titre de la publication :</label><input type="text" name="titre_publication" id="titre_publication" class="col-xs-5 col-xs-offset-1" value="<?php bye_XSS($donnees['titre_publication']);?>" />
              </div>

              <div class="row labeldiv">
                <label for="description_publication" class="col-xs-6">Description de la publication :</label><input type="text" name="description_publication" id="description_publication" class="col-xs-5 col-xs-offset-1"  value="<?php bye_XSS($donnees['description_publication']);?>"/>
              </div>

              <div class="row labeldiv">
                <label for="img_pub" class="col-xs-4">Image de la publication* :</label>
                <input type="file" name="img_pub" id="img_pub" class="col-xs-8"/>
              </div>
            </fieldset>
            <div class="row buttondiv">
              <input type="submit" value="valider" class="col-xs-5 btn btn-md btn-default" />
              <input type="reset" value="Recommencer" class="col-xs-offset-1 col-xs-6 btn btn-md btn-default" />
            </div>
          </form>
        </div>
      </div>
      <?php
             }//Fin if(isset($_GET[]))
          }//Fin boucle d'affichage while()
          $reponse->closeCursor();//Cloture de la requete
      ?>
      
      <div class="row revenir_modifier">
        <a href="modifier.php" title="Cliquer pour revenir à la table des publications">
          <div class="btn btn-primary col-lg-offset-2 col-lg-8 col-sm-offset-2 col-sm-8"  role="button">
            <span>Revenir à la table des publications et des résultats &raquo;</span>
          </div>
        </a>
      </div>

    <br/>
    <div class="row">
      <div class="col-lg-12">
        <h3 style="color: #090909;">Remarque : </h3>
        <p class="lead">La taille des image ne doit pas dépasser 8Mo et leurs extensions doivent être (.jpg). Il faut que la résolution soit (de préférence) 717 x 475 afin d'atteindre un affichage parfait.</p>
      </div>
    </div>

      <footer class="footer">
          <p>&copy; Développée par <a href="http://www.achrafbellaali.comlu.com" title="Développée par BELLAALI Achraf" target="_blank">BELLAALI Achraf</a></p>
      </footer>
  </div>
</body>
</html>