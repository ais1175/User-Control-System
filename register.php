<?php 
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.5
// * 
// * Copyright (c) 2020 - 2021 DerStr1k3r. All rights reserved.
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
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$socialclubname = filter_input(INPUT_POST, 'socialclubname', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT);

		// The 2nd check to make sure that nothing bad can happen.
		if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
			site_login_username_not_valid();
		}
		if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
			site_login_max_pass_long();
		}
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

site_header_nologged("".REGISTER."");
site_navi_nologged();
site_content_nologged();

echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".REGISTER."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='row clearfix'>
								<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
									<div class='input-group'>
										<div class='form-line'>
											<label class='title' for='exampleFormControlInput1'><i class='material-icons'>person</i> ".USERNAME." *</label>
											<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='username' class='form-control' placeholder='".USERNAME." *' value='' maxlength='30' id='border-right6' autocomplete='off'/>
										</div>
									</div>
									<div class='input-group'>									
										<div class='form-line'>
											<label class='title' for='exampleFormControlInput1'><i class='material-icons'>person</i> ".SOCIALCLUBNAME." *</label>
											<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='socialclubname' class='form-control' placeholder='".SOCIALCLUBNAME." *' value='' maxlength='30' id='border-right6' autocomplete='off'/>
										</div>				
									</div>		
									<div class='input-group'>
										<div class='form-line'>
											<label class='title' for='exampleFormControlInput1'><i class='material-icons'>sms</i> ".EMAIL." *</label>
											<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='email' class='form-control' placeholder='".EMAIL." *' value='' maxlength='45' id='border-right6' autocomplete='off'/>
										</div>
									</div>										
									<div class='input-group'>										
										<div class='form-line'>
											<label class='title' for='exampleFormControlInput1'><i class='material-icons'>enhanced_encryption</i> ".PASSWORD." *</label>
											<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='password' name='password' class='form-control' placeholder='".PASSWORD." *' value='' maxlength='30' id='border-right6' autocomplete='off'/>
										</div>				
									</div>			
									<div class='form-group'>
										<div class='form-line'>
											".NOTE."
											<br />
											".NOTE2."
											<br />		
										</div>
										<br />
										<button type='submit' class='btn btn-primary' name='register'>".REGISTER."</submit>	
									</div>
								</form>			
                            </p>
                        </div>			
                    </div>					
                </div>
            </div>";
site_footer();	 	
?>