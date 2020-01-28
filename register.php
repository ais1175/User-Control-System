<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.3
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

secure_url();

if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['register'])){
	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['socialclubname'])){
		site_register_notfound_done();
	}
	else
	{	
		$username = xss_cleaner(trim(htmlspecialchars($_POST['username'])));
		$username = mysqli_real_escape_string($conn,$username); 
		$email 	= xss_cleaner(trim(htmlspecialchars($_POST['email'])));
		$email = mysqli_real_escape_string($conn,$email);
		$socialclubname = xss_cleaner(trim(htmlspecialchars($_POST['socialclubname'])));
		$socialclubname = mysqli_real_escape_string($conn,$socialclubname);
		$password = xss_cleaner(trim(htmlspecialchars($_POST['password'])));
		$password = mysqli_real_escape_string($conn,$password);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT);

		// CHECK USERNAME FROM KEY
		if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
			site_login_username_not_valid();
		}

		// CHECK MAX CARRACTERS LONG
		if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
			site_login_max_pass_long();
		}

		// CHECK VALID USER EMAIL
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			site_login_user_no_valid_email();
		}

		// CHECK IF USER IS ALREADY REGISTERED
		$check_user = mysqli_query($conn, "SELECT `username` FROM `users` WHERE username = '$username' LIMIT 1");

		if(mysqli_num_rows($check_user) > 0){    
			site_login_user_already();
		}else{
			$sql = "insert into users (username, email, password, socialclubname) value('".$username."', '".$email."', '".$hashPassword."','".$socialclubname."')";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				site_register_done();
			}	
			mysqli_close($conn);
		}
		mysqli_close($conn);
	}	
}

site_header();
site_navi_nologged();
site_content_nologged();

echo "
      <div class='content'>
                <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Register</p>
              </div>
              <div class='card-body'>
		<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
			<div class='form-row'>
				<div class='form-group col-md-6'>
					<label class='control-label' for='exampleFormControlInput1'><i id='email-icon' class='fa fa-envelope'></i> Username *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Social Club Name' type='text' name='username' class='form-control' placeholder='Social Club Name *' value='' maxlength='30' id='border-right6' autocomplete='off'/>
				</div>
				<div class='form-group col-md-4'>
					<label class='control-label' for='exampleFormControlInput1'><i id='email-icon' class='fa fa-envelope'></i> Social Club Name *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Social Club Name' type='text' name='socialclubname' class='form-control' placeholder='Social Club Name *' value='' maxlength='30' id='border-right6' autocomplete='off'/>
				</div>				
			</div>		
			<div class='form-row'>
				<div class='form-group col-md-6'>
					<label class='control-label' for='exampleFormControlInput1'><i id='message-icon' class='fa fa-comment'></i> E-Mail *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='E-Mail' type='text' name='email' class='form-control' placeholder='E-Mail *' value='' maxlength='45' id='border-right6' autocomplete='off'/>
				</div>
				<div class='form-group col-md-4'>
					<label class='control-label' for='exampleFormControlInput1'><i id='message-icon' class='fa fa-comment'></i> Passwort *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Password' type='password' name='password' class='form-control' placeholder='Passwort *' value='' maxlength='30' id='border-right6' autocomplete='off'/>
				</div>				
			</div>			
			<hr style='height:0.10rem; border:none; color:#DADADA; background-color:#DADADA; margin-top:40px; margin-bottom:35px;' />
			<div class='form-row'>
				<div class='col-sm-8'>
					<b>Hinweis:</b> Felder mit <span class='pflichtfeld'>*</span> müssen ausgefüllt werden.
					<br />
					<br />
					<button type='submit' class='btn btn-primary' name='register'>Registrieren</submit>			
				</div>
			</div>			
			
		</form>			
              </div>
            </div>
          </div>
        </div>
      </div>";
site_footer();	 	
?>