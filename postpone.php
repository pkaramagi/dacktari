<?php
require_once "setup.php"; 
if($_GET['pid']){
$result = ORM::for_table('appointment')->find_one($_GET['pid']);
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
               });
        </script>
        <style type="text/css">
            body {
				border:1px solid #D1D1D1;
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
				text-align:center;
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
	<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <h2 class="head">Daktari - PostPone  Appointment</h2>
        </div>
        <div class="row-fluid">
                <h3>Appointment Details</h3>
                <form class="form-horizontal" action="addappointment.php?db_option=postpone" method="post">
					<div class="control-group">
						<label class="control-label" for="inputStartTime" >StartTime</label>
						<div class="controls">
							<input type="datetime" name="starttime" class="input-xlarge focused"  id="starttime" placeholder="starttime" value="<?php echo $result->starttime; ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">EndTime</label>
						<div class="controls">
							<input type="datetime" name="endtime" class="input-xlarge focused" id="endtime" placeholder="endtime" value="<?php echo $result->endtime; ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Reason</label>
						<div class="controls">
							<textarea name="description" id="description" class="input-xlarge focused tx"></textarea>
						</div>
					</div>
					<br/>
					<div class="control-group">
						<label class="control-label" for="inputEmail"></label>
						<div class="controls">
							<input type="submit" name="submit" class="btn btn-primary btn-small zero-radius" value="PostPone Appointment"/>
						</div>
					</div>
					<input type="hidden" name="ed" id="ed" value="<?php echo $_GET['pid']; ?>"/>
				</form>
        </div>
    </div>
	</body>
<?php } ?>
</html>