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
// * License Typ: Creative Commons licenses
// ************************************************************************************//
session_start();

// MySQL Account Dats
$conn = mysqli_connect(
			"localhost",
			"dbuser",
			"password",
			"dbname");

// MySQL Error Msg			
if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}

// Language System
define("SITETITLE","DESTINY-LIFE | UCP");
define("PROJECTNAME","Destiny-Life");
define("DASHBOARD","Dashboard");
define("RULES","Regelwerk");
define("USERPROFILE","User Profil");
define("USERPROFILECHANGE","User Profil bearbeiten");

// Language Footer Language
// Discord
define("DISCORD","https://discord.gg/cGf73tD");
// Teamspeak
define("TEAMSPEAK","ts3server://ts3.destiny-life.ml?port=9987");
// Imprint
define("IMPRINT","https://destiny-life.ml/impressum.html");
?>