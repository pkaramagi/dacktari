<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
			<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css"/>
		<link href="css/style.css" rel="stylesheet" type="text/css" />	
		<link href="css/sidebar.css" rel="stylesheet" type="text/css"/>
		 <link href="css/navigate.css" type="text/css" rel="stylesheet"/> 
		 <link href="css/events.css" rel="stylesheet" type="text/css"/>
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
		<script src="js/bootstrap-js/bootstrap-dropdown.js"></script>
                <script src="js/bootstrap-js/bootstrap-tooltip.js"></script>
	<script src="fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
		<script src="js/sliding_effect.js" type="text/javascript"></script>
		    <script type="text/javascript" src="js/cookie.js"></script> 
		<script src="js/main.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
							$('#action').click( function(){
		if($('#appendedInputButton').val()!=''){
var		datas = "search="+$('#appendedInputButton').val()+"&&option=1";

				
				$.ajax({
			type: 'POST',
			url: 'appointments/appointment-queryd.php',
			data: datas,
			success: function(html){ 
					$('#dak-content').html(html);
					$(".directions").fancybox({'type':'iframe','width':'80%','titleShow':false,'height':'95%'});
			}  
		});
			}
			});
			
    $('*').tooltip({placement:"bottom"});
	slide("#side-menu", 25, 15, 150, .8);
	getData('appointments/appointment-queryd.php','post','#dak-content',"option=upcoming");
		$(".navig").click(function(){
			$(".nav-info").removeClass("active");
			var va = $(this).children(".nav-info");
			va.addClass("active");
			var id = va.attr("id");
			if(id=="doc-appointment")
				getData('appointments/appointment-queryd.php','post','#dak-content',"option=upcoming");
			else if(id=="doc-request")
				getData('appointments/appointment-queryd.php','post','#dak-content',"option=pending");
			else if(id=="doc-prescription")
				getData('Prescription/requests_display.php','post','#dak-content',"option=pres-request");
			else{}
			
		});
			$(".side-nav").click(function(){
			var id = $(this).attr("id");
			if(id=="doc-appointment")
				getData('appointments/appointment-queryd.php','post','#dak-content',"option=upcoming");
			else if(id=="doc-request")
				getData('appointments/appointment-queryd.php','post','#dak-content',"option=pending");
			else if(id=="doc-prescription")
				getData('Prescription/requests_display.php','post','#dak-content',"option=pres-request");
			else{}	
		});
	
		
	});	
	</script>
	</head>
	<body>
		<div class="dak-container">
			<div id="header">
				<div class="nav">
					<div class="left">
						<a href=""><span>Home</span></a>
						<div class="divide"></div>
						<!-- <a href="#"><span>About</span></a>
						<div class="divide"></div> -->
						<a href="hospital/feedback_form.php" id="feedback"><span>Feedback</span></a>
						<div class="divide"></div>
					</div>
					<div class="account pull-right">
						<div id="account-box">
							<div></div>
						</div>
						<a id="account-holder"><?php echo $_SESSION['user_name']; ?></a>
						<div class="divide"></div>
						<div id="account-opts" class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#account-opts">
								<div id="log-wrap">
									<img src="images/dropdown-white.png"/>
								</div>
							</a>
							<ul class="dropdown-menu">
									<li id="sign-out"><a href="index.php?logout=1"><button class="btn btn-small btn-primary">Sign out</button></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="searchbar">
					<div id="logo">
						<img src="images/Logo.png"/>
					</div>
					<div id="searchbox">
						<div class="input-append">
							<input  id="appendedInputButton" class="input-xxlarge" size="16" type="text"/><button class="btn" id="action" title='search appointment' >search</button>
						</div>
					</div>
					<button  id="btn-appointment" class="view_hospitals" rel="tooltip" title="Request to join another hospital"><img src="images/plus.png"/>Add Hospital &nbsp; </button>
				</div>
			</div>
			<div class="main">
				<div class="sidebar ">
					<?php require_once "sidebar/doctorsidebar.php"; ?>
					<div class="divider"></div>
					<div style="height:10px;"></div>
					<div id="sidebar_event"></div>
				</div>
				<div class="content">
					<div class="row" id="cont-wrap"> 
						<div class="span10"style="margin-left:0px;">
							<div  class="row" id="navigator">
								<div class="span10  navigate app-content" id="nav-content">
									<?php require_once "nav/doctor.php"?>
								</div>
							</div>
							<br/>
							<?php
						    $id=$_SESSION['user_id'];
							
							$sql=mysql_query("SELECT id from hospital_doctor where doctor_id='$id' and status='approved'") or die(mysql_error());
							if(!mysql_num_rows($sql)){?>
							<div class="row">
								<div class="span 10 app-content">
									<div class="alert alert-error">  Your Accoount Has not yet been approved!</div>
								</div>
							</div>
							<?php } ?>
							<div class="row" id="app-main">
								<div class="span10 app-content" id="dak-content"></div>
								
							</div>
						</div>
						<div class="span3" id="hospitalevents" style="margin-left:0px; float:left; height:200px;">
										<?php
include "doctor/hospital_events.php"
					?>	
						</div>
						<div style="clear:both;"></div>
					</div>	
				</div>
					<div style="clear:both;"></div>
			</div>
			<div class="footer">
				
			</div>
		</div>
		
	</body>
	
</html>