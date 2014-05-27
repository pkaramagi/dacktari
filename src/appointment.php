<?php

Class appointments{
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

 function createAppointment(Google_CalendarService $calendarService, $summary, $location,$reminderz,$timing,$email){
	
	$event = new Google_Event();
	$event->setSummary($summary);
	$event->setLocation($location);
	$start = new Google_EventDateTime();
	$start->setDateTime($timing['startTime']);
	$event->setStart($start);
	$end = new Google_EventDateTime();
	$end->setDateTime($timing['endTime']);
	$event->setEnd($end);
	$creater = new Google_EventCreator();
	$creater->setEmail($email['doctor']);
	$creater->setDisplayName('Hospital Apointment');
	$event->setCreator($creater);
	$attendee2 = new Google_EventAttendee();
	$attendee2->setEmail($email['patient']);
	$attendee2->setResponseStatus('accepted');
	$attendees = array($attendee2
			// ...
	
	);
	
	
	$event->attendees = $attendees;
	$createdEvent = $calendarService->events->insert('primary', $event);
	return $createdEvent;
	
}

function postponeEvent($service,$eventId,$timing,$reason,$email){
	
	$event = new Google_Event($service->events->get("primary", 's2al1aaef7s1ao66pg3r8daqvo'));
	$event->setLocation('gulu');
	$event->setSummary('appointment to see doctor');
	$updated = new Google_Event($service->events->update("primary", 's2al1aaef7s1ao66pg3r8daqvo' , $event));
	}

function approveEvent($updater,$status, $datecreated, $eventID, $link,$id){
	//
	$updater->status = $status;
	$updater->datecreated = $datecreated;
	$updater->eventID = $eventID;
	$updater->link = $link;
	$updater->patientID = $id[patient];
	$updater->doctorID = $id[doctor];
	$updater->save();	
	
	
}

// ...
	
	
}