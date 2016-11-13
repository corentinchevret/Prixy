		<?php 
		session_start(); include("fonction.inc.php");

		$titre = 'Prixy - Mon Profil'; include("barnav.php");

		$page = "profil";
		$str = array();
 		$str = return_str($language, $page);
 		?>

		<div id="profil" class="container-fluid">
				<div class="row">
					<h1><a href="profil.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo $str["1"] ?></a></h1><br>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<fieldset>				
						<div class="form-horizontal">			
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-disabled bold">
								<fieldset><br>
									<legend><h2><?php echo $str["2"] ?></h2></legend>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

									<?php
									//var_dump($infos_membres);
										$label = array($str["4"], $str["5"], $str["6"], $str["7"], $str["8"], $str["9"], $str["10"], $str["11"], $str["12"], $str["13"], $str["14"], $str["15"], $str["16"]);
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

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-disabled bold">
								<fieldset><br>
									<legend><h2><?php echo $str["3"] ?></h2></legend>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<?php
											for($i = 0; $i <= 3; $i++)
											{   
												if($i == 1)		
													$infos_membre[0][$i + 9] = "••••••••";

												if($i == 3)
													$infos_membre[0][$i + 9] = $str["17"]." ". date_format(date_create($infos_membre[0][$i + 9]),"d/m/Y");
									
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

							<div class = "col-lg-4 col-lg-push-4 col-md-4 col-md-push-4 col-sm-12 col-xs-12 centrois">
								<a style = "text-decoration:none;" href = "modif_profil.php"><button class = "form-control bold" name = "modifier_profil"><?php echo $str["18"] ?></button></a><br><br>
							</div>	
						</div>								
					</fieldset>							
				</div>
			<?php
			include("footer.php");
		?>