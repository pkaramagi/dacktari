<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'daktari';
$link = mysql_connect('localhost', 'root', '') or die('error');
@mysql_select_db('daktari',$link) or die('error');	
?>
