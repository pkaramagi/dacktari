<?php

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
$appt = ORM::for_table('appointment')->find_one(30);
echo $appt->googleEventID;
$app = new Appointment();			
$ref=new Users();
$client= new Google_Client();
$client->setUseObjects(true);
$client->setAccessType('offline');
$client->refreshToken('1/UsMaxly4M20uCe1GuepRxZlqz6r_7p5_GDTd1EyJBpg');
$cal=new Google_CalendarService($client);
$event = $cal->events->get('primary', 'iausk0dsa9uprc60fenbfhmvs8');
		$end = new Google_EventDateTime();
	$end->setDateTime('2012-10-24T22:50:07-07:00');
	$event->setEnd($end);
	$start = new Google_EventDateTime();
	$start->setDateTime('2012-10-24T21:50:07-07:00');
	$event->setStart($start);
	$attendee2 = new Google_EventAttendee();
	$attendee2->setEmail('krabz01@gmail.com');
	$attendee2->setResponseStatus('accepted');
	$attendee1 = new Google_EventAttendee();
	$attendee1->setEmail('lubegamark@gmail.com');
	$attendee1->setResponseStatus('accepted');
	$attendees = array($attendee2,$attendee1);
	$event->attendees = $attendees;
	$updatedEvent = $cal->events->update('primary', $event->getId(), $event);
print_r($updatedEvent);