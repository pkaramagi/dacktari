<?php
require_once "../setup.php";
$doc = mysql_query("
SELECT a.name,a.photo,a.speciality,a.qualification, b.collab AS collab, a.id
FROM `doctor` a
LEFT JOIN patient_doctor b ON ( a.id = b.doctor_id
AND b.patient_id = $_SESSION[user_id] )
ORDER BY collab DESC
");
$output1;
$output2;
$i = 1;
$j = 1;
while($doctor = mysql_fetch_assoc($doc)){
	if($doctor[collab]==0){
		$i++;
		if($i%2==0){
			$output2 .= '<div class="space" style="clear:both"></div>';
		}
		$output2 .= '
			        <div class="span3">
                        <div class="row">
							<div class="span1">
								<img src="'.$doctor[photo].'" style="width:100%;" >
							</div>
							<div class="span2">
								<strong>Dr '.$doctor[name].'</strong>
								<p>'.$doctor[speciality].'</br>'.$doctor[qualification].'</p>
							</div>
						</div>
						<div class="row" style="padding-top:5px;">
							<div class="span3">
								<p>
									<span>
										<input type="button" class="btn btn-primary  btn-mini noborder createappointment" id="'. $doctor[id].'" value="Appointment" />
										<input type="button" class="btn btn-success btn-mini noborder addDoctor" id="'.$doctor[id].'"  value="Add Doctor" />
									</span>
								</p>							
							</div>
						</div>
					</div>  ';
}else{

		if($j%2==0){
			$output1 .= '<div class="space" style="clear:both"></div>';
		}
		$output1 .= '
			        <div class="span3">
                        <div class="row">
							<div class="span1">
								<img src="'.$doctor[photo].'" style="width:100%;" >
							</div>
							<div class="span2">
								<strong>Dr '. $doctor[name].'</strong>
								<p>'.$doctor[speciality].'</br>'.$doctor[qualification].'</p>
							</div>
						</div>
						<div class="row" style="padding-top:5px;">
							<div class="span3">
								<p>
									<span>
										<input type="button" class="btn btn-primary  btn-mini noborder createappointment" id="'.$doctor[id].'" value="Appointment" />
									</span>
								</p>							
							</div>
						</div>
					</div>  ';
	}
}
 ?>
 
<html>    
    <head>
        <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.23/themes/flick/jquery-ui.css"/>
        <link rel="stylesheet" media="all" type="text/css" href="../css/jquery-ui-timepicker-addon.css"/>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jqueryui.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-sliderAccess.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <script type="text/javascript">
            $('document').ready(function () {
                
                $('#starttime').datetimepicker({
                    minDate: new Date(new Date().toString('dddd, MMMM, YYYY, h,mm')),
                    addSliderAccess: true,
                    sliderAccessArgs: {
                        touchonly: false
                    },
                    dateFormat: 'yy-mm-dd',
                    timeFormat: 'hh:mm:ss',

                    separator: 'T'
                });
                $('#endtime').datetimepicker({
                    minDate: new Date(setDate()),
                    addSliderAccess: true,
                    sliderAccessArgs: {
                        touchonly: false
                    },
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd',
                    timeFormat: 'hh:mm:ss',

                    separator: 'T'
                });
				function setDate(){
					d =new Date(); d.setMinutes(d.getMinutes()+30)
					return d.toString('dddd, MMMM, YYYY, h,mm');
				}
                $('#search').click(function () {
                    addInactive();
                    if ($('#searchinput').val() == "") {

                    } else {
                        $.post("doctorsearch.php", 'q=' + $('#searchinput').val(), function (data) {
                            $('.doctordata').html(data);
                        });
                    }
                });
                $('#appoint *').attr('disabled', true);
                $('#appoint').addClass('inactive');

                function addInactive() {
                    $('#appoint *').attr('disabled', true);
                    $('#appoint').addClass('inactive');

                }
                $('.createappointment').live("click", function () {
                    $('#appoint *').attr('disabled', false);
                    $('#appoint').removeClass('inactive');
					$("#doctor_id").val($(this).attr("id"));
				});
            });
        </script>
        <style type="text/css">
            body {
                margin:30px;
                font-family:'Open Sans';
                !important
            }
			body p{
			 font-family:'Open Sans';
			}
            .input-xxlarge {
                width:431px;
				height: 28px;
            }
			.input-xlarge{
				height:28px;
			}
            .head {
                border-bottom: 1px solid lightGrey;
                margin-bottom: 30px;
            }
            .search * {
                display:inline;
            }
			.span3{
				width:240px;
			}
			.doctordata{
				margin-left:20px;
			}
            .row-fluid div.appointmentright {
                border-left:1px solid lightgrey;
                padding-left:10px;
            }
            .inactive {
                opacity:0.5;
            }
            .appointmentright form {
                margin-top: 14px;
                margin-left: 17px;
            }
            div.space {
                height:10px;
            }
            .avartar {
                height:61px;
                width:57px;
            }
            .createappointment {
                margin-right:5px;
            }
            .noborder {
                border-radius:3px;
            }
			#docs{
				overflow-y:scroll;
				height:360px;
			}
			.tx{
				height:100px;
			}
			.form-horizontal .control-label{
				width:125px;
				text-align:left;
			}
			.form-horizontal .controls {
				margin-left: 125px;
			}
			.zero-radius{
				border-radius:2px;
			}
        </style>
    </head>
    <div class="container-fluid">
        <div class="row-fluid">
            <h2 class="head">Daktari- Create Appointment</h2>
        </div>
        <div class="row-fluid">
            <div class="span7 appointmentleft" id="docs">
                <div class="row" style="z-index: 100;background: white; position: fixed;">
                    <div class="span7" style="padding-bottom: 10px; border-bottom: 1px solid rgb(206, 206, 206);">
                        <div class="form-inline docsearch">
                            <label>Search</label>
                            <input type="text" name="q" id="searchinput" placeholder="Search Doctor"
                            class="input-xxlarge focused" />
                            <button type="submit" id="search" class="btn btn-primary">Search</button>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
                <div class="row" style="margin-top:60px;">
                    <div class="span7">
                        <h3>My Doctors</h3>
                    </div>
                </div>
                <div class="space"></div>
                <div class="doctordata">
			<?php
				echo $output1;
			?>		
                </div>
                <div class="row">
                    <div class="span7">
                        <h3>Other Doctors</h3>
                    </div> 
                </div>
                <div class="space"></div>
				 <div class="doctordata">
		<?php	
		echo $output2;
		?>		
			</div>
            </div>
            <div class="span4 appointmentright" id="appoint">
                <h3>Appointment Details</h3>
                <form class="form-horizontal" action="addappointment.php?db_option=create" method="post">
					<div class="control-group">
						<label class="control-label" for="inputStartTime">Title</label>
						<div class="controls">
							<input type="text" name='title' id='title' class="input-xlarge focused" placeholder="appointment title">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputStartTime">StartTime</label>
						<div class="controls">
							<input type="datetime" name="starttime" class="input-xlarge focused" id="starttime" placeholder="starttime">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">EndTime</label>
						<div class="controls">
							<input type="datetime" name="endtime" class="input-xlarge focused" id="endtime" placeholder="endtime">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Description</label>
						<div class="controls">
							<textarea name="description" id="description" class="input-xlarge focused tx"></textarea>
						</div>
					</div>
					<br/>
					
					<div class="control-group">
						<label class="control-label" for="inputEmail"></label>
						<div class="controls">
							<input type="submit" name="submit" class="btn btn-primary btn-small zero-radius" value="Request Appointment"/>
						</div>
					</div>
					<input type="hidden" name="doctor_id" id="doctor_id" value=""/>
				</form>
            </div>
        </div>
    </div>

</html>