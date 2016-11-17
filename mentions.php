		<?php
		session_start(); include("fonction.inc.php");

		$titre = 'Prixy - Mentions légales'; include("barnav.php");

		$page = "mentions";
		$str = array();
 		$str = return_str($language, $page);

		?>		
			<div class="container">
				<div class="row">
					<h1><a href="mentions.php"><i class="fa fa-gavel" aria-hidden="true"></i> <?php echo $str["1"] ?></a></h1><br><br>
				</div>

				<div class="text-justify">
					<div class="m1">
						<h3><?php echo $str["2"] ?></h3>
						<p><?php echo $str["3"] ?></p><!--en vertue de l'article blablabla-->
						<p><?php echo $str["4"] ?></p><!--description site (créateur, responsable, toussa toussa)-->
						<br><hr><br>
					</div>

					<div class="m2">
						<h3><?php echo $str["5"] ?></h3>
						<p><?php echo $str["6"] ?></p>
						<p><?php echo $str["7"] ?></p>
						<br><hr><br>
					</div>

					<div class="m3">
						<h3><?php echo $str["8"] ?></h3>
						<p><?php echo $str["9"] ?></p>
						<br><hr><br>
					</div>

					<div class="m4">
						<h3><?php echo $str["10"] ?></h3>
						<?php echo $str["11"] ?>
						<br><hr><br>
					</div>

					<div class="m5">
						<h3><?php echo $str["12"] ?></h3>
						<?php echo $str["13"] ?>
						<br><hr><br>
					</div>

					<div class="m6">
						<h3><?php echo $str["14"] ?></h3>
						<?php echo $str["15"] ?>
						<br><hr><br>
					</div>

					<div class="m7">
						<h3><?php echo $str["16"] ?></h3>
						<?php echo $str["17"] ?>
						<br><hr><br>
					</div>

					<div class="m8">
						<h3><?php echo $str["18"] ?></h3>
						<?php echo $str["19"] ?>
						<br><hr><br>
					</div>

					<div class="m9">
						<h3><?php echo $str["20"] ?></h3>
						<p><?php echo $str["21"] ?></p>
						<br><hr><br>
					</div>
					<div class="m10">
						<h3><?php echo $str["22"] ?></h3>
						<?php echo $str["23"] ?>
						<br><hr><br>
					</div>
					<div class="m11">
						<h3><?php echo $str["24"] ?></h3>
						<?php echo $str["25"] ?>
						<br><br>
					</div>
				</div>
			</div>
		</div>
		<!--<div class = "row">
			<h1><a href="notreEquipe.php"><i class="glyphicon glyphicon-user"></i> Notre Equipe</a></h1>
		</div>
			<h2>Etudiant :</h2>-->
		<?php include("footer.php"); ?>