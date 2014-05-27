<?php 
require_once "setup.php";
$id = $_GET['location'];
$hosp = ORM::for_table('hospital')->find_one($id);
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
    <title>Google Maps JavaScript API Example: Simple Directions</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<script src="js/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript" src="js/cookie.js"></script> 			
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAABp_EoWr8uSShTfgkS77InbLghG_093A&sensor=false">
   </script>
    <script type="text/javascript"> 
  // Create a directions object and register a map and DIV to hold the 
    // resulting computed directions

var lat = $.cookie("MyLat");
var lon = $.cookie("MyLon");
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var location_start = new google.maps.LatLng(lat, lon);
var location_end = new google.maps.LatLng(<?php echo $hosp->latitude; ?>, <?php echo $hosp->logitude; ?>);
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
}
	</script>
	</head>

  <body onload="initialize()">
<div style="width:100% height:40px;">
<strong>Mode of Travel: </strong>
<select id="mode" onchange="calcRoute();">
  <option value="DRIVING">Driving</option>
  <option value="WALKING">Walking</option>
  <option value="BICYCLING">Bicycling</option>
  <option value="TRANSIT">Transit</option>
</select>
</div>
<div style="clear:both"></div>
<hr/>
<div id="map_canvas" style="float:left;width:40%; height:480px"></div>
<div id="directionsPanel" style="float:left;width:20%;height:480px"></div>
  </body>
</html>
