<?php
/*$val = '<li class="mix color-1 check1 radio2 option3"><img src="img/img-1.jpg" alt="Image 1"></li>
				<li class="mix color-2 check2 radio2 option2"><img src="img/img-2.jpg" alt="Image 2"></li>
				<li class="mix color-1 check3 radio3 option1"><img src="img/img-3.jpg" alt="Image 3"></li>
				<li class="mix color-1 check3 radio2 option4"><img src="img/img-4.jpg" alt="Image 4"></li>
				<li class="mix color-1 check1 radio3 option2"><img src="img/img-5.jpg" alt="Image 5"></li>
				<li class="mix color-2 check2 radio3 option3"><img src="img/img-6.jpg" alt="Image 6"></li>
				<li class="mix color-2 check2 radio2 option1"><img src="img/img-7.jpg" alt="Image 7"></li>
				<li class="mix color-1 check1 radio3 option4"><img src="img/img-8.jpg" alt="Image 8"></li>
				<li class="mix color-2 check1 radio2 option3"><img src="img/img-9.jpg" alt="Image 9"></li>
				<li class="mix color-1 check3 radio2 option4"><img src="img/img-10.jpg" alt="Image 10"></li>
				<li class="mix color-1 check3 radio3 option2"><img src="img/img-11.jpg" alt="Image 11"></li>
				<li class="mix color-2 check1 radio3 option1"><img src="img/img-12.jpg" alt="Image 12"></li>';*/
	
	include("fonction.inc.php");

	$formations = execSQL_fetchall("SELECT nom_from, id_categ, id_certif, type_public
									FROM formation F
									INNER JOIN appartenir A ON A.ref_form = F.ref_form
									INNER JOIN delivrer D ON D.ref_form = F.ref_form
									ORDER BY nom_from;");

	var_dump($formations);

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
		$listeF .= "<li id='form' class='mix color-1 $public $certif $categ'>".$formations[$i][0]."<img src='img/test.jpg'></li>\n";
	}	
?>


<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Content Filters | CodyHouse</title>
</head>
<body>
	<header class="cd-header">
		<h1>Content Filters</h1>
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
			<div class="cd-fail-message">No results found</div>
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
					<h4>Search</h4>
					
					<div class="cd-filter-content col-xs-6">
						<input type="search" placeholder="Try color-1...">
					</div> <!-- cd-filter-content -->
					<div class="cd-filter-content col-xs-6">
						<input type="search" placeholder="Try color-1...">
					</div> <!-- cd-filter-content -->
				</div>

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
</body>
</html>
<script src="js/jquery-2.1.1.js"></script>

	<script type="text/javascript">
	    //-----------------------------------------------------------------------
	    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
	    //-----------------------------------------------------------------------

	    /*$.getJSON('loadFormation.php', function (data) {
	    	var str = "";
	    	for(var i = 0; i < Object.keys(data).length; i++)
	    	{
	    		//console.log(data[i]);
	    	    //$("#MixItUpCFEB09").append("<li id='form"+i+"' class='mix color-1 check1 radio2 option3' style='display:inline-block'><img src='img/test.jpg'></li>");
	    	    str += "<li id='form"+i+"' class='mix color-1 check1 radio2 option3' style='display:inline-block'><img src='img/test.jpg'></li>";
	    	}
	    	for(var i = 0; i < 3; i++)
	        {
	      		$(".cd-gallery > ul").append("<li class='gap'></li>");
	        }

	        /*var formData = {
            'str' : str,
	        };*/

	        // process the form              
	    /*});*/
	        //$(".cd-main-content section ul").attr("id", "MixItUpCFEB09");
	    	//$(".cd-main-content section").addClass("cd-gallery");
	      //$('.cd-close').click();

    </script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->