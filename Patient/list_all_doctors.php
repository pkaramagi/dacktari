<?php
session_name('daktali');
session_start();
include "../includes/config.php";
$user=$_SESSION['user_id'];
?>
<style>
.one_doctor{
float: left;
width: 180px;
min-height: 95px;
background: #fff;
padding: 5px;
}
.one_doctor img{
width: 50px;
height: 50px;
float: left;
background: #fdfdfd;
}
.doctor_text{
float:left;
padding:1px 0px 0px 12px;
width: 108px;
}
.doctor_name{
cursor: pointer;
color: #0083CC;
font-weight: bold;
text-align: left;
font-size: 13px;
font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
direction: ltr;
text-transform: capitalize;
}
.doctor_title{
color: gray;

}
.page_doctor{
background: url('images/pill_add.png') no-repeat;
height: 31px;
padding-left: 21px;

}
</style>
<script>
 $(".pop").fancybox({
         'overlayShow': true,
         'width': '50%',
         'height': '80%',
         'type': 'iframe'
             
     });
</script>
<?php
$sql=mysql_query("SELECT a.name, d.name AS hospital, a.photo, a.speciality, a.qualification, b.collab AS collab, a.id AS id
FROM  `doctor` a
LEFT JOIN patient_doctor b ON ( a.id = b.doctor_id
AND b.patient_id = '$user') 
LEFT JOIN hospital_doctor c ON ( c.doctor_id = a.id ) 
LEFT JOIN hospital d ON ( d.id = c.hospital_id ) 
WHERE d.status =  'approved'
AND c.status =  'approved' GROUP BY id
ORDER BY collab DESC ") or die(mysql_error());
while($row=mysql_fetch_assoc($sql)){
?>
<div class="one_doctor">
<img src="<?php echo $row['photo']?>"/>
<div class="doctor_text">
<span class="doctor_name"><?php echo $row['name']?></span><br/>
<span class="doctor_title"><?php echo $row['speciality']?></span><br/>
<div class="page_doctor">
<a href="Patient/view_doctor.php?id=<?php echo $row['id'] ?>" class="pop">See details</a>
</div>
</div>
<div style="clear:both"></div>
</div>
<?php
}
?>