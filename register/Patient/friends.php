<?php  include_once('../../includes/config.php')?>
<style>
.friends_area{
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
	font-family:'Lucida Grande',Tahoma,Verdana,Arial,sans-serif;
	font-size:11px;
	font-weight:bold;
	margin:0 0 0 4px;
	outline-color:-moz-use-text-color;
	outline-style:none;
	outline-width:medium;
	white-space:nowrap;
}
.top_area{
	background:#627AAD;
	font-size:14px;
	color:#FFFFFF;
	font-weight:bold;
	padding:6px 6px 6px 12px;		
}
.name{
	font-size:11px;
	
	padding:0px;
	cursor:pointer;
	font-style:normal;
	padding-left:4px;
	}
#search_area{
	background:#F2F2F2 none repeat scroll 0 0;
	border-bottom:1px solid #E0E0E0;
	width:515px;
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
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script>
$(document).ready(function() { 
	
	function include(arr, obj)  
	// this function will check if a box is already selected and if it is selected the make it unslected and clear the id of that box from array.
	{
		for(var i=0; i<arr.length; i++) 
		{
			if (arr[i] == obj) 
			{
				$('#frend_ids').val('');
				
				for(var k=0; k<arr.length; k++) 
				{
					var f_ids = $('#frend_ids').val();
					if (arr[k] != obj && arr[k] != "") 
					{
						$('#frend_ids').val(arr[k]+'_'+f_ids);
					}
				}
		
				return true;
			}
		}
		
		return false;
	}

	 $('.friends_area').click(function() 
	 {  
	 	var fid = $(this).attr('id');
		var ids = $('#frend_ids').val();
		
		var exploded_ids = ids.split('_');
		
		if(include (exploded_ids,fid))
		{
			$(this).css('color', '#000000'); // if box is already selected then, make it unselected 
			$(this).css('background-color', '#fff');
		}
		else
		{
			$(this).css('color', '#ffffff'); // if box is not selected , make it selected
			$(this).css('background-color', '#627AAD');
			$('#frend_ids').val(fid+'_'+ids);
		}
		
	 });
	 
	 $('.uiButtonConfirm').click(function() {  
	 	
		var f_ids = $('#frend_ids').val(); // get all ids in hidden field
		
		if(f_ids != '')
		{
			$.post("send.php?ids="+f_ids, {
		
				}, function(response){
				
				alert(unescape(response));
			});
		}
		
	 });
 	
	$('.close').click($.facebox.close);
	
 });//background:#627AAD;
</script>	

<div class="top_area" >Suggest 99 Points to friends.</div>
<div id="search_area" align="left">
Your friends will receive a suggestion from you to like this Page.
</div>
<div style="overflow-y:scroll; height:260px; margin-top:3px;">
	<?php
	
	$i = 0;
	
	$result = mysql_query("SELECT * FROM doctor")or die(mysql_error());
	while ($row = mysql_fetch_array($result))
	{?>
	
	   <div class="friends_area" id="<?php  echo $row['id'];?>" title="<?php  echo $row['name'];?>">
	   	   <img src="<?php  echo $row['photo'];?>" height="50" style="float:left;" alt="" class="pic" />
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

<input type="hidden" name="frend_ids" id="frend_ids" value="" />

	<div class="footer" align="left">
		<label class="uiButtonConfirm">
			Send Invitations
		</label>
		
		<a href="#" class="close"> Cancel</a>
		<br clear="all" />
	</div>
	
 <br clear="all" />

