<?php
/**
*
*Class Hospital contains everything to do with a hospital 
*
*/
Class Hospital{
private $id;
function __construct($id){
$this->id = $id;
}

/**
*
*Method getDoctors() returns an array with details of all doctors belonging to the Hospital  
*
*/
public function getDoctors(){
$query = "SELECT  d.id, name, email, speciality, photo, qualification FROM doctor AS d JOIN hospital_doctor as hd ON hd.hospital_id='$this->id' AND d.id=hd.doctor_id AND hd.status='approved'";
$result = mysql_query($query);
return $result;
}

/**
*
*Method getPatients() returns an array with details of all patients belonging to the Hospital  
*
*/
public function getPatients(){
$query = "SELECT p.id, name, email, photo FROM patient AS p JOIN hospital_patient AS hp WHERE hp.hospital_id='$this->id' AND p.id=hp.patient_id";				
$result = mysql_query($query);
return $result;
}

public function addDoctor(){}

/**
*
*Method viewDoctor() returns an array with details of a doctor selected  
*
*/
public function viewDoctor($id){
$id=mysql_real_escape_string($id);
$sql ="SELECT * FROM doctor WHERE id='$id'";
$result = mysql_query($sql);
return $result;
}

/**
*
*Method viewDoctor() returns an array with details of a patient selected  
*arguments:patient id
*/
public function viewPatient($id){
$sql ="SELECT * FROM patient WHERE id='$id'";
$result = mysql_query($sql);
return $result;
}

/**
*
*Method getPendingDoctors() returns an array with all doctors that have requested to  
*be part of the hospital
*/
public function getPendingDoctors(){
$sql = "SELECT  d.id, name, email, speciality, photo, qualification FROM doctor AS d JOIN hospital_doctor as hd ON hd.hospital_id='$this->id' AND d.id=hd.doctor_id AND hd.status='pending'";
$result= mysql_query($sql);
return $result;
}

/**
*
*Method confirmDoctor() makes doctor approved with Hospital  
*arguments:doctor id
*returns 1 for success 
* 		 error code for failure
*/
public function confirmDoctor($doc_id){
$sql = "UPDATE hospital_doctor SET status='approved' WHERE hospital_id='$this->id' AND doctor_id='$doc_id'";
$response = mysql_query($sql);
return $response;
}

/**
*
*Method rejectDoctor() Rejects a doctor completely from the list the doctor can confirm
*Doctor needs to request for addition again
*arguments:doctor id
*returns 1 for success 
* 		 error code for failure
*/
public function rejectDoctor($doc_id){
$sql = "DELETE FROM hospital_doctor WHERE hospital_id='$this->id' AND doctor_id='$doc_id'";
$response = mysql_query($sql);
return $response;
}

/**
*
*Method removeDoctor() Removes a doctor from the approved doctors of hospital 
*Hospital can confirm removed doctor at any time
*arguments:doctor id
*returns 1 for success 
* 		 error code for failure
*/
public function removeDoctor($doc_id){
$sql = "UPDATE hospital_doctor SET status='pending' WHERE hospital_id='$this->id' AND doctor_id='$doc_id'";
$response = mysql_query($sql);
return $response;
}

/**
*
*Method getStatus() returns the status of a hospital
* 		 
*/
public function getStatus(){
$sql = "SELECT status FROM hospital WHERE id='$this->id'";
$response = mysql_query($sql);
$row= mysql_fetch_assoc($response);
return $row['status']; 
}

public function createEvent($title, $time, $type, $description){
$sql = "INSERT INTO `event`(`event_id`, `title`, `hospital_id`, `time`, `type`, `description`, `googleEventId`, `dateCreated`) VALUES (NULL, '$title', '$this->id', '$time', '$type', '$description', '', CURRENT_TIMESTAMP); ";
$response = mysql_query($sql);
return $response;

}

}
?>