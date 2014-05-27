<?php

require 'setup.php';

// The code parameter signifies that this is
// a redirect from google, bearing a temporary code
if (isset($_GET['code'])) {
	
	// This method will obtain the actuall access token from Google,
	// so we can request user info
	
	
	$client->authenticate();
	// Get the user data
	$info = $oauth2->userinfo->get();
	
	$token  = $client->getAccessToken();
	$_SESSION['token'] = $token ;
	$json_obj = json_decode($token);
	if(!$info[name]){
	header("Location:login.php?e=1");
	
	}
	// Find this person in the database
	$table=$_SESSION["type"];
	$person = ORM::for_table($table)->where('email', $info['email'])->find_one();
		
	if(!$person){
		// No such person was found. Register!

	
	//set common variables to be used
	$_SESSION[name]=$info[name];
	$_SESSION[email]=$info[email];
	$_SESSION[DOB]=$info[birthday];
	$_SESSION[gender]=$info[gender];
	$_SESSION[picture]=$info[picture];
	$_SESSION[refresh] =$json_obj->refresh_token;
	if($_SESSION['type']=="patient"){
	header("Location: register/register.php?type=1");
	}
	else if($_SESSION['type']=="doctor"){
	header("Location: register/register.php?type=2");
	}
	else{
	header("Location: register/register.php?type=3");
	
	}
	
	}
	else{
	
	$_SESSION['user_id'] = $person->id();
	$_SESSION['email'] = $info['email'];
	$_SESSION['name'] = $info['name'];
        header("Location: home.php");
	}
	
	

	
	
}

// Handle logout
if (isset($_GET['logout'])) {
	unset($_SESSION['user_id']);
}
$person = null;
if(isset($_SESSION['user_id'])){
	
	// Fetch the person from the database
	$person = ORM::for_table($table)->find_one($_SESSION['user_id']);

	if(isset($_SESSION['token'])){
		$client->setAccessToken($_SESSION['token']);
	}


}



 if($person){
		$_SESSION['user_id'] = $person->id();
        header("Location: home.php");
			}
			
?>

    	
        
