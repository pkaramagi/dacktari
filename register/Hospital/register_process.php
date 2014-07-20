<?php
include "../../setup.php";
include "../../classes/hospital.php";
$client->setAccessToken($_SESSION['token']);
$drive=new Google_DriveService($client);

$obj= new HospitalRegister();
//create folder
$folder= $obj->createFolder($drive);

//add hospital

echo $_POST['location'];
$id=$obj->addNewHospital($_POST['user_name'],$_POST['user_email'],$_POST['address'],$_POST['lat'],$_POST['lng'],$_SESSION['picture'],$_SESSION['refresh'],$folder);
$_SESSION['user_id']=$id;

//redirect
header("Location: ../../home.php");
?>