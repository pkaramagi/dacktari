<?php

require 'setup.php';

// The code parameter signifies that this is
// a redirect from google, bearing a temporary code
if (isset($_SESSION["type"])){
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
		$table = $_SESSION["type"];
		
		$person = ORM::for_table($table)->where('email', $info['email'])->find_one();	
		if(!$person){
		
			// No such person was found. Register
			//set common variables to be used
			$_SESSION[name]=$info[name];
			$_SESSION[user_name]=$info[name];
			$_SESSION[email]=$info[email];
			$_SESSION[DOB]=$info[birthday];
			$_SESSION[gender]=$info[gender];
			if(!$info[picture]){
			$_SESSION[picture]="http://daktari.waziinnovations.com/images/default_avatar.jpg";
			}
			else{
			$_SESSION[picture]=$info[picture];
			}
			$email=$info['email'];
			
                        $check=mysql_query("SELECT refresh_token from glogin_users where email='$email'");

			if(!mysql_num_rows($check)){
			$_SESSION[refresh] =$json_obj->refresh_token;
			}
			else{
			
                        $row=mysql_fetch_assoc($check);
			$_SESSION[refresh] = $row[refresh_token];
			}
			if($_SESSION['type']=="patient"){
				header("Location: register/register.php?type=1");
			}
			else if($_SESSION['type']=="doctor"){
				header("Location: register/register.php?type=2");
			}
           else if($_SESSION['type']=="hospital"){
				header("Location: register/register.php?type=3");
			echo 1;
			}
			else{
				header("Location: login.php");
	
			}
	
		}
		else{
			if($json_obj->refresh_token){
			$person->refresh_token = $json_obj->refresh_token;
			}
			//0B-p6OBtyRkSHX0VpY19raEZyd00
			//0B-p6OBtyRkSHX0VpY19raEZyd00
			//1/0dTex-GGz0qAYQDlbTu6Z8vxwEUt8pRnRnHXOU0AedE
			$_SESSION['user_id'] = $person->id();
			$_SESSION['email'] = $info['email'];
			$_SESSION['name'] = $info['name'];
                        $_SESSION['user_name'] = $info['name'];
			$person->save();
			header("Location: home.php");
		}
	}

// Handle logout
if (isset($_GET['logout'])) {
	unset($_SESSION['user_id']);
		setcookie(session_name(), '', time() - 1000);
				session_destroy();
                                unset($_SESSION['token']);
				header("Location:login.php");
}
	$person = null;
if(isset($_SESSION['user_id'])){
	// Fetch the person from the database
	$person = ORM::for_table($_SESSION['type'])->find_one($_SESSION['user_id']);
	
	if(isset($_SESSION['token'])){
		$client->setAccessToken($_SESSION['token']);
  header("Location: home.php");
	}
}



 if($person){
	$_SESSION['user_id'] = $person->id();
      header("Location: home.php");
	}
}			
else{
	header("location:login.php");
}			

	;			
?>

    	
        