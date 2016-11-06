		<!-- BARRE DE NAVIGATION ET LES FONCTIONS PHP (pour les requêtes SQL surtout) -->

			<?php 
			session_start(); include("fonction.inc.php");

			$titre = 'Prixy - Nous Contacter'; include("barnav.php");

			$page = "nousContacter";
			$str = array();
	 		$str = return_str($language, $page);

	 		?>									
			<script src='https://www.google.com/recaptcha/api.js'></script>

			<div class = "row">
				<h1><a href="nousContacter.php"><i class="glyphicon glyphicon-phone"></i> <?php echo $str["1"] ?></a></h1>

				<!-- DIV QUI AFFICHE L'ADRESSE DE PRIXY -->

				<div id = "adr" class = "col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<article>
						<h2><?php echo $str["2"] ?> :</h2>
						<p>Prixy, Inc.<br>40, Avenue des Sciences<br>69007 Lyon<br><?php echo $str["3"] ?> : 04.72.23.50.00<br><?php echo $str["4"] ?> : communication@prixy.com<br></p>
					</article>
				</div>

				<!-- DIV QUI AFFICHE LES LOCAUX DE PRIXY SUR GOOGLE MAPS -->

				<div id = "map" class = "col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class = "embed-responsive embed-responsive-16by9">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d700.1302628200152!2d4.815340829226888!3d45.41899689869376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f52207325d2eff%3A0xf0b5113240da5dfa!2s294+N7%2C+38550+Auberives-sur-Var%C3%A8ze!5e0!3m2!1sfr!2sfr!4v1459174964404"></iframe>
					</div>
				</div>
			</div>
			<div class = "container-fluid">
				<hr class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<h3 class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 bold"><?php echo $str["5"] ?></h3> 
				<form class="form-horizontal" role="form" method="post" action="nousContacter.php">
				    <div class="form-group">

				    	<!-- ZONE DE SAISIE DE L'EMAIL -->

				        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
				        	<div class="input-group bold">
						        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
				            	<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $str["6"] ?>" value="<?php echo $garder_email; ?>">
				            </div>
				        </div>
				        <?php echo $errEmail; ?> <!-- MESSAGE ERREUR SI ZONE VIDE -->
				    </div>			    
				    <div class="form-group bold">

				    	<!-- ZONE DE TEXTE DU MESSAGE -->

				        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
				            <textarea class="form-control" rows="4" name="message" placeholder="<?php echo $str["7"] ?>"><?php echo $garder_message; ?></textarea>
				        </div>
				        <?php echo $errMessage; ?> <!-- MESSAGE ERREUR SI ZONE VIDE -->
				    </div>			    
				    <div class="form-group">
				    <div class="col-lg-2 col-lg-offset-3 col-md-2 col-md-offset-2">
				    	<div class="g-recaptcha" data-sitekey="6LeDjwcUAAAAAJMESWHho7OBzf-ei9Bfuc7ktnQl"></div>
					</div>
					<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
				    	<?php echo $conf ?>
					</div>
					</div>

				    <div class="form-group">

				    	<!-- BOUTON DE VALIDATION POUR ENVOYER L'EMAIL -->

				        <div class="col-lg-6 col-lg-offset-3">
				            <input id="submit" name="submit" type="submit" value="<?php echo $str["8"] ?>" class="bold form-control">
				        </div>						
				    </div>
		   			<?php echo $result; ?> <!-- MESSAGE INFORMANT LA RÉUSSITE OU L'ÉCHEC DE L'ENVOIE DU MESSAGE -->
				</form>
			</div>

			<!-- PIED DE PAGE DU SITE -->

			<?php include("footer.php"); ?>
			