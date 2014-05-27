<?php

if(isset($_GET['db_option'])){
$event_id = $_POST['ed'];
require_once '../includes/config.php';
require_once '../src/Google_Client.php';
require_once '../src/contrib/Google_CalendarService.php';
require_once '../classes/appointment.php';
require_once '../src/idiorm.php';
require_once '../classes/users.php';
ORM::configure("mysql:host=$host;dbname=$database");
ORM::configure('username', $user);
ORM::configure('password', $pass);
// Changing the connection to unicode
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$appt = ORM::for_table('appointment')->find_one($event_id);
echo $appt->event_id;
$app = new Appointment();			
$ref=new Users();
$refreshToken= $ref->getRefreshToken($appt->doctor_id,'doctor');
$client= new Google_Client();
$client->setAccessType('offline');
$client->refreshToken($refreshToken);
$cal=new Google_CalendarService($client);
$app->deleteAppointment($cal, $appt->googleEventID);
$appt->status="cancelled";
$appt->chg_reason=$_POST['reason'];
$appt->save();
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bootstrap.min.css\"/>";

			echo '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Thank u!</strong> Your Appointment has been cancelled.
            </div>';
}

