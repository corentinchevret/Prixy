<?php session_start(); include("fonction.inc.php"); ?>
<?php $ref_formation = $_GET['formation']; ?>
<?php $infos_formation = execSQL_fetchall("SELECT logo_form, nom_categ, nom_from, F.ref_form, duree_form, tarif, type_public, lib_certif, ref_form_FORMATION, date_debut_session FROM formation F INNER JOIN session S ON F.ref_form = S.ref_form INNER JOIN delivrer D ON F.ref_form = D.ref_form INNER JOIN certification CE ON D.id_certif = CE.id_certif LEFT OUTER JOIN necessiter N ON F.ref_form = N.ref_form INNER JOIN appartenir A ON F.ref_form = A.ref_form INNER JOIN categorie C ON C.id_categ = A.id_categ WHERE F.ref_form = '$ref_formation' AND F.nom_langue='$language' GROUP BY date_debut_session");?>
<?php $objectifs = execSQL_fetchall("SELECT lib_objectif FROM formation F INNER JOIN objectif O ON F.ref_form = O.ref_form WHERE F.ref_form = '$ref_formation' AND O.nom_langue='$language' GROUP BY 1");?>
<?php $etape = execSQL_fetchall("SELECT lib_etape FROM formation F INNER JOIN prog_etape PE ON F.ref_form = PE.ref_form WHERE F.ref_form = '$ref_formation' AND PE.nom_langue='$language' GROUP BY 1");	?>		
<?php $titre = 'Prixy - ' . $infos_formation[0][2]; ?>
<?php include("barnav.php"); 

$page = "laFormation";
$str = array();
$str = return_str($language, $page);

$msgVal = "";

if(isset($_SESSION["id"])) {
	if(isset($_POST["radio"]))
	{	var_dump($_GET["formation"], $_SESSION["id"], $_POST["radio"]);
		execSQL_insert("INSERT INTO inscrire(ref_form, id_membre, session_inscription, etat_inscription)
			VALUES('".$_GET["formation"]."', '".$_SESSION["id"]."', '".$_POST["radio"]."', 'en cours')");
		$msgVal = '<script>$("#modal-val").click();</script>' ;
	}
}

?>
			<div class = "container-fluid">			

				<!-- LES 2 IMAGES + LE THEME ET LE TITRE + L'OBJECTIF, LES PRÉ-REQUIS ET LE PROGRAMME DÉTAILLÉ (très compliqué)-->
				
				<div><br><br>
					<img style="margin-top: 15px" class = "img1 align-center" src ='<?php echo $infos_formation[0][0] ?>'>
					<img class = "img2 align-center" src ='<?php echo $infos_formation[0][0] ?>'>
				</div>
				<h1><br><?php echo $str["1"] ?><?php echo $infos_formation[0][1] ?></h1>
				<h1><a href = "laFormation.php?formation=<?php echo $infos_formation[0][3];?>"><i class="glyphicon glyphicon-file"></i> <?php echo $infos_formation[0][2] ?></a></h1>	
				<br><hr><br>

				<div class="center-text centrois">
					<?php if($infos_formation[0][1] == "MOOC")
							echo '<button id="modal" class="btn btn-primary btn-lg" style="font-weight:bold" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-credit-card" aria-hidden="true"></i> Buy !</button>';
						  else
						  	echo '<button id="modal" class="btn btn-success btn-lg" style="font-weight:bold" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ' . $str["14"] . '</button>';
					?>
					<button id="modal-val" class="btn btn-success hidden" data-toggle="modal" data-target=".modal-val"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
					<button id="modal-pb" class="btn btn-success hidden" data-toggle="modal" data-target=".modal-val"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

				</div>

				
				<div class = "col-lg-8 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-8 col-sm-offset-2">
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-screenshot"></i> <?php echo $str["2"] ?></h2><p class="text-left"><?php for($i = 0; $i < count($objectifs); $i++){ echo "- " . $objectifs[$i][0] . ".<br>"; }?>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-backward"></i> <?php echo $str["3"] ?></h2><p class="text-left"><?php if($infos_formation[0][8] == null) {echo "Pas de pré-requis nécessaires";} else {echo $infos_formation[0][8] . ': "' . execSQL_fetchall("SELECT nom_from FROM formation F WHERE F.ref_form = '" . $infos_formation[0][8] . "'")[0][0] . '"';} ?></p>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-list-alt"></i> <?php echo $str["4"] ?></h2>
					<p class="text-left">
						<?php 

							// 2X BOUCLE POUR AFFICHER LE PROGRAMME DÉTAILLÉ (très très chaud à faire)

							for($i = 0; $i < count($etape); $i++)
							{ 
								echo "• <b>" . $etape[$i][0] . " :</b><br>"; $ok = $i + 1;
								if($i < 9)
										$ligne = "0" . $ok;
								else
									$ligne = $ok;
								$sous_etape = execSQL_fetchall("SELECT lib_sous_etape FROM formation F INNER JOIN prog_sous_etape SE ON F.ref_form = SE.ref_form WHERE SE.ref_form = '$ref_formation' AND SE.id_etape = 'PE$ligne' AND SE.nom_langue = '$language' GROUP BY 1");
								for($j = 0; $j < count($sous_etape); $j++)
								{ 
									echo "-&emsp;" . $sous_etape[$j][0] . ".<br>";
								} 
								echo '<br>';
							}
						?>
					</p>
				</div>
	
				<!-- LIGNE DE SÉPARATION POUR LA TAILLE SM ET XS -->
				
				<div class = "row col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 hidden-lg hidden-md">				
					<hr>
					<br>
					<h2><?php echo $str["13"] ?><h2>
					<br>
				</div>

				<!-- LES INFOS IMPORTANTES SUR LA FORMATION : REF, DURÉE, TARIF, TYPE DE PUBLIC, CERTIFICATION ET DATE DE SESSION -->
				

				<div class = "col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-pushpin"></i> <?php echo $str["5"] ?><?php echo $infos_formation[0][3] ?></h2>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-time"></i> <?php echo $str["6"] ?><?php echo $infos_formation[0][4] . " ".$str["7"]." (" .  6 * ($infos_formation[0][4]); ?>h)</h2>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-piggy-bank"></i> <?php echo $str["8"] ?> <?php echo $infos_formation[0][5] ?> € <?php echo $str["9"] ?></h2>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-user"></i> <?php echo $str["10"] ?></h2> <p class="text-left"><?php echo substr($infos_formation[0][6],1) ?></p>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-education"></i> <?php echo $str["11"] ?></h2><p class="text-left"><?php echo $infos_formation[0][7] ?></p>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-calendar"></i> <?php echo $str["12"] ?></h2> <p class="text-left"><?php for($i = 0; $i < count($infos_formation); $i++){ if($language == "fr-FR") echo date_format(date_create($infos_formation[$i][9]),"d/m/Y") . '<br>'; else echo $infos_formation[$i][9] . '<br>'; } ?> <br><br></p>
				</div>
				<hr class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
			</div>

			<!-- Flèche qui permet de remonter en haut de la page -->

			<div>
				<a style="display: none" style="display: none" class = 'badge remonte  hidden-sm hidden-xs' href="#top"><i class="fa fa-chevron-up fa-3x" aria-hidden="true"></i></a>
			</div>

			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
				  	<form method="post">
				    	<div class="modal-content">
					      <div class="modal-header">
				            <button type="button" class="close centrois" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				            <h3 class="modal-title text-success" id="exampleModalLabel" style='color:inherit;'><?php echo $str["15"] ?></h3>
				          </div>
					      <div class="modal-body centrois"><br>
					      <?php 
						    for($i = 0; $i < count($infos_formation); $i++){ 
						    	if($language == "fr-FR")
						    		$infos_formation[$i][9] = date_format(date_create($infos_formation[$i][9]),"d/m/Y");
						    	
						   echo'<label class="custom-control custom-radio">
									<input id="radio1" name="radio" type="radio" class="custom-control-input" value = "'.$infos_formation[$i][9].'" required>
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description bold">'.$infos_formation[$i][9].'</span>
								</label><div style="height:10px"></div>'; 
						    } 
					      ?>
					      <h4 id="erreur" style="font-size: 1.3rem"></h4>
					      </div>
					      <div class="modal-footer centrois">		          
				            <button id="val" type="submit" class="btn btn-success" style="font-weight:bold"><?php echo $str["17"] ?></button>
				            <button type="button" class="btn btn-secondary" style="font-weight:bold" data-dismiss="modal"><?php echo $str["18"] ?></button>
				          </div>
				    	</div>
				    </form>
				  </div>
			</div>

			<div class="modal fade modal-val" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				    <div class="modal-content">
					    <div class="modal-header">
				            <button type="button" class="close centrois" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				            <h3 class="modal-title text-success" id="exampleModalLabel" style='color:inherit;'><?php echo $str["19"] ?></h3>
				        </div>
				        <div class="modal-body">
						    <?php echo $str["20"] ?>
				        </div>
				        <div class="modal-footer centrois">		          
				            <button type="button" class="btn btn-success"><a style="color:white; font-weight:bold" href="mesInscriptions.php"><?php echo $str["21"] ?></a></button>
				            <button type="button" class="btn btn-secondary" style="font-weight:bold" data-dismiss="modal"><?php echo $str["22"] ?></button>
			            </div>
			        </div>
				</div>
			</div>

			<?php
				echo $msgVal;
			?>			

			<script type="text/javascript">
				    var id = '<?php if(!isset($_SESSION['id'])) echo""; else echo $_SESSION['id']; ?>';

				    if(id == "")
				    {
				    	$("#val").click(function(){
				    		$(this).attr("type", "button");
				    		$("#erreur").html("<span class='text-danger'><?php echo $str["16"] ?></span>")
				    	});
				    }
			</script>

			<!-- PIED DE PAGE DU SITE -->

			<?php include("footer.php"); ?>	
		</div>	