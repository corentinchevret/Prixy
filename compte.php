		<?php session_start(); $titre = 'Prixy - Mon Compte'; include("barnav.php"); ?>		
			<div id="compte" class="container-fluid">
				<div class="row">
					<h1><a href="compte.php"><i class="fa fa-user" aria-hidden="true"></i> Mon Compte</a></h1><br>
				</div>

				<div class="col-lg-4">
					<a href="profil.php">
						<div class="jumbotron jumbotron-fluid col-lg-12">
						  <div class="container">
						    <h1><i class="fa fa-id-card-o" aria-hidden="true"></i> Mon Profil</h1>
						    <p class="lead text-justify">Vous pouvez voir et modifer toutes les informations que vous avez renseigné lors de l'inscription.</p>
						  </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4">
					<a href="inscFormations.php">
						<div class="jumbotron jumbotron-fluid col-lg-12">
						  <div class="container">
						    <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Mes Inscriptions</h1>
						    <p class="lead text-justify">Vous pouvez voir l'état et l'avancement de toutes vos demandes d'inscription à une formation Prixy.</p>
						  </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4">
					<a href="eFormations.php">
						<div class="jumbotron jumbotron-fluid col-lg-12">
						  <div class="container">
						    <h1><i class="fa fa-laptop" aria-hidden="true"></i> Mes eFormations</h1>
						    <p class="lead text-justify">Vous pouvez acceder à tous vos eFormations (payées) pour faire une formation Prixy depuis chez vous !</p>
						  </div>
						</div>
					</a>
				</div>
			</div>
		<?php include("footer.php"); ?>