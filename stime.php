<?php
require_once "classes/appointment.php";
$a = '2012-10-25T13:59:31';
$app = new Appointment();

echo $app->convertDate(str_replace('T','\T',$a));



 ?>