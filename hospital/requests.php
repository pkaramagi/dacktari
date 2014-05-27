<?php 
require "../setup.php";
$id=$_SESSION['user_id'];
$hospital = new Hospital($id); 
?>
<script type="text/javascript" >
 $(document).ready(function(){
			 $('input').tooltip({placement:"bottom"});
	//when view details button is clicked
	//details are loaded in fancybox
	$(".viewdoc").fancybox({
        'overlayShow': true,
        'width': '50%',
        'height': '90%',
        'type': 'iframe'
				
	});
	//when confirm button is clicked
	$(".confirmdoc").click(function(){
		//get data attribbute
		var id =$(this).attr("data-id");
		var datas = "id="+id+"&&func=confirm";
		d = $(this).parents('.box');
		//post data to server using ajax
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
		//when reject button is clicked
		$(".rejectdoc").click(function(){
		var id =$(this).attr("data-id");
		var datas = "id="+id+"&&func=reject";
		d = $(this).parents('.box');
		bootbox.confirm("Are you sure you want to delete doctor?", function(result){
		if(result){
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
					bootbox.alert("There was an error rejecting the doctor");
			},  
			error: function(e){  
				bootbox.alert('Error: There was a problem, please retry in a moment.'); 
			}  
		});
		}
		});
		
		
	});
});

</script>
</head>

			<?php 
			//get doctors that are not yet approved in this hospital
				$requests = $hospital->getPendingDoctors();
				while($row=mysql_fetch_assoc($requests)){
				$doc_id=$row['id'];
				$name =$row['name'];
				$email =$row['email'];
				$speciality =$row['speciality'];
				$qualification =$row['qualification'];
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
						<p><span><input title="Approve Doctor"type="button" class="btn btn-success confirmdoc btn-mini zero-radius" id="" data-id="<?php echo $doc_id; ?>" value="Confirm"/></span>
						<span><a class="viewdoc" href="viewuser.php?id=<?php echo $doc_id;?>&&type=doctor"><input title="View Doctor's details" type="button" class="btn btn-primary btn-mini zero-radius" id="<?php echo $patient_id; ?>" value="View Details"/></a></span>
								<span><input rel="tooltip" title="Reject Doctor" type="button" class="btn btn-danger rejectdoc btn-mini zero-radius" data-id="<?php echo $doc_id; ?>"  value="Reject"/></span></p>	
		<button type="button" class="close">&times;</button>
					</div>
				</div>
			</div>
		</div>
	</div>

				<?php 
				} 
				?>