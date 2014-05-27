<?php
Class Patient extends Users {
function addNewPatient($name,$email,$dob,$gender,$condition,$photo,$refresh,$folder){

$sql=mysql_query("INSERT INTO `patient`  VALUES (NULL, '$name', '$email','$folder','$dob','$gender','$photo','$refresh',now(), 1,'$condition' )") or die(mysql_error());

return mysql_insert_id();; 
}

function addPatientDoctor($id,$doctor){
$sql=mysql_query("INSERT INTO `patient_doctor` VALUES (NULL,'$id','$doctor',NULL)")or die(mysql_error());
return $sql;
}
function  addPatientHospital($id,$hospital){
$sql=mysql_query("INSERT INTO   `hospital_patient`  VALUES (NULL,'$hospital','$id')")or die(mysql_error());
return $sql;

}
}