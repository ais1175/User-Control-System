<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.6.1
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

site_secure();
secure_url();

if (isset($_GET["myprofile"])) $myprofile = trim(htmlentities($_GET["myprofile"]));
elseif (isset($_POST["myprofile"])) $myprofile = trim(htmlentities($_POST["myprofile"]));
else $myprofile = "view";

if ($myprofile == "changeuname") {
	if(isset($_POST['myprofilechange'])){
		if(empty($_POST['socialclubname'])){
			site_login_notfound_done();
		}
		else
		{	
			$username = $socialclubname;
			$socialclubname = filter_input(INPUT_POST, 'socialclubname', FILTER_SANITIZE_STRING);

			// The 2nd check to make sure that nothing bad can happen.
			if (preg_match('/[A-Za-z0-9]+/', $_POST['socialclubname']) == 0) {
				site_login_username_not_valid();
			}

			$sql = "UPDATE users SET username='".$socialclubname."' WHERE id = '".$_SESSION['username']['secure_first']."'";
   
			if (mysqli_query($conn, $sql)) {
				site_myprofile_done();
			} else {
				site_myprofile_done_error();
			}
			mysqli_close($conn);
		}
	}		
}

if ($myprofile == "changepass") {
	if(isset($_POST['myprofilechange'])){
		if(empty($_POST['password'])){
			site_login_notfound_done();
		}
		else
		{	
			$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
			$hashPassword = password_hash($password,PASSWORD_BCRYPT);

			// The 2nd check to make sure that nothing bad can happen.
			if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
				site_login_max_pass_long();
			}

			$sql = "UPDATE users SET password='".$hashPassword."' WHERE id = '".$_SESSION['username']['secure_first']."'";
   
			if (mysqli_query($conn, $sql)) {
				site_myprofile_done();
			} else {
				site_myprofile_done_error();
			}
			mysqli_close($conn);
		}
	}		
}

if ($myprofile == "changesignote") {
	if(isset($_POST['myprofilechange'])){
		if(empty($_POST['usersig'])){
			site_login_notfound_done();
		}
		else
		{	
			$usersig = filter_input(INPUT_POST, 'usersig', FILTER_SANITIZE_STRING);

			// The 2nd check to make sure that nothing bad can happen.
			if (preg_match('/[A-Za-z0-9]+/', $_POST['usersig']) == 0) {
				site_login_username_not_valid();
			}

			$sql = "UPDATE users SET usersig='".$usersig."' WHERE id = '".$_SESSION['username']['secure_first']."'";
   
			if (mysqli_query($conn, $sql)) {
				site_myprofile_done();
			} else {
				site_myprofile_done_error();
			}
			mysqli_close($conn);
		}
	}		
}

if ($myprofile == "changemail") {
	if(isset($_POST['myprofilechange'])){
		if(empty($_POST['email'])){
			site_login_notfound_done();
		}
		else
		{	
			$email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

			// The 2nd check to make sure that nothing bad can happen.
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				site_login_user_no_valid_email();
			}

			$sql = "UPDATE users SET email='".$email."' WHERE id = '".$_SESSION['username']['secure_first']."'";
   
			if (mysqli_query($conn, $sql)) {
				site_myprofile_done();
			} else {
				site_myprofile_done_error();
			}
			mysqli_close($conn);
		}
	}		
}

site_header();
site_navi_logged();
site_content_logged();

if ($myprofile == "dashboard") {

echo "
	  <div class='content'>
		<div class='row'>
			<div class='col-md-12'>
				<div class='card'>
					<div class='card-header'>
						<h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
						<p class='category'>User Control Panel | ".USERPROFILECHANGE."</p>
					</div>
					<div class='card-body'>
						<div class='row'>
							<div class='col-md-4'>
								<div class='card card-user'>
									<div class='image'>
										<img src='themes/".SITE_THEMES."/assets/img/bg5.jpg' alt='...'>
									</div>
									<div class='card-body'>
										<div class='author'>
											<a href='#'>
												<img class='avatar border-gray' src='themes/".SITE_THEMES."/assets/img/usernote.jpg' alt='...'>
												<h5 class='title'>
													".CHANGE_MYPROFILE_DASHNOTE."
												</h5>
											</a>
										</div>
										<p class='description text-center'>
											<div style='padding:2px;width:100%;'>
												<div class='rules-item mb-6'>
													<div class='ti-content'>
														<div class='ti-text'>
															<span><b>".MYPROFILENOTE."</span></b><br />
														</div>
													</div>
												</div>
											</div>				
										</p>
									</div>
								</div>
							</div>
						<div class='col-md-8'>
							<div class='card card-user'>
								<div class='image'>
									<img src='themes/".SITE_THEMES."/assets/img/bg5.jpg' alt='...'>
								</div>
								<div class='card-body all-icons'>
									<div class='author'>
										<a href='#'>
											<img class='avatar border-gray' src='themes/".SITE_THEMES."/assets/img/user.jpg' alt='...'>
											<h5 class='title'>
												".USERPROFILECHANGE."
											</h5>
										</a>
									</div>
									<span class='card-plain'>                				
										<div class='font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6' style='float:left;'>
											<div class='font-icon-detail'>
												<i class='now-ui-icons users_single-02'></i>
													<p><a href='".$_SERVER['PHP_SELF']."?myprofile=changeuname'>".CHANGE_MYPROFILE_USERNAME."</a></p>
											</div>
										</div>
										<div class='font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6' style='float:left;'>
											<div class='font-icon-detail'>
												<i class='now-ui-icons ui-2_settings-90'></i>
												<p><a href='".$_SERVER['PHP_SELF']."?myprofile=changepass'>".CHANGE_MYPROFILE_PASSWORD."</a></p>
											</div>
										</div>
										<div class='font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6' style='float:left;'>
											<div class='font-icon-detail'>
												<i class='now-ui-icons ui-1_email-85'></i>
												<p><a href='".$_SERVER['PHP_SELF']."?myprofile=changemail'>".CHANGE_MYPROFILE_EMAIL."</a></p>
											</div>
										</div>
										<div class='font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6' style='float:left;'>
											<div class='font-icon-detail'>
												<i class='now-ui-icons text_align-center'></i>
												<p><a href='".$_SERVER['PHP_SELF']."?myprofile=changesignote'>".CHANGE_MYPROFILE_SIGNATUR."</a></p>
											</div>
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>									
			</div>
		 </div>
	  </div>
    </div>";
}

if ($myprofile == "changeuname") {
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
                    </thead>
                    <tbody>";
				$sql = "SELECT socialclubname FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo "						
					<form action='".$_SERVER['PHP_SELF']."?myprofile=changeuname' method='post' enctype='multipart/form-data'>
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
}

if ($myprofile == "changepass") {
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
							".PASSWORD."
							<small class='text-muted'>".RPSERVER."</small>
						</h6>
					  </th>					  						  
                    </thead>
                    <tbody>";
				$sql = "SELECT password FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo "						
					<form action='".$_SERVER['PHP_SELF']."?myprofile=changeuname' method='post' enctype='multipart/form-data'>
                      <tr>
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
}

if ($myprofile == "changemail") {
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
							".EMAIL."
							<small class='text-muted'>".TWITTER."</small>
						</h6>
                      </th>					  						  
                    </thead>
                    <tbody>";
				$sql = "SELECT email FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo "						
					<form action='".$_SERVER['PHP_SELF']."?myprofile=changemail' method='post' enctype='multipart/form-data'>
                      <tr>					  
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
}

if ($myprofile == "changesignote") {
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
							".SIGNATUR."
							<small class='text-muted'>".SIGNOTE."</small>
						</h6>
                      </th>					  						  
                    </thead>
                    <tbody>";
				$sql = "SELECT usersig FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo "						
					<form action='".$_SERVER['PHP_SELF']."?myprofile=changesignote' method='post' enctype='multipart/form-data'>
                      <tr>											  
					  	<td>
					  		<div class='input-group'>
						  		<div class='input-group-prepend'>
							  		<div class='input-group-text'>
								  		<i class='now-ui-icons business_badge'></i>
							  		</div>      
						  		</div>						
						  		<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='usersig' size='50' maxlength='160' class='form-control' value='" . $row["usersig"]. "' required>
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
}

site_footer();	
?>