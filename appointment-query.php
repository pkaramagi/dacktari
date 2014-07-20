<?php 
require_once "setup.php"; 
if($_POST['option']){
	$option = $_POST['option'];
try{
if($option=="upcoming"){
$results = ORM::for_table('appointment')->where('status','confirmed')->where('patient_id',$_SESSION['user_id'])->find_many();		
foreach($results as $key =>$appt){
$doc = ORM::for_table("doctor")->find_one($appt->doctor_id);
 ?>

	<div class="row">
		<div class="span10 app-info">
			<div class="row appointment">
				<div class="span1">
					<img src="<?php echo $doc->photo; ?>"/>
				</div>
				<div class="span7">
					<p><strong><?php echo $appt->title; ?> </strong></p>
					<p><strong><?php echo $appt->description; ?> </strong></p>
					<p><?php echo date('D,F jS g:i a', strtotime(substr(str_replace('T',' ',$appt->starttime),0,16 ))); ?> at <?php echo $appt->location ?></p>
				</div>
			</div>
			<div class="row app-control" >
				<div class="span9">
					<div>
						<span><a href="postpone.php?pid=<?php echo $appt->id; ?>" class="pstponelink" ><input type="button" class="btn btn-primary btn-mini zero-radius"value="PostPone"id="<?php echo $appt->id; ?>"></a></span>
						<span><a href="cancel.php?ed=<?php echo $appt->id; ?>" class="cancellink" ><input type="button" class="btn btn-danger btn-mini zero-radius"value="Cancel" id="<?php echo $appt->id; ?>"></a></span>
						<button type="button" class="close">&times;</button>
					</div>
				</div>
			</div>
		</div>
	</div>	
<?php	
}
}
else if($option=="pending"){
$results = ORM::for_table('appointment')->where('status','pending')->where('patient_id',$_SESSION['user_id'])->find_many();			
foreach($results as $key=>$appt){ 
$doc = ORM::for_table("doctor")->find_one($appt->doctor_id);
?>
	<div class="row">
		<div class="span10 app-info">
			<div class="row appointment">
				<div class="span1">
					<img src="<?php echo $doc->photo; ?>"/>
				</div>
				<div class="span7">
					<p><strong><?php echo $appt->title; ?> </strong></p>
					<p><strong><?php echo $appt->description; ?> </strong></p>
					<p><?php echo date('D,F jS g:i a', strtotime(substr(str_replace('T',' ',$appt->starttime),0,16 ))); ?> at <?php echo $appt->location ?></p>
				</div>
			</div>
		
			<div class="row app-control" >
				<div class="span9">
					<div>
						<span ><a href="postpone.php?pid=<?php echo $appt->id; ?>"  class="pstponelink" ><input type="button" class="postpone btn btn-primary btn-mini zero-radius"value="PostPone"id="<?php echo $appt->id; ?>"></a></span>
						<span><a href="cancel.php?ed=<?php echo $appt->id; ?>" class="cancellink"><input type="button" class="btn btn-danger btn-mini zero-radius"value="Cancel" id="<?php echo $appt->id; ?>"></a></span>
						<button type="button" class="close">&times;</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php		
}
}
else if($option=="cancelled"){
$results = ORM::for_table('appointment')->where('status','cancelled')->where('patient_id',$_SESSION['user_id'])->find_many();	
foreach($results as $key=>$appt){
$doc = ORM::for_table("doctor")->find_one($appt->doctor_id);
?>	
<div class="row" id="app<?php echo $results->id;?>">
		<div class="span10 app-info">
			<div class="row appointment">
				<div class="span1">
					<img src="<?php echo $doc->photo; ?>"/>
				</div>
				<div class="span7">
					<p><strong><?php echo $appt->title; ?> </strong></p>
					<p><strong><?php echo $appt->description; ?> </strong></p>
					<p><?php echo date('D,F jS g:i a', strtotime(substr(str_replace('T',' ',$appt->starttime),0,16 ))); ?> at <?php echo $appt->location ?></p>
				</div>
			</div>
		</div>
	</div>
<?php
 } 
 }
else{
	echo "you entered a wrong choice";	
}	

}catch(PDOException $e){

}
}

	?>