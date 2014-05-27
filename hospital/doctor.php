<?php 
require "../setup.php";
$id=$_SESSION['user_id'];
$hospital = new Hospital($id); 
?>
<script type="text/javascript" >
 $(document).ready(function(){
		 $('input').tooltip();
	 //when View Details button link is clicked
	 //details are loaded in fancybox
	$(".viewdoc").fancybox({
        'overlayShow': true,
        'width': '50%',
        'height': '90%',
        'type': 'iframe'
				
	});
	//when remove button is clicked
	$(".removedoc").click(function(){
		var id =$(this).attr("data-id");
		var datas = "id="+id+"&&func=remove";
		d = $(this).parents('.box');
		$.ajax({
			type: 'POST',
			url: 'hospital/response.php',
			data: datas,
			success: function(resp){  
			
			if(resp==1){
				d.slideUp("slow");
				updateNumbers();
				}
			else
				bootbox.alert("There was an error confirming the doctor");
		
			},  
			error: function(e){  
				bootbox.alert('Error: There was a problem, please retry in a moment.'); 
				
			}  
		});
							 
	});

});	

</script>
<h2>Your Doctors</h2>
				<div id="display"></div>
				 <?php
		  //show all doctors who belong to this hospital
		  $res = $hospital->getDoctors();

		  while($row= mysql_fetch_assoc($res))
			{
			$doc_id=$row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$speciality = $row['speciality'];
			$qualification = $row['qualification'];
			$pic =$row['photo'];
?>
		<div class="row box">
		<div class="span10 app-info">
			<div class="row appointment">
				<div class="span1">
					<img src="<?php echo $pic; ?>"/>
				</div>
				<div class="span7">
					<p><strong><?php echo $name.", ".$qualification; ?></strong></p>
					<p><strong><?php echo $speciality; ?> </strong></p>
								</div>
			</div>
		
			<div class="row app-control" >
				<div class="span9">
					<div>
						<p><span><a class="viewdoc" href="viewuser.php?id=<?php echo $doc_id;?>&&type=doctor"><input title="View this user's details" type="button" class="btn btn-primary btn-mini zero-radius" id="<?php echo $patient_id; ?>" value="View Details"/></a></span>
								<span><input rel="tooltip" title="Revoke Approval" type="button" class="btn btn-danger removedoc btn-mini zero-radius" data-id="<?php echo $doc_id; ?>"  value="Remove"/></span></p>	
		<button type="button" class="close">&times;</button>
					</div>
				</div>
			</div>
		</div>
	</div>
							
	<?php   } ?>
