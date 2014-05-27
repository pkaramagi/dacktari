<?php

Class Appointment{
	/*
	 * @param string $time when the appointment is to be
	 * @param string $date when the appointment is to be along with the time
	 * @param string $attendees array of persons who will attend this event
	 * @param string $reminder method of reminding attendes..eg using sms
	 * @param string $service calendarapiserivce object..
	 *  */
	/*
 * @param $calendarService apiCalendarServiceObject used 
 * @param $summary for the appointment to be created
 * @param $location where the event will
 * @param $reminder array containing event reminder method and event reminder before time*/
 
 
 function createAppointment($calendarService,$summary,$location,$stime,$etime,$email){
	$event = new Google_Event();
	$event->setSummary($summary);
	$event->setLocation($location);
	$start = new Google_EventDateTime();
	$start->setDateTime($stime);
	$event->setStart($start);
	$end = new Google_EventDateTime();
	$end->setDateTime($etime);
	$event->setEnd($end);
	$creator = new Google_EventCreator();
	$creator->setEmail("krabz01@gmail.com");
	$creator->setDisplayName('Daktari');
	$event->setCreator($creator);
	$attendee2 = new Google_EventAttendee();
	$attendee2->setEmail($email);
	$attendee2->setResponseStatus('accepted');
	$attendees = array($attendee2);
	$event->attendees = $attendees;
	$createdEvent = $calendarService->events->insert('primary', $event);
	return $createdEvent;
	
}

function postAppointment($service,$eventId,$timing,$reason,$email){
	try{
		$event = new Google_Event($service->events->get("primary", 's2al1aaef7s1ao66pg3r8daqvo'));
		$event->setLocation('gulu');
		$event->setSummary('appointment to see doctor');
		$updated = new Google_Event($service->events->update("primary", 's2al1aaef7s1ao66pg3r8daqvo' , $event));
	}catch(IOException $e){
		echo $e->getmessage();
	}	
}


function deleteAppointment($service,$eventID){
	try{
		$deleted = $service->events->delete('primary', $eventID);
	}catch(IOExceptioin $e){
		echo $e->getmessage();
	}
	return $deleted;
}

function approveEvent($updater,$status, $datecreated, $eventID, $link,$id){
	$updater->status = $status;
	$updater->datecreated = $datecreated;
	$updater->eventID = $eventID;
	$updater->link = $link;
	$updater->patientID = $id[patient];
	$updater->doctorID = $id[doctor];
	$updater->save();	
}

/**
 * Get date in RFC3339
 * For example used in XML/Atom
 * @param string $curentdate carries the value of date to be converted to google calendar time format
 * @return string $date which is internet format time
 * @param integer $timestamp
 * @return string date in RFC3339
 * @author Boris Korobkov
 * function to convert entered time to current google accepted format
 */
function convertDate($curentdate) {
	$timestamp = time();	
	$date = date($curentdate, $timestamp);
	$matches = array();
	if (preg_match('/^([\-+])(\d{2})(\d{2})$/', date('O', $timestamp), $matches)) {
		$date .= $matches[1].$matches[2].':'.$matches[3];
	} else {
		$date .= 'Z';
	}
	return $date;
}

	
}
