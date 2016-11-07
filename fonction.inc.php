<?php include("db.inc.php");?>
<?php
	// Détermine la page active, et la langue pour l'i18n
	$pageActive = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

	$language = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 5); 
	if(isset($_POST['langue'])) {
		$expire = 365*24*3600;		
		setcookie('langue',$_POST['langue'],time()+$expire);
		header("location: $pageActive");
		exit;
	}
	$language = $_COOKIE['langue'];

	// Fuseau horaire pour le format des dates
	date_default_timezone_set( 'Europe/Paris' );

	/* Vérifcation des infos et du captcha quand on appuie pour envoyer le mail */
	$errEmail = "";
	$errMessage = "";
	$garder_message = "";
	$garder_email = "";
	$conf = "";
	$result = "";

	if (isset($_POST["submit"])) {

	    $email;$message;$captcha;$conf="";
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['message'])){
          $message=$_POST['message'];
        }

		$to    = $email;  
		$from  = "prix@corentin-chevret.fr";  // adresse MAIL OVH liée à l'hébergement.

		$Subject = "Renseignement Prixy";

		$mail_Data = nl2br($message);

		$headers  = "MIME-Version: 1.0 \n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		$headers .= "From: $from  \n";
		$headers .= "Disposition-Notification-To: $from  \n";

		// Message de Priorité haute
		// -------------------------
		$headers .= "X-Priority: 1  \n";
		$headers .= "X-MSMail-Priority: High \n";

		$CR_Mail = TRUE;

		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui présentent des bogues.
		{
			$CR_Mail = FALSE;
		}

		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		if(!$captcha){
			$CR_Mail = FALSE;
			//echo '<h2>Please check the captcha form.</h2>';
		}
		$secretKey = "6LeDjwcUAAAAAOcpFv4AXrG9VWRN7HjiQ2wUyawg";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
		$responseKeys = json_decode($response,true);
		if(intval($responseKeys["success"]) !== 1) {
			//echo '<h2>You are spammer ! Get the @$%K out</h2>';
		} else {
			$CR_Mail = @mail ($to, $Subject, $mail_Data, $headers);
			//echo '<h2>Thanks for posting comment.</h2>';
		}

		if ($CR_Mail === FALSE) {
		  	$conf = '<div class="alert alert-danger fade in">
		  				Une <strong>erreur</strong> est survenue lors de l\'envoi, veuillez vérifier vos informations
		  			</div>'; //echo " ### CR_Mail=$CR_Mail - Erreur envoi mail <br> \n";
		  	$garder_message = $message;
			$garder_email = $email;
		}
		else {
		    $conf = '<div class="alert alert-success fade in">
   			       		<strong>Mail envoyé</strong>, vous recevrez une réponse à votre demande dès que possible.
					</div>'; //echo " *** CR_Mail=$CR_Mail - Mail envoyé<br> \n";
		}
	}



	// FONCTION QUI RETOURNE LES RESULTATS D'UNE REQUETE OU 1 LIGNE EST ATTENDU

	function execSQL_fetchrow($requete)
	{
		$tab_res = array();
		$i=0;
		$mysqli = new mysqli(host, user, password, base);
		$mysqli->set_charset("utf8");
		if ($mysqli->connect_errno) {
		    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}	

		$res = mysqli_query($mysqli, $requete);
		while ($row = mysqli_fetch_row($res)) {
	        $tab_res[$i] = $row[$i];
	        $i++;
	    }
		return $tab_res;
	}

	// FONCTION QUI RETOURNE LES RESULTATS D'UNE REQUETE DANS UN TABLEAU MULTIDIMENTIONNEL (OU PLUSIEURS LIGNES SONT ATTENDUES)

	function execSQL_fetchall($requete)
	{
		switch (BDD_TYPE) 
		{
			case 'mysqli':

				$mysqli = new mysqli(BDD_HOST, BDD_USER, BDD_PASSWORD, BDD_BASE);
				$mysqli->set_charset("utf8");
			    $result = mysqli_query($mysqli, $requete);
			    $tab = mysqli_fetch_all($result);
			    mysqli_close($mysqli);
			    return $tab;
				break;
			
			case 'PDO':

				$connexion = new PDO('mysql:host='. BDD_HOST .';dbname='. BDD_BASE, BDD_USER, BDD_PASSWORD);
				$connexion->exec("SET NAMES 'UTF8'");
				$tab = $connexion->query($requete)->fetchAll();
				$connexion = null;
				return $tab;
				break;
		}	
	}

	// Fonction qui permet de faire une insertion par rapport à une reqûête SQL en paramètre
	function execSQL_insert($requete)
	{
		switch (BDD_TYPE) 
		{
			case 'mysqli':

				$mysqli = new mysqli(BDD_HOST, BDD_USER, BDD_PASSWORD, BDD_BASE);
				$mysqli->set_charset("utf8");
			    mysqli_query($mysqli, $requete);
			    mysqli_close($mysqli);
				break;
			
			case 'PDO':

				$connexion = new PDO('mysql:host='. BDD_HOST .';dbname='. BDD_BASE . ";charset=utf8", BDD_USER, BDD_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\''));
				$connexion->exec("SET NAMES utf8");
				$connexion->query($requete);
				$connexion = null;
				break;
		}	
	}

	$resRecherche = "";

	if (isset($_GET["recherche"])) 
	{

		// VERIFIE QUE $_POST['categ'] RENVOIE UNE VALEUR ET CRÉER UNE REQUETE SQL EN CONSÉQUENCE POUR LA FILTRATION

		if(isset($_GET['recherche']))
		{
			$resRecherche = strtoupper($_GET['recherche']);
		}

		$laRequete = "SELECT * FROM formation F WHERE UPPER(nom_from) LIKE '%" . $resRecherche . "%'";

		$les_formations = execSQL_fetchall($laRequete);
	}
	else 
	{
	// REQUETE QUI PERMET DE RÉCUPÉRER TOUTES LES INFOS DE TOUTES LES FORMATIONS

	$laRequete = "SELECT * FROM formation ORDER BY 3";
	$les_formations = execSQL_fetchall($laRequete);	
	}

	// CREATION D'UNE DIV POUR CHAQUE FORMATION STOCKÉ DANS UN TABLEAU APRES FILTRAGE

	$phrases = array(); 
	for($i = 0; $i < count($les_formations); $i++) 
	{	
		$long_form = sizeof($les_formations[$i]);
		$phrases[$i] =  '<a href = "laFormation.php?formation=' . $les_formations[$i][0] . '" class="animsition-link" data-animsition-out-class="fade-out" data-animsition-out-duration="500">' . '<div class = "formations simple">' .   //div avec value = $i pour que quand on clique j'ouvre une page avec dedans phrases[$i]
	        '<div>' . '<img class = "img2" src =' . $les_formations[$i][5] .'><div>' . '<h3>' . $les_formations[$i][1] . 
	        '</h3></div><div class = "col-lg-10 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><h5><b>Tarif :</b> ' . $les_formations[$i][2] . ' € - <b>Durée formation :</b> ' . $les_formations[$i][3] . ' jours (' . (7*$les_formations[$i][3]) . 
	        ' h) - <b>Niveau du Public :</b> ' . $les_formations[$i][4] . '</h5></div><div class = "row">' .
	        '<hr class = "col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">' . 
		    '</div><p>Cliquez pour en savoir plus...</p></div></div></a>';
	}

	// Initialisation des varibles sinon pleins d'erreurs PHP car il y a des varibles non-définies

	$categ = "Tout Catégories";
	$certif = null;
	$public = "Tout Public";
	$req_categ = "nom_categ != ''";
	$req_tarif = "(tarif >= 100 AND tarif <= 1000)";
	$req_certif = "id_certif != ''";
	$req_public = "type_public != ''";
	$req_date = "";
	$garder_date = "";

	// TEST SI ON VALIDE LE FILTRE

	if (isset($_POST["valide"])) {

		// VERIFIE QUE $_POST['categ'] RENVOIE UNE VALEUR ET CRÉÉ UNE REQUETE SQL EN CONSÉQUENCE POUR LA FILTRATION

		if(isset($_POST['categ']))
		{
			$categ = $_POST['categ'];
			if($categ != "Toutes Catégories")
			$req_categ = "nom_categ LIKE '" . substr($categ, 0, 2) . "%'";
		}

		// VERIFIE QUE $_POST['tarif_min'] ET $_POST['tarif_max'] RENVOYENT UNE VALEUR ET CRÉÉ UNE REQUETE SQL EN CONSÉQUENCE POUR LA FILTRATION

		if(isset($_POST['tarif_min']) && isset($_POST['tarif_max']))
		{
			$tarif_min = $_POST['tarif_min'];
			$tarif_max = $_POST['tarif_max'];
			$req_tarif = "(tarif >= " . $tarif_min . " AND tarif <= " . $tarif_max . " )";
		}

		// VERIFIE QUE $_POST['date'] RENVOIE UNE VALEUR ET CRÉÉ UNE REQUETE SQL EN CONSÉQUENCE POUR LA FILTRATION

		if(isset($_POST['date']))
		{
			$date = $_POST['date'];
			if($date != '')
				$req_date = "AND date_debut_session = '". $date ."'";			
			$garder_date = htmlentities($_POST['date']);
		}

		// VERIFIE QUE $_POST['duree_min'] ET $_POST['duree_max'] RENVOYENT UNE VALEUR ET CRÉÉ UNE REQUETE SQL EN CONSÉQUENCE POUR LA FILTRATION

		if(isset($_POST['duree_min']) && isset($_POST['duree_max']))
		{
			$duree_min = $_POST['duree_min'];
			$duree_max = $_POST['duree_max'];
			$req_duree = "(duree_form >= " . $duree_min . " AND duree_form <= " . $duree_max . " )";
		}	

		// VERIFIE QUE $_POST['certif'] RENVOIE UNE VALEUR ET CRÉÉ UNE REQUETE SQL EN CONSÉQUENCE POUR LA FILTRATION

	    if(isset($_POST['certif']))
		{
			$certif = $_POST['certif'];
			if($certif == "non")
				$req_certif = "id_certif = 'C000'";
			if($certif == "oui")
				$req_certif = "id_certif != 'C000'";
		}

		// VERIFIE QUE $_POST['public'] RENVOIE UNE VALEUR ET CRÉÉ UNE REQUETE SQL EN CONSÉQUENCE POUR LA FILTRATION

		if(isset($_POST['public']))
		{
			$public = $_POST['public'];
			if($public == "Débutant")
				$req_public = "type_public LIKE 'D%'";
			if($public == "Amateur")
				$req_public = "type_public LIKE 'A%'";
			if($public == "Pro")
				$req_public = "type_public LIKE 'Pro q%'";
			if($public == "Pro Avancé")
				$req_public = "type_public LIKE 'Pro A%'";
			if($public == "Expert")
				$req_public = "type_public LIKE 'E%'";
		}

		// CRÉATION DE LA REQUETE COMPLETE GRACE AUX INFOS RÉCUPÉRÉES SUR LES VERIFICATIONS PRÉCÉDENTES POUR LE FILTRAGE
		
		$laRequete = "SELECT * FROM formation F INNER JOIN delivrer D ON F.ref_form = D.ref_form 
		              INNER JOIN appartenir A ON F.ref_form = A.ref_form INNER JOIN categorie C ON C.id_categ = A.id_categ
		              INNER JOIN session S ON S.ref_form = F.ref_form  LEFT OUTER JOIN necessiter N ON F.ref_form = N.ref_form 
		              WHERE $req_categ AND $req_certif AND $req_public AND $req_duree AND $req_tarif $req_date GROUP BY F.ref_form ORDER BY 3";

		$les_formations = execSQL_fetchall($laRequete);	// RÉCUPÉRATION DANS UN TABLEAU MULTIDIMENSIONNEL DU RESULTAT QUI CORRESPOND AUX FORMATIONS FILTRÉES 
	}

	// CREATION D'UNE DIV POUR CHAQUE FORMATIONS STOCKÉES DANS UN TABLEAU APRES FILTRAGE

	$phrases = array();				
	for($i = 0; $i < count($les_formations); $i++) 
	{	
		$phrases[$i] =  '<a class = "btnfos btnfos-2" href = "laFormation.php?formation='  . $les_formations[$i][0] . '">' . '<div class = "svg-wrapper">' .   //div avec value = $i pour que quand on clique j'ouvre une page avec dedans phrases[$i]
            '<div>' . '<img class = "img2" src =' . $les_formations[$i][5] .'><div>' . '<br><h2 style="color:#444;">' . $les_formations[$i][1] . /*$laRequete .*/
            '</h2></div><div class = "hidden-xs col-lg-10 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><h4 style="color:#337ab7;"><b>Tarif :</b> ' . $les_formations[$i][2] . ' € - <b>Durée formation :</b> ' . $les_formations[$i][3] . ' jours (' . (7*$les_formations[$i][3]) . 
            ' h) - <b>Niveau du Public :</b> ' . $les_formations[$i][4] . '</h4></div><div class = "row">' . 
		    '</div><p style="color:#337ab7;">Cliquez pour en savoir plus...</p></div></div></a>';
	}

	// Fonction injection SQL
   	function injec_SQL($post)
   	{
   		// Remplace les ' par des \'
   		if (preg_match("/'/i", "$post")) 
		{ 
			$post = str_replace("'", "\'", strtolower($post));
		}

		// Remplace les " par des \"
		if (preg_match('/"/i', "$post")) 
		{ 
			$post = str_replace('"', '\"', strtolower($post));
		}

		// Remplace les select par des selects
   		if (preg_match("/select/i", "$post")) 
		{ 
			$post = str_replace("select ", "selects ", strtolower($post));
		}

		// Remplace les from par des froms
		if (preg_match("/from/i", "$post")) 
		{ 
			$post = str_replace("from ", "froms ", strtolower($post));
		}

		// Remplace les delete par des deletes
		if (preg_match("/delete/i", "$post")) 
		{ 
			$post = str_replace("delete ", "deletes ", strtolower($post));
		}

		// Remplace les drop par des drops
		if (preg_match("/drop/i", "$post")) 
		{ 
			$post = str_replace("drop ", "drops ", strtolower($post));
		}

		// Remplace les update par des updates
		if (preg_match("/update/i", "$post")) 
		{ 
			$post = str_replace("update ", "updates ", strtolower($post));
		}

		// Remplace les insert into par des inserts into
		if (preg_match("/insert into/i", "$post")) 
		{ 
			$post = str_replace("insert into", "inserts into", strtolower($post));
		}

		// Remplace les union par des unions
		if (preg_match("/union/i", "$post")) 
		{ 
			$post = str_replace("union ", "unions ", strtolower($post));
		}

		// Remplace les view par des views
		if (preg_match("/view/i", "$post")) 
		{ 
			$post = str_replace("view ", "views ", strtolower($post));
		}
		return $post;
   	}

   	// 	Initialisation des variables (bcp de variables :( )
	$nom = null;
	$prenom = null;
	$sexe = null;
	$dateNaiss = null;
	$mail = null;
	$adr = null;
	$cp = null;
	$ville = null;
	$login = null;
	$mdp = null;
	$confMdp = null;
	$errLogin = null;
	$errMdp = null;
	$inscrire = true;
	$news = null;
	$lettre_mois = null;

	// Verifie en instantanné dans la bdd si le pseudo est dispo ou non
	if(!empty($_POST["username"])) {
		if(execSQL_fetchall("SELECT * FROM MEMBRE WHERE login='" . $_POST["username"] . "'")) {
		    echo "<span class='status-not-available text-danger'> Login déjà pris !</span>";
		}else{
		    echo "<span class='status-available text-success'> Login libre :)</span>";
		}
	}

	// Vérifie si on a appuyer sur valider => récupère les valeur des champs de saisis
	if (isset($_POST["validerInscription"])) 
	{

		//$mysqli = new mysqli(BDD_HOST, BDD_USER, BDD_PASSWORD, BDD_BASE);
		$login = addslashes(injec_SQL($_POST['login']));
		$mdp = $_POST['mdp'];
		$confMdp = $_POST['conf_mdp'];
		$nom = addslashes(injec_SQL($_POST['nom'])); //filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING); $nom = mysqli_real_escape_string(strip_tags(stripslashes($nom))); var_dump($nom);
		$prenom = addslashes(injec_SQL($_POST['prenom']));
		$dateNaiss = $_POST['dateNaiss'];
		$mail = addslashes(injec_SQL($_POST['mail'])); 
		$adr = addslashes(injec_SQL($_POST['adr']));
		$cp = injec_SQL($_POST['cp']);
		$ville = addslashes(injec_SQL($_POST['ville']));
		$tel_fixe = injec_SQL($_POST['tel_fixe']);
		$tel_mobile = injec_SQL($_POST['tel_mobile']);

        
        // Si sexe choisit => sexe pris en compte, sinon => sexe pas pris en compte (null)
        if (!isset($_POST['radio'])) 
            $sexe = "non renseigné";
        else
        	$sexe = $_POST['radio'];
        
        // Test si le login est déjà utilisé par un autre membre
        /*if(execSQL_fetchall("SELECT id_pers FROM PERSONNE WHERE login_pers = '$login'"))
        {
        	$errLogin = "<p class = 'col-lg-6 text-danger text-left' style='padding=0px'>Le login <b>$login</b> est déjà utilisé par un autre membre !</p>";
        	$inscrire = false;
        }*/

		// Test si le mdp est pareil que la confirmation de mdp avec message d'erreur si pas le cas
        if ($mdp !== $confMdp) 
        {
            $errMdp .= "<p class = 'col-lg-6 text-danger text-left' style='padding=0px'>Les deux mots de passe ne sont pas identiques !</p>";
        	$inscrire = false;
        }

        // Requête d'insertion qui va renseigner les infos du membres dans la BDD       
        if($inscrire)
        {
	        $req_insc = "INSERT INTO MEMBRE(login, nom, prenom, password, email, adr, cp, ville, date_naissance, sexe, date_inscription, tel, tel_mobile)
	        			 VALUES('$login', '$nom', '$prenom', '".sha1($mdp)."', '$mail', '$adr', '$cp', '$ville', '$dateNaiss', '$sexe', '" . date("Y-m-d") . "', '$tel_fixe', '$tel_mobile');";
	        execSQL_insert($req_insc);	   

	        echo '<script type="text/javascript"> alert("Votre inscription a bien été prise en compte ! \nVous allez être redirigé vers la page de connexion !"); document.location.href="connexion.php"; </script>';   
    	}
    }

    // Requête qui récupère tout les infos du client si il est connecté
    if(isset($_SESSION['id']))
    {
	    $req_infos_membre = "SELECT nom, prenom, date_naissance, sexe, adr, cp, ville, tel, tel_mobile, login, password, email, date_inscription
	        		         FROM MEMBRE WHERE id_membre = '" . $_SESSION['id'] ."';";
		$infos_membre = execSQL_fetchall($req_infos_membre);
	}

	// I18n du site => fonction qui renvoie un tableau de string en fonction de la langue et de la page spécifié en paramètre
 	
 	function return_str($lang, $page)
	{
		$sql = array();
	 	$sql = execSQL_fetchall("SELECT data, id_data FROM STRING WHERE nom_langue = '$lang' AND page='$page' ORDER BY cast(id_data as unsigned)");

	 	$str = array();

	 	foreach ($sql as $v) 
	 	{
	 		$str[intval($v[1])] = $v[0];
	 	}
	 	
	 	return $str;
	}

 ?>