<?php 
require_once "setup.php";
$id = $_GET['location'];
$lat = $_GET['lat'];
$lon = $_GET['lon'];
$attend = $_GET['attend'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
 Copyright 2008 Google Inc. 
 Licensed under the Apache License, Version 2.0: 
 http://www.apache.org/licenses/LICENSE-2.0 
 -->
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <title>Daktari-Get Directions</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	
		<script src="js/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript" src="js/cookie.js"></script> 			
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAABp_EoWr8uSShTfgkS77InbLghG_093A&sensor=false">
   </script>
   <?php if($attend==1){
echo "<script>parent.removeContent('#hospital-events-list #".$_GET['id']."');
parent.fb_resize(1051,557);
</script>";

}?>
    <script type="text/javascript"> 
  // Create a directions object and register a map and DIV to hold the 
    // resulting computed directions

var lat = $.cookie("MyLat");
var lon = $.cookie("MyLon");
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var location_start = new google.maps.LatLng(lat, lon);
var location_end = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lon ?>);
function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: location_end
  }
  map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
  calcRoute();
  }

  
function calcRoute() {
$('#se').append("<p>Loading......</p>");
  var selectedMode = document.getElementById("mode").value;
  var request = {
      origin: location_start,
      destination: location_end,
      // Note that Javascript allows us to access the constant
      // using square brackets and a string value as its
      // "property."
      travelMode: google.maps.TravelMode[selectedMode]
		  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
  $('#se').children('p').delay(9000).remove();

}
	</script>
	</head>
<body onload="initialize()" style="height:520px; margin:10px; font-size:13px;">	
<div style="width:100%;" id="se">
<h2>Daktari - Get Directions</h2>
<hr style="margin:6px 0;"/>
<div class="control-group" style="margin-bottom:0;">
						<label class="control-label" for="inputStartTime" style="float: left;width: 200px;" ><strong>Mode of Travel:</strong></label>
						<div class="controls">
							<select id="mode" onchange="calcRoute();">
  <option value="DRIVING">Driving</option>
  <option value="WALKING">Walking</option>
  <option value="BICYCLING">Bicycling</option>
  <option value="TRANSIT">Transit</option>
</select>
						</div>
					</div>
</div>
<div style="clear:both"></div>
<hr style="margin:2px;"/>
<div id="map_canvas" style="float:left;width:60%; height:410px"></div>
<div id="directionsPanel" style="float:left;width:30%; margin-left:20px;height:420px"></div>
  
  </body>
</html>
