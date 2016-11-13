		<?php 
		session_start(); include("fonction.inc.php");

 		$inscr = execSQL_fetchall("SELECT nom_from, session_inscription, etat_inscription, I.ref_form, logo_form
 			FROM inscrire I
 			INNER JOIN formation F ON F.ref_form = I.ref_form
 			WHERE id_membre = '".$_SESSION['id']."'");

 		if(isset($_POST["ref"]) && isset($_POST["date"]))
 		{
 			execSQL_insert("DELETE FROM inscrire
 							WHERE ref_form = '".$_POST["ref"]."' AND id_membre = '".$_SESSION["id"]."' AND session_inscription = '".$_POST["date"]."'");
 			//echo $_POST["ref"];
 			//echo $_POST["date"];
 			header("location: mesInscriptions.php");
 			exit;
 		}

 		$titre = 'Prixy - Mon Compte'; include("barnav.php");		

		$page = "mesInscriptions";
		$str = array();
 		$str = return_str($language, $page);

 		?>

			<div id="mesInscription" class="container-fluid">
				<div class="row">
					<h1><a href="compte.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo $str["1"] ?></a></h1><br>
				</div>
				<div class="row container-fluid">
					<table class="table centrois bold">
					  <thead>
					    <tr>
					      <th class='hidden-xs'>#</th>
					      <th><?php echo $str["2"] ?></th>
					      <th><?php echo $str["3"] ?></th>
					      <th><?php echo $str["4"] ?></th>
					      <th><?php echo $str["5"] ?></th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  	for($i = 1; $i < count($inscr)+1; $i++)
					  	{
					  		if($language == "en-EN")
					  		   $inscr[$i-1][1] = date_format(date_create($inscr[$i-1][1]),"Y-m-d");
			  	  echo "<tr>
				      		<th class='hidden-xs' style='padding:20px' scope='row'>$i</th>
				      		<td><img class='logo-tab' src='".$inscr[$i-1][4]."'> <span class='hidden-xs hidden-xs hidden-md'>".$inscr[$i-1][0]."</span></td>
				      		<td style='padding:20px'>".$inscr[$i-1][1]."</td>
				      		<td style='padding:20px'>".$inscr[$i-1][2]."</td>
				      		<td style='padding:15px'><button id='del' class='btn btn-danger' data-toggle='modal' data-target='.modal-del$i'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
				      		<form method='post'>
					      		<input id='nom' name='ref' type='text' class='hidden' value='".$inscr[$i-1][3]."'/>
					      		<input id='date' name='date' type='text' class='hidden' value='".$inscr[$i-1][1]."'/>		
					      		<div class='modal fade modal-del$i' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
									<div class='modal-dialog modal-lg'>
									    <div class='modal-content'>
										    <div class='modal-header'>
									            <button type='button' class='close  centrois' data-dismiss='modal' aria-label='Close'>
									              <span aria-hidden='true'>&times;</span>
									            </button>
									            <h3 class='modal-title text-danger' id='exampleModalLabel' style='color:inherit;'>".$str["6"]."</h3>
									          </div>
									        <div class='modal-body'>
											    ".$str["7"]."
									        </div>
									        <div class='modal-footer centrois'>		          
									            <button type='submit' class='btn btn-danger'>".$str["8"]."</button>
									            <button type='button' class='btn btn-secondary' data-dismiss='modal'>".$str["9"]."</button>
								            </div>
								        </div>
									</div>
								</div>		      		
					      	</form>			   			  
				    	</tr>";
					  	}
					  	?>
					  </tbody>
					</table>					
				</div>
			</div>

			<script type="text/javascript">
				/*$("#del").click(function() {
					alert($(this).parent("td").parent("tr").parent("td").parent("tr").children("form").attr("method"));
				});*/
			</script>
		<?php include("footer.php"); ?>