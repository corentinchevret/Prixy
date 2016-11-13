	<?php 
	include("fonction.inc.php");

	$formations = execSQL_fetchall("SELECT nom_from, id_categ, id_certif, type_public, logo_form, F.ref_form, tarif, duree_form
									FROM formation F
									INNER JOIN appartenir A ON A.ref_form = F.ref_form
									INNER JOIN delivrer D ON D.ref_form = F.ref_form
									ORDER BY nom_from;");

	//var_dump($formations);

	$date = array();
	for ($i=0; $i < count($formations); $i++) { 

		$date[$formations[$i][5]] = execSQL_fetchall("SELECT date_debut_session
													  FROM session S WHERE ref_form = '".$formations[$i][5]."'");
	}	

	echo json_encode($date);

    ?>