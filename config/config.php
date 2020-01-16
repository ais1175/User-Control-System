<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.0
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
session_start();

// ************************************************************************************//
// * MySQL Database Connection
// ************************************************************************************//
define('MYSQL_USER', 'xxx');
define('MYSQL_PASSWORD', 'xxx');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'xxx');
 
// ************************************************************************************//
// * Default Language Section - Main 
// ************************************************************************************//
define("SITETITLE","DESTINY-LIFE | UCP");
define("PROJECTNAME","Destiny-Life");
define("DASHBOARD","Dashboard");
define("RULES","Regelwerk");
define("USERPROFILE","User Profil");
define("USERPROFILECHANGE","User Profil bearbeiten");

// ************************************************************************************//
// * Default Language Section - Footer
// ************************************************************************************//
define("DISCORD","https://discord.gg/xxxxxx");
define("TEAMSPEAK","ts3server://xxxxxx?port=9987");
define("IMPRINT","https://xxxxxx/impressum.html"); 

// MySQL Account Dats
$conn = mysqli_connect(
			"" . MYSQL_HOST . "",
			"" . MYSQL_USER . "",
			"" . MYSQL_PASSWORD . "",
			"" . MYSQL_DATABASE . "");

// MySQL Error Msg			
if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>
