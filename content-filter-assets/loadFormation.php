<?php

include("fonction.inc.php");

echo json_encode(execSQL_fetchall("SELECT * FROM formation"));

?>
