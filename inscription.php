		<?php $titre = 'Prixy - Inscription'; include("barnav.php"); include("fonction.inc.php") ?>		

		<script>
			function hideLoad() {     
			    			 }

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
					}, 2000);		
					//$("#user-availability-status").delay(5000).show();
					//setTimeout(hideLoad, 5000);
				},
				error:function (){}
				});
			}
		</script>
		
		<div id='insc' class="container text-center">
			<h1><br><br><a href="inscription.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Formulaire d'inscription</a></h1><br>

			<!-- formulaire d'inscription -->
			<form action = "inscription.php" method = "post" class="bold">

				<!-- Zone de texte pour le nom et prénom -->
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
						  <span class="input-group-addon bold">Nom</span>
						  <input type="text" class="form-control" name = "nom" maxlength = "25" placeholder = "Exemple : Bono" required = "required" value = "<?php if(isset($nom)) echo $nom; ?>">
						</div><br>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">	
						<div class="input-group">
						  <span class="input-group-addon bold">Prénom</span>
						  <input type="text" class="form-control" maxlength = "25" name = "prenom" placeholder = "Exemple : Jean" required = "required" value = "<?php if(isset($prenom)) echo $prenom; ?>">
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
						  <span class="custom-control-description bold">Femme</span>
						</label>
						<label class="custom-control custom-radio">
						  <input id="radio2" name="radio" type="radio" class="custom-control-input" value = "homme">
						  <span class="custom-control-indicator"></span>
						  <span class="custom-control-description bold">Homme</span>
						</label>
						<!--<span>&nbsp;</span>
						<span class="funkyradio text-left hidden-lg hidden-md">	
					        <span class="funkyradio-rose col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
					            <input type="radio" name="radio" id="radio1" value = "femme"/>
					            <label for="radio1"><i class="fa fa-female fa-lg"></i>&emsp;Je suis une femme !</label>
					        </span>
					        <span class="funkyradio-primary col-sm-6 col-sm-push-2 col-xs-10 col-xs-offset-1">
					            <input type="radio" name="radio" id="radio2" value = "homme"/>
					            <label for="radio2"><i class="fa fa-male fa-lg"></i>&emsp;Je suis un homme !</label>
					        </span>
					    </span>	
						<span class="funkyradio text-left hidden-md hidden-sm hidden-xs">	
					        <span class="funkyradio-rose col-lg-3 col-lg-offset-3">
					            <input type="radio" name="radio" id="radio3" value = "femme" <?php if($sexe == "femme") echo "checked"; ?>/>
					            <label for="radio3"><i class="fa fa-female fa-lg"></i>&emsp;Je suis une femme !</label>
					        </span>
					        <span class="funkyradio-primary col-lg-3">
					            <input type="radio" name="radio" id="radio4" value = "homme" <?php if($sexe == "homme") echo "checked"; ?>/>
					            <label for="radio4"><i class="fa fa-male fa-lg"></i>&emsp;Je suis un homme !</label>
					        </span>
					    </span>	
						<span class="funkyradio text-left hidden-lg hidden-sm hidden-xs">	
					        <span class="funkyradio-rose col-md-3 col-md-offset-3">
					            <input type="radio" name="radio" id="radio5" value = "femme"/>
					            <label for="radio5"><i class="fa fa-female fa-lg"></i>&nbsp;&nbsp;Je suis une femme !</label>
					        </span>
					        <span class="funkyradio-primary col-md-3">
					            <input type="radio" name="radio" id="radio6" value = "homme"/>
					            <label for="radio6"><i class="fa fa-male fa-lg"></i>&nbsp;&nbsp;Je suis un homme !</label>
					        </span>
					    </span>-->			
					</div>
				</div>

				<!-- 3 Boutons déroulants (jour, mois, année) qui permettent de choisir sa date de naissance -->	
				<div class="row"><br>	
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
				          <span class="input-group-addon bold">Date de naissance</span>
						  <input type="date" name="dateNaiss" class="form-control">
						</div>
					</div>
					<!--<div class="row-fluid">
						<span>&emsp;&emsp;Date de naissance</span>
					    <select id="basic" class="col-lg-1 selectpicker span3 show-tick" name = "jour" data-live-search="true"/>
					    	<?php 
					    		$zero = "0";
					    		$selected = "";
					    		for($i = 1; $i <= 31; $i++)
					    		{
					    			if($_POST['jour'] == $i)
					    				$selected = "selected";
					    			else
					    				$selected = "";
					    			if($i > 9)
					    				$zero = "";
					    			echo "<option $selected>$zero$i</option>";
					    		}
					    	?>
					    </select>
					    <select id="basic" class="col-lg-1 selectpicker span3 show-tick" name = "mois" data-live-search="true">
					       	<?php 
					       		$zero = "0";
					       		$selected = "";
					    		for($i = 1; $i <= 12; $i++)
					    		{
					    			if($_POST['jour'] == $i)
					    				$selected = "selected";
					    			else
					    				$selected = "";
					    			if($i > 9)
					    				$zero = "";
					    			echo "<option $selected>$zero$i</option>";
					    		}
					    	?>
					    </select>
					    <select id="basic" class="col-lg-2 selectpicker span2 show-tick" name = "annee" size = "10" data-live-search="true">
					    	<?php 
					    		$selected = "";
					    		for($i = 2016; $i >= 1900; $i--)
					    		{
					    			if($_POST['jour'] == $i)
					    				$selected = "selected";
					    			else
					    				$selected = "";
					    			echo "<option $selected>$i</option>";
					    		}
					    	?>
					    </select>
				    </div><br>-->
				</div>

				<!-- Zone de texte pour le mail, l'adresse, le cp et la ville -->	
				<div class="row"><br>	
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">	
						<div class="input-group">
						  <span class="input-group-addon bold">Adresse mail</span>
						  <input type="email" class="form-control" name = "mail" maxlength = "100" placeholder = "Exemple : bono.jean@monmail.com" required = "required" value = "<?php if(isset($mail)) echo $mail; ?>">
						</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
						  <span class="input-group-addon bold">Adresse</span>
						  <input type="text" class="form-control" name = "adr" maxlength = "25" placeholder = "Veuillez insérer votre adresse ici." required = "required" value = "<?php if(isset($adr)) echo $adr; ?>">
						</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
					    <div class="input-group">
					          <span class="input-group-addon bold">CP</span>
						      <input type="text" class="form-control" name = "cp" maxlength = "25" placeholder = "Veuillez insérer votre code postale ici." required = "required" value = "<?php if(isset($cp)) echo $cp; ?>">
						</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
				      	<div class="input-group">
				          <span class="input-group-addon bold">Ville</span>
					      <input type="text" class="form-control" name = "ville" maxlength = "25" placeholder = "Veuillez insérer le nom de votre ville d'habitation ici." required = "required" value = "<?php if(isset($ville)) echo $ville; ?>">
				      	</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
				      	<div class="input-group">
				          <span class="input-group-addon bold">Tel. fixe</span>
					      <input type="tel" class="form-control" name = "tel_fixe" maxlength = "15" placeholder = "Votre numéro de téléphone fixe ici." required = "required" value = "<?php if(isset($tel_fixe)) echo $tel_fixe; ?>">
				      	</div>
					</div>
				</div><br>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
				      	<div class="input-group">
				          <span class="input-group-addon bold">Tel. mobile</span>
					      <input type="tel" class="form-control" name = "tel_mobile" maxlength = "15" placeholder = "Votre numéro de portable ici." value = "<?php if(isset($tel_mobile)) echo $tel_mobile; ?>">
				      	</div>
					</div>
				</div><br>
				
				<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><hr></div>

				<!-- Zone de texte pour le login, le mdp et la confimation de mdp -->	
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div id="frmCheckUsername" class="input-group">
						  <span class="input-group-addon bold">Login</span>
						  <input type="text" class="form-control" name = "login" maxlength = "25" placeholder = "Veuillez choisir un pseudo ici." required = "required" value = "<?php if(isset($login)) echo $login ?>" <?php if(isset($login)) echo "style = color:bb0000;"; ?> id="username" class="demoInputBox" onBlur="checkAvailability()">
						</div>
						<span id="user-availability-status"  style="display:none"></span><span><img src="images/load.gif" id="loaderIcon" style="display:none" /></span><?php echo $errLogin; //var_dump($nom)?>
						<br>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">
						  <span class="input-group-addon bold">Mot de passe *</span>
						  <input type="password" class="form-control" name = "mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "Le mot de passe requiert 8 caractères min., 1 majuscule min., une minuscule min. et un nombre :)" placeholder = "Veuillez choisir un mot de passe." required = "required">
						</div>
						<p class = "row col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">* Au moins 8 caractères avec au moins une majuscule, une minuscule et un nombre</p>
						<br>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-lg-6 col-lg-push-3 col-md-push-3">
						<div class="input-group">					  
						  <span class="input-group-addon bold">Confirmer MdP</span>
						  <input type="password" class="form-control" name = "conf_mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "Le mot de passe requiert 8 caractères min., 1 majuscule min., une minuscule min. et un nombre :)" placeholder = "Confirmer votre mot de passe." required = "required">
						</div>
						<?php echo $errMdp;//echo $nom; echo $prenom; echo $sexe; echo $dateNaiss; echo $mail; echo $adr; echo $cp; echo $ville; echo $login; echo $confMdp; echo $mdp; ?>
						<br>
					</div>
				</div>

				<div class="row col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><hr></div>

				<!-- Bouton de validation du formulaire d'inscription -->	
				<div class = "row"></div>
				<div class = "col-lg-2 col-lg-push-5 col-md-2 col-md-push-5 col-sm-2 col-sm-push-5 col-xs-4 col-xs-push-4">
					<input type="submit" name = "validerInscription" class="form-control bold">
				</div><br><br>
			</form>
		</div>
		<?php include("footer.php"); ?></div>