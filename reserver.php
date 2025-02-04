<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=base_event', 'root', '');

 
if(isset($_POST['formconnexion'])) {
     $nom =$_POST['nom'];
      $prenom =$_POST['prenom'];
      $date =$_POST['date'];

   $requser =$bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
   
   $requser->execute(array($_SESSION['id']));
//$requser->execute(array(2))
   $user = $requser->fetch();
   $msg = $bdd->prepare('SELECT (*) FROM salles s , reservationsalles r WHERE(r.id_salles!=s.nom or r.date!= ?)');
   $msg->execute(array($date));
   $msg_nbr = $msg->rowCount();
echo"$date";
		 } 	

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Wedding &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

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

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.html">Le Reve<strong>.</strong></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="index.html">Accuiel</a></li>
						<li><a href="about.html">A propos</a></li>
						<li class="has-dropdown">
							<a href="services.html">Services</a>
							<ul class="dropdown">
								<li><a href="salles.php">sales des fêtes </a></li>
								<li><a href="banquet.html">le banquet </a></li>
								<li><a href="deco.html">décoration</a></li>
								<li><a href="photographes.html">photographes</a></li>
								<li><a href="music.html">groupes musicaux</a></li>
								<li><a href="fleuriste.html">fleuriste mariages</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="reserver.php">Réserver Salles</a></li>
						<li><a href="login.php">Se connecter</a></li>
						<li><a href="deconnexion2.php"><i class="glyphicon glyphicon-lock"></i> Déconnexion </a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		
	</header>

	<div id="fh5co-couple">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Chercher les salles disponible</h2>
					<h7>Faites de votre événement un moment d’exception et de succès!</h7>
					
			
				</div>
			</div>
			<form method="POST"  action="sallesDispo.php">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">Nom</label>
								<input type="text" id="nom" class="form-control" placeholder="votre nom" name="nom">
							</div>
							<div class="col-md-6">
								<label for="lname">Prénom</label>
								<input type="text" id="prenom" class="form-control" placeholder="votre prénom" name="prenom">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" class="form-control" placeholder="votre adress email " name="email">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Vous-étes </label><br>
								<input type="radio" id="sexe_pers" name="salles" value="mariée" checked>
								<label for="mariée ">Marié(e)</label>
							</div>
							<div class="col-md-12">
								
								<input type="radio" id="catg_salle" name="salles" value="marié" >
								<label for="en plein air ">Célibataire</label>
							</div>
							
						</div>


						<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Date de votre evénement</label>
								<input type="date" id="date" class="form-control" placeholder="ecrivez votre date ici" name="date">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Nombre des personnes probable </label>
								<input type="nombre" id="capacite" class="form-control" placeholder="ecrivez le nombre ici " name="nb">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Catégorie de salles préférées  </label><br>
								<input type="radio" id="catg_salle" name="salles" value="en plein air" checked>
								<label for="en plein air ">En plein air</label>
							</div>
							<div class="col-md-12">
								
								<input type="radio" id="catg_salle" name="salles" value="couverte" >
								<label for="en plein air ">Couverte</label>
							</div>
						</div>



						<div class="form-group">
							<input type="submit" value="Envoyer le Message" onclick="" class="btn btn-primary" name="formconnexion">
						</div>

					</form>		
			



	

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">

			<div class="row copyright">
				<div class="col-md-12 text-center">
					
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

	</body>
</html>

