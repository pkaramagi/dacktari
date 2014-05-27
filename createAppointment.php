<?php
require_once "setup.php";
try{
$doc = ORM::for_table('doctor')->find_many();
$mydocs = ORM::for_table('doctor')->find_many();
 ?>
 
<html>    
    <head>
        <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.23/themes/flick/jquery-ui.css"/>
        <link rel="stylesheet" media="all" type="text/css" href="/css/jquery-ui-timepicker-addon.css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jqueryui.js"></script>
        <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <script type='text/javascript' src='prescription/auto.js'></script>
        <link rel="stylesheet" type="text/css" href="prescription/suggest.css"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <script type="text/javascript">
            $('document').ready(function () {
                $("#doctor").autocomplete("../prescription/list.php?doc=1", {
                    width: 260,
                    matchContains: true,
                    selectFirst: false
                });
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
				
				$('.addDoctor').click(function(){
					var id = $(this).attr('id');
					var a = $(this).parents('.addDocWrap');
					$(this).remove();
					var data = a.html();
					a.remove();
					$('#mydocs').append('<div class="span3">'+data+"</div>");
					
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
                <div class="doctordata " id="mydocs">
			<?php
				$i = 1;
				foreach($mydocs as $key=>$result){ 
				$i++;
				if($i%2==0){
				 echo '<div class="space" style="clear:both"></div>';
				}
			?>
                    <div class="span3">
                        <div class="row">
							<div class="span1">
								<img src="<?php echo $result->photo ?>" style="width:100%;" >
							</div>
							<div class="span2">
								<strong>Dr <?php echo $result->name ?></strong>
								<p><?php echo $result->speciality ?></br><?php echo $result->qualification ?></p>
							</div>
						</div>
						<div class="row" style="padding-top:5px;">
							<div class="span3">
								<p><span><input type="button" class="btn btn-primary btn-mini noborder createappointment" id="<?php echo $result->id ?>" value="Appointment"/></span></p>
							</div>
						</div>
					</div>
                    
			<?php  } 
			}catch(PDOException $e){
				$e->getmessage();
			}
			?>		
                </div>
                <div class="row">
                    <div class="span7">
                        <h3>Hospital(Mulago) Doctors</h3>
                    </div> 
                </div>
                <div class="space"></div>
				 <div class="doctordata">
		<?php	$i = 1;
				foreach($doc as $key=>$doctor){
				$i++;
				if($i%2==0){
				 echo '<div class="space" style="clear:both"></div>';
				}
				?>		
                    
					<div class="span3 addDocWrap">
						<div class="row">
						<div class="span1">
							<img src="<?php echo $doctor->photo ?>" style="width:100%; ">
						</div>
						<div class="span2">
							<strong>Dr <?php echo $doctor->name ?></strong>
							<p><?php echo $doctor->speciality ?> </br><?php echo $doctor->qualification ?></p>
							
						</div>
						</div>
						<div class="row">
							<div class="span3" style="padding-top:5px;">
								<p>
								<input type="button" class="btn btn-primary  btn-mini noborder createappointment" id="7" value="Appointment" />
								<input type="button" class="btn btn-success btn-mini noborder addDoctor" id="7"  value="Add Doctor" />
								</p>
							</div>
						</div>
					</div>	
                
				
		<?php } ?>		
			</div>
            </div>
            <div class="span4 appointmentright" id="appoint">
                <h3>Appointment Details</h3>
				<?php if($_GET['error']){
					echo "<p>errr</p>";
				}?>
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