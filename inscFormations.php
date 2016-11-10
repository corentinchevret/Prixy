		<?php 
		session_start(); include("fonction.inc.php");

		$titre = 'Prixy - Mon Compte'; include("barnav.php");		

		$page = "compte";
		$str = array();
 		$str = return_str($language, $page);

 		$inscr = execSQL_fetchall("SELECT nom_from, session_inscription, etat_inscription
 			FROM inscrire I
 			INNER JOIN formation F ON F.ref_form = I.ref_form
 			WHERE id_membre = '".$_SESSION['id']."'");

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
					  		echo "<tr>
						      		<th scope='row'>$i</th>
						      		<td>".$inscr[$i-1][0]."</td>
						      		<td>".$inscr[$i-1][1]."</td>
						      		<td>".$inscr[$i-1][2]."</td>
						    	</tr>";
					  	}
					  	?>
					  </tbody>
					</table>
				</div>
			</div>
		<?php include("footer.php"); ?>