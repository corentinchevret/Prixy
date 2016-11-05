<?php include('fonction.inc.php'); $titre = "Prixy - Connexion";
	//setcookie('PHPSESSID', false, (time() - 3600), '/');unset($_COOKIE['PHPSESSID']);

	$pseudo = '';
	$pass_hache = '';
	$erreurConnexion = '';

	// On appuie sur le bouton valider => cela enclenche le traitement suivant pour la connexion
	if(isset($_POST['validerConnexion']))
	{
		// Definition des variables lorsque l'on a cliquer sur valider
		$pseudo = injec_SQL($_POST['login']);
		$pass_hache = sha1($_POST['mdp']);

		// Requête qui retourne l'id du membre qui essaye de se connecter
		$resultat = execSQL_fetchall("SELECT id_membre FROM MEMBRE WHERE login = '$pseudo' AND password = '$pass_hache'");
 		//var_dump($pseudo, $pass_hache);
		// Si aucun resultat, le membre n'existe pas dans la BDD donc message d'erreur (le membre s'est peut être trompé)
		//var_dump($resultat);
		//var_dump($erreurConnexion);
		if (!$resultat)
		{
		    $erreurConnexion = '<div class = "alert-danger col-lg-6 col-lg-push-3 col-sm-10 col-sm-push-1 col-xs-10 col-xs-push-1"><h4>Mauvais identifiant ou mot de passe !</h4></div>';
		}
		// Sinon on démarre une session où l'on va stocker ses identifiants pour les traiter par la suite dans la nav ou pour le profil
		else
		{
			session_start();
			$_SESSION['id'] = $resultat[0][0];
			$_SESSION['pseudonyme'] = $pseudo;
			$_SESSION['password'] = $pass_hache;
			//var_dump($_COOKIE);
			//var_dump($_SESSION);	

			// Création des cookies (à faire plus tard)  ==> FAIT !
			if (isset($_POST['cookie']))
			{
				$expire = 365*24*3600;		
				setcookie('pseudo',$pseudo,time()+$expire);
				setcookie("pass", $_POST['mdp'],time()+$expire);
			}
			if (!isset($_POST['cookie']))
			{
				if(isset($_COOKIE['pseudo']))
				{					
					setCookie('pseudo', false, (time() - 3600), '/');
					unset($_COOKIE['pseudo']);
					
					setCookie('pass', false, (time() - 3600), '/');		
					unset($_COOKIE['pass']);		
				}
			}

			header("Location: index.php"); // Redirection vers la page d'accueil si les identifiants sont valides
			exit;
		}

		// Test pour savoir si on est bien connecté
		/*if (isset($_SESSION['id']) AND isset($_SESSION['pseudonyme']))
		{
			echo 'Bonjour ' . $_SESSION['pseudonyme'];
		}*/		
	}

	include("barnav.php");	 
?>
		<div class="container plein contenu text-center">
			<br><h1><br><br><a href="nousContacter.php"><i class="glyphicon glyphicon-log-in"></i> Interface de Connexion</a></h1><br>
			<form method = "post">

				<!-- zone de texte pour le login -->
				<div class="row">
					<div class="col-xs-12 col-md-push-3  col-lg-6 col-lg-push-3">
			        	<div class="input-group">
					        <span class="input-group-addon" id="basic-addon3"><i class="fa fa-user fa-fw"></i></span>
					    	<input type="text" class="form-control" name = "login" maxlength = "25" value = "<?php if(isset($_COOKIE['pseudo'])) echo $_COOKIE['pseudo']?>" placeholder = "Renseignez votre identifiant de connexion" required = "required">
			            </div><br>
			        </div>
		        </div>

				<!-- zone de texte pour le mot de passe -->
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
			        	<div class="input-group">
					        <span class="input-group-addon" id="basic-addon3"><i class="fa fa-key fa-fw"></i></span>
			  				<input type="password" class="form-control" name = "mdp" maxlength = "25" value = "<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass']?>" placeholder = "Renseignez votre mot de passe" required = "required">				  
			            </div><br>
			        </div>
			    </div>
			    <?php echo $erreurConnexion;//echo var_dump($_SESSION); echo var_dump($pseudo, $pass_hache, sha1('cc'));  // Message d'erreur si le login et mot de passe ne sont pas correctes ?>
				
				<div class = "row"></div>
				
				<div class="row">
					<div class="col-lg-2 col-lg-push-3 col-md-push-3 col-sm-4 col-xs-6">
						<label class="custom-control custom-checkbox">
						  <input type="checkbox" name = "cookie" value="" type="checkbox" class="custom-control-input" checked>
						  <span class="custom-control-indicator"></span>
						  <span class="custom-control-description">Connexion auto ?</span>
						</label>				
					</div>
				</div>

				<div class="alert alert-info col-lg-10 col-lg-push-1 col-md-12 col-sm-12 col-xs-12">
				  <strong>Information !</strong><br />En cochant la case ci-dessus, vous acceptez que nous utilisions vos informations pour vous connecter avec des cookies.
				</div>

				<!-- ligne + bouton valider-->
				<div class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><hr></div>
				<div class="col-lg-12"><div class = "col-lg-2 col-lg-offset-5 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3"><input type="submit" class="form-control bold" name = "validerConnexion" value = "Se Connecter"></div></div>
				
				<!-- lien vers l'inscription et l'oubli de mot de passe -->												
				<div class = "col-lg-6 col-lg-push-1 col-sm-6 col-md-6 col-xs-6 text-left"><br><br><a href="inscription.php"><span class="bold"><i class="fa fa-user-plus" aria-hidden="true"></i> S'inscrire ?</span></a></div><div class = "col-lg-5 col-md-6 col-sm-6 col-xs-6 text-right"><br><br><a href="mdpPerdu.php?t=0"><span class="bold"><i class="fa fa-key" aria-hidden="true"></i> Mot de passe oublié ?</span></a><br></div>
				<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><br><br></p></div>
			</form>
		</div>
		
		<?php include("footer.php"); ?></div>