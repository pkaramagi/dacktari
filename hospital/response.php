<?php
//This handles all AJAX requests for hospital 
require "../setup.php";
$hospid=$_SESSION['user_id'];
$hospital = new Hospital($hospid);
$doc_id = $_POST['id'];
switch($_POST['func']){
//if a doctor is being confirmed
case 'confirm':
	$response = $hospital->confirmDoctor($doc_id);
	echo $response;
	break;
//if a doctor is being removed from a hospitals doctors
case 'remove':
	$response = $hospital->removeDoctor($doc_id);
	echo $response;
	break;
//if a doctor is being rejected completely from a hospital
case 'reject':
	$response = $hospital->rejectDoctor($doc_id);
	echo $response;
	break;
	
case 'summ':
	$patients = mysql_num_rows($hospital->getPatients());
	$requests = mysql_num_rows($hospital->getPendingDoctors());
	$doctors = mysql_num_rows($hospital->getDoctors());
	echo $doctors.",".$patients.",".$requests;
	break;
	
case 'tail':
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	echo $lat ;
	break;
}
 ?>