<?php
session_name('daktali');
session_start();
include "../includes/config.php";
include "../classes/users.php";
if($_SESSION['user_id']){
$id=$_SESSION['user_id'];

}
else{

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
	 $(".pop").fancybox({
         'width': '50%',
         'height': '100%',
         'type': 'iframe'  
});

</script>
<?php
$obj  = new Users();
$sql=mysql_query("SELECT * FROM  `prescription` where patient_id='$id' and status=1 order by id desc");
if(!mysql_num_rows($sql)){
echo '<h4>You have no Prescriptions</h4>';
}
while($row=mysql_fetch_assoc($sql)){
?>
<div class="row kraiba">
		<div class="span10 app-info">
			<div class="row appointment">
				<div class="span1">
					<img src="<?php echo $obj->getPhoto($row['doctor_id'],"doctor") ?>"/>
				</div>
				<div class="span7">
					<p><strong><?php echo $row['title'] ?> </strong></p>
					<p><strong><?php echo $row['description'] ?></strong></p>
					<p>Dr <?php echo $obj->getUserName($row['doctor_id'],"doctor") ?></p>
				</div>
			</div>
			<div class="row app-control" >
				<div class="span9">
					<div>
						<span><a href="Prescription/read.php?path=<?php echo $row['path']   ?>&&request=1" id="<?php echo $row['id']   ?>" class="presciption"><input type="button" data-original-title="View this Prescription" class="btn btn-primary btn-mini zero-radius"value="View" id="<?php echo $appt->id; ?>"></a></span>
						<span><a href="#" id="<?php echo $row['id']   ?>" class="del"><input type="button" data-original-title="Delete this prescription"  class="btn btn-danger btn-mini zero-radius"value="Remove" id="<?php echo $appt->id; ?>"></a></span>
						<button type="button" class="close">&times;</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<?php
	
	}
	?>