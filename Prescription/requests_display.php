<?php
session_name('daktali');
session_start();
include "../includes/config.php";
include "../classes/users.php";
if($_SESSION['user_id']){
$id=$_SESSION['user_id'];
}
else{
$id=3;
}
?>
<script>
$('*').tooltip({placement:"bottom"});
$(".del").click(function(){
var id=$(this).attr('id');
 $(this).parents('.kraiba').slideUp('slow');
var datastring ="id="+id;
var number=$(".numberofprescriptions").html();

	$.ajax({
					type: "POST",
					url: "Prescription/approved.php",
					data: datastring,
					success: function(html)
				{
					if(number!=0){
$(".numberofprescriptions").html(number-1);
}
	}
 					
				});

});

$(".app").click(function(){
var number=$(".numberofprescriptions").html();
$(this).parents('.kraiba').slideUp('slow');
	if(number!=0){
$(".numberofprescriptions").html(number-1);				
}
});
	 $(".presciption").fancybox({
         'width': '90%',
         'height': '80%',
         'type': 'iframe'  
});

</script>
<?php
$obj  = new Users();
$sql=mysql_query("SELECT * FROM  `prescription` where doctor_id	='$id' and status=0 order by id desc");
if(!mysql_num_rows($sql)){
echo '<h4>You have no Prescription Requests</h4>';
}
while($row=mysql_fetch_assoc($sql)){
?>
<div class="row kraiba">
		<div class="span10 app-info">
			<div class="row appointment">
				<div class="span1">
					<img src="<?php echo $obj->getPhoto($row['patient_id'],"patient") ?>"/>
				</div>
				<div class="span7">
					<p><strong><?php echo $row['title'] ?> </strong></p>
					<p><strong><?php echo $row['description'] ?></strong></p>
					<p><?php echo $obj->getUserName($row['patient_id'],"patient") ?></p>
				</div>
			</div>
			<div class="row app-control" >
				<div class="span9">
					<div>
						<span><a href="Prescription/send_prescription.php?id=<?php echo $row['id']   ?>&&request=1" id="<?php echo $row['id']   ?>" class="presciption app"><input type="button" rel="tooltip" data-original-title="Reply Request" class="btn btn-primary btn-mini zero-radius"value="Reply"id="<?php echo $appt->id; ?>"></a></span>
						<span><a href="#" id="<?php echo $row['id']   ?>" class="del"><input rel="tooltip" data-original-title="Delete Request" type="button" class="btn btn-danger btn-mini zero-radius"value="Reject" id="<?php echo $appt->id; ?>"></a></span>
						<button type="button" class="close">&times;</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<?php
	
	}
	?>