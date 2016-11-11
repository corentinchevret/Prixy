	<?php session_start();?>
	<?php 
	include("fonction.inc.php");

    $titre = 'Prixy - Nos Formations'; include("barnav.php"); 

    $page = "nosFormations";
	$str = array();
	$str = return_str($language, $page);

	$formations = execSQL_fetchall("SELECT nom_from, id_categ, id_certif, type_public
									FROM formation F
									INNER JOIN appartenir A ON A.ref_form = F.ref_form
									INNER JOIN delivrer D ON D.ref_form = F.ref_form
									ORDER BY nom_from;");

	//var_dump($formations);

	$listeF = "";
	$categ = "";
	$certif = "";
	$public;
	for ($i=0; $i < count($formations); $i++) { 
		// On récupère la catégorie
		$categ = $formations[$i][1];

		//On récupère la certif
		if($formations[$i][2] != "C000")
			$certif = "cert";
		else
			$certif = "no-cert";

		$public = substr($formations[$i][3],0,1);

		// Création de la div avec les filtres recupérer précédemment
		$listeF .= "<li id='form' class='mix color-1 $public $certif $categ'>".$formations[$i][0]."<img src='images/test.jpg'></li>\n";
	}	

    ?>

    <link rel="stylesheet" href="content-filter-assets/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="content-filter-assets/css/style.css"> <!-- Resource style -->
	<script src="content-filter-assets/js/modernizr.js"></script> <!-- Modernizr -->


	<div id="nosFormations"><br><br>   
		<header  class="cd-header" style="background-color:#ccc; margin-top:25px; height:240px">
			<h1><a href="nosFormations.php"><i class="glyphicon glyphicon-list"></i> <?php echo $str["1"] ?></a></h1>
		</header>     	

		<main class="cd-main-content">
			<div class="cd-tab-filter-wrapper">
				<div class="cd-tab-filter">
					<ul class="cd-filters">
						<li class="placeholder"> 
							<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
						</li> 
						<li class="filter"><a class="selected" href="#0">Tous</a></li>
						<li class="filter" data-filter=".CA03"><a href="#0">Systèmes d'exploitation</a></li>
						<li class="filter" data-filter=".CA01"><a href="#0">Bureautique</a></li>
						<li class="filter" data-filter=".CA02"><a href="#0">Langages de programmation</a></li>
						<li class="filter" data-filter=".CA05"><a href="#0">Le développment web</a></li>
						<li class="filter" data-filter=".CA04"><a href="#0">Base de données</a></li>
						<li class="filter" data-filter=".CA06"><a href="#0">MOOC</a></li>
					</ul> <!-- cd-filters -->
				</div> <!-- cd-tab-filter -->
			</div> <!-- cd-tab-filter-wrapper  MixItUpCFEB09-->

			<section class="cd-gallery">
				<ul id="MixItUpCFEB09">
					<?php 
						echo $listeF; 
					?>
				</ul>
				<div class="cd-fail-message text-danger"><h3>Aucunes formations trouvées</h3></div>
			</section><!-- cd-gallery -->

			<div class="cd-filter">
				<form>
					<div class="cd-filter-block">
						<h4>Search</h4>
						
						<div class="cd-filter-content">
							<input type="search" placeholder="Try color-1...">
						</div> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->

					<div class="cd-filter-block">
						<h4>Check boxes</h4>

						<ul class="cd-filter-content cd-filters list">
							<li>
								<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
				    			<label class="checkbox-label" for="checkbox1">Option 1</label>
							</li>

							<li>
								<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
								<label class="checkbox-label" for="checkbox2">Option 2</label>
							</li>

							<li>
								<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
								<label class="checkbox-label" for="checkbox3">Option 3</label>
							</li>
						</ul> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->

					<div class="cd-filter-block">
						<h4>Tarif</h4>
						
						<div class="cd-filter-content col-xs-6">
							<input type="search" placeholder="min">
						</div> <!-- cd-filter-content -->
						<div class="cd-filter-content col-xs-6">
							<input type="search" placeholder="max">
						</div> <!-- cd-filter-content -->
					</div><br><br><br>

					<div class="cd-filter-block">
						<h4>Niveau de la formation</h4>
						
						<div class="cd-filter-content">
							<div class="cd-select cd-filters">
								<select class="filter" name="selectThis" id="selectThis">
									<option value="">Tout Public</option>
									<option value=".1">Débutant</option>
									<option value=".2">Amateur</option>
									<option value=".3">Pro</option>
									<option value=".4">Pro avancé</option>
									<option value=".5">Expert</option>
								</select>
							</div> <!-- cd-select -->
						</div> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->

					<div class="cd-filter-block">
						<h4>Formation certifié</h4>

						<ul class="cd-filter-content cd-filters list">
							<li>
								<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
								<label class="radio-label" for="radio1">OSEF</label>
							</li>

							<li>
								<input class="filter" data-filter=".cert" type="radio" name="radioButton" id="radio2">
								<label class="radio-label" for="radio2">Oui</label>
							</li>

							<li>
								<input class="filter" data-filter=".no-cert" type="radio" name="radioButton" id="radio3">
								<label class="radio-label" for="radio3">Non</label>
							</li>
						</ul> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->
				</form>

				<a href="#0" class="cd-close">Close</a>
			</div> <!-- cd-filter -->

			<a href="#0" class="cd-filter-trigger">Filters</a>
		</main> <!-- cd-main-content -->
	</div>

			<!-- PIED DE PAGE DU SITE -->

			<?php include("footer.php"); ?>				

	<script type="text/javascript">
		$(document).ready(function () {
			var trigger2 = $('.annule');
	  		var trigger = $('.hamburger');
	      	overlay = $('.overlay');
	     	isClosed = false;

	    	trigger.click(function () {
	      		hamburger_cross();      
	    	});	    	

	    	function hamburger_cross() {
		      	if (isClosed == true) {          
			        overlay.hide();
			        trigger.removeClass('is-open');
			        trigger.addClass('is-closed');
			        isClosed = false;
			    } else {   
			        overlay.show();
			        trigger.removeClass('is-closed');
			        trigger.addClass('is-open');			      
			        isClosed = true;
			    }
	  		}
	  
		  	$('[data-toggle="offcanvas"]').click(function () {
		        $('#wrapper').toggleClass('toggled');
		  	}); 

		  	trigger2.click(function () {
				  		
	      		   overlay.hide();
			        trigger.removeClass('is-open');
			        trigger.addClass('is-closed');
			        isClosed = false;
	    	}); 

		});
	</script>
    <script src="content-filter-assets/js/jquery-2.1.1.js"></script>
	<script src="content-filter-assets/js/jquery.mixitup.min.js"></script>
	<script src="content-filter-assets/js/main.js"></script> <!-- Resource jQuery -->
