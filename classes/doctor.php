<?php
Class Doctor extends Users {
function addNewDoctor($name,$email,$gender,$speciality,$qualification, $photo,$refresh,$folder){

$sql=mysql_query("INSERT INTO `doctor`  VALUES (NULL, '$name', '$email','$speciality','$qualification','$folder',NULL,'$gender','$photo','$refresh',2)") or die(mysql_error());

return mysql_insert_id();; 
}


function  addPatientDoctor($id,$hospital){
$sql=mysql_query("INSERT INTO  `hospital_doctor`  VALUES (NULL,'$hospital','$id',0)")or die(mysql_error());
return $sql;

}
}