	<?php session_start();?>
	<?php 
	include("fonction.inc.php");

    $titre = 'Prixy - Nos Formations'; include("barnav.php"); 

    $page = "nosFormations";
	$str = array();
	$str = return_str($language, $page);

    ?>

	<link rel="icon" type="image/png" href="images/iconePrixy.png" />

	<!-- BARRE DE NAVIGATION ET LES FONCTIONS PHP (pour les requêtes SQL surtout) -->
    <div id="wrapper">
        <div class="overlay"></div>
  
        <!-- Sidebar -->

        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation"  style="padding:0px">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand text-center">
                    <h2 style="color:#ddd; border-bottom:5px solid #ddd; padding:30px;"><i class = "glyphicon glyphicon-cog"></i> <?php echo $str["2"] ?></h2>
                </li>
                	<div class = "col-xs-12"><br><br>
						<form role="form" method="post" action="nosFormations.php">

						<!-- BOUTON DÉROULANT POUR SELECTIONNER UNE CATGORIE -->


						<label for="categ"><h4>Catégories</h4></label>
						<div class="form-group">
						    <select class="form-control" name = "categ" id="categ">
						  	<option value = "Toutes Catégories" <?php if($categ == "Toutes Catégories") echo"selected" ?>>Toutes Catégories</option>
						  	<option value = "Systèmes d'exploitation" <?php if($categ == "Systèmes d'exploitation") echo"selected" ?>>Systèmes d'exploitation</option>
						    <option value = "Bureautique" <?php if($categ == "Bureautique") echo"selected" ?>>Bureautique</option>
						    <option value = "Langages de programmation" <?php if($categ == "Langages de programmation") echo"selected" ?>>Langages de programmation</option>
						    <option value = "Le développement web" <?php if($categ == "Le développement web") echo"selected" ?>>Le développement web</option>
						    <option value = "Bases de données" <?php if($categ == "Bases de données") echo"selected" ?>>Bases de données</option>
						    </select>
						</div>


						<!-- SLIDER POUR SELECTIONNER UNE FOURCHETTE DE PRIX -->
	
						<label for="tarif"><h4>Tarif</h4></label>
						<div class="form-group">
							<span>De<input class = "tarif_min inputtarif" type="tel" name = "tarif_min"/>
							à<input class = "tarif_max inputtarif" type="tel" name = "tarif_max"/>€</span>
						    <!--<div id="bornes_tarif">De <span id="tarif_min" name = "min"></span> à <span id="tarif_max"></span> €</div>-->
						    <div id="slider_tarif"></div>
						</div>

						<!-- ZONE DE SAISIE QUI AFFICHER UN CALENDRIER POUR SELECTIONNER UNE DATE -->

						<label for="session"><h4>Session</h4></label>
						<div class="form-group">	
							<div class='input-group date'>
				                <input class="form-control" type="date" id="datepicker" name = "date" placeholder = "Toutes Dates" value = '<?php echo $garder_date ?>'>
				                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
		            		</div>
						</div>

						<!-- SLIDER POUR SELECTIONNER UNE LA DURÉE DE LA FORMATION -->

						<label for="duree"><h4>Durée</h4></label>
						<div class="form-group">													
							<span>De<input class = "duree_min inputduree" type="tel" name = "duree_min"/>
							à<input class = "duree_max inputduree" type="tel" name = "duree_max"/>Jours</span>
						    <!--<div><span id="duree">De <span class="duree_min"></span> à <span class="duree_max"></span> Jours</div>-->
						    <div id="slider_duree"></div>
						</div>

						<!-- BOUTONS POUR SÉLECTIONNER "OUI" OU "NON" (OU RIEN CE QUI SIGNIFICATION AVEC ET SANS CERTIFICAT) -->

						<label for="certif"><h4>Certification</h4></label>
						<div class="form-group">						
						    <div id="radio">			 
							    <input type="checkbox" id="radio1" class = "options" name="certif" value = "oui" <?php if($certif == "oui") echo"checked" ?>><label for="radio1">Oui</label>
							    <input type="checkbox" id="radio2" class = "options" name="certif" value = "non" <?php if($certif == "non") echo"checked" ?>><label for="radio2">Non</label>
						    </div>
						</div>

						<!-- BOUTON DÉROULANT POUR SELECTIONNER LA DIFFICULTÉ DE LA FORMATION (TYPE DE PUBLIC) -->

						<label for="public"><h4>Type public</h4></label>
						<div class="form-group">											    
							<select class="form-control" name = "public" id="public">
							  	<option value = "Tout Public" <?php if($public == "Tout Public") echo"selected" ?>>Tout Public</option>
							    <option value = "Débutant" <?php if($public == "Débutant") echo"selected" ?>>Débutant</option>
							    <option value = "Amateur" <?php if($public == "Amateur") echo"selected" ?>>Amateur</option>
							    <option value = "Pro" <?php if($public == "Pro") echo"selected" ?>>Pro</option>
							    <option value = "Pro Avancé" <?php if($public == "Pro Avancé") echo"selected" ?>>Pro Avancé</option>
							    <option value = "Expert" <?php if($public == "Expert") echo"selected" ?>>Expert</option>
							</select>
						</div><br>

						<!-- BOUTON VALIDER POUR VALIDER LE FILTRAGE -->
						
				        <div class="col-xs-6">
				            <input id="submit" name="valide" type="submit" value="Valider" class="btn btn-primary form-control"  style="margin:0px">
				        </div>
				        <br>
					</form>
						
					<div class="col-xs-6">
			            <button class="btn btn-primary form-control annule" data-toggle="offcanvas" style="margin-top:-44px; margin-left:130px">Annuler</button>
			        </div>
	            </div>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <div id="nosFormations" class = "container-fluid">

				<!-- DIV OU IL Y AURA LES BOUTONS POUR LE FILTRAGE -->
				
				<div class="text-center filtre">
					<button style="color:#444" type="button" class="hamburger is-closed" data-toggle="offcanvas">
		                <span class="hamb-top"></span>
		    			<span class="hamb-middle"></span>
						<span class="hamb-bottom"></span>
		            </button>
					<h2 class="hamburger-text"> <?php echo $str["2"] ?></h2>
					<h1><a href="nosFormations.php"><i class="glyphicon glyphicon-list"></i>  <?php echo $str["1"] ?></a></h1>
				</div>
	            
	            <!-- Flèche qui permet de remonter en haut de la page -->

				<div>
					<a style="display: none" class = 'badge remonte hidden-sm hidden-xs' href="#top"><i class="fa fa-chevron-up fa-3x" aria-hidden="true"></i></a>
				</div>

	            <!-- BOUCLE QUI AFFICHE LES FORMATIONS DISPONIBLES LES UNS EN DESSOUS DES AUTRES -->

				<div class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12"><br>			
					<?php 
						if(empty($les_formations))
								echo '<div><p class = "btnfos text-danger col-lg-10 col-md-10 col-sm-8 col-xs-6">Aucun résultat trouvé !</p></div>';
						for($i = 0; $i < count($les_formations); $i++) 
						{
							echo $phrases[$i];
						}
					?>
				</div>
			</div>

			<!-- PIED DE PAGE DU SITE -->

			<?php include("footer.php"); ?>				
        </div>
    </div>

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