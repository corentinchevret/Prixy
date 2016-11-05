<?php $titre = "Mot de passe oublié"; include("barnav.php"); include('fonction.inc.php');

$message = "";

$erreurConnexion = '';

if($_GET['t'] == 0)
{
	if(isset($_POST["validerDemande"]))
	{
		$mail = injec_SQL($_POST["mail"]);

		$res = execSQL_fetchall("SELECT id_membre, login, email, password FROM MEMBRE WHERE email = '$mail'");
		if (!$res)
		    $erreurConnexion = '<div class = "alert-danger col-lg-6 col-lg-push-3 col-sm-10 col-sm-push-1 col-xs-10 col-xs-push-1"><h4>Mauvais mail ou/et identifiant de connexion !</h4></div><br>';
		else
		{
			$message = '<script type="text/javascript"> alert("Votre demande a bien été prise en compte ! \nVeuillez vérifier dans votre boîte mail afin de réinitialiser votre mot de passe"); document.location.href="index.php"; </script>';   

			require('phpmailer/class.phpmailer.php'); 
		    require("phpmailer/class.smtp.php");
		    require 'phpmailer/PHPMailerAutoload.php';

		    ini_set("smtp_port", SMTP_PORT);
		    //ini_set("sendmail_from", "test@orange.fr" );
		    //ini_set("SMTP", "ssl://smtp.free.fr");
		    //ini_set("SMTP", "smtp.gmail.com");
		    ini_set("SMTP", SMTP_PORT);
		    ini_set("sendmail_from", SEND_MAIL);
		    set_time_limit (300);

		    $mail = new PHPMailer;

		    $mail->SMTPSecure = "ssl"; // Type de sécurité SMTP (ssl ou tls)
		    $mail->Host= SMTP;  // nom du SMTP
		    $mail->Port= SMTP_PORT; // Port SMTP (à changer en fonction du nom du SMTP)
		    $mail->Username   = MAIL_ACCOUNT; // login de notre compte de messagerie
		    $mail->Password   = MAIL_PASSWORD; // mdp
		    $mail->SMTPKeepAlive = true; // Garder le SMTP en vie !!! 
		    $mail->Mailer = "smtp"; // Connexion en SMTP
		    $mail->IsSMTP(); // On dit que l'on utilise du SMTP  
		    $mail->SMTPAuth = true; // On dit qu'on veut s'identifier en SMTP avec les identifiants précédemment donnés  
		    $mail->CharSet = 'utf-8'; // UTF-8 pour les caractères spéciaux
		    $mail->SMTPDebug  = 0; // Seulement si on est en ssl sinon à enlever
		    $mail->From = SEND_MAIL; // Expéditeur
		    $mail->FromName = SEND_MAIL;
		    //$mail->FromName = 'Les Stagiaires <3'; // Nom de l'expéditeur

		    $mail->addBCC($res[0][2]);

		    $text = '<div><p>Bonjour '.$res[0][1].',<br><br>Suite à votre demande de réinitialisation de mot de passe, voici un lien qui vous permettra de réinitialiser votre mot de passe :<br><br><a href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?t=1&i='.$res[0][0].'&p='.$res[0][3].'">http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?t=1&i='.$res[0][0].'&p='.$res[0][3].'</a></p></div>';

		    $mail->isHTML(true); // Permet d'utiliser du HTML dans le mail
		    $mail->Subject = "Réinitialisation du mot de passe"; // L'objet
		    $mail->Body    = $text; // Le contenu du mail

		    $mail->Send();
		}
	}

	//var_dump($_SERVER);
			
			
	echo'<div id="mdp" class="container plein contenu text-center">';
		echo"<h1><br><br><a href='#'><i class='fa fa-key' aria-hidden='true'></i> Demande de réinitialisation de mot de passe</h1></a><br>";

		// formulaire d'inscription
		echo'<form method = "post">';
			// Zone de texte pour le mail, l'adresse, le cp et la ville
			echo'<div class="row">';	
				echo'<div class="col-xs-12 col-md-push-3  col-lg-6 col-lg-push-3">';		
					echo'<div class="input-group">';
					  echo'<span class="input-group-addon" id="basic-addon3">Adresse mail</span>';
					  echo'<input type="email" class="form-control" name = "mail" maxlength = "100" placeholder = "Veuillez insérer votre adresse mail de connexion" required = "required">';
					echo'</div><br>';
				echo'</div>';
			echo'</div>';

			echo'<div class = "row"></div>';
			echo $erreurConnexion; 

			echo'<div class="row">';	
				echo'<div class="col-xs-6 col-lg-3 col-lg-push-3">';
					echo'<input type="submit" name = "validerDemande" class="form-control">';
				echo'</div> ';
	    echo'</form>';
	
			echo'<div class = "col-xs-6 col-lg-3 col-lg-push-3" style="margin-bottom:20px; bottom:30px;"><br>';
				echo'<a style = " text-decoration:none;" href = "connexion.php"><button class = "form-control">Retour</button></a>';
			echo'</div>';
		echo'</div>';
	echo'</div>';
}

if($_GET['t'] == 1)
{
	$errMdp = "";

	if(isset($_POST["validerDemande"]))
	{
		$mdp = $_POST['mdp'];
		$confMdp = $_POST['conf_mdp'];

		$reinit = true;
		if ($mdp !== $confMdp) 
        {
            $errMdp .= "<span class = 'col-lg-6 col-lg-offset-3 text-danger text-left'>Les deux mots de passe ne sont pas identiques !</span>";
        	$reinit = false;
        }

        if($reinit)
        {
        	execSQL_insert("UPDATE MEMBRE
        					SET password = '" . sha1($mdp) . "' WHERE id_membre = '" . $_GET['i'] . "' AND password = '" . $_GET['p'] . "';");
        	$message = '<script type="text/javascript"> alert("Votre mot de passe a bien été réinitialiser !\nVous aller être redirigé vers la page de connexion !"); document.location.href="connexion.php";</script>';   
        }
	}
	echo'<div id="mdp" class="container text-center">';
		echo"<h1><br><br><a href='#'><i class='fa fa-key' aria-hidden='true'></i> Demande de réinitialisation de mot de passe</h1></a><br>";

		// formulaire d'inscription
		echo'<form method = "post">';
			// Zone de texte pour le mail, l'adresse, le cp et la ville
			echo'<div class="row">';	
				echo'<div class="col-xs-12 col-md-push-3  col-lg-6 col-lg-push-3">';	
					echo'<div class="input-group">';
					  echo'<span class="input-group-addon">Mot de passe *</span>';
					  echo'<input type="password" class="form-control" name = "mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "Le mot de passe requiert 8 caractères min., 1 majuscule min., une minuscule min. et un nombre :)" placeholder = "Veuillez insérer votre mot de passe de connexion ici." required = "required">';
					echo'</div>';
					echo'<p class = "row col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">* Au moins 8 caractères avec au moins une majuscule, une minuscule et un nombre</p>';
					echo'<br>';
				echo'</div>';
			echo'</div>';
					
			echo'<div class="row">';	
				echo'<div class="col-xs-12 col-md-push-3  col-lg-6 col-lg-push-3">';	
				  echo'<div class="input-group">';			  
					  echo'<span class="input-group-addon">Confirmer MdP</span>';
					  echo'<input type="password" class="form-control" name = "conf_mdp" maxlength = "25" pattern="^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" title = "Le mot de passe requiert 8 caractères min., 1 majuscule min., une minuscule min. et un nombre :)" placeholder = "Confirmer votre mot de passe." required = "required">';
				  echo'</div>';
				echo'</div>';
				echo $errMdp;
			echo'</div>';
			
			echo'<div class="row">';	
				echo'<div class="col-xs-12 col-sm-12 col-md-2 col-md-push-5 col-lg-2 col-lg-push-5">';
					echo'<br><input type="submit" name = "validerDemande" class="form-control"><br>';
			    echo'</div> ';
		    echo'</div>';
	        echo'</form>';
	    echo'</div>';
	echo'</div>';
}
?>

<?php include("footer.php"); 

echo $message;

?>
<script src="bootstrap/js/fonction.inc.js"></script>