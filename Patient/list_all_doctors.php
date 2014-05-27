<?php
include "../includes/config.php";
?>
<style>
.one_doctor{
float:left;
width:243px;
height:110px;
background: #fff;
padding:5px ;
}
.one_doctor img{
width:100px;
height:100px;
float:left;
background:#fdfdfd;
}
.doctor_text{
float:left;
padding:12px 0px 0px 12px;
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
$sql=mysql_query("SELECT * FROM  `doctor`") or die(mysql_error());
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