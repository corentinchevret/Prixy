		<?php 
		session_start(); include("fonction.inc.php");	

		$language = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 5); 
		if(isset($_POST['langue'])) {
			$expire = 365*24*3600;		
			setcookie('langue',$_POST['langue'],time()+$expire);
			header("location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
			exit;
		}
		$language = $_COOKIE['langue'];

		$titre = 'Prixy - Accueil'; include("barnav.php");

		$page = "accueil";
		$str = array();
 		$str = return_str($language, $page);

		?>				
		<div id="home" class="container-fluid"><br><br class="hidden-xs hidden-sm hidden-md"><br class="hidden-xs hidden-sm hidden-md">
			
			<div align="center">
				<div class="first_circle"></div>
				<div class="first_div">
				  <div class="second_div">
				    <div class="img_div">
				      <img src="images/prixy.png"></div>
				    </div>
				  </div>
				<div class="txt_welcome"><?php echo $str[1] ?></div>
			</div><br><br>
			<div class="col-lg-8 col-lg-offset-2 col-xs-12 home-box">
				<h1><br><?php echo $str[2] ?></h1><br>
				<p>
					<?php echo $str[3] ?>
				</p>
				<a href="nosFormations.php"><button><?php echo $str[4] ?></button></a>
			</div>
			<div class="col-xs-12"><br></div>
		</div>
		<?php include("footer.php"); ?></div>