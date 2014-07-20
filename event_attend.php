<?php 
require_once "setup.php";
if($_POST){
try{
$appt = new Appointment();
$user = new Users();
//fetch event from table
$eventz = ORM::for_table('event')->find_one($_POST['eventid']);
//add attendee to database
$appt->confirmAttendee($_POST['eventid'],$_SESSION['type'], $_SESSION['user_id']);
$clientz= new Google_Client();
$clientz->setUseObjects(true);
//set offline
$clientz->setAccessType('offline');
$clientz->refreshToken($user->getRefreshToken($eventz->hospital_id,'hospital'));
$cal=new Google_CalendarService($clientz);
$event = $cal->events->get('primary', $eventz->googleEventId);
$start = new Google_EventDateTime();
$start->setDateTime($appt->convertDate(str_replace('T','\T',$eventz->start_time)));
$event->setStart($start);
$end = new Google_EventDateTime();
$end->setDateTime($appt->convertDate(str_replace('T','\T',$eventz->end_time)));
$event->setEnd($end);
$atte = $event->getAttendees();
$attendee = new Google_EventAttendee();
$attendee->setEmail($user->getUserEmail($_SESSION['user_id'],$_SESSION['type']));
$attendee->setResponseStatus('accepted');

if($atte == ""){
$atte = array($attendee);
}else{
array_push($atte,$attendee);
}
$event->attendees = $atte;
$updatedEvent = $cal->events->update('primary', $event->getId(), $event);
$url = "getdirection.php?lat=".$_POST['lat']."&&id=".$_POST['eventid']."&&lon=".$_POST['lon']."&&attend=1";
header('location:'.$url);
}catch(Google_ServiceException $e){
 ?>
 <div class="alert alert-error">
 <p>A problem occured while adding this event to your calendar, please try again</p>
</div>
<?php }
catch(PDOException $e){
 ?>
 <div class="alert alert-error">
 <p>A problem occured while adding this event to your calendar, please try again</p>
</div>
<?php }
}
else{
if($_GET['event']){
try{
$event_id = $_GET['event'];
$event = ORM::for_table('event')->find_one($event_id);
$location = ORM::for_table('hospital')->find_one($event->hospital_id);
}catch(IOException $e){
?>
 <div class="alert alert-error">
 <p>There was problem loading this page , please try again </p>
</div>
<?php
}
?>
<html>    
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
        <style type="text/css">
			body{border:1px solid #d1d1d1;margin:30px;font-family:'Open Sans',arial,sans-serif;!important}body p{font-family:'Open Sans'}.input-xxlarge{width:431px;height:28px}.input-xlarge{height:28px}.head{text-align:center;border-bottom:1px solid lightGrey;margin-bottom:30px}.search *{display:inline}.span3{width:240px}.doctordata{margin-left:20px}.row-fluid div.appointmentright{border-left:1px solid lightgrey;padding-left:10px}.inactive{opacity:.5}.appointmentright form{margin-top:14px;margin-left:17px}div.space{height:10px}.avartar{height:61px;width:57px}.createappointment{margin-right:5px}.noborder{border-radius:3px}#docs{overflow-y:scroll;height:360px}.tx{height:100px}.form-horizontal .control-label{width:210px;text-align:left}.form-horizontal .controls{margin-left:125px}.zero-radius{border-radius:2px}.control-label{width:200px;margin-bottom:10px;float:left;padding-right:5px}
        </style>
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
	<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <h2 class="head"><?php echo $event->title; ?></h2>
			 <form class="form-horizontal" action="" method="POST">
			<div class="control-group">
			<label class="control-label" for="inputEmail">About This Event</label>
			<div class="controls">
			<p><?php echo $event->description; ?></p>
			</div>
			</div>
			<div class="control-group">
			<label class="control-label" for="inputEmail">When</label>
			<div class="controls">
			<p><?php echo $event->start_time; ?></p>
			</div>
			</div>
			<div class="control-group">
			<label class="control-label" for="inputEmail">Location</label>
			<div class="controls">
			<p><?php 
			
			echo $location->location;?></p>
			</div>
			</div>
			<input type="hidden" name="hosp_id" value="<?php echo $location->id; ?>" >
			<input type="hidden" name="lat" value="<?php echo $location->latitude; ?>" >
			<input type="hidden" name="lon" value="<?php echo $location->logitude; ?>" >
			<input type="hidden" name="eventid" value="<?php echo $event->id; ?>">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Are you Attending this Event</label>
				<div class="controls">
					<input type="submit" class="btn btn-primary btn-mini zero-radius"  id="cancel" value="Yes">
					<input type="button" class="btn btn-danger btn-mini zero-radius" onclick="parent.$.fancybox.close()" value="No"/>
					
				</div>
			</div>
			<div style="clear:both"></div>
        </form>
		</div>
		</div>		
	</body>
</html>
<?php } } ?>