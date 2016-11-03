<html>
	<head>
		<title><?php echo $titre;?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
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
				<nav class="navbar navbar-blue navbar-fixed col-lg-12" role ="navigation">
			        <!-- logo Prixy et bouton hamburger pour la version Mobile -->
			        <div class="navbar-header">
			            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			            </button>
			            <a class = "hidden-lg hidden-md hidden-sm navbar-brand img-responsive" href="index.php"><img id="prixy" src="images/prixy.png" alt="logo Prixy" style="top: -18px;"></a>
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
					  		<li class="pull-right"><a href="connexion.php"><i class="glyphicon glyphicon-connexion"></i>Connexion</a></li>    
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

