<?php 
require_once "../setup.php";
 
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
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bootstrap.min.css\"/>";

echo "
<script type='text/javascript'>
window.parent.removeContent('#app".$add2cal->id."');
</script>
";	
echo '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Thank u!</strong> Your Appointment has been Added To Your Calendar.
            </div>';
			
}

if(isset($_GET['db_option'])){
$event_id = $_POST['ed'];
$updated = ORM::for_table('appointment')->find_one($event_id);
$patid = ORM::for_table('patient')->find_one($updated->patient_id);
$client->setAccessToken($_SESSION['token']);
$app->deleteAppointment($calendar,$updated->googleEventID);
$setAppointment->starttime = $app->convertDate(str_replace('T','\T',$_POST['starttime']));
$setAppointment->endtime = $app->convertDate(str_replace('T','\T',$_POST['endtime']));
$eventz = $app->createAppointment($calendar,$updated->title,'kampala',$app->convertDate(str_replace('T','\T',$_POST['starttime'])),$app->convertDate(str_replace('T','\T',$_POST['endtime'])),$patid->email);
$updated->chg_reason = $_POST['description'];
$updated->status = $eventz['created'];
$updated->googleEventId = $eventz['id'];
$updated->status = "confirmed";
$updated->link = $eventz['htmlLink'];
$updated->save();
echo '<div class="alert alert-success">
              <strong>Thank u!</strong> Your Appointment has been Added To Your Calendar.
            </div>';
}
?>