<link href="css/events.css" rel="stylesheet" type="text/css"/>

<div id="side_event">
<h5 id="hospital-action">Hospital Events</h5>
<ol class="events" id="hospital-events-list">
  
<?php
$patient_id = $_SESSION['user_id'];
//$sql="SELECT a.id, a.title, b.name, b.photo, a.start_time, a.end_time FROM event a, hospital b, hospital_patient c WHERE a.hospital_id = c.hospital_id AND c.hospital_id = b.id AND c.patient_id='$patient_id'";

$sql="SELECT a.id, a.title, b.name, b.photo, a.start_time, a.end_time FROM event a, hospital b, hospital_patient c WHERE a.hospital_id = c.hospital_id AND c.hospital_id = b.id AND c.patient_id='$patient_id' and  ( SUBSTRING( REPLACE( start_time,  'T',  ' ' ) , 1, 19 ) ) > NOW( ) and a.id not in (SELECT event_id   from `attendees` where user_id='$patient_id' and type='patient' ) ";

$result = mysql_query($sql)or die (mysql_error());
if(!mysql_num_rows($result)){
?>
<li id="a" class="event_one">

  <span class="event-image" id="account-image-0"></span>
  <div class="text">
  <span class="event-name">No Hospital Event</span><br/>
  <span class="event-desc" id="account-email-0">
  No Subscribed Hospital Has organised an event
  </span>
  </div>

<div style="clear:both"></div>
  </li>

<?php
}
while($row= mysql_fetch_assoc($result)){
$title= $row['title'];
$name= $row['name'];
$photo= $row['photo'];
$start_time= $row['start_time'];
$end_time= $row['end_time'];
?>
  
<li id="<?php echo $row['id'] ?>" class="event_one">
<img src="images/calendar.ico"  class="image_icon" title="Respond to this Event"/>
  <span class="event-image" id="account-image-0"><img src="<?php echo $photo;?>" style="width: 40px;"/></span>
  <div class="text">
  <span class="event-name"><?php echo $title;?></span><br/>
  <span class="event-desc" id="account-email-0">
  <?php echo $name;?><br/>
  <?php echo date('D,F j g:i a', strtotime(substr(str_replace('T',' ',$start_time),0,16 ))); ?><br/>

  </span>
  </div>

<div style="clear:both"></div>
  </li>
 <?php } ?>   
  </ol>
  <h5 id="hospital-action">Confirmed Events</h5>
  <ol class="events" id="hospital-events-list">
  
<?php
$patient_id = $_SESSION['user_id'];
//$sql="SELECT a.id, a.title, b.name, b.photo, a.start_time, a.end_time FROM event a, hospital b, hospital_patient c WHERE a.hospital_id = c.hospital_id AND c.hospital_id = b.id AND c.patient_id='$patient_id'";

$sql="SELECT a.id, a.title, b.name, b.photo, a.start_time, a.end_time FROM event a, hospital b, hospital_patient c WHERE a.hospital_id = c.hospital_id AND c.hospital_id = b.id AND c.patient_id='$patient_id' and  ( SUBSTRING( REPLACE( start_time,  'T',  ' ' ) , 1, 19 ) ) > NOW( ) and a.id in (SELECT event_id   from `attendees` where user_id='$patient_id' and type='patient' ) ";

$result = mysql_query($sql)or die (mysql_error());
if(!mysql_num_rows($result)){
?>
<li id="a" class="event_one" >

  <span class="event-image" id="account-image-0"></span>
  <div class="text">
  <span class="event-name">No Hospital Event</span><br/>
  <span class="event-desc" id="account-email-0">
  No Subscribed Hospital Has organised an event
  </span>
  </div>

<div style="clear:both"></div>
  </li>

<?php
}
while($row= mysql_fetch_assoc($result)){
$title= $row['title'];
$name= $row['name'];
$photo= $row['photo'];
$start_time= $row['start_time'];
$end_time= $row['end_time'];
?>
  
<li id="a" class="event_one" >
<img src="images/calendar.ico"  class="image_icon" />
  <span class="event-image" id="account-image-0"><img src="<?php echo $photo;?>" style="width: 40px;"/></span>
  <div class="text">
  <span class="event-name"><?php echo $title;?></span><br/>
  <span class="event-desc" id="account-email-0">
  <?php echo $name;?><br/>
  <?php echo date('D,F j g:i a', strtotime(substr(str_replace('T',' ',$start_time),0,16 ))); ?><br/>

  </span>
  </div>

<div style="clear:both"></div>
  </li>
 <?php } ?>   
  </ol>
</div>