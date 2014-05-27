<?php 
require_once "../setup.php"; 
if(isset($_GET['db_option'])){
	$option = $_GET['db_option'];
	$eventid = $_POST['ed'];
	$app = new Appointment();
	$user = new Users();
	switch($option){
		case "create":	
			try{
			$doc_id = $_POST['doctor_id'];
			$setAppointment = ORM::for_table('appointment')->create();
			$setAppointment->patient_id = $_SESSION['user_id'];
			$setAppointment->doctor_id = $doc_id;
			$setAppointment->status = 'pending'; 
			$setAppointment->starttime = $app->convertDate(str_replace('T','\T',$_POST['starttime']));
			$setAppointment->endtime = $app->convertDate(str_replace('T','\T',$_POST['endtime']));
			$setAppointment->title = $_POST['title'];
			$setAppointment->description = $_POST['description'];
			$setAppointment->save();
			$user->dp_Collab($_POST['doctor_id'], $_SESSION['user_id']);
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bootstrap.min.css\"/>";

			echo '<div class="alert alert-success">
          
              <strong>Thank u!</strong> Your Appointment has been sent for approval.
            </div>';
			
			echo "<script type = 'text/javascript'>
					parent.$.fancybox.close();
				</script>";
			}catch(PDOException $e){
				$e->getmessage();
			}
			break;
			//if option is to postpone appointment created by user
		case "postpone":
			try{
			$topostpone = ORM::for_table('appointment')->find_one($eventid);
			$topostpone->starttime = $app->convertDate($_POST['starttime']);
			$topostpone->endtime = $app->convertDate($_POST['endtime']);
			$topostpone->status = 'pending';
			$topostpone->save();
			
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bootstrap.min.css\"/>";

echo '<div class="alert alert-success">
              
              <strong>Thank u!</strong> Your Appointment has been Postponed.
            </div>';
			
			echo "<script type = 'text/javascript'>
					close();
					function close(){
					parent.$.fancybox.close();
					}
				</script>";
			
			}catch(PDOException $e){
				$e->getmessage();
			}
			break;
			//if option is to cancel appointment created by user
		case "cancel":
			try{
			$cancelled = ORM::for_table('appointment')->find_one($eventid);
			$cancelled->status ="cancelled";
			$cancelled->chg_reason = $_POST['reason'];
			$cancelled->save();
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bootstrap.min.css\"/>";

			echo '<div class="alert alert-success">
              <strong>Thank u!</strong> Your Appointment has been cancelled.
            </div>';
			}catch(PDOException $e){
				$e->getmessage();
			}
			break;
		default: 
			echo "You made an invalid request";	
	}

}



?>
