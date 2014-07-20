<?php
include "../../setup.php";

include "../../classes/patient.php";
$client->setAccessToken($_SESSION['token']);
$drive=new Google_DriveService($client);

$obj= new Patient();
$folder= $obj->createFolder($drive);

$id=$obj->addNewPatient(mysql_real_escape_string($_POST['user_name']),mysql_real_escape_string($_POST['user_email']),$_POST['year']."-".$_POST['month']."-".$_POST['day'],$_POST['gender'],mysql_real_escape_string($_POST['condition']),$_SESSION['picture'],$_SESSION['refresh'],$folder);

//attach Doctors
if($_REQUEST['doctors_ids'])
{
	$f_ids = explode('_',$_REQUEST['doctors_ids']);
	//print_r($f_ids);
	
	for ($i=0; $i < sizeof($f_ids); $i++)
	{
	
	 $obj->addPatientDoctor($id,$f_ids[$i]);
		
	}
	
}

//attach Hospitals
if($_REQUEST['hospital_ids'])
{
		$f_ids = explode('_',$_REQUEST['hospital_ids']);
	//print_r($f_ids);
	
	for ($i=0; $i < sizeof($f_ids); $i++)
	{
	if($f_ids[$i]!=0){
	 $obj->addPatientHospital($id,$f_ids[$i]);
		}
	}


}
$_SESSION['user_id']=$id;

//redirect 
header("Location: ../../home.php");
?>