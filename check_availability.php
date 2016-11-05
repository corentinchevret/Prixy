<?php include("fonction.inc.php");
/*require_once("dbcontroller.php");
$db_handle = new DBController();*/

$host = "localhost";
$user = "root";
$password = "root";
$database = "prixy_site";

$sql = new mysqli($host, $user, $password, $database);

if(!empty($_POST["username"])) {
  /*$query = "SELECT * FROM MEMBRE WHERE login='" . $_POST["username"] . "'";
  $res = $sql->query($query);
  $numRows=$res->num_rows;*/
  if(execSQL_fetchall("SELECT * FROM MEMBRE WHERE login='" . $_POST["username"] . "'")/*$numRows>0*/) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>