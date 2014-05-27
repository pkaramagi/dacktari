<?php
Class HospitalRegister extends Users {
function addNewHospital($name,$email,$location,$lat,$long,$photo,$refresh,$folder){

$sql = mysql_query("INSERT INTO `hospital`   VALUES (NULL, '$name', '$email','$location','$lat','$long','$refresh','$photo',3,'$folder','pending')") or die(mysql_error());

return mysql_insert_id();; 
}


}