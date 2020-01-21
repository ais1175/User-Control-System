<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

secure_url();

if(isset($_POST['register'])){
	
		$username = stripslashes(trim($_POST['username']));
		$email 	= stripslashes(trim($_POST['email']));	
		$socialclubname = stripslashes(trim($_POST['socialclubname']));
		$password = stripslashes(trim($_POST['password']));
		$hashPassword = password_hash(trim($password,PASSWORD_BCRYPT));
		
		$sql = "insert into users (username, email, password, socialclubname) value('".$username."', '".$email."', '".$hashPassword."','".$socialclubname."')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			site_register_done();
		}
		$conn->close();
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
		<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
			<div class='form-row'>
				<div class='form-group col-md-6'>
					<label class='control-label' for='exampleFormControlInput1'><i id='email-icon' class='fa fa-envelope'></i> Username *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Social Club Name' type='text' name='username' class='form-control' placeholder='Social Club Name *' value='' maxlength='30' id='border-right6'/>
				</div>
				<div class='form-group col-md-4'>
					<label class='control-label' for='exampleFormControlInput1'><i id='email-icon' class='fa fa-envelope'></i> Social Club Name *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Social Club Name' type='text' name='socialclubname' class='form-control' placeholder='Social Club Name *' value='' maxlength='30' id='border-right6'/>
				</div>				
			</div>		
			<div class='form-row'>
				<div class='form-group col-md-6'>
					<label class='control-label' for='exampleFormControlInput1'><i id='message-icon' class='fa fa-comment'></i> E-Mail *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='E-Mail' type='text' name='email' class='form-control' placeholder='E-Mail *' value='' maxlength='30' id='border-right6'/>
				</div>
				<div class='form-group col-md-4'>
					<label class='control-label' for='exampleFormControlInput1'><i id='message-icon' class='fa fa-comment'></i> Passwort *</label>
					<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Password' type='password' name='password' class='form-control' placeholder='Passwort *' value='' maxlength='30' id='border-right6'/>
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