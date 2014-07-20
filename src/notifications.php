<?php
Class Notifier{
	
	/**
	 * @var string $newNotification...has message to display to the doctor;
	 */
	public  $newNotification = "would like to arrange an appointment with you";
	public $postponeNotification = "would like to reschedule appointment made with you";
	public $approvedNotification ="has approved your appointment";
	public $noNotification ="Sorry, You have no notifications";
	
	/**
	 * function to add notification to the database 
	 * @param ORM $notifier ORM object to query database 
	 * @param string $userID ID of the application user
	 * @param string $notification actual notification to store
	 */
	function addNotification($notifier, $userID, $notification){
		$notifier->userID = $userID;
		$notifier->Notification = $notification;
		$notifier->save();
	}
	
	
	/**
	 * @param ORM $notifier object to query from database
	 * @param string $userid is the id of the person who notifications are being queried
	 * @return string $output which is a string containg list elements 
	 */
	function getNotifications($notifier){
		if(count($notifier)== 0){
				$output .= "<div class='uiOverlayContentHolder notesholder'>$this->noNotification</div>";	
		}
		foreach($notifier as $key=>$notification){
		$output .= "<div class='uiOverlayContentHolder notesholder'><a href='#' id='$notification->id' class='uchcloser'>X</a>$notification->Notification</div>";	
		}
		return $output;
	}
	
}

?>