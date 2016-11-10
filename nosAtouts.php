		<?php 
		session_start(); include("fonction.inc.php");

		$titre = 'Prixy - Notre Equipe'; include("barnav.php");

		$page = "atouts";
		$str = array();
 		$str = return_str($language, $page);

		?>		
			<div class="container">
				<div class="row">
					<h1><a href="nosAtouts.php"><i class="glyphicon glyphicon-user"></i> <?php echo $str["1"] ?></a></h1>
				</div>
				<div class="row col-xs-12 text-center">
					<p class="pres-equipe">
						<?php echo $str["2"] ?>

					</p>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="section col-lg-6 col-lg-offset-2 col-md-offset-4 col-sm-offset-3 img-wrapper">
							<img src="images/male1.png" alt="S. Millot" id="image" >
							<h2 class="h2" style="color:#ff1919">S. Millot</h2>
						</div>
						<div class="row col-lg-12">
							<br>
							<p>
								<?php echo $str["3"] ?>
							</p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="section col-lg-6 col-lg-offset-2 col-md-row-3 col-md-offset-4 col-sm-offset-3 img-wrapper">
							<img class="text-center" src="images/male2.png" alt="C. Joubert" id="image">
							<h2 class="h2" style="color:#e5e500">C. Joubert</h2>
						</div>
						<div class="row col-lg-12">
							<br>
							<p>
								<?php echo $str["4"] ?>
							</p>
						</div>
					</div>
					<div class="col-lg-6 col-lg-offset-3">
						<div class="section col-lg-6 col-lg-offset-2 col-md-row-3 col-md-offset-4 col-sm-offset-3 img-wrapper">
							<img src="images/female.png" alt="L. Schmitt" id="image">
							<h2 class="h2" style="color:#ff69b4">L.Schmitt</h2>
						</div>
						<div class="row col-lg-12">
							<br>
							<p>
								<?php echo $str["5"] ?>
							</p>
							<br>
							<br>
						</div>
					</div>
				</div>

				<div class="row">
					<h1><a href="nosAtouts.php"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo $str["6"] ?></a></h1>
				</div>

				<div class="row col-xs-12 col-md-12 text-center">
					<p class="pres-equipe">
						<?php echo $str["7"] ?>
					</p><br>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="section col-lg-6 col-lg-offset-2 col-md-offset-4 col-sm-offset-3 img-wrapper">
							<img src="images/computer.png" alt="Ordinateurs" id="image" >
						</div>
						<div class="row col-lg-12">
							<br>
							<p>
								<?php echo $str["8"] ?>
							</p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="section col-lg-6 col-lg-offset-2 col-md-row-3 col-md-offset-4 col-sm-offset-3 img-wrapper">
							<img class="text-center" src="images/classroom.png" alt="Salle de classe" id="image">
						</div>
						<div class="row col-lg-12">
							<br>
							<p>
								<?php echo $str["9"] ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<div class = "row">
			<h1><a href="notreEquipe.php"><i class="glyphicon glyphicon-user"></i> Notre Equipe</a></h1>
		</div>
			<h2>Etudiant :</h2>-->
		<?php include("footer.php"); ?>