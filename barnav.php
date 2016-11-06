<html>
	<head>
		<title><?php echo $titre;?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    
	    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	    <link href="bootstrap/bootstrap4/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  	
	    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	    <link rel="stylesheet" href="assets/css/style.css">
	    <link rel="icon" type="image/png" href="images/iconePrixy.png" />

	    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	   
		<script src="bootstrap/js/jquery-1.12.4.js"></script>
		<script src="bootstrap/bootstrap4/dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="bootstrap/jquery-ui/jquery-ui.js"></script> 
	</head>
		<body>
			<script type="text/javascript" src="bootstrap/js/fonctions.js"></script>

			<div id="top" role = "navigation">
				<nav class="navbar navbar-blue navbar-fixed col-lg-12" role ="navigation" style="padding:0px">
			        <!-- logo Prixy et bouton hamburger pour la version Mobile -->
			        <div class="navbar-header">
			            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			            </button>

						<?php
							// Si le membre ne veut pas de cookies, on va chercher le login dans la $_SESSION du membre et l'affiche à la place de Connexion
							// Le bouton du login sera un menu déroulant oû l'on pourra accéder au profil ou se déconnecter 
							if(isset($_SESSION['pseudonyme']))
							{
								echo '<button type="button" class="nav profil-center hidden-sm hidden-md hidden-lg bold" data-toggle="dropdown" style="margin:0;"><h5 style="color:white">' . $_SESSION['pseudonyme'] . '<span class="caret"></span></h5></button>
							          <ul class="dropdown-menu pull-right">
							            <li><a href="compte.php"><i class="fa fa-user" aria-hidden="true"></i> Mon Compte</a></li>
							            <li><a href="deconnexion.php"><i class="fa fa-times" aria-hidden="true"></i> Deconnexion</a></li>
							          </ul>';
							}
							// Sinon le membre n'est pas connecté et le bouton Connexion apparait
							else
							{
								echo '<button type="button" class="nav profil-center hidden-sm hidden-md hidden-lg"><a href="connexion.php"><i class="glyphicon glyphicon-log-in"></i></a></button>';
							}
						?>	
			            <a class = "hidden-lg hidden-md hidden-sm navbar-brand" href="index.php"><img id="prixy" src="images/prixy.png" alt="logo Prixy" style="margin-left:15%; margin-right:85%; top:-5px"></a>
			        </div>
			        <!-- menu avec chaque rubrique pour la version desktop -->
			        <div class="collapse navbar-collapse" id="navbar1">
			        	<a rel="home" href="index.php" title="Bienvenue chez Prixy !">
				        	<img id="prixy" src="images/prixy.png" class="hidden-xs" alt="Logo Prixy">
			    		</a> 
			            <ul class="nav navbar-nav">
					  		<li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Accueil</a></li>
					  		<li><a href="nousConnaitre.php"><i class="glyphicon glyphicon-eye-open"></i> Nous connaître</a></li>
					  		<li><a href="nosFormations.php"><i class="glyphicon glyphicon-list"></i> Nos Formations</a></li>
					  		<li><a href="nosAtouts.php"><i class="glyphicon glyphicon-plus-sign"></i> Nos Atouts</a></li>  
					  		<li><a href="nousContacter.php"><i class="glyphicon glyphicon-phone"></i> Nous Contacter</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right hidden-xs">							
						<?php
							// Si le membre ne veut pas de cookies, on va chercher le login dans la $_SESSION du membre et l'affiche à la place de Connexion
							// Le bouton du login sera un menu déroulant oû l'on pourra accéder au profil ou se déconnecter 
							if(isset($_SESSION['pseudonyme']))
							{
								echo '<span class = "hidden-md hidden-sm hidden-xs"></span>
									  <li class="dropdown blanc">		
					                	  <a class = "" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i>  ' . $_SESSION['pseudonyme'] . '<span class="caret"></span><br></a>
								          <ul class="dropdown-menu">
								            <li><a href="compte.php"><i class="fa fa-user" aria-hidden="true"></i> Mon Compte</a></li>
								            <li><a href="deconnexion.php"><i class="fa fa-times" aria-hidden="true"></i> Deconnexion</a></li>
								          </ul>
					                  </li>';
							}
							// Sinon le membre n'est pas connecté et le bouton Connexion apparait
							else
							{
								echo '<li><a href="connexion.php"><i class="glyphicon glyphicon-log-in"></i> Connexion</a></li>';
							}
						?>				
						</ul>
						<!--<form class="navbar-form navbar-right hidden-md hidden-sm hidden-xs" role="search">
							<div class="input-group add-on">
						        <input class="form-control" placeholder="Recherche..." name="recherche" id="recherche" type="text" onkeyup="autocomplet()">
		                    	<ul id="list"></ul>
						        <div class="input-group-btn">
						            <button class="form-control" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						        </div>
						    </div>
						</form>-->
			        </div>
				</nav>
			</div>

