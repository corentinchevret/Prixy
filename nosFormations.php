	<?php session_start();?>
	<?php 
	include("fonction.inc.php");

    $titre = 'Prixy - Nos Formations'; include("barnav.php"); 

    $page = "nosFormations";
	$str = array();
	$str = return_str($language, $page);

	$formations = execSQL_fetchall("SELECT nom_from, id_categ, id_certif, type_public, logo_form, F.ref_form, tarif, duree_form
									FROM formation F
									INNER JOIN appartenir A ON A.ref_form = F.ref_form
									INNER JOIN delivrer D ON D.ref_form = F.ref_form
									ORDER BY nom_from;");

	//var_dump($formations);

	$listeF = "";
	$categ = "";
	$certif = "";
	$certMsg = "";
	$date = array();
	$public;
	for ($i=0; $i < count($formations); $i++) { 
		// On récupère la catégorie
		$categ = $formations[$i][1];

		$date[$formations[$i][5]] = execSQL_fetchall("SELECT date_debut_session
													  FROM session S WHERE ref_form = '".$formations[$i][5]."'");
		//On récupère la certif
		if($formations[$i][2] != "C000")
		{
			$certif = "cert";
			$certMsg = $str["26"];
		}
		else
		{
			$certif = "no-cert";
			$certMsg = $str["27"];
		}

		$public = substr($formations[$i][3],0,1);

		// Création de la div avec les filtres recupérer précédemment
		$listeF .= "<li id='".$formations[$i][5]."' data-price='".$formations[$i][6]."' data-duree='".$formations[$i][7]."' class='text-left mix color-1 prix duree search date $public $certif $categ'>
						<div class='card-container'>
							<div class='card'>
								<div class='front'>
									<img src='images/test.jpg'>
									<img src='".$formations[$i][4]."'>
									<h4>".$formations[$i][0]."<h4>
								</div>
								<div class='back'>
									<img src='images/test.jpg'>
									<h3>
										".$str["30"].$formations[$i][6]." € <br>
										".$str["31"].$formations[$i][7]." ".$str["32"]." <br>".
										$str["33"]." $certMsg
									</h3>
									<a href='laFormation.php?formation=".$formations[$i][5]."'>
										<div class='btnForm'>
											".$str["34"]."
										</div>
									</a>							
								</div>
							</div>
						</div>
					</li>\n";
	}	

	json_encode($date);

    ?>

    <link rel="stylesheet" href="content-filter-assets/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="content-filter-assets/css/style.css"> <!-- Resource style -->
	<script src="content-filter-assets/js/modernizr.js"></script> <!-- Modernizr -->


	<div id="nosFormations"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">      
		<header  class="cd-header" style="background-color:#ccc; height:240px">
			<h1><a href="nosFormations.php"><i class="glyphicon glyphicon-list"></i> <?php echo $str["1"] ?></a></h1>
		</header>     	

		<main class="cd-main-content">
			<div class="cd-tab-filter-wrapper">
				<div class="cd-tab-filter">
					<ul class="cd-filters">
						<li class="placeholder"> 
							<a data-type="all" href="#0"><?php echo $str["11"] ?></a> <!-- selected option on mobile -->
						</li> 
						<li class="filter"><a class="selected" href="#0"><?php echo $str["4"] ?></a></li>
						<li class="filter" data-filter=".CA03"><a href="#0"><?php echo $str["5"] ?></a></li>
						<li class="filter" data-filter=".CA01"><a href="#0"><?php echo $str["6"] ?></a></li>
						<li class="filter" data-filter=".CA02"><a href="#0"><?php echo $str["7"] ?></a></li>
						<li class="filter" data-filter=".CA05"><a href="#0"><?php echo $str["8"] ?></a></li>
						<li class="filter" data-filter=".CA04"><a href="#0"><?php echo $str["9"] ?></a></li>
						<li class="filter" data-filter=".CA06"><a href="#0"><?php echo $str["10"] ?></a></li>
					</ul> <!-- cd-filters -->
				</div> <!-- cd-tab-filter -->
			</div> <!-- cd-tab-filter-wrapper  MixItUpCFEB09-->

			<section class="cd-gallery">
				<div class="cd-success-message text-danger"><h3></h3></div>
				<ul id="MixItUpCFEB09">
					<?php 
						echo $listeF; 
					?>
				</ul>

				<div class="cd-fail-message text-danger"><h3><?php echo $str["29"] ?></h3></div>			
			</section><!-- cd-gallery -->

			<div class="cd-filter">
				<form>
					<div class="cd-filter-block">
						<h4><?php echo $str["12"] ?></h4>
						
						<div class="cd-filter-content cd-filters">
							<input data-filter="search" class="filter" type="search" placeholder="<?php echo $str["13"] ?>">
						</div> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->

					<div class="cd-filter-block">
						<h4><?php echo $str["14"] ?></h4>

						<div class="cd-filter-content cd-filters">
							<input id="date" class="filter" type="date" data-filter="date" value="<?php /*echo date("Y-m-d");*/ ?>"/>
						</div>
						<!--<ul class="cd-filter-content cd-filters list">
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
						</ul>--> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->

					<div class="cd-filter-block">
						<h4><?php echo $str["15"] ?></h4>
						
						<div class="cd-filter-content col-xs-6 cd-filters">
							<input data-filter="prix" class="filter" id="min" type="search" placeholder="min" value="0">
							<!--<input id='min2' type="text" value="0">-->
						</div> <!-- cd-filter-content -->
						<div class="cd-filter-content col-xs-6 cd-filters">
							<input class="filter" id="max" type="search" placeholder="max" value="5000">
							<!--<input id='max2' type="text" value="5000">-->
						</div> <!-- cd-filter-content -->
						<div class="row"></div>
					</div>

					<div class="cd-filter-block">
						<h4><?php echo $str["16"] ?></h4>
						
						<div class="cd-filter-content">
							<div class="cd-select cd-filters">
								<select class="filter" name="selectThis" id="selectThis">
									<option value=""><?php echo $str["17"] ?></option>
									<option value=".1"><?php echo $str["18"] ?></option>
									<option value=".2"><?php echo $str["19"] ?></option>
									<option value=".3"><?php echo $str["20"] ?></option>
									<option value=".4"><?php echo $str["21"] ?></option>
									<option value=".5"><?php echo $str["22"] ?></option>
								</select>
							</div> <!-- cd-select -->
						</div> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->

					<div class="cd-filter-block">
						<h4><?php echo $str["23"] ?></h4>
						
						<div class="cd-filter-content col-xs-6 cd-filters">
							<input data-filter="duree" class="filter" id="dureeMin" type="search" placeholder="min" value="0">
							<!--<input id='min2' type="text" value="0">-->
						</div> <!-- cd-filter-content -->
						<div class="cd-filter-content col-xs-6 cd-filters">
							<input class="filter" id="dureeMax" type="search" placeholder="max" value="10">
							<!--<input id='max2' type="text" value="5000">-->
						</div> <!-- cd-filter-content -->
						<div class="row"></div>
					</div>

					<div class="cd-filter-block">
						<h4><?php echo $str["24"] ?></h4>

						<ul class="cd-filter-content cd-filters list">
							<li>
								<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
								<label class="radio-label" for="radio1"><?php echo $str["25"] ?></label>
							</li>

							<li>
								<input class="filter" data-filter=".cert" type="radio" name="radioButton" id="radio2">
								<label class="radio-label" for="radio2"><?php echo $str["26"] ?></label>
							</li>

							<li>
								<input class="filter" data-filter=".no-cert" type="radio" name="radioButton" id="radio3">
								<label class="radio-label" for="radio3"><?php echo $str["27"] ?></label>
							</li>
						</ul> <!-- cd-filter-content -->
					</div> <!-- cd-filter-block -->
				</form>

				<a href="#0" class="cd-close"><?php echo $str["3"] ?></a>
			</div> <!-- cd-filter -->

			<a href="#0" class="cd-filter-trigger"><?php echo $str["2"] ?></a>
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
	<script type="text/javascript">
		$(".cd-gallery .cd-success-message h3").text($(".cd-gallery ul > li").length + " <?php echo $str["28"] ?>");
		//console.log($("#date").attr("value"));	
	</script>