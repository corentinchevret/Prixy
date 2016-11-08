		<?php 
		session_start(); include("fonction.inc.php");

		$titre = 'Prixy - Notre Equipe'; include("barnav.php"); 

		?>		
			<div class="container">
				<div class="row">
					<h1><a href="nosAtouts.php"><i class="glyphicon glyphicon-user"></i> Notre Equipe</a></h1>
				</div>
				<div class="row col-xs-12 text-center">
					<p class="pres-equipe">
						Depuis 2013, notre équipe accompagne les entreprises dans leurs 
						démarches de formation. L'adaptabilité et la qualité des solutions
						proposées sont l'accomplissement de la recherche menée par les deux
						associés, <span style="color:#ff1919; font-weight:bold;">S. Millot</span> et <span style="color:#b7b700; font-weight:bold;">C. Joubert</span>.

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
								<span style="color:#ff1919; font-weight:bold;">S. Millot</span>, co-fondateur de l'entreprise et consultant depuis plus de dix ans dans le secteur de
								la formation industrielle. Il assure les stages de formation et les évaluations. Il est également chargé de la gestion
								de la relation client.
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
								<span style="color:#b7b700; font-weight:bold;">C. Joubert</span>, co-fondateur de l'entreprise et expert-formateur spécialisé dans
								la formation aux technologies de l’information et de la
								communication. Il assure avec <span style="color:#ff1919; font-weight:bold;">S. Millot</span> les stages de formation et les évaluations.
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
								<span style="color:#ff69b4; font-weight:bold;">L.Schmitt</span>, assistante de gestion, s'occupe de la gestion administrative, des inscriptions et est chargée d'accueil.
							</p>
							<br>
							<br>
						</div>
					</div>
				</div>

				<div class="row">
					<h1><a href="nosAtouts.php"><i class="fa fa-desktop" aria-hidden="true"></i> Nos Equipements</a></h1>
				</div>

				<div class="row col-xs-12 col-md-12 text-center">
					<p class="pres-equipe">
						Nous mettons également à votre disposition le meilleur équipement pour la meilleure formation possible.
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
								Deux salles informatiques <strong>« Jaspe »</strong> et <strong>« Opale »</strong> équipées chacune de <b>15 postes</b> de type PC 
								pour les apprenants plus un poste dédié au formateur relié à un système de vidéo-projection interactif.
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
								Une nouvelle salle nommée <strong>« Beryl »</strong> dédiée aux formations plus théoriques. Elle est dotée d’un PC et d’un système 
								de vidéo-projection interactif et peut accueillir jusqu’à <b>30 participants</b>.
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