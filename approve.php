<?php 
require_once "setup.php";
 
$app = new Appointment(); 
if(isset($_GET['pid'])){
$event_id = $_GET['pid'];
	$add2cal = ORM::for_table('appointment')->find_one($event_id);	
    $patid = ORM::for_table('patient')->find_one($add2cal->patient_id);     
	$client->setAccessToken($_SESSION['token']);
	$eventz = $app->createAppointment($calendar,$add2cal->title,'kampala',$add2cal->starttime,$add2cal->endtime,$patid->email);
	$add2cal->status = $eventz['status'];
	$add2cal->dateCreated = $eventz['created'];
	$add2cal->googleEventID  = $eventz['id'];
	$add2cal->link = $eventz['htmlLink'];
	$add2cal->save();
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/bootstrap.min.css\"/>";

echo '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Thank u!</strong> Your Appointment has been Added To Your Calendar.
            </div>';

}
if(isset($_GET))


?>