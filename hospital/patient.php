<?php 
require_once "../setup.php";
$id=$_SESSION['user_id'];
$hospital = new Hospital($id); 
?>
<?php //require_once "../includes/header2.php" ; ?>

<script type="text/javascript" >
 $(document).ready(function(){

 		 $('input').tooltip();
	//when view details button is clicked
	//details are loaded in fancybox
				$(".viewdoc").fancybox({
					
                    'overlayShow': true,
                    'width': '50%',
                    'height': '90%',
                    'type': 'iframe'
				
				});

				});	

</script>
<?php 
$res = $hospital->getPatients();  
while($row= mysql_fetch_assoc($res)){                
			$patient_id= $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$pic =$row['photo'];
?>
<div class="row box">
		<div class="span10 app-info">
			<div class="row appointment">
				<div class="span1">
					<img src="<?php echo $pic; ?>"/>
				</div>
				<div class="span7">
					<p><strong><?php echo $name; ?></strong></p>
					<p><strong><?php echo $speciality; ?> </strong></p>
					</div>
			</div>
		
			<div class="row app-control" >
				<div class="span9">
					<div>
						<p><span><a class="viewdoc" href="viewuser.php?id=<?php echo $doc_id;?>&&type=doctor"><input title="View this user's details" type="button" class="btn btn-primary btn-mini zero-radius" id="<?php echo $patient_id; ?>" value="View Details"/></a></span>
								<button type="button" class="close">&times;</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>			
