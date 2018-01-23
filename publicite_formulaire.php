<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" > <!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>أعلن معنا</title>
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

	<!-- L'icône de la page à déplacer ultérieurement dans le répertoire image -->
	<link rel="shortcut icon" type="x-icon" href="#">
	<!-- <link rel="stylesheet" type="text/css" href="css/form_style.css"/> -->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="image/icon.png"/>
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #4CAF50;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
	</style>
</head>
<body>
	<div class="container">  
<?php
    if(!isset($_GET['success']))
    {
?>
  <form id="contact" action="CONTROLEUR/traitement_formulaire.php" method="post">
    <h3>ترفيه.كوم</h3>
    <h4>استمارة الإستشهار</h4>
    <fieldset>
      <input placeholder="الاسم" name="nom_publicitaire" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="البريد الإلكتروني" name="email_publicitaire" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="رقم الهاتف (غير إلزامي)" name="tel_publicitaire" type="tel" tabindex="3">
    </fieldset>
    <fieldset>
      <input placeholder="الموقع الإلكتروني (غير إلزامي)" name="website_publicitaire" type="url" tabindex="4">
    </fieldset>
    <fieldset>
      <textarea placeholder="كتابة رسالة ..." name="msg_publicitaire" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">إرسال</button>
    </fieldset>
    <p class="copyright">موقعكم الأول <a href="#" target="_blank" title="ترفيه.كوم">ترفيه.كوم</a></p>
  </form>
</div>
<footer id="fh5co-footer">
    <div class="fh5co-copyright animate-box">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="fh5co-right">
              <small>
             جميع حقوق الطبع محفوظة | <a href="about.php">أشرف بلعلي</a> | <a href="about.php">محمد الوهابي</a> | <a href="index.php"> الرئيسية </a>&copy;
              </small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php
      }//Fin if !isset get success
      else
      {
        if ($_GET['success']==1) {
?>  
  <div class="row" style="margin-top: 15%;">
    <div class="col-lg-12">
        <img src="images/thanks.jpg" title="نشكركم على ثقتكم بنا ستتوصلون ببريد إلكتروني قريبا لتأكيد استشهاركم" />
    </div>
  </div>
<?php
        }
        else if ($_GET['success']==0) 
        {
?>
          <script type="text/javascript">
            alert('لم يتم تسجيل طلبكم المرجو المحاولة لاحقا');
          </script>
<?php
        }
      }
?>
</body>
</html>