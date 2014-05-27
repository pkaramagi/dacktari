<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<style>
#single_doctor img{
width: 100px;
height: 100px;
float: left;
}
#single_doctor #left{
float:left;
margin-left:12px;
font-size:13px !important;
}
th{
background: #0099cb !important;
color:fff;
text-transform: capitalize;
}
</style>
<?php
include "../includes/config.php";
?>
<?php
$id=$_GET['id'];
$sql=mysql_query("SELECT * FROM  doctor where id='$id'") or die(mysql_error());
$row=mysql_fetch_assoc($sql);
?>
<div id="single_doctor">
<img src="<?php echo $row['photo']; ?>"/>

<div id="left">

<table class="table table-striped table-bordered" style="font-size:12px">
<tr>
<th colspan="2">Dr <?php echo $row['name']; ?></th>
</tr>
<tr><td>Email</td><td><?php echo $row['email']; ?></td></tr>
<tr><td>Speciality</td><td><?php echo $row['speciality']; ?></td></tr>
<tr><td>Qualification</td><td><?php echo $row['qualification']; ?></td></tr>
<tr><td>Sex</td><td>
<?php
if($row['sex']=='m'){
echo "Male";
}
else{
echo "Female";
}
?>
</td></tr>
<tr><td>Hospitals attached</td><td></td></tr>

</table>
<div class="btn-group">
   <a href="#"><button class="btn">Report Abuse</button></a>
  <a href="../Prescription/prescription_request.php?email=<?php echo $row['email']; ?>&&id=<?php echo $row['id']; ?>&&name=<?php echo $row['name']; ?>"><button class="btn">Request Prescription</button></a>

</div>
</div>
</div>