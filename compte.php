		<?php 
		session_start(); include("fonction.inc.php");

		$titre = 'Prixy - Mon Compte'; include("barnav.php");		

		$page = "compte";
		$str = array();
 		$str = return_str($language, $page);

 		?>


			<div id="compte" class="container-fluid">
				<div class="row">
					<h1><a href="compte.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $str["1"] ?></a></h1><br>
				</div>

				<div class="col-lg-4">
					<a href="profil.php">
						<div class="jumbotron jumbotron-fluid col-lg-12">
						  <div class="container">
						    <h1><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo $str["2"] ?></h1>
						    <p class="lead text-justify"><?php echo $str["3"] ?></p>
						  </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4">
					<a href="mesInscriptions.php">
						<div class="jumbotron jumbotron-fluid col-lg-12">
						  <div class="container">
						    <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo $str["4"] ?></h1>
						    <p class="lead text-justify"><?php echo $str["5"] ?></p>
						  </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4">
					<a href="eFormations.php">
						<div class="jumbotron jumbotron-fluid col-lg-12">
						  <div class="container">
						    <h1><i class="fa fa-laptop" aria-hidden="true"></i> <?php echo $str["6"] ?></h1>
						    <p class="lead text-justify"><?php echo $str["7"] ?></p>
						  </div>
						</div>
					</a>
				</div>
			</div>
		<?php include("footer.php"); ?>