<?php
session_name('daktali');
session_start();
?>
<html>    
  <head> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <script type="text/javascript" src="../assets/gmaps/jquery/jquery-1.4.4.min.js"></script>        
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/gmaps/gmap3.js"></script> 
    <script type="text/javascript" src="../js/cookie.js"></script> 
    <style>
	   
  #right{
  	float:left;
	padding-left: 32px;
width: 45%;
  }
  .gmap3{
        margin: 20px auto;
        border: 1px dashed #C0C0C0;
        width: 100%;
        height: 326px;
	
      }
	  #right h5{
	  padding:10px;
	  width:93%;
	  background:#efefef;;
	  color: #333333;
	  border-left:10px #0099cb solid;
	  }
	  #scroll{
width:50%;
height: 400px;
overflow:scroll;
float: left;
}
	  .left{


margin: -52px 0 0 -54px	 
	 }
	  th{
background: #0099cb !important;
color:fff;
text-transform: capitalize;
}
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}

</style>
    </style>
    
    <script type="text/javascript">
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }

function showPosition(position)
  {
 
  
  $.cookie("MyLat", position.coords.latitude); // Storing latitude value
$.cookie("MyLon", position.coords.longitude); // Storing longitude value

//$.cookie("latlon", latlon); // Storing longitude value
  var img_url="http://maps.googleapis.com/maps/api/staticmap?center="
  +latlon+"&zoom=14&size=400x300&sensor=false";
  document.getElementById("mapholder").innerHTML="<img src='"+img_url+"'>";
  }

function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML="The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="An unknown error occurred."
      break;
    }
  }
      $(function(){
  getLocation();
  
  var lat = $.cookie("MyLat");
  var lon = $.cookie("MyLon");
  var data = "lat="+lat+"&&lon="+lon;
 

	$.ajax({
					type: "POST",
					url: "geo.php",
					data: data,
					success: function(html)
				{
				$("#demo").html(html);
               }
});

	$('#test1')
          .gmap3(
          { action:'init',
            options:{
			
              center: [lat,lon],
              zoom: 14
            }
          },
          { action: 'addMarkers',
            markers:[
			<?php

 
$apiKey       = 'AIzaSyC86v-RfLyke-pK7W3twvbMBCu-vqLIDV0';
$call='https://maps.googleapis.com/maps/api/place/search/json?location='.$_SESSION['pre_lat'].','.$_SESSION['pre_lon'].'&radius=100000&types=pharmacy||clinic||hospital||medical||drugs||drugshop&sensor=false&key=AIzaSyDT9K7qqOAac3V6kl_0ZkG5P0vwXpkgKKI';
$string = file_get_contents($call);
$json_o=json_decode($string);
$json_a=json_decode($string,true);

$array=$json_o->results; 
foreach($array as $key=>$value){
$value->geometry->location->lat;
if($value->opening_hours->open_now==1){ $open= "Yes";} else { $open= "No" ;}

$pharmacy .='{lat:'.$value->geometry->location->lat.', lng:'.$value->geometry->location->lng.',data:"<table class=\'table table-striped table-bordered\' style=\'font-size:12px\'><tr><th colspan=\'2\'>'.$value->name.'</th></tr><tr><td>Adress</td><td>'.$value->vicinity.'</td></tr><tr><td>OpenNow</td><td>'.$open.'</td></tr></table>"},';
}
echo $pharmacy;
?>
     
         
              {lat:42.704931, lng:2.894697, data:'Perpignan ! <br> GO USAP !'}
            ],
            marker:{
              options:{
                draggable: false,
				icon: new google.maps.MarkerImage('../images/pill.png')
              },
              events:{
                 click: function(marker, event, data){
                  var map = $(this).gmap3('get'),
                      infowindow = $(this).gmap3({action:'get', name:'infowindow'});
                  if (infowindow){
                    infowindow.open(map, marker);
                    infowindow.setContent(data);
                  } else {
                    $(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: data}});
                  }
                },
                mouseclick: function(){
                  var infowindow = $(this).gmap3({action:'get', name:'infowindow'});
                  if (infowindow){
                    infowindow.close();
                  }
                }
              }
            }
          }
        );
      });
    </script>
	<div id="scroll">
<iframe src="http://docs.google.com/gview?url=http://mydaktari.org/Prescription/files/<?php echo $_GET['path']?>&embedded=true" style="width:99%; height:100%;" frameborder="0"></iframe>

</div>
<div id="right">

<h5>Nearest Health Center</h5>
 <div id="test1" class="gmap3"></div>
 <div id="demo">
 </div>
<?php
echo $_SESSION['lat'];
?>
</div>