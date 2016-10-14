<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=bdd_site_prixy', 'root', 'Coco180297', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM formation WHERE nom_from LIKE (:keyword) ORDER BY nom_from ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$country_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['nom_from']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['nom_from']).'\')"><img src="'.$rs['logo_form'].'">'.$country_name.'</li>';
}
?>