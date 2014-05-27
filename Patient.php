<?php 
session_start(); 
?>
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
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/sliding_effect.js" type="text/javascript"></script>
		<script src="js/bootstrap-js/bootstrap-dropdown.js"></script>
		 <script type="text/javascript" src="js/cookie.js"></script> 
		<script src="js/main.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
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
						<a href="#"><span>About</span></a>
						<div class="divide"></div>
					</div>
					<div class="account">
						<div id="account-box">
							<div></div>
						</div>
						<a id="account-holder"><?php echo $_SESSION[name]; ?></a>
						<div class="divide"></div>
						<div id="account-opts" class="dropdown pull-right">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#account-opts">
								<div id="dropdown"></div>
							</a>
							<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
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
							<input  id="appendedInputButton" class="input-xxlarge" size="16" type="text"/><button class="btn">search</button>
						</div>
					</div>
					<a href="appointments/createAppointment.php" id="appointment-btn"><button  id="btn-appointment"><img src="images/plus.png"/>New Appointment</button></a>
				
				</div>
			</div>
			<div class="main">
				<div class="sidebar ">
					<?php require_once "sidebar/patientsidebar.php"; ?>
					<div class="divider"></div>
					<div style="height:60px;"></div>
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
									<div class="row">
										<div class="span10 app-info">
											<div class="row appointment">
												<div class="span1">
													<img src="https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg"/>
												</div>
												<div class="span7">
													<strong>Appointment to See Doctor</strong>
													<p>Whats the thheeheheh eheheh </p>
													
												</div>

											</div>
											<div class="row app-control" >
												<div class="span9">
													<div>
														<span><a href="#"><input type="button" class="btn btn-primary btn-mini zero-radius"value="PostPone"></a></span>
														<span><a href="#"><input type="button" class="btn btn-danger btn-mini zero-radius"value="Cancel"></a></span>
														<button type="button" class="close" data-dismiss="alert">&times;</button>
													</div>
												</div>
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="span10 app-info">
											<div class="row appointment">
												<div class="span1">
													<img src="https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg"/>
												</div>
												<div class="span7">
													<strong>Appointment to See Doctor</strong>
													<p>Whats the thheeheheh eheheh </p>
													<button type="button" class="close">&blacktriangledown;</button>
												</div>

											</div>
											<div class="row app-control" >
												<div class="span9">
													<div>
														<span><a href="#"><input type="button" class="btn btn-primary btn-mini zero-radius"value="PostPone"></a></span>
														<span><a href="#"><input type="button" class="btn btn-danger btn-mini zero-radius"value="Cancel"></a></span>
														<button type="button" class="close" data-dismiss="alert">&times;</button>
													</div>
												</div>
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="span10 app-info">
											<div class="row appointment">
												<div class="span1">
													<img src="https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg"/>
												</div>
												<div class="span7">
													<strong>Appointment to See Doctor</strong>
													<p>Whats the thheeheheh eheheh </p>
													<button type="button" class="close">&blacktriangledown;</button>
												</div>

											</div>
											<div class="row app-control" >
												<div class="span9">
													<div>
														<span><a href="#"><input type="button" class="btn btn-primary btn-mini zero-radius"value="PostPone"></a></span>
														<span><a href="#"><input type="button" class="btn btn-danger btn-mini zero-radius"value="Cancel"></a></span>
														<button type="button" class="close" data-dismiss="alert">&times;</button>
													</div>
												</div>
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="span10 app-info">
											<div class="row appointment">
												<div class="span1">
													<img src="https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg"/>
												</div>
												<div class="span7">
													<strong>Appointment to See Doctor</strong>
													<p>Whats the thheeheheh eheheh </p>
												</div>
											</div>
											<div class="row app-control" >
												<div class="span9">
													<div>
														<span><a href="#"><input type="button" class="btn btn-primary btn-mini zero-radius"value="PostPone"></a></span>
														<span><a href="#"><input type="button" class="btn btn-danger btn-mini zero-radius"value="Cancel"></a></span>
														<button type="button" class="close" data-dismiss="alert">&times;</button>
													</div>
												</div>
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="span10 app-info">
											<div class="row appointment">
												<div class="span1">
													<img src="https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg"/>
												</div>
												<div class="span7">
													<strong>Appointment to See Doctor</strong>
													<p>Whats the thheeheheh eheheh   </p>
													
												</div>
											</div>
											<div class="row app-control" >
												<div class="span9">
													<div>
														<span><a href="#"><input type="button" class="btn btn-primary btn-mini zero-radius"value="PostPone"></a></span>
														<span><a href="#"><input type="button" class="btn btn-danger btn-mini zero-radius"value="Cancel"></a></span>
														
													</div>
												</div>
											</div>
										</div>	
									</div>
									
								</div>
							</div>
							<div class="span3" style="margin-left:0px; float:left; height:200px;">
						</div>
						<div style="clear:both;"></div>
						</div>
					</div>	
				</div>
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