		<div role = "pied de page">
			<?php 
				$pagePost = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
				$page = "footer";
				$str = array();
		 		$str = return_str($language, $page);
			 ?>
			<footer class="footer text-center" role ="pied de page">
				<div class="navbar navbar-blue" role="navigation" style="padding:0px">
				<div id="centrerNav">
					<div class="col-lg-4 col-md-2 col-xs-2">
						<form action="<?php echo $pagePost ?>" method="post">
							<button type="submit" id="langue" name="langue" value="fr-FR" class="pull-right"><h4 class="flag-icon flag-icon-fr"></h4></button> 
						</form>
					</div>
					<ul class="nav navbar-nav col-lg-4 col-md-8 col-xs-8" style="margin:0px;">
						<li class="col-xs-12"><a href="mentions.php"><i class="fa fa-gavel" aria-hidden="true"></i> <?php echo $str["1"] ?></a></li>
					</ul>
					<div class="col-lg-4 col-md-2 col-xs-2">
						<form action="<?php echo $pagePost ?>" method="post">
							<button type="submit" id="langue" name="langue" value="en-EN"><h4 class="flag-icon flag-icon-gb"></h4></button> 
							<!--<button type="submit" id="langue" name="langue" value="en-EN"><h4 class="flag-icon flag-icon-gb"></h4></button> 
							<button type="submit" id="langue" name="langue" value="it-IT"><h4 class="flag-icon flag-icon-it"></h4></button>
							<button type="submit" id="langue" name="langue" value="es-ES"><h4 class="flag-icon flag-icon-es"></h4></button>-->
						</form>
					</div>
				</div>				
			</div>
				<!--<div class = "hidden-lg hidden-md">
					<form class="navbar-form navbar-right" role="search">
		                <div class="input-group">
		                    <input type="text" class="form-control" placeholder="Search this site">
		                    <span class="input-group-btn">
		                        <button type="submit" class="btn btn-default">
		                        <span class="glyphicon glyphicon-search"></span>
		                        </button>
		                    </span>
		                </div>
		            </form>
				<div>-->
				<h4><?php echo $str["2"] ?></h4>
				<a href="https://www.youtube.com/watch?v=MYZ67-Sh7kM" target="_blank" class="btn azm-social azm-btn azm-pill azm-shadow-bottom azm-youtube"><i class="fa fa-youtube"></i> YouTube</a>			
				<a href="#" class="btn azm-social azm-btn azm-pill azm-shadow-bottom azm-facebook"><i class="fa fa-facebook"></i> Facebook</a>
				<a href="#" class="btn azm-social azm-btn azm-pill azm-shadow-bottom azm-twitter"><i class="fa fa-twitter"></i> Twitter</a>
				<a href="#" class="btn azm-social azm-btn azm-pill azm-shadow-bottom azm-google-plus btn-sm"><i class="fa fa-google-plus"></i> Google Plus</a>
				<a href="https://github.com/corentinchevret/Projet-Prixy.git" target="_blank" class="btn azm-social azm-btn azm-pill azm-shadow-bottom azm-github"><i class="fa fa-github"></i> GitHub</a>
				<a href="https://trello.com/b/Gu4FX0dY/projet-prixy" target="_blank" class="btn azm-social azm-btn azm-pill azm-shadow-bottom azm-trello"><i class="fa fa-trello"></i> Trello</a>
				<!--<a href="https://www.spotify.com/fr/account/overview/" target="_blank" class="btn azm-social azm-btn azm-pill azm-shadow-bottom azm-spotify"><i class="fa fa-spotify"></i> Spotify</a>-->
				<div id = "copyright" class = "row">
					<div class = "col-lg-10 col-lg-offset-1">
						<hr>
						<h4><i class="glyphicon glyphicon-copyright-mark"></i><?php echo $str["3"] ?></h4>
					</div>						
				</div>
			</footer>
		</div>	   
	</body>
</html>
<!--fa fa-copyright fa-1x-->