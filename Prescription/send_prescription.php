<?php
include "../includes/config.php";
include "../includes/relativeTime.php";
include "../classes/users.php";
?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<?php
$id=$_GET[id];
$sql=mysql_query("SELECT * FROM  `prescription` where id='$id'")or die(mysql_error());
$row=mysql_fetch_assoc($sql);
?>
   <style>
   body {
   
   }
.prescription_right{
margin-top:20px;
width:50%;

float:right;
margin-right:20px;
}
.prescrition_left{
margin-top:20px;
float:left;
width:35%;
margin-left:30px;

}
.table{
width:80%;
floatleft
}
.prescrition_left img{
float:left;
margin-right:10px;
width:60px
}
h5{
text-transform: capitalize;
}
</style>
<div class="prescrition_left">
<?php
$patient_id=$row['patient_id'];
$query=mysql_query("SELECT * FROM  `patient` where id='$patient_id'")or die(mysql_error());
$result=mysql_fetch_assoc($query);
?>
<img  src="<?php echo $result['photo'] ?>">
<table class="table table-striped table-bordered">
<tr><th colspan=2>Patient Info</th></tr>
<tr><td>Name</td><td style="text-transform: capitalize;"><?php echo $result['name'] ?></tr>
<tr><td>Age</td><td><?php echo  new RelativeTime($result['date_of_birth']) ?></tr>
<tr><td>Sex</td><td><?php if($result['sex']=='m'){ echo "Male"; } else{ echo "Female";}?></tr>
<tr><td>Special Info</td><td><?php echo $result['condition'] ?></tr>
</table>
<input type="button" class="btn ui-button-primary" style="border-radius:0; margin-left:62px;" id="9" value="View Patient File">
<h5><?php echo $row['title'] ?></h5>
<?php echo $row['description'] ?>
</div>
<div class="prescription_right">
<?php include "send.php"?>

</div>
<div style="clear:both"></div>
