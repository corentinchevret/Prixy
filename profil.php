		<?php session_start(); $titre = 'Prixy - Mon Profil'; include("barnav.php"); include("fonction.inc.php");?>

		<div id="profil" class="container-fluid">
				<div class="row">
					<h1><a href="profil.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> Mon Profil</a></h1><br>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<fieldset>				
						<div class="form-horizontal">			
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-disabled">
								<fieldset><br>
									<legend><h2>Mes infos perso</h2></legend>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';

									<?php
									//var_dump($infos_membres);
										$label = array('Nom', 'Prenom', 'Date de Naissance', 'Sexe', 'Adresse', 'Code Poste', 'Ville', 'Tel. fixe', 'Tel. mobile', 'Login', 'MdP', 'E-mail', 'Ancienneté');
										for($i = 0; $i <= 8; $i++)
										{
											if($i == 2)
												$infos_membre[0][$i] = date_format(date_create($infos_membre[0][$i]),"d/m/Y");

											echo "<div class='form-group form-group-lg'>
									    			<label class='col-sm-3 col-xs-12 control-label'>" . $label[$i] . "</label>
									    		 	<div class='col-sm-9 col-xs-12'>
									       				<input class = 'form-control text-center' type = 'text' value = '" . $infos_membre[0][$i] . "'/>
									    			</div>
												  </div>";
										}
									?>
																	
							</div>
								</fieldset><br>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-disabled">
								<fieldset><br>
									<legend><h2>Mes infos Prixy</h2></legend>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
										<?php
											for($i = 0; $i <= 3; $i++)
											{   
												if($i == 1)		
													$infos_membre[0][$i + 9] = "••••••••";

												if($i == 3)
													$infos_membre[0][$i + 9] = "Chez Prixy depuis le " . date_format(date_create($infos_membre[0][$i + 9]),"d/m/Y");
									
												echo "<div class='form-group form-group-lg'>
											    		<label class='col-sm-3 col-xs-12 control-label'>" . $label[$i + 9] . "</label>
											    		 <div class='col-sm-9 col-xs-12'>
											       			<input class = 'form-control text-center' type = 'text' value = '" . $infos_membre[0][$i + 9] . "'/>
											    		</div>
													  </div>";
											}
										?>	
							</div>
								</fieldset><br>
							</div>	
						</div>	

							<div class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><hr></div>

							<div class = "col-lg-4 col-lg-push-4 col-md-4 col-md-push-4 col-sm-12 col-xs-12">
								<a style = "text-decoration:none;" href = "modif_profil.php"><button class = "form-control" name = "modifier_profil">Modifier</button></a><br><br>
							</div>	
						</div>								
					</fieldset>							
				</div>
			<?php
			include("footer.php");
		?>