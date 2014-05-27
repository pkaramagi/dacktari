<?php
session_name('daktali');
session_start();
$_SESSION['pre_lat']=$_POST['lat'];
$_SESSION['pre_lon']=$_POST['lon'];

?>