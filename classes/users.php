<?php
Class Users{

function insertFile($service, $title, $description, $parentId, $mimeType, $filename) {
	$file = new Google_DriveFile();
	$file->setTitle($title);
	$file->setDescription($description);
	$file->setMimeType($mimeType);

	// Set the parent folder.
	if ($parentId != null) {
		$parent = new Google_ParentReference();
		$parent->setId($parentId);
		$file->setParents(array($parent));
	}

	try {
		$data = @file_get_contents($filename);

		$createdFile = $service->files->insert($file, array(
				'data' => $data,
				'mimeType' => $mimeType,
		));

		// Uncomment the following line to print the File ID
		// print 'File ID: %s' % $createdFile->getId();

		return $createdFile;
	} catch (Exception $e) {
		print "An error occurred: " . $e->getMessage();
	}
}
function createFolder($service){
	$folder=$this->insertFile($service, "Daktari(MyPrescription)", "My Prescriptions From Hostpital", $parentId, 'application/vnd.google-apps.folder', "Hospital(MyPrescription)");
	$folder[id];

	return $folder[id];
}
function notify($title,$notification,$user){
$sql=mysql_query("INSERT INTO notification VALUES(NULL,'$user','$title','$notification','0')") or die(mysql_error());
return $sql; 
}

function sendEmail($to, $subject, $message){
if($this->smtp_mail($to, $subject, $message))
{
    echo "Mail sent";
}
else
{
    echo "Some error occured";
}
}

function getPhoto($id,$table){
$sql = mysql_query("SELECT photo  FROM  $table where id='$id' " ) or die(mysql_error());
$row=mysql_fetch_assoc($sql);
return $row['photo'];
}
function getUserName($id,$table){
$sql = mysql_query("SELECT name  FROM  $table where id='$id' " ) or die(mysql_error());
$row=mysql_fetch_assoc($sql);
return $row['name'];
}
function getRefreshToken($id,$table){
$sql = mysql_query("SELECT refresh_token  FROM  $table where id='$id' " ) or die(mysql_error());
$row=mysql_fetch_assoc($sql);
return $row['refresh_token'];
}
function getFolderId($id,$table){
$sql = mysql_query("SELECT folder_id  FROM  $table where id='$id' " ) or die(mysql_error());
$row=mysql_fetch_assoc($sql);
return $row['folder_id'];
}
function sendTemplate($drive, $template, $id,$name){
	
		$parentId=$this->getFolderId($id, "patient");
//check if folder
    $check=$this->printFile($drive, $parentId);    
	if(!$check){
	  $parentId=$this->createFolder($drive);
	  $this->updateFolder($id,"patient",$parentId);
	
	  }
	
	  
	  
		$this->insertFile($drive , "$name", "Hospital Prescription", $parentId, "application/pdf", $template);
		
	}


function printFile($service, $fileId) {
  try {
    $file = $service->files->get($fileId);
   
     }
   
   catch (Exception $e) {
   return false;
  }
return true;
  }
  
function updateFolder($id,$table,$folder){
$sql=mysql_query("UPDATE $table SET folder_id='$folder' WHERE id='$id'") or die(mysql_error());
return $sql;
}


function server_parse($socket, $expected_response)
{
    $server_response = '';
    while (substr($server_response, 3, 1) != ' ')
    {
        if (!($server_response = fgets($socket, 256)))
            echo 'Couldn\'t get mail server response codes. Please contact the forum administrator.', __FILE__, __LINE__;
    }
 
    if (!(substr($server_response, 0, 3) == $expected_response))
        echo 'Unable to send e-mail. Please contact the forum administrator with the following error message reported by the SMTP server: "'.$server_response.'"', __FILE__, __LINE__;
}
 
 
//
// This function was originally a part of the phpBB Group forum software phpBB2 (http://www.phpbb.com).
// They deserve all the credit for writing it. I made small modifications for it to suit PunBB and it's coding standards.
// -------> This message is from punBB developer
//
function smtp_mail($to, $subject, $message, $headers = '')
{
    $recipients = explode(',', $to);
    $user = 'krabz01';
    $pass = 'feewaiba';
    $smtp_host = 'ssl://smtp.gmail.com';
    $smtp_port = 465;
 
 
    if (!($socket = fsockopen($smtp_host, $smtp_port, $errno, $errstr, 15)))
        echo "Could not connect to smtp host '$smtp_host' ($errno) ($errstr)", __FILE__, __LINE__;
 
    $this->server_parse($socket, '220');
 
    fwrite($socket, 'EHLO '.$smtp_host."\r\n");
    $this->server_parse($socket, '250');
 
    fwrite($socket, 'AUTH LOGIN'."\r\n");
    $this->server_parse($socket, '334');
 
    fwrite($socket, base64_encode($user)."\r\n");
    $this->server_parse($socket, '334');
 
    fwrite($socket, base64_encode($pass)."\r\n");
    $this->server_parse($socket, '235');
 
 
 
    fwrite($socket, 'MAIL FROM: <example@gmail.com>'."\r\n");
    $this->server_parse($socket, '250');
 
    foreach ($recipients as $email)
    {
        fwrite($socket, 'RCPT TO: <'.$email.'>'."\r\n");
        $this->server_parse($socket, '250');
    }
 
    fwrite($socket, 'DATA'."\r\n");
    $this->server_parse($socket, '354');
 
    fwrite($socket, 'Subject: '.$subject."\r\n".'To: <'.implode('>, <', $recipients).'>'."\r\n".$headers."\r\n\r\n".$message."\r\n");
 
    fwrite($socket, '.'."\r\n");
    $this->server_parse($socket, '250');
 
    fwrite($socket, 'QUIT'."\r\n");
    fclose($socket);
 
    return true;
}

function dp_Collab($doctor_id,$patient_id){
$collaboration = ORM::for_table('patient_doctor')->where('doctor_id',$doctor_id)->where('patient_id',$patient_id)->find_one();
if(!$collabotation){
	$addCollab = ORM::for_table('patient_doctor')->create();
	$addCollab->patient_id = $patient_id;
	$addCollab->doctor_id = $doctor_id;
	$addCollab->collab = '1';
	$addCollab->save();
}
else{
	$collaboration->collab += 1;
	$collaboration->save();
}

}

function dh_Collab($doctor_id,$hospital_id){
$collaboration = ORM::for_table('hosptial_doctor')->where('doctor_id',$doctor_id)->where('hospital_id',$patient_id)->find_one();
if(!$collabotation){
	$addCollab = ORM::for_table('patient_doctor')->create();
	$addCollab->patient_id = $patient_id;
	$addCollab->doctor_id = $doctor_id;
	$addCollab->collab = '1';
	$addCollab->save();
}
else{
	$collaboration->collab += 1;
	$collaboration->save();
}

}

}
?>