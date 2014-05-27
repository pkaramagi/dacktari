<?php
if($_POST['option']){
$opt = $_POST['option'];
session_name('daktali');
session_start();
include "../includes/config.php";
$id=$_SESSION['user_id'];
$user = $_SESSION['type'];
$sql = "";
	if($opt == "upcoming"){
		if($user == "patient"){
			$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where patient_id='$id' and status='confirmed' GROUP BY patient_id") or die(mysql_error());
		}
		else{
			$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where doctor_id='$id' and status='confirmed' GROUP BY doctor_id") or die(mysql_error());
		}
	}
	else if($opt == "pending"){
		if($user == "patient"){
			$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where patient_id='$id' and status='pending'  GROUP BY patient_id") or die(mysql_error());
		}
		else{
			$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where doctor_id='$id' and status='pending' GROUP BY doctor_id") or die(mysql_error());
		}
	}
	else if($opt == "cancelled"){
		if($user == "patient"){
			$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where patient_id='$id' and status='cancelled' GROUP BY patient_id") or die(mysql_error());
		}
		else{
			$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where doctor_id='$id' and status='cancelled' GROUP BY doctor_id") or die(mysql_error());
		}
	}
	
error_reporting(0);

$row=mysql_fetch_assoc($sql);
if($row['count']==0)
echo 0;
else if($row['count'] > 0){
echo $row['count'];
}			
else{
echo 0;
}
}										
?>