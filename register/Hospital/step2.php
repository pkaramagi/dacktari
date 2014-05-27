<?php //include '../../../hospital/response.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
      	<title>Find latitude and longitude with Google Maps</title>
    
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>
    <script src="../../js/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
 function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(0.31361,	32.58111);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").value = center.lat().toFixed(5);
        document.getElementById("lng").value = center.lng().toFixed(5);

	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("lat").value = point.lat().toFixed(5);
       document.getElementById("lng").value = point.lng().toFixed(5);

        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").value = center.lat().toFixed(5);
	   document.getElementById("lng").value = center.lng().toFixed(5);


	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("lat").value = point.lat().toFixed(5);
	     document.getElementById("lng").value = point.lng().toFixed(5);

        });
 
        });

      }
    }

	   function showAddress(address) {
	   var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
		  document.getElementById("lat").value = point.lat().toFixed(5);
	   document.getElementById("lng").value = point.lng().toFixed(5);
		 map.clearOverlays()
			map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
		 map.addOverlay(marker);

		GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
	     map.panTo(pt);
      document.getElementById("lat").value = pt.lat().toFixed(5);
	     document.getElementById("lng").value = pt.lng().toFixed(5);
        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").value = center.lat().toFixed(5);
	   document.getElementById("lng").value = center.lng().toFixed(5);

	 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
	    map.panTo(pt);
    document.getElementById("lat").value = pt.lat().toFixed(5);
	   document.getElementById("lng").value = pt.lng().toFixed(5);
        });
 
        });

            }
          }
        );
      }
    }
	
    </script>
  <script type="text/javascript">
//<![CDATA[
var gs_d=new Date,DoW=gs_d.getDay();gs_d.setDate(gs_d.getDate()-(DoW+6)%7+3);
var ms=gs_d.valueOf();gs_d.setMonth(0);gs_d.setDate(4);
var gs_r=(Math.round((ms-gs_d.valueOf())/6048E5)+1)*gs_d.getFullYear();
var gs_p = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + gs_p + "s.gstat.orange.fr/lib/gs.js?"+gs_r+"' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
<script type="text/javascript">
	$("#sub").click(function(){
	var datas = $(this).serialize();
	$.ajax({
			type: 'POST',
			url: '../../hospital/response.php',
			data: datas,
			success: function(resp){  
			alert(resp);
			if(resp){
			alert(resp);
			}
			else
				alert("There was an error confirming the doctor");
		
			},  
			error: function(e){  
				alert('Error: There was a problem, please retry in a moment.'); 
				
			}  
		});
		});
</script>
</head>

  
<body onload="load()" onunload="GUnload()" >
<p>Zoom in and move the marker to the location of your Health Centre!</p>
       <p>        
      <input type="text" size="60" name="address" value="Kampala" id="pos"/>
      <input type="button" value="Search!" onclick="showAddress(address.value); return false"/>
      </p>
    

 <p align="left">
 

<input type="hidden" name="func" value="tail"/>
<input type="hidden" name="lat" id="lat" />
<input type="hidden" name="lng" id="lng" />


 </p>
  <p>
  <div align="center" id="map" style="width: 600px; height: 400px"><br/></div>
   </p>
  <script type="text/javascript">
//<![CDATA[
if (typeof _gstat != "undefined") _gstat.audience('','pagesperso-orange.fr');
//]]>
</script>
</body>

</html>
