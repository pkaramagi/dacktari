<?php 
class Sidemenu{

//function to return menu Doctor menu
function getDoctorMenu(){
 ?>
		<div id="navigation-block">
            <ul id="sliding-navigation" class="nav nav-list">
				<li class="sliding-element nav-header"><a href="#" >Home</a></li>
                <li class="sliding-element nav-header"><a href="#">Notifications</a></li>
				<li class="sliding-element nav-header showmenu"><img src="images/download.png"><a href="#appointment">Appointments</a></li>
					<ul class="nav nav-list" id="appointment" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Create</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">View</a></li>
					</ul>
                <li class="sliding-element nav-header showmenu"><img src="images/download.png"><a href="#doctormenu">Doctors</li>
					<ul class="nav nav-list" id="doctormenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Add</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">List</a></li>
					</ul>
				<li class="sliding-element nav-header showmenu" ><img src="images/download.png"><a href="#prescriptionmenu">Prescription</a></li>
					<ul class="sliding-element nav nav-list" id="prescriptionmenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Request</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">View</a></li>
					</ul>
            </ul>
        </div>
<?php }
//function to return patient menu
function getPatientSideMenu(){
?>
<div id="navigation-block">
            <ul id="sliding-navigation" class="nav nav-list">
				<li class="sliding-element nav-header"><a href="#" >Home</a></li>
                <li class="sliding-element nav-header"><a href="#">Notifications</a></li>
				<li class="sliding-element nav-header showmenu"><img src="images/download.png"><a href="#appointment">Appointments</a></li>
					<ul class="nav nav-list" id="appointment" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Create</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">View</a></li>
					</ul>
                <li class="sliding-element nav-header showmenu"><img src="images/download.png"><a href="#doctormenu">Doctors</li>
					<ul class="nav nav-list" id="doctormenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Add</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">List</a></li>
					</ul>
				<li class="sliding-element nav-header showmenu" ><img src="images/download.png"><a href="#prescriptionmenu">Prescription</a></li>
					<ul class="sliding-element nav nav-list" id="prescriptionmenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Request</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">View</a></li>
					</ul>
            </ul>
</div>
<?php
}
//function to return hospital menu
function getHospitalMenu(){ ?>
		<div id="navigation-block">
            <ul id="sliding-navigation" class="nav nav-list">
				<li class="sliding-element nav-header"><a href="#" >Home</a></li>
                <li class="sliding-element nav-header"><a href="#">Notifications</a></li>
                <li class="sliding-element nav-header showmenu"><img src="images/download.png"><a href="#doctormenu">Doctors</li>
					<ul class="nav nav-list" id="doctormenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Add</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">View</a></li>
					</ul>
				<li class="sliding-element nav-header showmenu" ><img src="images/download.png"><a href="#patientmenu">Patients</a></li>
					<ul class="sliding-element nav nav-list" id="patientmenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">View</a></li>
						
					</ul>
            </ul>
        </div>
<?php
}
}
?>

		
		
