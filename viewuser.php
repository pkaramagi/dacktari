<?php
require "src/hospital.class.php";
require "includes/config.php";

$type = $_GET['type'];
$id = $_GET['id'];

//run appropiate methods when the profile of a doctor is being viewed
if($type=="doctor"){
$res = Hospital::viewDoctor($id);
$row = mysql_fetch_assoc($res) or die(mysql_error());
$id=$row['id'];
$name = $row['name'];
$email = $row['email'];
$speciality = $row['speciality'];
$qualification = $row['qualification'];
$pic =$row['photo'];
$sex = $row['sex'];
}

//run appropiate methods when the profile of a patient is being viewed
else if($type=="patient"){
$res = Hospital::viewPatient($id);
$row = mysql_fetch_assoc($res) or die(mysql_error());
$id=$row['id'];
$name = $row['name'];
$email = $row['email'];
$pic =$row['photo'];
}
?>
<!DOCTYPE html>
<html>
  <head>
  	<?php// require_once "includes/header.php" ; ?>
    <title></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		p{
		text-align:left;
		font-size:16px;
		}
		
	</style>
  </head>
  <body>
    <div class="container-fluid">
		<div class="row-fluid">
		
		</div>
		<div class="row-fluid">
			<div class="span7">
				<div class="row">
					<div class="span2">
						<img src="<?php echo $pic ?>"/>
					</div>
					<div class="span4">
						<p><strong>Name:</strong> <?php echo $name; ?></p>
						<p><strong>Sex:</strong> <?php echo $sex; ?></p>
						<p><strong>Speciality:</strong> <?php echo $speciality; ?></p>
						<p><strong>Qualification:</strong> <?php echo $qualification; ?></p>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="row">
				</div>
				
			</div>
		</div>
	</div>
  </body>
</html>