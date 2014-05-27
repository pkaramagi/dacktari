//function to show hidden sidebar menus
$(document).ready(function(){

//$('#final').attr('disabled',false);

//end
$('.showmenu').click(function(e){
	e.preventDefault();
	var menu = $(this).children('a').attr('href');
	if ($(menu).css('display') === 'none') {
		var par = $('.showmenu').find('a[href="'+menu+'"]');
		var pero = par.parents('.showmenu');
		pero.children('img').attr('src', 'images/download1.png');
	} else {
		var par = $('.showmenu').find('a[href="'+menu+'"]');
		var pero = par.parents('.showmenu');
		pero.children('img').attr('src', 'images/download.png');
	}
	$(menu).slideToggle();
});

//function to show appointment buttons
$(document).ready(function(){
//set interval
setInterval(function() {
      // Do something every 5 seconds
refreshprescription();
updateNumbers();
refreshAppointment();
refreshAppointment1();
getLocation();
	  
	  }, 5000);
	  
 $(".pop").fancybox({
         'overlayShow': true,
         'width': '50%',
         'height': '80%',
         'type': 'iframe'
             
     });
$('.appointment .close').live("click",function(){
	$(this).parents('.app-info').children('.app-control').slideDown("slow");
	$(this).html('&blacktriangle;');
});
$('.close').live("click",function(){
var pa = $(this).parents('.app-control')
pa.slideUp("Slow");
pa.parents('.app-info').find('.appointment .close').html('&blacktriangledown;');
});

});

});

//load doctors in dak-content
$('.list_all_doctors').live('click',function(){

$('#dak-content').load('Patient/list_all_doctors.php');
});

//load all prescription
$('.list_myprescription').live('click',function(){
$('#dak-content').load('Prescription/prescription_display.php');
});


function refreshAppointment(){
	$.post("appointments/appointments_nav.php","option=upcoming",function(data){
		$('#upcoming-apps h3','#doc-appointment h3').html(data);
	});
	$.post("appointments/appointments_nav.php","option=cancelled",function(data){
		$('#cancelled-apps h3').html(data);
	});	
	$.post("appointments/appointments_nav.php","option=pending",function(data){		
		$('#pending-apps h3').html(data);
	});
} 

function refreshAppointment1(){
	$.post("appointments/appointments_nav.php","option=upcoming",function(data){
		$('#doc-appointment h3').html(data);
	});
	$.post("appointments/appointments_nav.php","option=pending",function(data){		
		$('#doc-request h3').html(data);
	});
} 
//function for getting data via ajax
function getData(url,type,destination,data){
		$(destination).html("<img src='images/ajaxload.gif' class='loader'/>");
		if(type=="get"){
			$.get(url,data,function(info){
				$(destination).html(info);
				$(".pstponelink").fancybox({
					'type':'iframe',
					'height':'80%'
					
				});
				$(".cancellink").fancybox({
					'type':'iframe',
					'height':'70%'
				});
			});
		}
		else if(type=="post"){
			$.post(url,data,function(info){
				$(destination).html(info);
				$(".pstponelink").fancybox({
					'type':'iframe',
					'height':'80%',
					'onClosed':function(){
					
					}
				});
				$(".cancellink").fancybox({
					'type':'iframe',
					'height':'70%'
				});
			});
		}
	}

	//function updates the numbers on the summary on the buttons in hospital
function updateNumbers(){
var datas = "func=summ";
		//post data to server using ajax
		$.ajax({
			type: 'POST',
			url: 'hospital/response.php',
			data: datas,
			success: function(resp){ 
			resp = resp.split(",");
				var doc_no=resp[0];
				var pat_no=resp[1];
				var req_no=resp[2];

				$("#doc_no").html(doc_no);
				$("#pat_no").html(pat_no);
				$("#req_no").html(req_no);
				},  
			error: function(e){  
				bootbox.alert('Error: There was a problem, please retry in a moment.'); 
				
			}  
		});
	}
	
function removeContent(id){
$(id).slideUp("slow");
$.fancybox.resize();
}

function refreshprescription(){
$.ajax({
type: "POST",
url: "Prescription/prescription_nav.php",
success: function(html)
{
$(".numberofprescriptions").html(html);

 }
 

});


}

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
  //alert(position.coords.latitude);
  
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