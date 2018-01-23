<?php 
    include '../CONTROLEUR/lecture_donnees.php';
    include '../CONTROLEUR/database_connexion.php';

    $requete = 'SELECT * FROM publication ORDER BY id_publication DESC';
    $reponse = $db->query($requete);
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
          	<li class="active"><a href="ajouter.php">Ajouter</a></li>
          	<li><a href="modifier.php">Modifier</a></li>
          	<li><a href="supprimer.php">Supprimer</a></li>
        	</ul>
      	</nav>
      </div>
    </div>
  <div class="container">
      <div class="jumbotron">
        <h1><h1>A vos <span id="marque">marque!</span>.. <span id="pret">Prêt!</span>.. <span id="partez">Partez!</span></h1></h1>
        <p class="lead">&laquo;<em>Remplir</em> les tables de votre <strong>base de données</strong> sans avoir à toucher le minimum du code&raquo;<br>Bonne Continuation!</p>
      </div>
    <div id="ajout_pub" class="row">
      <div class="col-lg-5 divform">
<?php   if(isset($_GET['ajpub']) OR isset($_GET['fold'])){
              if($_GET['ajpub']==1){
  ?>
        <div class="alert alert-success" role="alert">
          <strong>Saisie effectuée!</strong> Publication ajoutée avec succès.
        </div>
      <div class="alert alert-warning" role="alert">
        <strong>N.B:</strong> Un dossier nommé '<?php echo $_GET['fold'];?>' au chemin suivant 'CONTROLEUR/resultat/' a été crée pour que vous puissiez associer des résultats à cette nouvelle publication.
      </div>
<?php         }//Fin if ==1
              else if($_GET['ajpub']==0){
  ?>
        <div class="alert alert-danger" role="alert">
          <strong>Ouuuuups!</strong> Votre publication n'a pas pu être ajoutée. Réessayez ultérieurement!
        </div>
<?php         }//Fin if ==0
        }#Fin if isset
?>
    			<form action="ajout_pub.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <legend>Ajouter une publication</legend>
              <div class="row labeldiv">
                <label for="titre_publication" class="col-xs-6">Titre de la publication :</label><input type="text" name="titre_publication" id="titre_publication" class="col-xs-5 col-xs-offset-1" required/>
              </div>

              <div class="row labeldiv">
                <label for="description_publication" class="col-xs-6">Description de la publication :</label><input type="text" name="description_publication" id="description_publication" class="col-xs-5 col-xs-offset-1" required/>
              </div>

              <div class="row labeldiv">
                <label for="img_pub" class="col-xs-4">Image de la publication* :</label>
                <input type="file" name="img_pub" id="img_pub" class="col-xs-8" required />
              </div>
            </fieldset>
            <div class="row buttondiv">
              <input type="submit" value="valider" class="col-xs-5 btn btn-md btn-default" />
              <input type="reset" value="Recommencer" class="col-xs-offset-1 col-xs-6 btn btn-md btn-default" />
            </div>
      		</form>
      </div>

      <div class="col-lg-offset-2 col-lg-5 divform">
<?php   if(isset($_GET['ajrslt'])){
              if($_GET['ajrslt']==1){
  ?>
        <div class="alert alert-success" role="alert">
          <strong>Saisie effectuée!</strong> Résultat ajouté avec succès.
        </div>
<?php         }//Fin if ==1
              else if($_GET['ajrslt']==0){
  ?>
        <div class="alert alert-danger" role="alert">
          <strong>Ouuuuups!</strong> Votre résultat n'a pas pu être ajouté. Réessayez ultérieurement!
        </div>
<?php         }//Fin if ==0
        }#Fin if isset
?>
          <form action="ajout_result.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <legend>Ajouter un résultat</legend>
              <div class="row labeldiv">
                <label for="titre_resultat" class="col-xs-6">Titre du résultat :</label><input type="text" name="titre_resultat" id="titre_resultat" class="col-xs-5 col-xs-offset-1" required/>
              </div>

              <div class="row labeldiv">
                <label for="description_resultat" class="col-xs-6">Description du résultat :</label><input type="text" name="description_resultat" id="description_resultat" class="col-xs-5 col-xs-offset-1" required />
              </div>
<!-- On aura besoin du id_pub afin de determiner la pub convenable-->
              <div class="row labeldiv">
                <label class="col-xs-3">Associer à :</label>
                <select name="id_publication" class="col-xs-8 col-xs-offset-1" required>
          <?php  while($donnees=$reponse->fetch()){?>
                  <option value="<?php bye_XSS($donnees['id_publication']);?>"><?php bye_XSS($donnees['titre_publication']);?></option>
          <?php  }//FinWhile
              $reponse->closeCursor();//FinRequete
          ?>
                </select>
              </div>
              <div class="row labeldiv">
                <label for="img_rslt" class="col-xs-4">Image du résultat* :</label>
                <input type="file" name="img_rslt" id="img_rslt" class="col-xs-8" required />
              </div>
            </fieldset>
            <div class="row buttondiv">
              <input type="submit" value="valider" class="col-xs-5 btn btn-md btn-default" />
              <input type="reset" value="Recommencer" class="col-xs-offset-1 col-xs-6 btn btn-md btn-default" />
            </div>
          </form>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="col-lg-12">
        <h3 style="color: #090909;">Remarque : </h3>
        <p class="lead">La taille des image ne doit pas dépasser 8Mo et leurs extensions doivent être (.jpg). Il faut que la résolution soit (de préférence) 717 x 475 afin d'atteindre un affichage parfait.</p>
      </div>
    </div>
	</div>
  <div class="container">
    <footer class="footer">
        <p>&copy; Développée par <a href="http://www.achrafbellaali.comlu.com" title="Développée par BELLAALI Achraf" target="_blank">BELLAALI Achraf</a></p>
    </footer>
  </div>
  <script src="../js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>