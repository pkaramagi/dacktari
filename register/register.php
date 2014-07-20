<?php
include "../setup.php";
?>
		<title>Daktari -Register</title>
<link type="text/css" rel="stylesheet" href="../css/jquery.stepy.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link href='../css/login.css' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="../js/jquery.min.js"></script>

		<!-- Optionaly -->
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>

<script type="text/javascript" src="../js/jquery.stepy.min.js"></script>
<script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>

<body class="login">
<div id="logo-bar">
<img src="../images/Logo.png" style="height:39px"/>
</div>
<div id="login-form" style=" padding-left: 20px; ">
<?php
if($_GET['type']==1){
include "Patient/register.php";
}
else if($_GET['type']==2){
include "Doctor/register.php";

}
else if($_GET['type']==3){
include "Hospital/register.php";

}
else{
echo "Invalid Type";
}
?>
</div>


<script type="text/javascript">
			$(function() {

				$('#default').stepy();

				$('#custom').stepy({
					backLabel:	'Backward',
					block:		true,
					errorImage:	true,
					nextLabel:	'Forward',
					titleClick:	true,
					validate:	true
				});

				$('div#step').stepy({
					finishButton: false
				});

				// Optionaly
		$('#custom input').hover(function()
{
$(this).popover('show')
});
$('#custom input').mouseout( function()
{
$(this).popover('destroy')
}
);
				// Validation
$("#custom").validate({
rules:{
user_name:"required",
user_email:{required:true,email: true},
pwd:{required:true,minlength: 6},
cpwd:{required:true,equalTo: "#pwd"},
gender:"required",
DOB:"required"
},

messages:{
DOB:"the Date of Birth is Required",
user_name:"Enter your first and last name",
user_email:{
required:"Enter your email address",
email:"Enter valid email address"},

pwd:{
required:"Enter your password",
minlength:"Password must be minimum 6 characters"},
cpwd:{
required:"Enter confirm password",
equalTo:"Password and Confirm Password must match"},
gender:"Select Gender"
},

errorClass: "help-inline",
errorElement: "span",
highlight:function(element, errorClass, validClass)
{
$(element).parents('.control-group').addClass('error');
},
unhighlight: function(element, errorClass, validClass)
{
$(element).parents('.control-group').removeClass('error');
$(element).parents('.control-group').addClass('success');
}
});

				$('#callback').stepy({
					back: function(index) {
						alert('Going to step ' + index + '...');
					}, next: function(index) {
						if ((Math.random() * 10) < 5) {
							alert('Invalid random value!');
							return false;
						}

						alert('Going to step ' + index + '...');
					}, select: function(index) {
						alert('Current step ' + index + '.');
					}, finish: function(index) {
						alert('Finishing on step ' + index + '...');
					}, titleClick: true
				});

				$('#target').stepy({
					description:	false,
					legend:			false,
					titleClick:		true,
					titleTarget:	'#title-target'
				});

			});
		</script>