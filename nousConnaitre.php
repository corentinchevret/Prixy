		<?php 
		session_start(); include("fonction.inc.php"); 

		$titre = 'Prixy - Nous Connaître'; include("barnav.php");

		$page = "nousConnaitre";
		$str = array();
 		$str = return_str($language, $page);

		?>		
			<div class="container">
				<div class="row">
					<h1><a href="nosAtouts.php"><i class="fa fa-building" aria-hidden="true"></i> <?php echo $str["1"] ?></a></h1><br>
				</div>
				<div class="row col-xs-12 text-justify">
					<p class="pres-equipe">
						<?php echo $str["2"] ?>					
					</p><br>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<h1><a href="nosAtouts.php"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> <?php echo $str["3"] ?></a></h1>
				</div>
				<div class="row col-lg-12">
					<div class="col-lg-6 text-justify">
						<fieldset>
							<legend class="text-center"><h1><?php echo $str["4"] ?></h1></legend>
						</fieldset>
						<p class="pres-equipe">
							<?php echo $str["5"] ?>
						</p>
					</div>
					<div class="row col-lg-6 text-justify">
						<fieldset>
							<legend class="text-center"><h1><?php echo $str["6"] ?></h1></legend>
						</fieldset>
						<p class="pres-equipe">
							<?php echo $str["7"] ?>
						</p>
					</div>
				</div>
				<div class="row col-lg-6 col-lg-push-3 text-justify">
					<fieldset>
						<legend class="text-center"><h1><?php echo $str["8"] ?></h1></legend>
					</fieldset>
					<p class="pres-equipe">
						<?php echo $str["9"] ?>
					</p>
				</div>
			</div>
		</div>
		<!--<div class = "row">
			<h1><a href="notreEquipe.php"><i class="glyphicon glyphicon-user"></i> Notre Equipe</a></h1>
		</div>
			<h2>Etudiant :</h2>-->
		<?php include("footer.php"); ?>