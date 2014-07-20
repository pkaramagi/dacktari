<?php
// Includes
require_once 'src/config.php';
require_once 'src/Google_Client.php';
require_once 'src//contrib/Google_Oauth2Service.php';
require_once 'src//contrib/Google_CalendarService.php';
require_once 'src//contrib/Google_DriveService.php';
require_once 'src/idiorm.php';
require_once 'classes/hospital.class.php';
//class to load side bar menus
require_once 'classes/users.php';
require_once 'classes/notifications.php';
include 'includes/config.php'; 
// Session. Pass your own name if you wish.
$client = new Google_Client();
$client->setAccessType('offline');
$calendar = new Google_CalendarService($client);
$oauth2 = new Google_Oauth2Service($client);

session_name('daktali');
session_start();
require_once 'classes/appointment.php';
$redirect_url = 'http://mydaktari.org/';
// Database configuration with the IDIORM library

$host = 'localhost';
$user = 'daktari_ksm';
$pass = 'macbookair';
$database = 'daktari_daktari';

ORM::configure("mysql:host=$host;dbname=$database");
ORM::configure('username', $user);
ORM::configure('password', $pass);

// Changing the connection to unicode
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Google API. Obtain these settings from https://code.google.com/apis/console/