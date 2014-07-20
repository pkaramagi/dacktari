<?php
include "../setup.php";
$folder=new Users();
//save
$client->setAccessToken($_SESSION['token']);
$drive=new Google_DriveService($client);


$file=$_GET[id];
$id=$_GET[pre_id];
$name="Saved-Prescription(".$_GET[title].")-".$_GET[name];
$folder->save($drive, "files/$file",$_SESSION['user_id'],$name);

$sql=mysql_query("UPDATE `prescription` SET status=1 and doctor_status='saved' where id='$id'") or die(mysql_error());
?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<div class="alert alert-success">
             
              <strong>Well done!</strong> Your Prescription Has been Saved.
            </div>