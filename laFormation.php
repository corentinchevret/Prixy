<?php session_start(); include("fonction.inc.php"); ?>
<?php $ref_formation = $_GET['formation']; ?>
<?php $infos_formation = execSQL_fetchall("SELECT logo_form, nom_categ, nom_from, F.ref_form, duree_form, tarif, type_public, lib_certif, ref_form_FORMATION, date_debut_session FROM formation F INNER JOIN session S ON F.ref_form = S.ref_form INNER JOIN delivrer D ON F.ref_form = D.ref_form INNER JOIN certification CE ON D.id_certif = CE.id_certif LEFT OUTER JOIN necessiter N ON F.ref_form = N.ref_form INNER JOIN appartenir A ON F.ref_form = A.ref_form INNER JOIN categorie C ON C.id_categ = A.id_categ WHERE F.ref_form = '$ref_formation'");?>
<?php $objectifs = execSQL_fetchall("SELECT lib_objectif FROM formation F INNER JOIN objectif O ON F.ref_form = O.ref_form WHERE F.ref_form = '$ref_formation'"); ?>
<?php $etape = execSQL_fetchall("SELECT lib_etape FROM formation F INNER JOIN prog_etape PE ON F.ref_form = PE.ref_form WHERE F.ref_form = '$ref_formation'");	?>		
<?php $titre = 'Prixy - ' . $infos_formation[0][2]; ?>
<?php include("barnav.php"); 

$page = "laFormation";
$str = array();
$str = return_str($language, $page);

?>
			<div class = "container-fluid">

				<!-- LES 2 IMAGES + LE THEME ET LE TITRE + L'OBJECTIF, LES PRÉ-REQUIS ET LE PROGRAMME DÉTAILLÉ (treès compliqué)-->
				
				<div>
					<img class = "img1 align-center" src ='<?php echo $infos_formation[0][0] ?>'>
					<img class = "img2 align-center" src ='<?php echo $infos_formation[0][0] ?>'>
				</div>
				<h1><?php echo $str["1"] ?><?php echo $infos_formation[0][1] ?></h1>
				<h1><a href = "laFormation.php?formation=<?php echo $infos_formation[0][3];?>"><i class="glyphicon glyphicon-file"></i> <?php echo $infos_formation[0][2] ?></a></h1>
				<hr class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
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
								$sous_etape = execSQL_fetchall("SELECT lib_sous_etape FROM formation F INNER JOIN prog_sous_etape SE ON F.ref_form = SE.ref_form WHERE SE.ref_form = '$ref_formation' AND SE.id_etape = 'PE$ligne'");
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
					<h2 class="text-left"><i class="glyphicon glyphicon-user"></i> <?php echo $str["10"] ?></h2> <p class="text-left"><?php echo $infos_formation[0][6] ?></p>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-education"></i> <?php echo $str["11"] ?></h2><p class="text-left"><?php echo $infos_formation[0][7] ?></p>
					<br>
					<h2 class="text-left"><i class="glyphicon glyphicon-calendar"></i> <?php echo $str["12"] ?></h2> <p class="text-left"><?php for($i = 0; $i < count($infos_formation); $i++){ echo date_format(date_create($infos_formation[$i][9]),"d/m/Y") . '<br>'; } ?> <br><br></p>
				</div>
				<hr class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
			</div>

			<!-- Flèche qui permet de remonter en haut de la page -->

			<div>
				<a style="display: none" style="display: none" class = 'badge remonte  hidden-sm hidden-xs' href="#top"><i class="fa fa-chevron-up fa-3x" aria-hidden="true"></i></a>
			</div>

			<!-- PIED DE PAGE DU SITE -->

			<?php include("footer.php"); ?>	
		</div>	