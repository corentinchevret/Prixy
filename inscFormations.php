		<?php 
		session_start(); include("fonction.inc.php");

 		$inscr = execSQL_fetchall("SELECT nom_from, session_inscription, etat_inscription, I.ref_form
 			FROM inscrire I
 			INNER JOIN formation F ON F.ref_form = I.ref_form
 			WHERE id_membre = '".$_SESSION['id']."'");

 		if(isset($_POST["ref"]) && isset($_POST["date"]))
 		{
 			execSQL_insert("DELETE FROM inscrire
 							WHERE ref_form = '".$_POST["ref"]."' AND id_membre = '".$_SESSION["id"]."' AND session_inscription = '".$_POST["date"]."'");
 			//echo $_POST["ref"];
 			//echo $_POST["date"];
 			header("location: inscFormations.php");
 			exit;
 		}

 		$titre = 'Prixy - Mon Compte'; include("barnav.php");		

		$page = "compte";
		$str = array();
 		$str = return_str($language, $page);

 		?>

			<div id="mesInscription" class="container-fluid">
				<div class="row">
					<h1><a href="compte.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Mes inscriptions</a></h1><br>
				</div>
				<div class="container">
					<table class="table">
					  <thead>
					    <tr>
					      <th>#</th>
					      <th>Nom Formation</th>
					      <th>Date session</th>
					      <th>Etat</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  	for($i = 1; $i < count($inscr)+1; $i++)
					  	{
					  		echo "<form method='post'><tr>
						      		<th scope='row'>$i</th>
						      		<td>".$inscr[$i-1][0]."</td>
						      		<td>".$inscr[$i-1][1]."</td>
						      		<td>".$inscr[$i-1][2]."</td>
						      		<td><button type='submit' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
						      		<input name='ref' type='text' class='hidden' value='".$inscr[$i-1][3]."'/>
						      		<input name='date' type='text' class='hidden' value='".$inscr[$i-1][1]."'/>
						    	</tr></form>";
					  	}
					  	?>
					  </tbody>
					</table>
				</div>
			</div>
		<?php include("footer.php"); ?>