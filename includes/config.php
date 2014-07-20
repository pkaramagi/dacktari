<?php
$host = 'localhost';
$user = 'daktari_ksm';
$pass = 'macbookair';
$database = 'daktari_daktari';
$link = mysql_connect('localhost', 'daktari_ksm', 'macbookair') or die('error');
@mysql_select_db('daktari_daktari',$link) or die('error');	
?>