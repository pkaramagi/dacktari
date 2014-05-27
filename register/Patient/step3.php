<?php  include_once('../includes/config.php')?>
<style>
.friends_area_hospital{
    width:139px;
	margin:10px 0 3px 12px;
	float:left;color:#000;
	padding:6px;cursor:pointer;
    height:49px;
	-moz-border-radius: 6px; 
	-webkit-border-radius: 6px;
  }
a.close{
	
	color:#666666;
	display:block;
	padding:6px;
	text-decoration:none;
	-moz-background-clip:border;
	-moz-background-inline-policy:continuous;
	-moz-background-origin:padding;
	border:solid #999 1px;
	background:#CCCCCC;
	
	color:#333333;
	cursor:pointer;
	display:inline-block;
	float:left;
	font-size:11px;
	font-weight:bold;
	margin:0 0 0 4px;
	outline-color:-moz-use-text-color;
	outline-style:none;
	outline-width:medium;
	white-space:nowrap;
}
.top_area{
	background:#0099cb;
	font-size:14px;
	color:#FFFFFF;
	font-weight:bold;
	padding:6px 6px 6px 12px;		
}
.name{
	font-size:11px;
	color:#000000;
	padding:0px;
	cursor:pointer;
	font-style:normal;
	padding-left:4px;
	}
#search_area{
	background:#F2F2F2 none repeat scroll 0 0;
	border-bottom:1px solid #E0E0E0;
	width:680px;
	color:#999999;
	padding-left:5px;
	padding-top:11px;
	height:26px;
}
.friends_area:hover{ 
	-moz-border-radius: 6px; 
	-webkit-border-radius: 6px;
	background: #F2F2F2;
}
</style>
<script>
$(document).ready(function() { 
	
	function include(arr, obj)  
	// this function will check if a box is already selected and if it is selected the make it unslected and clear the id of that box from array.
	{
		for(var i=0; i<arr.length; i++) 
		{
			if (arr[i] == obj) 
			{
				$('#hospital_ids').val('');
				
				for(var k=0; k<arr.length; k++) 
				{
					var f_ids = $('#hospital_ids').val();
					if (arr[k] != obj && arr[k] != "") 
					{
						$('#hospital_ids').val(arr[k]+'_'+f_ids);
					}
				}
		
				return true;
			}
		}
		
		return false;
	}

	 $('.friends_area_hospital').click(function() 
	 {  
	 	var fid = $(this).attr('id');
		var ids = $('#hospital_ids').val();
		
		var exploded_ids = ids.split('_');
		
		if(include (exploded_ids,fid))
		{
			$(this).css('color', '#000000'); // if box is already selected then, make it unselected 
			$(this).children('label').css('color', '#000000');
			$(this).css('background-color', '#fff');
		}
		else
		{
			$(this).css('color', '#fff');		// if box is not selected , make it selected
			$(this).children('label').css('color', '#fff');
			$(this).css('background-color', '#0099cb');
			$('#hospital_ids').val(fid+'_'+ids);
		}
		
	 });
	 
	 $('.uiButtonConfirm').click(function() {  
	 	
		var f_ids = $('#hospital_ids').val(); // get all ids in hidden field
		
		if(f_ids != '')
		{
			$.post("Patient/send.php?ids="+f_ids, {
		
				}, function(response){
				
				alert(unescape(response));
			});
		}
		
	 });
 	
	
	});
//background:#627AAD;
</script>	

<div class="top_area" >Select Hosptitals to interact with.</div>
<div id="search_area" align="left">
Select Hospitals whose events you will be notified about.
</div>
<div style="overflow-y:scroll; height:260px; margin-top:3px;">
	<?php
	
	$i = 0;
	
	$result = mysql_query("SELECT * FROM hospital")or die(mysql_error());
	while ($row = mysql_fetch_array($result))
	{?>
	
	   <div class="friends_area_hospital" id="<?php  echo $row['id'];?>" title="<?php  echo $row['name'];?>">
	   	   <img src="<?php  echo $row['photo'];?>"  style="float:left;height:50" alt="" class="pic" />
		   <label style="float:left; width:70px; overflow:hidden;" class="name">
			   <b><?php  echo $row['name'];?></b><br />
			   <?php  echo (($row['speciality']) ? substr($row['speciality'],0,10).'...' : '');?>
		   </label>
			<br clear="all" />
	   </div>
	   
	<?php
		$i++;// just give space after 3 boxes
		if($i%3 == 0) {echo '<br clear="all" /><br clear="all" />';$i = 0;}
		
	}?>
</div>
<input type="hidden" name="hospital_ids" id="hospital_ids" value="" />

	<div class="footer" align="left">
			
		
		<br clear="all" />
	</div>
	
 <br clear="all" />
