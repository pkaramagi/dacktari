<?PHP
session_name('daktali');
session_start();
//set the type of session that has been clicked
$_SESSION["type"]=$_GET["type"];


require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_CalendarService.php';
require_once 'src/contrib/Google_DriveService.php';


$client = new Google_Client();

$client->setApplicationName("daktari");
$client->setAccessType('offline');
$client->setApprovalPrompt('auto');



$client->setScopes(array('https://www.googleapis.com/auth/drive','https://www.googleapis.com/auth/userinfo.profile','https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/calendar'));
  $authUrl = $client->createAuthUrl();
  //redirect to generated URL
  header("Location: $authUrl");
?>