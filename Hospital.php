<?php require "setup.php";
$id=$_SESSION['user_id'];
$hospital = new Hospital($id);
$patients = mysql_num_rows($hospital->getPatients());
$requests = mysql_num_rows($hospital->getPendingDoctors());
$doctors = mysql_num_rows($hospital->getDoctors());
$status = $hospital->getStatus(); 
?> 
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<title>Daktari -Hospital</title>

		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="css/style.css" rel="stylesheet" type="text/css" />	
		<link href="css/sidebar.css" rel="stylesheet" type="text/css"/>
		<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css"/>
		 <link href="css/navigate.css" type="text/css" rel="stylesheet"/> 
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/sliding_effect.js" type="text/javascript"></script>
		<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.js"></script>
		 <script type="text/javascript" src="js/cookie.js"></script> 
		<script src="js/main.js" type="text/javascript"></script>
				<script src="js/bootstrap-js/bootstrap-dropdown.js"></script>
   
		<script src="js/bootstrap-js/bootstrap-modal.js" type="text/javascript"></script>
		<!--<script src="js/bootstrap-js/bootstrap-transition.js" type="text/javascript"></script>-->
		<script src="js/bootstrap-js/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap-js/bootstrap-popover.js"></script>
		<script src="js/bootbox.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
		$('.info').popover({animation:'true', placement: 'right', html:'true'});



		
		//Load doctor data by default
			getData('hospital/doctor.php','post','#dak-content',"");
	
			$("#search").submit(function(){
	var query = $(this).serialize();
	getData('hospital/search.php','post','#dak-content', query);
	return false;
	});
	
	slide("#side-menu", 25, 15, 150, .8);
		$(".navig").click(function(){
			$(".nav-info").removeClass("active");
			var va = $(this).children(".nav-info");
			va.addClass("active");
			var id = va.attr("id");
			if(id=="hosp-patient"){
				getData('hospital/patient.php','post','#dak-content',"option=pa");
			}else if(id=="hosp-doctor"){
				getData('hospital/doctor.php','post','#dak-content',"");
			}else if(id=="hosp-requests"){
				getData('hospital/requests.php','post','#dak-content',"option=doctors");
			}else{
				
			}
		});
		
	$("#create_event").fancybox({
        'overlayShow': true,
        'width': '50%',
        'height': '90%',
        'type': 'iframe'
				
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
					
						<a href="hospital/feedback_form.php" id="feedback"><span>Feedback</span></a>
						<div class="divide"></div>
					</div>
					<div class="account pull-right">
						<div id="account-box">
							<div></div>
						</div>
						<a id="account-holder"><?php echo $_SESSION[user_name]; ?></a>
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
<form id="search" style="display:inline"><input name="query"  id="query" class="input-xxlarge" size="16" type="text"/><input type="submit" value="search" class="btn" style="margin: 0px 0px 0px -1px;" /></form>
						</div>
					</div>
					<a id="create_event" href="hospital/event_form.php"> <button  id="btn-appointment"><img src="images/plus.png"/>Create Event</button></a>
				</div>
			</div>
			<div class="main">
				<div class="sidebar ">
					<?php require_once "sidebar/hospitalsidebar.php"; ?>
					<div class="divider"></div>
					<div style="height:60px;"></div>
				</div>
				<div class="content">
					<div class="row" id="cont-wrap"> 
						<div class="span10"style="margin-left:0px;">
							<div  class="row" id="navigator">
								<div class="span10  navigate app-content" id="nav-content">
									<?php require_once "nav/hospital.php"?>
								</div>
							</div>
							</br>
							<?php if($status=='pending'){?>
							<div class="row">
								<div class="span 10 app-content">
									<div class="alert alert-error"> <button type="button" class="close" data-dismiss="alert">&times;</button> Your Accoount Has not yet been approved!</div>
								</div>
							</div>
							<?php } ?>
							<div class="row" id="app-main">
								<div class="span10 app-content" id="dak-content"></div>
							</div>
							
						</div>
							<div class="span3" id="hospitalevents" style="margin-left:0px; float:left; height:200px;">
										<?php
include "hospital/hospital_events.php"
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