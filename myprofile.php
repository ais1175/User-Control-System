<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.4.2
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

site_secure();
secure_url();

if(isset($_POST['myprofilechange'])){
	if(empty($_POST['socialclubname']) || empty($_POST['password']) || empty($_POST['email'])){
		site_login_notfound_done();
	}
	else
	{	
		$username = $socialclubname;
		$email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$socialclubname = filter_input(INPUT_POST, 'socialclubname', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT);

		// The 2nd check to make sure that nothing bad can happen.
		if (preg_match('/[A-Za-z0-9]+/', $_POST['socialclubname']) == 0) {
			site_login_username_not_valid();
		}
		if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
			site_login_max_pass_long();
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			site_login_user_no_valid_email();
		}

		$sql = "UPDATE users SET username='".$socialclubname."', email='".$email."', socialclubname='".$socialclubname."', password='".$hashPassword."' WHERE id = '".$_SESSION['username']['secure_first']."'";
   
   		if (mysqli_query($conn, $sql)) {
      		site_myprofile_done();
   		} else {
      		site_myprofile_done_error();
   		}
		mysqli_close($conn);
	}	
}
	
site_header();
site_navi_logged();
site_content_logged();

echo "
      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Account bearbeiten</p>
              </div>
              <div class='card-body'>
			  	<div class='card'>
					<div class='table-responsive'>
						<div class='alert alert-info alert-with-icon' data-notify='container'>
                    		<button type='button' aria-hidden='true' class='close'>
                        	<i class='now-ui-icons ui-1_simple-remove'></i>
                    	</button>
                    	<span data-notify='icon' class='now-ui-icons ui-1_bell-53'></span>
                    	<span data-notify='message'>".MYPROFILENOTE."</span>
					</div>
                </div>
			  <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class=' text-primary'>			  
                      <th>
						<h6>
							".SOCIALCLUBNAME."
							<small class='text-muted'>".WHITELIST."</small>
						</h6>
                      </th>
                      <th>
						<h6>
							".EMAIL."
							<small class='text-muted'>".TWITTER."</small>
						</h6>
                      </th>
                      <th>
						<h6>
							".PASSWORD."
							<small class='text-muted'>".RPSERVER."</small>
						</h6>
                      </th>						  
                    </thead>
                    <tbody>";
				$sql = "SELECT socialclubname, password, email FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo "						
					<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
                      <tr>
                        <td>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons users_single-02'></i>
									</div>      
								</div>						
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='socialclubname' size='50' maxlength='60' class='form-control' value='" . $row["socialclubname"]. "' required>
							</div>	
                        </td>					  
                        <td>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>						
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='email' size='50' maxlength='60' class='form-control' value='" . $row["email"]. "' required>
							</div>	
                        </td>
                        <td>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-1_settings-gear-63'></i>
									</div>      
								</div>						
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='password' name='password' id='exampleInputPassword1' size='50' maxlength='60' class='form-control' required>
							</div>	
                        </td>						
                        </tr>
                      <tr>					  
						<td>						
							<button type='submit' name='myprofilechange' class='btn btn-primary btn-round'>
								<i class='now-ui-icons ui-1_check'></i> ".MYPROFILESAVE."
							</button>
							</submit>
                        </td>							
                      </tr>						
					</form>";
				}
				mysqli_close($conn);
			}					

echo "	 
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
	</div>
  </div>
</div>";

site_footer();	
?>