<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<title>Daktari -Patient</title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css"/>
		<link href="css/style.css" rel="stylesheet" type="text/css" />	
		<link href="css/sidebar.css" rel="stylesheet" type="text/css"/>
		<link href="css/navigate.css" type="text/css" rel="stylesheet"/> 
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/sliding_effect.js" type="text/javascript"></script>
		<script src="js/bootstrap-js/bootstrap-dropdown.js"></script>
		 <script type="text/javascript" src="js/cookie.js"></script> 
		 <script src="js/bootstrap-js/bootstrap-tooltip.js"></script>
		<script src="js/main.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#action').click( function(){
		if($('#appendedInputButton').val()!=''){
var		datas = "search="+$('#appendedInputButton').val()+"&&option=1";
$('#dak-content').html("<img src='images/ajaxload.gif' class='loader'/>");
				
				$.ajax({
			type: 'POST',
			url: 'appointments/appointment-query.php',
			data: datas,
			success: function(html){ 
					$('#dak-content').html(html);
					$(".directions").fancybox({'type':'iframe','width':'80%','titleShow':false,'height':'95%'});
			}  
		});
			}
			});
			$(".help").fancybox({'type':'iframe','width':'80%','titleShow':false,'height':'95%'});
			 $('*').tooltip({placement:"bottom"});
		slide("#side-menu", 25, 15, 150, .8);
		getData('appointments/appointment-query.php','post','#dak-content',"option=upcoming");
		$(".navig").click(function(){
			$(".nav-info").removeClass("active");
			var va = $(this).children(".nav-info");
			va.addClass("active");
			var id = va.attr("id");
			if(id=="upcoming-apps"){
				getData('appointments/appointment-query.php','post','#dak-content',"option=upcoming");
			}else if(id=="pending-apps"){
				getData('appointments/appointment-query.php','post','#dak-content',"option=pending");
			}else if(id=="cancelled-apps"){
				getData('appointments/appointment-query.php','post','#dak-content',"option=cancelled");
			}else{
				
			}
		});
		$('.dropdown-toggle').dropdown();
	
	
	});
	
	
	</script>
	</head>
	<body>
		<div class="dak-container">
			<div id="header">
				<div class="nav">
					<div class="left">
						<a href="#"><span>Home</span></a>
						<div class="divide"></div>
						<a href="help/patient/help.php" class="help"><span>Help</span></a>
						<div class="divide"></div>
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
							<input  id="appendedInputButton" class="input-xxlarge" size="16" type="text"/><button class="btn" id="action" title='search appointment'>search</button>
						</div>
					</div>
					<a href="appointments/createAppointment.php" id="appointment-btn"><button  title="create new appointment" id="btn-appointment"><img src="images/plus.png"/>New Appointment</button></a>
				
				</div>
			</div>
			<div class="main">
				<div class="sidebar">
					<?php require_once "sidebar/patientsidebar.php"; ?>
					<div class="divider"></div>
					<div style="height:20px;"></div>
					<div id="sidebar_event"></div>
				</div>
				<div class="content">
					<div class="row" id="cont-wrap"> 
						<div class="span10"style="margin-left:0px;">
							<div  class="row" id="navigator">
								<div class="span10  navigate app-content" id="nav-content">
									<?php require_once "nav/patient.php"?>
								</div>
							</div>
							<br/>
							<div class="row" id="app-main">
								<div class="span10 app-content" id="dak-content">
								</div>
							
							</div>
						</div>	
						<div class="span3"  id="hospitalevents"style="margin-left:0px; float:left;">
					<?php
include "Patient/hospital_events.php"
					?>					
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>
				<div class="footer">
				
				</div>
			</div>
		<script src="js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
		<script src="fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			 $("#btn-appointment,#link-appointment").fancybox({
			'type': 'iframe',
			'href':'appointments/createAppointment.php',
			'width':'99%',
			'height':'99%'	
			});
			});
		</script>
		
		
	</body>
</html>