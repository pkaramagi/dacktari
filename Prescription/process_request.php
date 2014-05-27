<?php
session_name('daktali');
session_start();
include "../includes/config.php";
include "../includes/phpmailer/class.phpmailer.php";
include "../includes/phpmailer/class.smtp.php";
include "../classes/users.php";
include "../classes/patient.php";
include "../classes/prescription.php";
if($_POST['title']&&$_POST['description']){
$obj = new Patient();

$prescription= new Prescription();
//send request
if(!!$prescription->sendRequest($_POST['doctor'],$_SESSION['user_id'],mysql_real_escape_string($_POST['title']),$_POST['description'])){

}
if($obj->sendEmail($_POST['email'],($_POST['title']),$_POST['description'])){
//sending mail sucessful;
}
else{
//failed sending mail
}
//notify
$notification = mysql_real_escape_string($_POST['description'])." from  ".$_SESSION['name'];
if(!$obj->notify(mysql_real_escape_string($_POST['title']),$notification,mysql_real_escape_string($_POST['doctor']))){
//failed to notify

}

}
else{
header('Location: ' . $_SERVER['HTTP_REFERER'].'&&error=1');

}
?>