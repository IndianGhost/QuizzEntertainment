<?php include 'CONTROLEUR/database_connexion.php';?>
<?php include 'CONTROLEUR/lecture_donnees.php';?>
<?php include 'CONTROLEUR/visite.php';?>

<?php
	$requete = 'SELECT * FROM publication ORDER BY id_publication DESC';
	$reponse = $db->query($requete);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>الصفحة الرئيسية</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="ترفيه كوم موقعكم الترفيهي الأول" />
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
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<?php
	if (isset($_GET['send_succes']))
	{
		$_GET['send_succes'] = (int)$_GET['send_succes'];
		if ($_GET['send_succes'])
		{
?>
			<script type="text/javascript">
				alert('تم الإرسال بنجاح');
			</script>
<?php
		}
		else
		{
?>
			<script type="text/javascript">
				alert('رسالتكم لم ترسل بنجاح، المرجو إعادة المحاولة لاحقا');
			</script>
<?php		
		}
	}
?>

	<!-- L'icône de la page à déplacer ultérieurement dans le répertoire image -->
	<link rel="shortcut icon" type="x-icon" href="#">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- 
	Default Theme Style 
	You can change the style.css (default color purple) to one of these styles
	
	

	-->
	<link rel="stylesheet" href="css/style.css">

	<!-- Styleswitcher ( This style is for demo purposes only, you may delete this anytime. ) -->
	<link rel="stylesheet" id="theme-switch" href="css/style.css">
	<!-- End demo purposes only -->


	<style>
	/* For demo purpose only */

	/*
	GREEN
	8dc63f
	RED
	FA5555
	TURQUOISE
	27E1CE
	BLUE 
	2772DB
	ORANGE
	FF7844
	YELLOW
	FCDA05
	PINK
	F64662
	PURPLE
	7045FF

	*/
	
	/* For Demo Purposes Only ( You can delete this anytime :-) */
	#colour-variations {
		padding: 10px;
		-webkit-transition: 0.5s;
	  	-o-transition: 0.5s;
	  	transition: 0.5s;
		width: 140px;
		position: fixed;
		left: 0;
		top: 100px;
		z-index: 999999;
		background: #fff;
		/*border-radius: 4px;*/
		border-top-right-radius: 4px;
		border-bottom-right-radius: 4px;
		-webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
	}
	#colour-variations.sleep {
		margin-left: -140px;
	}
	#colour-variations h3 {
		text-align: center;;
		font-size: 11px;
		letter-spacing: 2px;
		text-transform: uppercase;
		color: #777;
		margin: 0 0 10px 0;
		padding: 0;;
	}

	#colour-variations ul,
	#colour-variations ul li {
		padding: 0;
		margin: 0;
	}
	#colour-variations ul {
		margin-bottom: 20px;
		float: left;	
	}
	#colour-variations li {
		list-style: none;
		display: inline;
	}
	#colour-variations li a {
		width: 20px;
		height: 20px;
		position: relative;
		float: left;
		margin: 5px;
	}



	#colour-variations li a[data-theme="style"] {
		background: #8dc63f;
	}
	#colour-variations li a[data-theme="red"] {
		background: #FA5555;
	}
	#colour-variations li a[data-theme="turquoise"] {
		background: #27E1CE;
	}
	#colour-variations li a[data-theme="blue"] {
		background: #2772DB;
	}
	#colour-variations li a[data-theme="orange"] {
		background: #FF7844;
	}
	#colour-variations li a[data-theme="yellow"] {
		background: #FCDA05;
	}
	#colour-variations li a[data-theme="pink"] {
		background: #F64662;
	}
	#colour-variations li a[data-theme="purple"] {
		background: #7045FF;
	}

	#colour-variations a[data-layout="boxed"],
	#colour-variations a[data-layout="wide"] {
		padding: 2px 0;
		width: 48%;
		border: 1px solid #ededed;
		text-align: center;
		color: #777;
		display: block;
	}
	#colour-variations a[data-layout="boxed"]:hover,
	#colour-variations a[data-layout="wide"]:hover {
		border: 1px solid #777;
	}
	#colour-variations a[data-layout="boxed"] {
		float: left;
	}
	#colour-variations a[data-layout="wide"] {
		float: right;
	}

	.option-toggle {
		position: absolute;
		right: 0;
		top: 0;
		margin-top: 5px;
		margin-right: -30px;
		width: 30px;
		height: 30px;
		background: #8dc63f;
		text-align: center;
		border-top-right-radius: 4px;
		border-bottom-right-radius: 4px;
		color: #fff;
		cursor: pointer;
		-webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
	}
	.option-toggle i {
		top: 2px;
		position: relative;
	}
	.option-toggle:hover, .option-toggle:focus, .option-toggle:active {
		color:  #fff;
		text-decoration: none;
		outline: none;
	}
	</style>
	<!-- End demo purposes only -->

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>


	<!-- 
		INFO:
		Add 'boxed' class to body element to make the layout as boxed style.
		Example: 
		<body class="boxed">	
	-->
	<body>
	
	<!-- Loader -->
	<div class="fh5co-loader"></div>
	
	<div id="fh5co-page">
		<section id="fh5co-header">
			<div class="container">
				<nav role="navigation">
					<ul class="pull-left left-menu">
						<li><a href="index.php" class="actual_page">الرئيسية</a></li>
						<li><a href="pricing.php">أعلن معنا</a></li>
						<li><a href="about.php">من نحن</a></li>
					</ul>
					<h1 id="fh5co-logo"><a href="index.php">ترفيه<span>.</span>كوم</a></h1>
					<!-- <ul class="pull-right right-menu">
						<li><a href="#">Login</a></li>
						<li class="fh5co-cta-btn"><a href="#">Sign up</a></li>
					</ul> -->
				</nav>
			</div>
		</section>
		<!-- #fh5co-header -->

		<section id="fh5co-hero" class="js-fullheight" style="background-image: url(images/hero_bg.jpg);" data-next="yes">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-intro js-fullheight">
					<div class="fh5co-intro-text">
						<!-- 
							INFO:
							Change the class to 'fh5co-right-position' or 'fh5co-center-position' to change the layout position
							Example:
							<div class="fh5co-right-position">
						-->
						<div class="fh5co-right-position">
							<h2 class="animate-box">ترفيه.كوم<br/>موقعكم الترفيهي الأول</h2>
							<!-- <p class="animate-box"><a href="#" class="btn btn-outline popup-vimeo btn-video"><i class="icon-play2"></i> شاهد</a> <a href="#" target="_blank" class="btn btn-primary">زر صفحتنا على الفيسبوك</a></p> -->
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-learn-more animate-box">
				<a href="#" class="scroll-btn">
					<span class="text">أنقر لمشاهدة المزيد</span>
					<span class="arrow"><i class="icon-chevron-down"></i></span>
				</a>
			</div>
		</section>
		<!-- END #fh5co-hero -->


		<section id="fh5co-projects">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-lead animate-box">تطبيقاتنا</h2>
						<p class="fh5co-sub-lead animate-box">.استمتع باستخدام تطبيقاتنا المجانية و قم بإبهار أصدقائك على مواقع التواصل الإجتماعي</p>
					</div>
				</div>
				<div class="row">
<?php
	while($donnees=$reponse->fetch())
	{//Debut de la boucle de lecture de donnees

		$id_publication = $donnees['id_publication'];
		/*
	Les id_resultat ayant le meme id_publication mentionne
	ci-dessus
	*/
		$retour = $db->query(
		'SELECT id_resultat FROM resultat WHERE id_publication='.$id_publication.' ORDER BY RAND() LIMIT 1'
		);
		while($donnees_resultat = $retour->fetch()){
			$resultat_aleatoire=$donnees_resultat['id_resultat'];
		}
		$retour->closeCursor();
?>
					<div class="col-md-4 col-sm-6 col-xs-12 animate-box">
					
						<a href="resultat.php?pub=<?php echo $id_publication;?>&amp;rslt=<?php echo $resultat_aleatoire;?>" class="fh5co-project-item" target="_blank"> <!--class="image-popup"-->

							<img width="717" height="475" src="MODELE/publication/<?php echo $id_publication;?>.jpg" alt="<?php bye_XSS($donnees['titre_publication']); ?>" class="img-responsive">
							<div class="fh5co-text">
								<h2><?php bye_XSS($donnees['titre_publication']); ?></h2>
								<p><?php bye_XSS($donnees['description_publication']); ?></p>
							</div>
						</a>
					</div>
<?php
	}//Fin de la boucle de lecture de donnees
	$reponse->closeCursor();//Fin de la requete des pubs
?>
				</div>
			</div>
		</section>
		<!-- END #fh5co-projects -->
		<section id="fh5co-testimonials">
			<div class="container">
				<div class="row row-bottom-padded-sm">
					<div class="col-md-6 col-md-offset-3 text-center">
						<div class="fh5co-label animate-box">إحصائيات</div>
						<h2 class="fh5co-lead animate-box">انضم إلى <?php nombre_visite('CONTROLEUR/compteur.cpt'); ?> زائر استخدموا تطبيقاتنا الممتعة </h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center animate-box">
						<div class="flexslider">
					  		<ul class="slides">
							   <li>
							    	<blockquote>
							      	<p>&rdquo;الإبداع لا يعني بالضرورة خلق أشياء جديدة، لم و لن يكون بوسعنا دائما خلق أشياء من العدم. الأمر يتعلق دائما بملكة الربط بين التفاصيل بشكل يجعلنا نثلج صدور الآخرين&ldquo;</p>
							      	<p><cite> أشرف بلعلي &mdash;</cite></p>
							      </blockquote>
							   </li>
							   <li>
							    	<blockquote>
							      	<p>&ldquo;لم نكن أول من انطلق في الميدان، لكننا واثقون من وصولنا إلى القمة بفضل أعمالنا المتميزة&rdquo;</p>
							      	<p><cite>محمد الوهابي &mdash;</cite></p>
							      </blockquote>
							   </li>
							</ul>
						</div>
						<div class="flexslider-controls">
						   <ol class="flex-control-nav">
						      <li class="animate-box"><img src="images/person4.jpg"></li>
						      <li class="animate-box"><img src="images/person2.jpg"></li>
						      <li class="animate-box"><img src="images/person3.jpg"></li>
						   </ol>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END #fh5co-testimonials -->

		<section id="fh5co-subscribe">
			<div class="container">
		
				<h3 class="animate-box"><label for="contenu_message">تواصل معنا</label></h3>
				<form action="CONTROLEUR/traitement_msg.php?n=1" method="post" class="animate-box">
					<i class="fh5co-icon icon-paper-plane"></i>
					<input type="text" class="form-control" placeholder="قم بإدخال رسالتك هنا" id="contenu_message" name="contenu_message">
					<input type="submit" value="أرسل" class="btn btn-primary">
				</form>

			</div>
		</section>
		<!-- END #fh5co-subscribe -->

		<footer id="fh5co-footer">
			<div class="fh5co-copyright animate-box">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="fh5co-right"><small> جميع حقوق الطبع محفوظة | <a href="about.php">أشرف بلعلي</a> | <a href="about.php">محمد الوهابي</a> | <a href="index.php"> الرئيسية </a>&copy;</small></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END #fh5co-footer -->
	</div>
	<!-- END #fh5co-page -->
	
	<!-- For demo purposes Only ( You may delete this anytime :-) -->
	<div id="colour-variations">
		<a class="option-toggle"><i class="icon-gear"></i></a>
		<h3>اختيار اللون</h3>
		<ul>
			<li><a href="javascript: void(0);" data-theme="style"></a></li>
			<li><a href="javascript: void(0);" data-theme="red"></a></li>
			<li><a href="javascript: void(0);" data-theme="turquoise"></a></li>
			<li><a href="javascript: void(0);" data-theme="blue"></a></li>
			<li><a href="javascript: void(0);" data-theme="orange"></a></li>
			<li><a href="javascript: void(0);" data-theme="yellow"></a></li>
			<li><a href="javascript: void(0);" data-theme="pink"></a></li>
			<li><a href="javascript: void(0);" data-theme="purple"></a></li>
		</ul>
		<a href="#" data-layout="boxed">ضيق</a>
		<a href="#" data-layout="wide">رحب</a>
	</div>
	<!-- End demo purposes only -->

	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- For demo purposes only styleswitcher ( You may delete this anytime ) -->
	<script src="js/jquery.style.switcher.js"></script>
	<script>
		$(function(){
			$('#colour-variations ul').styleSwitcher({
				defaultThemeId: 'theme-switch',
				hasPreview: false,
				cookie: {
		          	expires: 30,
		          	isManagingLoad: true
		      	}
			});	
			$('.option-toggle').click(function() {
				$('#colour-variations').toggleClass('sleep');
			});
		});
	</script>
	<!-- End demo purposes only -->

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	<!-- 
	INFO:
	jQuery Cookie for Demo Purposes Only. 
	The code below is to toggle the layout to boxed or wide 
	-->
	<script src="js/jquery.cookie.js"></script>
	<script>
		$(function(){

			if ( $.cookie('layoutCookie') != '' ) {
				$('body').addClass($.cookie('layoutCookie'));
			}

			$('a[data-layout="boxed"]').click(function(event){
				event.preventDefault();
				$.cookie('layoutCookie', 'boxed', { expires: 7, path: '/'});
				$('body').addClass($.cookie('layoutCookie')); // the value is boxed.
			});

			$('a[data-layout="wide"]').click(function(event){
				event.preventDefault();
				$('body').removeClass($.cookie('layoutCookie')); // the value is boxed.
				$.removeCookie('layoutCookie', { path: '/' }); // remove the value of our cookie 'layoutCookie'
			});
		});
	</script>
	

	</body>
</html>

