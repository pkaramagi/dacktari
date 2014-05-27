<?php
include "setup.php";
if($_SESSION["type"]=="doctor"){
include "Doctor.php";
}
else if($_SESSION["type"]=="patient"){
include "Patient.php";
}
else if($_SESSION["type"]=="hospital"){
include "Hospital.php";
}
else{
header("Location: login.php"); 

}

?>