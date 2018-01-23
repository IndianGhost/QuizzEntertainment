<?php include "../CONTROLEUR/database_connexion.php"; ?>
<?php include "../CONTROLEUR/lecture_donnees.php";?>
<?php
  $requete = 'SELECT id_message, contenu_message, DATE_FORMAT(date_message, \'%d-%m-%Y %H:%i:%s\') AS date_message_fr FROM message ORDER BY id_message DESC';
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

    <title>ADMIN Interface</title>
    <!-- Personnalised stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="../css/justified-nav.css" rel="stylesheet">

    
    <script src="../js/ie-emulation-modes-warning.js"></script>
    <!-- 
  //////////////////////////////////////////////////////

  PLATEFORME HTML5
  CONÇUE ET DEVELOPPEE PAR BELLAALI Achraf

  HTML5 TEMPLATE 
  DESIGNED & DEVELOPED by BELLAALI Achraf
    
  Web Site:     achrafbellaali.comlu.com
  Email:      achraf.bellaali@gmail.com
  Twitter:    @achraf_bellaali
  LinkedIn:     https://www.linkedin.com/in/bellaali-achraf


  //////////////////////////////////////////////////////
   -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted">Interface d'administration</h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.php">Accueil</a></li>
            <li><a href="ajouter.php">Ajouter</a></li>
            <li><a href="modifier.php">Modifier</a></li>
            <li><a href="supprimer.php">Supprimer</a></li>
          </ul>
        </nav>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Bienvenue cher Administrateur!</h1>
        <p class="lead">&laquo;Cette plateforme vous offre la possibilitée d'<em>ajouter</em>, <em>modifier</em> et/ou <em>supprimer</em> n'importe quelle ligne dans les tables de votre <strong>base de données</strong> sans avoir à toucher le minimum du code&raquo;<br/>Bonne Continuation!</p>
        <p><a class="btn btn-lg btn-success" href="ajouter.php" role="button">Remplir les tables</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Ajout</h2>
          <p class="text-danger">Lire Attentivement!</p>
          <p>En appuyant sur ce bouton, vous accèderez à une page d'insertion des publications et leurs résultats.<br/>Vous aurez besoin d'insérer des images, Faites attention à la taille demandée !</p>
          <p><a class="btn btn-primary" href="ajouter.php" role="button">Ajouter &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Modification</h2>
          <p>En appuyant sur ce bouton, vous accèderez à une page de modification des titres, descriptions ou même les images des publications et leurs résultats.<br/>Au cas de modification d'une image faites attention à la taille demandée!</p>
          <p><a class="btn btn-primary" href="modifier.php" role="button">Modifier &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Suppression</h2>
          <p>En appuyant sur ce bouton, vous accèderez à une page de suppression des publications et leurs résultats.<br/>La suppression d'une publication implique la suppression de tous ses résultats et le réciproque n'est pas forcément vrai!</p>
          <p><a class="btn btn-primary" href="supprimer.php" role="button">Supprimer &raquo;</a></p>
        </div>
      </div>

      <div class="row">
        <div class="jumbotron">
          <h1>Les messages reçus par les visiteurs</h1>
          <p class="lead">Le nombre de visiteurs vaut <?php
// 1 : on ouvre le fichier
$monfichier = fopen('../CONTROLEUR/compteur.cpt', 'r+');
// 2 : on lit la première ligne du fichier
$ligne = fgets($monfichier);
echo ($ligne-1);
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);
?> visiteurs.</p>
        </div>

      </div>

      <table id="divmsg" class="row">
        <tr class="row">
          <th class="col-lg-offset-2 col-lg-3 col-xs-2" style="text-align:center;">Date du message</th>
          <th class="col-lg-5 col-xs-10" style = "text-align:center;">Contenu</th>
        </tr>
<?php
    while ($donnees = $reponse->fetch()) {
      
?>
        <tr class="row">
          <td class="col-lg-4 col-xs-2"><?php bye_XSS($donnees['date_message_fr']);?></td><td class="col-lg-8 col-xs-10"><?php bye_XSS($donnees['contenu_message']);?></td>
        </tr>
<?php
     }//Fin de la boucle

     $reponse->closeCursor();
?>
      </table>

      <div class="row">
        <div class="jumbotron">
          <h1>Les demandes de publicité reçus par les visiteurs</h1>
        </div>
      </div>
      <table class="row">
        <tr class="row">
          <th class="col-xs-1" style = "text-align:center;">date</th>
          <th class="col-xs-1" style = "text-align:center;">nom</th>
          <th class="col-xs-1" style = "text-align:center;">email</th>
          <th class="col-xs-1" style = "text-align:center;">tel</th>
          <th class="col-xs-1" style = "text-align:center;">website</th>
          <th class="col-xs-7" style = "text-align:center;">msg</th>
        </tr>
<?php    $requete = 'SELECT id_publicitaire, DATE_FORMAT(date_publicitaire, \'%d-%m-%Y %H:%i:%s\') AS date_publicitaire, nom_publicitaire, email_publicitaire, tel_publicitaire, website_publicitaire, msg_publicitaire  FROM publicitaire ORDER BY id_publicitaire DESC';
  $reponse = $db->query($requete);
  while($data = $reponse->fetch())
  {
?>
        <tr class="row">
          <td class="col-xs-1"><?php bye_XSS($data['date_publicitaire']); ?></td>
          <td class="col-xs-1"><?php bye_XSS($data['nom_publicitaire']); ?></td>
          <td class="col-xs-1"><?php bye_XSS($data['email_publicitaire']); ?></td>
          <td class="col-xs-1"><?php bye_XSS($data['tel_publicitaire']); ?></td>
          <td class="col-xs-1"><?php bye_XSS($data['website_publicitaire']); ?></td>
          <td class="col-xs-7"><?php bye_XSS($data['msg_publicitaire']); ?></td>
        </tr>    
<?php
  }//Fin de la boucle d'affichage
  $reponse->closeCursor();//Cloture de la requete
?>
      </table>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Développée par <a href="http://www.achrafbellaali.comlu.com" title="Développée par BELLAALI Achraf" target="_blank">BELLAALI Achraf</a></p>
      </footer>

    </div> <!-- /container -->

    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
