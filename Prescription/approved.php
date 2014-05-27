<?php
include "../includes/config.php";
$id=$_POST[id];
$sql=mysql_query("UPDATE  prescription SET status=5 where id='$id'") or die(mysql_error());

?>