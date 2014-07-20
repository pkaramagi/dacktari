<?php
include '../setup.php';
include "../classes/patient.php";
include "../classes/prescription.php";
if($_POST['title']&&$_POST['description']){
$obj = new Patient();

$prescription= new Prescription();
//send request
if(!$prescription->sendRequest($_POST['doctor'],$_SESSION['user_id'],mysql_real_escape_string($_POST['title']),$_POST['description'])){

}
$description=$_POST['description']."click here to vist <a href=\"http://daktari.waziinnovations.com\">daktari</a>";
if($obj->sendEmail($_POST['email'],("You Have a New Prescription Request"),"Title:".$_POST['title']."<br>"."Description".$_POST['description'])){
//sending mail sucessful;
}
else{
//failed sending mail
}
//notify
$notification = mysql_real_escape_string($_POST['description'])." from  ".$_SESSION['user_name'];
$obj = new Notifier();
$obj->addNotification("doctor",$_POST['doctor'],$notification);
?>
<script>
parent.fb_resize(400, 200);
</script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<div class="alert alert-success">
             
              <strong>Success!</strong> Your Request Has been Sent.
            </div>
<?php

}

else{
header('Location: ' . $_SERVER['HTTP_REFERER'].'&&error=1');

}
?>