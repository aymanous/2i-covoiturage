<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Covoit2i</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

	<!-- Liaisons aux fichiers css de Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Francois+One|Lobster|Amaranth" rel="stylesheet">
	<link href="css/design.css" rel="stylesheet" />
	<link href="css/sticky-footer.css" rel="stylesheet" />
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	<![endif]-->

	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	

</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body>

<!-- style inspiré de http://www.bootstrapzero.com/bootstrap-template/sticky-footer --> 

<!-- Wrap all page content here -->
<div id="wrap">
  
  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
        </button>
	<a class="navbar-brand" href="index.php?view=accueil"><img src="src/img/logo_icon.png" alt=""><span>kovoit</span></a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
					<?php
						echo mkHeadLink("Trajets disponibles","accueil",$view);
						echo mkHeadLink("Proposer un trajet","createtrajet",$view);

						// Si l'utilisateur n'est pas connecte, on affiche un lien de connexion 
						if (valider("connecte","SESSION")){
							?>
								<div class="userLogged">
									<img src="src/img/no_image_user.png" alt="">
									<div>
										<span><?php echo recupGeneriqueBdd("utilisateur","prenom","WHERE id=".valider("idUser","SESSION")); ?></span>
										<span><?php echo recupGeneriqueBdd("utilisateur","nom","WHERE id=".valider("idUser","SESSION")); ?></span>
									</div>
									<a href="controleur.php?action=Logout"><img src="src/img/logout_icon.png" alt=""></a>
								</div>
							<?php
										
						} else {
							echo mkHeadLink("Inscription","#",$view); 
							echo mkHeadLink("Connexion","login",$view);
						}
					?>
        </ul>
      </div><!--/.nav-collapse -->
  </div>

   <!-- Begin page content -->
  <div class="container">
	  









