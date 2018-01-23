<?php
	include '../CONTROLEUR/database_connexion.php';
	include '../CONTROLEUR/lecture_donnees.php';

	$requete_pub = 'SELECT * FROM publication';
	$requete_rslt = 'SELECT * FROM resultat';

	$reponse_pub = $db->query($requete_pub);
	$reponse_rslt = $db->query($requete_rslt);
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
    <style type="text/css">
    	th, td{
    		text-align: center;
    	}
    	table{
    		margin: 2.5% 0 2.5% 0;
    	}
      table a:hover{
        box-shadow: 0 0 2em black;
      }
    </style>
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
<?php   if(isset($_GET['modpub']))
        {
              if($_GET['modpub']==1)
              {
  ?>
        <div class="alert alert-success" role="alert">
          <strong>Modification effectuée!</strong> Publication modifiée avec succès.
        </div>
<?php         }
              else if($_GET['modpub']==0)
              {
  ?>
        <div class="alert alert-danger col-lg-offset-2 col-lg-8" role="alert">
          <strong>Ouuuuups!</strong> Votre publication n'a pas pu être modifiée. Réessayez ultérieurement!
        </div>
<?php         }//Fin else if ==0
        }#Fin if isset
?>

<?php   if(isset($_GET['modrslt']))
        {
              if($_GET['modrslt']==1)
              {
  ?>
        <div class="alert alert-success" id="modrslt1" role="alert">
          <strong>Modification effectuée!</strong> Résultat modifié avec succès.
        </div>
<?php         }
              else if($_GET['modrslt']==0)
              {
  ?>
        <div class="alert alert-danger col-lg-offset-2 col-lg-8" id="modrslt0" role="alert">
          <strong>Ouuuuups!</strong> Ce résultat n'a pas pu être modifié. Réessayez ultérieurement!
        </div>
<?php         }//Fin else if ==0
        }#Fin if isset
?>
        </div>

      	<table class="row">
      	<legend class="page-header">Table des publications</legend>
      		<tr class="row">
      			<th class="col-lg-1 col-md-1 col-xs-1">id_publication</th>
      			<th class="col-lg-3 col-md-3 col-xs-3">titre_publication</th>
      			<th class="col-lg-8 col-md-8 col-xs-8">description_publication</th>
      		</tr>
<?php  		while($donnees=$reponse_pub->fetch())
			{//Affichage publication
?>
    			<tr class="row">
      			<td class="col-xs-1">
              
              <div class="row">
                <a href="modifier_pub.php?idpub=<?php bye_XSS($donnees['id_publication']);?>" title="Modifier publication <?php bye_XSS($donnees['id_publication']);?>">
                  <div class="col-lg-1 col-md-1 col-xs-1" >
                    <img src="../images/edit.png" width="10" length="10"/>
                  </div>
                </a>

                <div class="col-lg-1 col-md-1 col-xs-1">
                  <?php bye_XSS($donnees['id_publication']); ?>
                </div>
              </div>

            </td>

      			<td class="col-lg-3 col-md-3 col-xs-3">
              <?php bye_XSS($donnees['titre_publication']); ?>
            </td>

      			<td class="col-lg-8 col-md-8 col-xs-8">
              <?php bye_XSS($donnees['description_publication']); ?>
            </td>
      		</tr>
        </a>
<?php 		}//Fin Affichage publication
			$reponse_pub->closeCursor();//Cloture de la requete
?>          
      	</table>

      	<table class="row">
      	<legend class="page-header">Table des résultats</legend>
      		<tr class="row">
      			<th class="col-lg-1 col-md-1 col-xs-1">id_resultat</th>
      			<th class="col-lg-3 col-md-3 col-xs-3">titre_resultat</th>
      			<th class="col-lg-7 col-md-7 col-xs-7">description_resultat</th>
      			<th class="col-lg-1 col-md-1 col-xs-1">id_publication</th>
      		</tr>
<?php  		while($donnees=$reponse_rslt->fetch())
			    {//Affichage resultat
?>			<tr class="row">
      			<td class="col-xs-1">          
              <div class="row">
                <a href="modifier_result.php?idrslt=<?php bye_XSS($donnees['id_resultat']);?>" title="Modifier résultat <?php bye_XSS($donnees['id_resultat']);?>">
                  <div class="col-lg-1 col-md-1 col-xs-1" >
                    <img src="../images/edit.png" width="10" length="10"/>
                  </div>
                </a>

                <div class="col-lg-1 col-md-1 col-xs-1">
                  <?php bye_XSS($donnees['id_resultat']); ?>
                </div>
              </div>

            </td>
      			<td class="col-lg-3 col-md-3 col-xs-3">
              <?php bye_XSS($donnees['titre_resultat']);?>
            </td>
      			<td class="col-lg-7 col-md-7 col-xs-7">
              <?php bye_XSS($donnees['description_resultat']);?>
            </td>
      			<td class="col-lg-1 col-md-1 col-xs-1">
              <?php bye_XSS($donnees['id_publication']);?>
 
<?php     }//Fin while $donnees
          $reponse_rslt->closeCursor();
?>
            </td>
      		</tr>
      	</table>
      	<footer class="footer">
        	<p>&copy; Développée par <a href="http://www.achrafbellaali.comlu.com" title="Développée par BELLAALI Achraf" target="_blank">BELLAALI Achraf</a></p>
    	</footer>
    </div>
</body>
</html>