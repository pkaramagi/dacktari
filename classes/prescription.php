<?php
Class Prescription{

function sendRequest($doctor_id,$user_id,$title,$description){
$sql=mysql_query("INSERT INTO prescription VALUES(NULL,'$doctor_id','$user_id','$title','$description',0,'','')") or die(mysql_error());
return $sql;
}
function sendPrescription($id,$description,$path){
$sql=mysql_query("UPDATE prescription SET description_r='$description' ,path='$path' ,status=1 WHERE id='$id'");
return $sql;
}

}

?>