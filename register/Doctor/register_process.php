<?php
include "../../setup.php";

include "../../classes/doctor.php";
$client->setAccessToken($_SESSION['token']);
$drive=new Google_DriveService($client);

$obj= new Doctor();
//create folder
$folder= $obj->createFolder($drive);
//add docotor
$id=$obj->addNewDoctor(mysql_real_escape_string($_POST['user_name']),mysql_real_escape_string($_POST['user_email']),$_POST['gender'],mysql_real_escape_string($_POST['speciality']),mysql_real_escape_string($_POST['qualification']),$_SESSION['picture'],$_SESSION['refresh'],$folder);

//attach doctors to hsopital
if($_REQUEST['hospital_ids'])
{
		$f_ids = explode('_',$_REQUEST['hospital_ids']);
	//print_r($f_ids);
	
	for ($i=0; $i < sizeof($f_ids); $i++)
	{
	if($f_ids[$i]!=0){
	 $obj->addPatientDoctor($id,$f_ids[$i]);
		}
	}

}
$_SESSION['user_id']=$id;

//redirect
header("Location: ../../home.php");
?>