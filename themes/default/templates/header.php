<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.0
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//

function site_header() {
  // starting the session
  session_start();
  // starting secure urls
  secure_url();
  // starting header section
  echo "
<!DOCTYPE html>
<html>
<head>
	<!-- ####################################################### -->
	<!-- #   Powered by User Control Panel Version 2.0         # -->
	<!-- #   Copyright (c) 2020 DerStr1k3r.                    # -->
	<!-- #   All rights reserved.                              # -->
	<!-- ####################################################### -->
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>".SITETITLE."</title>
    <link rel='icon' href='themes/".SITE_THEMES."/logo.png' type='image/x-icon'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' type='text/css'>
    <link href='themes/".SITE_THEMES."/plugins/bootstrap/css/bootstrap.css' rel='stylesheet'>
    <link href='themes/".SITE_THEMES."/plugins/node-waves/waves.css' rel='stylesheet' />
    <link href='themes/".SITE_THEMES."/plugins/animate-css/animate.css' rel='stylesheet' />
    <link href='themes/".SITE_THEMES."/plugins/morrisjs/morris.css' rel='stylesheet' />
    <link href='themes/".SITE_THEMES."/css/style.css' rel='stylesheet'>
    <link href='themes/".SITE_THEMES."/css/themes/all-themes.css' rel='stylesheet' />";
  
  header("X-Frame-Options: sameorigin");
  header("X-XSS-Protection: 1; mode=block");
  header("X-Content-Type-Options: nosniff");
  header("Strict-Transport-Security: max-age=31536000");
  header("Referrer-Policy: origin-when-cross-origin");
  header("Expect-CT: max-age=7776000, enforce");
  header("Feature-Policy: vibrate 'self'; usermedia *; sync-xhr 'self'");

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
	$securecode = $row["id"];

  $_SESSION["secure"] = sitehash($securecode);
	$sql = "select * from accounts where username = '".$username."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  > 0){
    $row = mysqli_fetch_assoc($rs);
		$_SESSION['username']['secure_first'] = $row["id"];
		$_SESSION['username']['secure_staff'] = $row["adminLevel"];
		$_SESSION['username']['secure_granted'] = "granted";
		if(isset($_POST["username"]) && ! empty($_POST["username"]))
		{
			$_SESSION['username']['secure_first'] = $row["id"];
			$_SESSION['username']['secure_staff'] = $row["adminLevel"];
			$_SESSION['username']['secure_granted'] = "granted";
		} 			
	}
  echo " 
</head>
<body class='theme-grey'>
    <div class='page-loader-wrapper'>
        <div class='loader'>
            <div class='preloader'>
                <div class='spinner-layer pl-red'>
                    <div class='circle-clipper left'>
                        <div class='circle'></div>
                    </div>
                    <div class='circle-clipper right'>
                        <div class='circle'></div>
                    </div>
                </div>
            </div>
            <p>".LOADING."</p>
        </div>
    </div>
    <nav class='navbar'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a href='javascript:void(0);' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar-collapse' aria-expanded='false'></a>
                <a href='javascript:void(0);' class='bars'></a>
                <a class='navbar-brand' href='dashboard.php'>".SITETITLE."</a>
            </div>
            <div class='collapse navbar-collapse' id='navbar-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    <li class='dropdown' style='float:left;'>
                        <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown' role='button'>
							<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>							
								<button type='submit' name='logout' class='label label-default waves-float'>
									".SITE_LOGOUT."
								</button>&nbsp;								
							</form>						
                        </a>
                    </li>
                    <li class='dropdown' style='float:right;'>
                        <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown' role='button'>					
                            <form method='get' action='".$_SERVER['PHP_SELF']."' id='changer_lang'>
								<p style='float:right;'> 
								<a href='".$_SERVER['PHP_SELF']."?secure_lang=en'>
									<input type='hidden' name='secure_lang' value='secure_lang_en' />
									<img src='./themes/".SITE_THEMES."/flags/uk.png' alt='en' width='16' height='16'>
								</a>&nbsp;
								<a href='".$_SERVER['PHP_SELF']."?secure_lang=de'>
									<input type='hidden' name='secure_lang' value='secure_lang_de' />
									<img src='./themes/".SITE_THEMES."/flags/de.png' alt='de' width='16' height='16' >
								</a>	
								</p>
							</form>
                        </a>
                    </li>					
                </ul>
            </div>
        </div>
    </nav>";
}

function site_header_nologged() {
  secure_url();
  echo "
<!DOCTYPE html>
<html>
<head>
	<!-- ####################################################### -->
	<!-- #   Powered by User Control Panel Version 2.0         # -->
	<!-- #   Copyright (c) 2020 DerStr1k3r.                    # -->
	<!-- #   All rights reserved.                              # -->
	<!-- ####################################################### -->
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>".SITETITLE."</title>
    <link rel='icon' href='themes/".SITE_THEMES."/logo.png' type='image/x-icon'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' type='text/css'>
    <link href='themes/".SITE_THEMES."/plugins/bootstrap/css/bootstrap.css' rel='stylesheet'>
    <link href='themes/".SITE_THEMES."/plugins/node-waves/waves.css' rel='stylesheet' />
    <link href='themes/".SITE_THEMES."/plugins/animate-css/animate.css' rel='stylesheet' />
    <link href='themes/".SITE_THEMES."/plugins/morrisjs/morris.css' rel='stylesheet' />
    <link href='themes/".SITE_THEMES."/css/style.css' rel='stylesheet'>
    <link href='themes/".SITE_THEMES."/css/themes/all-themes.css' rel='stylesheet' />";

  // starting the session
  session_start();

  header("X-Frame-Options: sameorigin");
  header("X-XSS-Protection: 1; mode=block");
  header("X-Content-Type-Options: nosniff");
  header("Strict-Transport-Security: max-age=31536000");
  header("Referrer-Policy: origin-when-cross-origin");
  header("Expect-CT: max-age=7776000, enforce");
  header("Feature-Policy: vibrate 'self'; usermedia *; sync-xhr 'self'");

  echo " 
</head>
<body class='theme-grey'>
    <div class='page-loader-wrapper'>
        <div class='loader'>
            <div class='preloader'>
                <div class='spinner-layer pl-red'>
                    <div class='circle-clipper left'>
                        <div class='circle'></div>
                    </div>
                    <div class='circle-clipper right'>
                        <div class='circle'></div>
                    </div>
                </div>
            </div>
            <p>".LOADING."</p>
        </div>
    </div>
    <nav class='navbar'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a href='javascript:void(0);' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar-collapse' aria-expanded='false'></a>
                <a href='javascript:void(0);' class='bars'></a>
                <a class='navbar-brand' href='index.php'>".SITETITLE."</a>
            </div>
            <div class='collapse navbar-collapse' id='navbar-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    <li class='dropdown'>
                        <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                            <form method='get' action='' id='changer_lang'>
								<p> 
								<a href='".$_SERVER['PHP_SELF']."?secure_lang=en'>
									<input type='hidden' name='secure_lang' value='secure_lang_en' />
									<img src='./themes/".SITE_THEMES."/flags/uk.png' alt='en' width='16' height='16'>
								</a>&nbsp;
								<a href='".$_SERVER['PHP_SELF']."?secure_lang=de'>
									<input type='hidden' name='secure_lang' value='secure_lang_de' />
									<img src='./themes/".SITE_THEMES."/flags/de.png' alt='de' width='16' height='16'>
								</a>
								</p>
							</form>
                        </a>
                    </li>					
                </ul>
            </div>
        </div>
    </nav>";   
}

?>