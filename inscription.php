		<?php 
		include("fonction.inc.php"); 

		$titre = 'Prixy - Inscription'; include("barnav.php"); 

		$page = "insc";
		$str = array();
 		$str = return_str($language, $page);

		?>		

		<script>

			function checkAvailability() {
				$("#user-availability-status").delay(5000).hide();
				$("#loaderIcon").show();
				jQuery.ajax({
				url: "fonction.inc.php",
				data:'username='+$("#username").val(),
				type: "POST",
				success:function(data){
					$("#user-availability-status").html(data);	
					setTimeout(function(){
					  $("#loaderIcon").delay(5000).hide();
			    	  $("#user-availability-status").delay(5000).show();
					}, 1500);		
					//$("#user-availability-status").delay(5000).show();
					//setTimeout(hideLoad, 5000);
				},
				error:function (){}
				});
			}
		</script>
		
		<div id='insc' class="container text-center">
			<h1><br><br><a href="inscription.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo $str["1"] ?></a></h1><br>

			<!-- formulaire d'inscription -->
			<form action = "inscription.php" method = "post" class="bold">

				<!-- Zone de texte pour le nom et prénom -->
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
						  <span class="input-group-addon bold"><?php echo $str["2"] ?></span>
						  <input type="text" class="form-control" name = "nom" maxlength = "25" placeholder = "<?php echo $str["3"] ?>" required = "required" value = "<?php if(isset($nom)) echo $nom; ?>">
						</div><br>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">	
						<div class="input-group">
						  <span class="input-group-addon bold"><?php echo $str["4"] ?></span>
						  <input type="text" class="form-control" maxlength = "25" name = "prenom" placeholder = "<?php echo $str["5"] ?>" required = "required" value = "<?php if(isset($prenom)) echo $prenom; ?>">
						</div>
					</div>
				</div>


				<!-- Bouton radio pour choisir son sexe (répété 3 fois pour chaque résolution d'écran => CASSE COUILLES) -->	
				<div class="row">
					<div class = "col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">								
						<br>
						<label class="custom-control custom-radio">
						  <input id="radio1" name="radio" type="radio" class="custom-control-input" value = "femme">
						  <span class="custom-control-indicator"></span>
						  <span class="custom-control-description bold"><?php echo $str["6"] ?></span>
						</label>
						<label class="custom-control custom-radio">
						  <input id="radio2" name="radio" type="radio" class="custom-control-input" value = "homme">
						  <span class="custom-control-indicator"></span>
						  <span class="custom-control-description bold"><?php echo $str["7"] ?></span>
						</label>		
					</div>
				</div>

				<!-- 3 Boutons déroulants (jour, mois, année) qui permettent de choisir sa date de naissance -->	
				<div class="row"><br>	
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
				          <span class="input-group-addon bold"><?php echo $str["8"] ?></span>
						  <input type="date" name="dateNaiss" class="form-control" value="<?php if(isset($dateNaiss)) echo $dateNaiss; else echo "1997-02-18"; ?>">
						</div>
					</div>					
				</div>

				<!-- Zone de texte pour le mail, l'adresse, le cp et la ville -->	
				<div class="row"><br>	
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">	
						<div class="input-group">
						  <span class="input-group-addon bold"><?php echo $str["9"] ?></span>
						  <input type="email" class="form-control" name = "mail" maxlength = "100" placeholder = "<?php echo $str["10"] ?>" required = "required" value = "<?php if(isset($mail)) echo $mail; ?>">
						</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
						  <span class="input-group-addon bold"><?php echo $str["11"] ?></span>
						  <input type="text" class="form-control" name = "adr" maxlength = "25" placeholder = "<?php echo $str["12"] ?>" required = "required" value = "<?php if(isset($adr)) echo $adr; ?>">
						</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
					    <div class="input-group">
					          <span class="input-group-addon bold"><?php echo $str["13"] ?></span>
						      <input type="tel" class="form-control" name = "cp" maxlength = "25" placeholder = "<?php echo $str["14"] ?>" required = "required" value = "<?php if(isset($cp)) echo $cp; ?>">
						</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
				      	<div class="input-group">
				          <span class="input-group-addon bold"><?php echo $str["15"] ?></span>
					      <input type="text" class="form-control" name = "ville" maxlength = "25" placeholder = "<?php echo $str["16"] ?>" required = "required" value = "<?php if(isset($ville)) echo $ville; ?>">
				      	</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
				      	<div class="input-group">
				          <span class="input-group-addon bold"><?php echo $str["17"] ?></span>
					      <input type="tel" class="form-control" name = "tel_fixe" maxlength = "15" placeholder = "<?php echo $str["18"] ?>" required = "required" value = "<?php if(isset($tel_fixe)) echo $tel_fixe; ?>">
				      	</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
				      	<div class="input-group">
				          <span class="input-group-addon bold"><?php echo $str["19"] ?></span>
					      <input type="tel" class="form-control" name = "tel_mobile" maxlength = "15" placeholder = "<?php echo $str["20"] ?>" value = "<?php if(isset($tel_mobile)) echo $tel_mobile; ?>">
				      	</div>
					</div>
				</div><br>
				
				<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><hr></div>

				<!-- Zone de texte pour le login, le mdp et la confimation de mdp -->	
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3" style="margin-bottom:-25px;">
						<div id="frmCheckUsername" class="input-group">
						  <span class="input-group-addon bold"><?php echo $str["21"] ?></span>
						  <input type="text" class="form-control" name = "login" maxlength = "25" placeholder = "<?php echo $str["22"] ?>" required = "required" value = "<?php if(isset($login)) echo $login ?>" <?php //if(isset($login)) echo "style = color:bb0000;"; ?> id="username" class="demoInputBox" onBlur="checkAvailability()">
						</div>
						<h5 style="margin-top:5px;"><span id="user-availability-status" style="display:none" class="bold"></span><span><img src="images/load.gif" id="loaderIcon" style="display:none" /></span></h5><?php echo $errLogin; //var_dump($nom)?>
						<br>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
						  <span class="input-group-addon bold"><?php echo $str["23"] ?></span>
						  <input type="password" class="form-control" name = "mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "<?php echo $str["29"] ?>" placeholder = "<?php echo $str["24"] ?>" required = "required">
						</div>
						<p class = "row col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left"><?php echo $str["25"] ?></p>
						<br>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">					  
						  <span class="input-group-addon bold"><?php echo $str["26"] ?></span>
						  <input type="password" class="form-control" name = "conf_mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "<?php echo $str["29"] ?>" placeholder = "<?php echo $str["27"] ?>" required = "required">
						</div>
						<?php echo $errMdp;//echo $nom; echo $prenom; echo $sexe; echo $dateNaiss; echo $mail; echo $adr; echo $cp; echo $ville; echo $login; echo $confMdp; echo $mdp; ?>
						<br>
					</div>
				</div>

				<div class="row col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><hr></div>

				<!-- Bouton de validation du formulaire d'inscription -->	
				<div class = "row"></div>
				<div class = "col-lg-2 col-lg-push-5 col-md-2 col-md-push-5 col-sm-2 col-sm-push-5 col-xs-4 col-xs-push-4">
					<input type="submit" name = "validerInscription" class="form-control bold" value="<?php echo $str["28"] ?>">
				</div><br><br>
			</form>
		</div>
		<?php include("footer.php"); ?></div>