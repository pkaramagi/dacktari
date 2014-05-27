<?php
session_name('daktali');
session_start();
require('../classes/html2fpdf.php');
require('../classes/prescription.php');
require('../classes/users.php');
require('../src/idiorm.php');
require('../includes/config.php');
include '../src/Google_Client.php';
include '../src/contrib/Google_DriveService.php';

if($_POST['name']&&$_POST['description']){
#generate pdf
$name=mysql_real_escape_string($_POST['name']);
$description=$_POST['description'];
echo '<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />';
$pdf=new HTML2FPDF();
$pdf->AddPage();

$strContent = "

<h2> Daktari Prescription</h2>
<h3> $name </h3>
<br/>
<br/>
$description
<br/>
<br/>
<h6>From Dr.".$_SESSION['name']."</h6>
";

$pdf->WriteHTML($strContent);
$file=time().substr(str_replace(" ", "_", $name), 5).".";
$pdf->Output("files/$file.pdf");

#end of generate
#update table
$strContent=mysql_real_escape_string($strContent);
$path="$file.pdf";
$obj = new Prescription();
if($obj->sendPrescription($_POST['prescription_id'],$strContent,$path)){
echo "sent ";
}
else{
echo "failed";
}
#end of update

#send drive
//get refresh token
$folder=new Users();
$refreshToken= $folder->getRefreshToken($_POST['patient_id'],'patient');
$client= new Google_Client();
$client->setAccessType('offline');
$client->refreshToken($refreshToken);
$drive=new Google_DriveService($client);

$folder->sendTemplate($drive, "files/$file.pdf",$_POST['patient_id'],$name);
$folder->dp_Collab($_SESSION['user_id'],$_POST['patient_id']);
#end of send drive
}
else{
header('Location: ' . $_SERVER['HTTP_REFERER'].'&&error=1');
}