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
var hascontent;
var width = $(window).width();
if(width <= 1007 ){
var content = $('#hospitalevents').html();
$('#hospitalevents').hide();
$("#sidebar_event").append(content);
hascontent = content;
}
else{

}



//set interval
$("#feedback").fancybox({
        'overlayShow': true,
        'width': '50%',
        'type': 'iframe'			
	});
getLocation();	
setInterval(function() {
      // Do something every 5 seconds
refreshprescription();
updateNumbers();
refreshAppointment();
refreshAppointment1();
getLocation();
refresh_notifications();
	  
	  }, 3*1000);

$('.event_one').live("click",function(){
if($(this).attr("id")=="a"){
}
else{
var ulr = "event_attend.php?event="+$(this).attr("id");

$.fancybox({
'type':'iframe',
'href': ulr,
'height':'70%'
});
}
});	  

$('.event_hosp').fancybox({
         'overlayShow': true,
         'width': '50%',
         'height': '80%',
         'type': 'iframe'
             
     });

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
$('#dak-content').html("<img src='images/ajaxload.gif' class='loader'/>");

$('#dak-content').load('Patient/list_all_doctors.php');
});
$('.view_hospitals').live('click',function(){
$('#dak-content').html("<img src='images/ajaxload.gif' class='loader'/>");

$('#dak-content').load('doctor/list_all_hospitals.php');
});


//load all prescription
$('.list_myprescription').live('click',function(){
$('#dak-content').html("<img src='images/ajaxload.gif' class='loader'/>");
$('#dak-content').load('Prescription/prescription_display.php');
});
//load all sent 
$('.list_myprescription_sent').live('click',function(){
$('#dak-content').html("<img src='images/ajaxload.gif' class='loader'/>");
$('#dak-content').load('Prescription/sentPrescriptions.php');
});
//load sent
$('.list_myprescription_saved').live('click',function(){
$('#dak-content').html("<img src='images/ajaxload.gif' class='loader'/>");
$('#dak-content').load('Prescription/display_saved.php');
});
//load notification
$('#notifications_display_id').live('click',function(){
$('#dak-content').html("<img src='images/ajaxload.gif' class='loader'/>");
$('#dak-content').load('assets/notifications_display.php');
});

function refreshAppointment(){
	$.post("appointments/appointments_nav.php","option=upcoming",function(data){
		$('#upcoming-apps h3').html(data);
		$('#doc-appointment h3').html(data);
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
				 $('*').tooltip({placement:"bottom"});
				$(".directions").fancybox({'type':'iframe','width':'80%','titleShow':false,'height':'95%'});
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
				 $('*').tooltip({placement:"bottom"});
				$(".cancellink").fancybox({
					'type':'iframe',
					'height':'70%'
				});
				$(".directions").fancybox({'type':'iframe','width':'80%','titleShow':false,'height':'95%'});
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
				//bootbox.alert('Error: There was a problem, please retry in a moment.'); 
				
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

var x=document.getElementById("hospital-action");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{
    $("#side_event .label-important").remove();
    $("#side_event").append('<span class="label label-important">Geolocation is not supported by this browser.</span>');

  
  }
  
    var lat = $.cookie("MyLat");
  var lon = $.cookie("MyLon");
  var data = "lat="+lat+"&&lon="+lon;
 

	$.ajax({
					type: "POST",
					url: "Prescription/geo.php",
					data: data,
					success: function(html)
				{
				$("#demo").html(html);
               }
});
  }

function showPosition(position)
  {
  //alert(position.coords.latitude);
  
  $.cookie("MyLat", position.coords.latitude); // Storing latitude value
  $.cookie("MyLon", position.coords.longitude); // Storing longitude value

//$.cookie("latlon", latlon); // Storing longitude value

  }

function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
          $("#side_event .label-important").remove();
      $("#side_event").append('<span class="label label-important">User denied the request for Geolocation.</span>');
      break;
    case error.POSITION_UNAVAILABLE:
        $("#side_event .label-important").remove();
      $("#side_event").append('<span class="label label-important">Location information is unavailable.</span>');
      
      break;
    case error.TIMEOUT:
        $("#side_event .label-important").remove();
      $("#side_event").append('<span class="label label-important">The request to get user location timed out.</span>');
      
      break;
    case error.UNKNOWN_ERROR:
        $("#side_event .label-important").remove();
      $("#side_event").append('<span class="label label-important">An unknown error occurred.</span>');
      
      break;
    }
  }
  
  function fb_resize(w, h) {
  if (w > 0 || h > 0) {
    if (w > 0) $('#fancybox-content').css({ width: w+"px"});
    if (h > 0) $('#fancybox-content').css({ height: h+"px"});
	$('#fancybox-wrap').css('width','auto');
	$.fancybox.resize();
	$.fancybox.center();
  }
  }
  
  
  function refresh_notifications(){
  $('#notifications_display').load('assets/notifications.php');
  }
  
  
  $(window).resize(function(){
 var width = $(window).width();
if(width < 1347 ){
	if($('#sidebar_event').html() == ''){
		var content = $('#hospitalevents').html();
		$('#hospitalevents').hide();
		$("#sidebar_event").append(content);
	}
	
	else{
		
	}
}
else if(width >= 1347){
$('#hospitalevents').append(content);
$('#hospitalevents').show();
$("#sidebar_event").empty();
}
else{

}
	});
