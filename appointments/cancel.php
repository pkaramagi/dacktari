<?php
require_once "../setup.php"; 
if($_GET['ed']){
$result = ORM::for_table('appointment')->find_one($_GET['ed']);
if($_SESSION['type'] == "doctor"){
$doc = ORM::for_table('patient')->find_one($result->patient_id);
}
else{
$doc = ORM::for_table('doctor')->find_one($result->doctor_id);
}
?> 
<html>    
    <head>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <script type="text/javascript">
            $('document').ready(function () {
            
			   $('#cancel').click(function(){
					
					$('#description').attr('disabled', false).focus();
					$('#final').attr('disabled',false);
					
			   });
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
				width:210px;
				text-align:left;
			}
			.form-horizontal .controls {
				margin-left: 125px;
			}
			.zero-radius{
				border-radius:2px;
			}
			.control-label{
				width: 200px;
				margin-bottom:10px;
				float:left;
				padding-right:5px;
			}
        </style>
    </head>
	<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <h2 class="head">Daktari - Cancel Appointment</h2>
			 <form class="form-horizontal" action="
			 <?php if($_SESSION['type']=="doctor"){echo 'addappointment.php?db_option=cancel';}
			 else{echo "offlineoperations.php?db_option=cancel"; } ?>"
			 method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Are you sure,    You want to cancel your appointment with <?php if($_SESSION['type']=="doctor"){} else{ echo "Doctor"; } echo $doc->name; ?> </label>
				<div class="controls">
					<input type="button" class="btn btn-primary btn-mini zero-radius" onclick="parent.$.fancybox.close()" value="No"/>
					<input type="button" class="btn btn-danger btn-mini zero-radius"  id="cancel" value="Yes">
				</div>
			</div>
			<div style="clear:both"></div>
			<div class="control-group">
			<label class="control-label" for="inputEmail">Please Share With  <?php if($_SESSION['type']=="doctor"){} else{ echo "Doctor"; } echo $doc->name; ?>, Why you are cancelling this appointment?</label>
			<div class="controls">
			<textarea name="reason" id="description" class="input-large focused tx" disabled="disabled" ></textarea>
			</div>
			</div>
			<input type="hidden" name="ed" id="ed" value="<?php echo $_GET['ed']; ?>"/>
			<div class="control-group">
			<label class="control-label" for="inputEmail"></label>
						<div class="controls">
							<input type="submit" name="submit" id="final" class="btn btn-danger btn-mini zero-radius" disabled="true" value="Cancel Appointment"/>
						</div>
			</div>
			
        </form>
		</div>
    </div>
	</body>
<?php } ?>
</html>