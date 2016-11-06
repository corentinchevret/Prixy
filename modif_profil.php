<?php 

session_start(); include('fonction.inc.php'); //var_dump($_SESSION);

	$date_naiss = '';
	$nouv_mdp = '';
	$conf_mdp = '';
	$modifier = true;
	$errNouvMdp = '';

	// Requête qui modifie les infos du client
	if(isset($_POST['valider_profil']))
    {
		$nom = injec_SQL($_POST['nom']); 
	    $prenom = injec_SQL($_POST['prenom']);
		$date_naiss = date_format(date_create($_POST['date_naiss']), "Y-m-d");
		$mail = injec_SQL($_POST['mail']); 
		$adr = injec_SQL($_POST['adr']);
		$cp = injec_SQL($_POST['cp']);
		$sexe = injec_SQL($_POST['sexe']);
		$ville = injec_SQL($_POST['ville']);
		$tel_fixe = injec_SQL($_POST['tel_fixe']);
		$tel_mobile = injec_SQL($_POST['tel_mobile']);
		$login = injec_SQL($_POST['login']);
		$mdp = $_POST['mdp'];
		$nouv_mdp = $_POST['nouv_mdp'];
		$conf_mdp = $_POST['conf_mdp'];

		// On vérifie si le mdp est le bon
		if(sha1($mdp) != $_SESSION['password'])
		{
			$errMdp = "<p class = 'col-lg-9 col-lg-offset-3 text-danger text-left'>Vous avez mal renseigné votre mot de passe !</p>";
			$modifier = false;
		}

		// On verifie que le new mdp et sa confirmation sont identiques
		if($nouv_mdp != $conf_mdp)
		{
			$errNouvMdp = "<p class = 'col-lg-9 col-lg-offset-3 text-danger text-left'>Les deux mots de passe ne sont pas identiques !</p>";
			$modifier = false;
		}

		// 
		if(sha1($mdp) == $_SESSION['password'] && ($nouv_mdp == '' && $conf_mdp == ''))
		{
			$nouv_mdp = $_POST['mdp'];
		}

		// Si tout est bon on fait une update des infos du membre dans le bdd
		if($modifier)
		{
			$req_infos_membre = "UPDATE MEMBRE
								 SET nom = '$nom' , prenom = '$prenom', date_naissance = '$date_naiss', sexe = '$sexe', adr = '$adr', 
								     cp = '$cp', ville = '$ville', tel = '$tel_fixe', tel_mobile = '$tel_mobile', login = '$login', password = '" . sha1($nouv_mdp) . "', email = '$mail'
	        		                 WHERE id_membre = '" . $_SESSION['id'] ."';";
			execSQL_insert($req_infos_membre);
			$_SESSION['pseudonyme'] = $login;
			$_SESSION['password'] = sha1($nouv_mdp);
			$expire = 365*24*3600;
			setcookie('pseudo',$login,time()+$expire);
		    setcookie("pass", $nouv_mdp,time()+$expire);
		    header("location: profil.php");
		    exit;
			/*$_COOKIE['pseudo'] = $login ;
			$_COOKIE['pass'] = $nouv_mdp;*/
		}
	}

	$titre = "Prixy - Modifier Profil"; include("barnav.php");

	$page = "modifProfil";
	$str = array();
	$str = return_str($language, $page);
?>
				
		<div class="container-fluid text-center">
			<div class="row">
				<h1><a href="modif_profil.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo $str["1"] ?></a></h1><br>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bold">	
				<form class="form-horizontal" role="form" action = "modif_profil.php" method = "post">			
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<fieldset><br>
							<legend><h2><?php echo $str["2"] ?></h2></legend>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["4"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" name = "nom" maxlength = "25" value = '<?php echo $infos_membre[0][0]; ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label" for="lg"><?php echo $str["5"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" name = "prenom" maxlength = "25" value = '<?php echo $infos_membre[0][1]; ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["6"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "date" name = "date_naiss" value = '<?php echo date_format(date_create($infos_membre[0][2]),"Y-m-d"); ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["7"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" name = "sexe" maxlength = "25" value = '<?php echo $infos_membre[0][3]; ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["8"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" name = "adr" value = '<?php echo $infos_membre[0][4]; ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["9"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" name = "cp" value = '<?php echo $infos_membre[0][5]; ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["10"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" name = "ville" value = '<?php echo $infos_membre[0][6]; ?>' required/>
								    </div>
								</div>	
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["11"] ?></label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "tel" name = "tel_fixe" value = '<?php echo $infos_membre[0][7]; ?>' required/>
								    </div>
								</div>				
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["12"] ?></label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "tel" name = "tel_mobile" value = '<?php echo $infos_membre[0][8]; ?>'/>
								    </div>
								</div>				
							</div>
						</fieldset><br>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<fieldset><br>
							<legend><h2><?php echo $str["3"] ?></h2></legend>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["13"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" name = "login" maxlength = "25" value = '<?php echo $infos_membre[0][9]; ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["14"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "password" name = "mdp" maxlength = "25" value = '<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass']?>' placeholder = "<?php echo $str["15"] ?>" required/>
								    </div>
								</div>
								<?php echo $errMdp; ?>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["16"] ?> </label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "password" name = "nouv_mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "Le mot de passe requiert 8 caractères min., 1 majuscule min., une minuscule min. et un nombre :)" placeholder = "<?php echo $str["17"] ?>"/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["18"] ?></label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "password" name = "conf_mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "Le mot de passe requiert 8 caractères min., 1 majuscule min., une minuscule min. et un nombre :)" placeholder = "<?php echo $str["19"] ?>"/>
								    </div>
								</div>
								<?php echo $errNouvMdp; ?>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["20"] ?></label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "mail" name = "mail" value = '<?php echo $infos_membre[0][11]; ?>' required/>
								    </div>
								</div>
								<div class="form-group form-group-lg">
								    <label class="col-sm-3 control-label"><?php echo $str["21"] ?></label>
								    <div class="col-sm-9">
								       <input class = "form-control text-center" type = "text" value = '<?php echo $str["22"]." ".date_format(date_create($infos_membre[0][12]),"d/m/Y"); ?>' disabled/>
								    </div>
								</div>
							</div>
						</fieldset><br>
					</div>		

					<div class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><hr></div>

					<div class = "col-lg-2 col-lg-push-1 col-md-3 col-sm-3 col-xs-8 col-xs-offset-2">
						<input type = "submit" class = "form-control" name = "valider_profil" value = "<?php echo $str["23"] ?>"/>
					</div>						
				</form>

				<div class = "col-lg-2 col-lg-push-1 col-md-3 col-sm-3 col-xs-8 col-xs-offset-2">
					<br class = "visible-xs">
					<a style = "text-decoration:none;" href = "profil.php"><button class = "form-control" name = "annuler_profil"><i class="fa fa-times" aria-hidden="true"></i> <?php echo $str["24"] ?></button></a><br>
				</div><br>
			</div>
		</div>	
		<?php include("footer.php");?>
		<script src="bootstrap/js/fonction.inc.js"></script>
