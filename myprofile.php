<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.1
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

if ($myprofile == "changeava") {
	if (isset($_POST['myprofilechange'])) {
		// for the database
		$profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
		// For image upload
		$target_dir = "".UPLOAD_AVATAR_FOLDER."";
		$target_file = $target_dir . basename($profileImageName);
		// VALIDATION
		// validate image size. Size is calculated in Bytes
		if($_FILES['profileImage']['size'] > 250000) {
			site_myprofile_done_error();
		}				
		// check if file exists
		if(file_exists($target_file)) {
			site_myprofile_done_error();
		}
		// Upload image only if no errors
		if (empty($error)) {
			if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
				$useravasql = "UPDATE users SET userava='".UPLOAD_AVATAR_FOLDER."".$profileImageName."' WHERE id = '".$_SESSION['username']['secure_first']."'";
			if(mysqli_query($conn, $useravasql)){
				site_myprofile_done();
			} else {
				site_myprofile_done_error();
			}
		} else {
			site_myprofile_done_error();
		}
	}
	mysqli_close($conn);
	}
}

if ($myprofile == "changelanguage") {
	if(isset($_POST['myprofilechange'])){
		if(empty($_POST['language'])){
			site_login_notfound_done();
		}
		else
		{	
			$language 	= filter_input(INPUT_POST, 'language', FILTER_SANITIZE_STRING);

			$sql = "UPDATE users SET language='".$language."' WHERE id = '".$_SESSION['username']['secure_first']."'";
   
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
            <div class='row clearfix'>
                <div class='col-xs-12 col-sm-3'>
                    <div class='card profile-card'>
                        <div class='profile-header'>&nbsp;</div>
                        <div class='profile-body'>
                            <div class='image-area'>";
								$sql = "SELECT userava FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										echo "
											<img src='".htmlentities($row['userava'], ENT_QUOTES, 'UTF-8')."' alt='User Avatar' />";
									}	
								}		
echo "
                            </div>
                            <div class='content-area'>
                                <h3>";
									$sql = "SELECT username FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
									// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "
											".htmlentities($row['username'], ENT_QUOTES, 'UTF-8')."";
										}
									}
echo "
								</h3>
                            </div>
                        </div>
                    </div>

                    <div class='card card-about-me'>
                        <div class='header'>
                            <h2>".PLAYERABOUTME."</h2>
                        </div>
                        <div class='body'>";
				$sql = "SELECT username, socialclubname, email, banAces, betaAcess, adminLevel, FirstLogin, usersig FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "
                            <ul>
                                <li>
                                    <div class='title'>
                                        <i class='material-icons'>location_on</i>
                                        ".PLAYERSOCIALCLUB."
                                    </div>
                                    <div class='content'>
										".htmlentities($row['socialclubname'], ENT_QUOTES, 'UTF-8')."
                                    </div>
                                </li>
                                <li>
                                    <div class='title'>
                                        <i class='material-icons'>edit</i>
                                        ".PLAYEREMAIL."
                                    </div>
                                    <div class='content'>
										".htmlentities($row['email'], ENT_QUOTES, 'UTF-8')."
                                    </div>
                                </li>
                                <li>
                                    <div class='title'>
                                        <i class='material-icons'>notes</i>
                                        ".PLAYERWHITELISTED."
                                    </div>
                                    <div class='content'>
										".htmlentities($row['betaAcess'], ENT_QUOTES, 'UTF-8')."
                                    </div>
                                </li>
                                <li>
                                    <div class='title'>
                                        <i class='material-icons'>notes</i>
                                        ".PLAYERSIGNATURE."
                                    </div>
                                    <div class='content'>
										".htmlentities($row['usersig'], ENT_QUOTES, 'UTF-8')."
                                    </div>
                                </li>								
                            </ul>";
					}
				}
							
echo "
                        </div>
                    </div>
                </div>
                <div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>".USERPROFILECHANGE."</h2>
                        </div>
                        <div class='body'>
										<div class='panel panel-default panel-post'>
                                            <div class='panel-heading'>                				
												<div class='media'>
                                                    <div class='media-left'>
                                                        <a href='#'>
                                                            <i class='material-icons'>account_box</i>
                                                        </a>
                                                    </div>
                                                    <div class='media-body'>
                                                        <h4 class='media-heading'>
                                                            <a href='".$_SERVER['PHP_SELF']."?myprofile=changeuname'>".CHANGE_MYPROFILE_USERNAME."</a>
                                                        </h4>
                                                    </div>
                                                </div>
											</div>
										</div>
										<div class='panel panel-default panel-post'>
                                            <div class='panel-heading'>                				
												<div class='media'>
                                                    <div class='media-left'>
                                                        <a href='#'>
                                                            <i class='material-icons'>storage</i>
                                                        </a>
                                                    </div>
                                                    <div class='media-body'>
                                                        <h4 class='media-heading'>
                                                            <a href='".$_SERVER['PHP_SELF']."?myprofile=changepass'>".CHANGE_MYPROFILE_PASSWORD."</a>
                                                        </h4>
                                                    </div>
                                                </div>
											</div>
										</div>
										<div class='panel panel-default panel-post'>
                                            <div class='panel-heading'>                				
												<div class='media'>
                                                    <div class='media-left'>
                                                        <a href='#'>
                                                            <i class='material-icons'>email</i>
                                                        </a>
                                                    </div>
                                                    <div class='media-body'>
                                                        <h4 class='media-heading'>
                                                            <a href='".$_SERVER['PHP_SELF']."?myprofile=changemail'>".CHANGE_MYPROFILE_EMAIL."</a>
                                                        </h4>
                                                    </div>
                                                </div>
											</div>
										</div>
										<div class='panel panel-default panel-post'>
                                            <div class='panel-heading'>                				
												<div class='media'>
                                                    <div class='media-left'>
                                                        <a href='#'>
                                                            <i class='material-icons'>textsms</i>
                                                        </a>
                                                    </div>
                                                    <div class='media-body'>
                                                        <h4 class='media-heading'>
                                                            <a href='".$_SERVER['PHP_SELF']."?myprofile=changesignote'>".CHANGE_MYPROFILE_SIGNATUR."</a>
                                                        </h4>
                                                    </div>
                                                </div>
											</div>
										</div>
										<div class='panel panel-default panel-post'>
                                            <div class='panel-heading'>                				
												<div class='media'>
                                                    <div class='media-left'>
                                                        <a href='#'>
                                                            <i class='material-icons'>swap_calls</i>
                                                        </a>
                                                    </div>
                                                    <div class='media-body'>
                                                        <h4 class='media-heading'>
                                                            <a href='".$_SERVER['PHP_SELF']."?myprofile=changeava'>".CHANGE_MYPROFILE_AVATAR."</a>
                                                        </h4>
                                                    </div>
                                                </div>
											</div>
										</div>	
										<div class='panel panel-default panel-post'>
                                            <div class='panel-heading'>                				
												<div class='media'>
                                                    <div class='media-left'>
                                                        <a href='#'>
                                                            <i class='material-icons'>swap_calls</i>
                                                        </a>
                                                    </div>
                                                    <div class='media-body'>
                                                        <h4 class='media-heading'>
                                                            <a href='".$_SERVER['PHP_SELF']."?myprofile=changelanguage'>".CHANGE_MYPROFILE_LANGUAGE."</a>
                                                        </h4>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".SOCIALCLUBNAME."
								<small class='text-muted'>".WHITELIST."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>";
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
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
}

if ($myprofile == "changepass") {
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PASSWORD."
								<small class='text-muted'>".RPSERVER."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>";
				$sql = "SELECT password FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo "						
					<form action='".$_SERVER['PHP_SELF']."?myprofile=changepass' method='post' enctype='multipart/form-data'>
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
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
}

if ($myprofile == "changemail") {
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".EMAIL."
								<small class='text-muted'>".TWITTER."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>";	
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
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='email' size='50' maxlength='60' class='form-control' value='".htmlentities($row['email'], ENT_QUOTES, 'UTF-8')."' required>
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
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
}

if ($myprofile == "changesignote") {
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".SIGNATUR."
								<small class='text-muted'>".SIGNOTE."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>";	
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
						  		<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='usersig' size='50' maxlength='160' class='form-control' value='".htmlentities($row['usersig'], ENT_QUOTES, 'UTF-8')."' required>
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
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
}

if ($myprofile == "changeava") {
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".AVATAR."
								<small class='text-muted'>".AVANOTE."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>";	
				$sqlold = "SELECT userava FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$resultold = $conn->query($sqlold);

				if ($resultold->num_rows > 0) {
					// output data of each row
					while($row = $resultold->fetch_assoc()) {
echo "						
                      <tr>											  
					  	<td>
					  		<div class='input-group'>
						  		<div class='input-group-prepend'>
							  		<div class='input-group-text'>
								  		<i class='now-ui-icons business_badge'></i>
							  		</div>      
						  		</div>						
								<form action='".$_SERVER['PHP_SELF']."?myprofile=changeava' method='post' enctype='multipart/form-data' id='frmFileUpload' class='dropzone dz-clickable'>
									<div class='form-group text-center' style='position: relative;' >
										<span class='img-div'>
											<div class='text-center img-placeholder' onClick='triggerClick()'>
												<div class='dz-message'>
													<div class='drag-icon-cph'>
														<i class='material-icons'>touch_app</i>
													</div>
													<h3>".CHANGE_MYPROFILE_AVATAR."</h3>
													<em>".CHANGE_MYPROFILE_AVATARNOTE."</em>
												</div>
											</div>
											<img src='".htmlentities($row['userava'], ENT_QUOTES, 'UTF-8')."' onClick='triggerClick()' id='profileDisplay'>
										</span>
										<input type='file' name='profileImage' onChange='displayImage(this)' id='profileImage' class='form-control' style='display: none;'>
									</div>
					  		</div>	
				  		</td>						
				      </tr>					  
                      <tr>					  
						<td>						
							<div class='form-group'>
								<button type='submit' name='myprofilechange' class='btn btn-primary waves-effect'>".MYPROFILESAVE."</button>
							</div>
                        </td>							
                      </tr>";
					}
					mysqli_close($conn);
				}					
echo "	 
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
}

if ($myprofile == "changelanguage") {
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".LANGUAGE."
								<small class='text-muted'>".LANGUAGENOTE."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>";	
				$sql = "SELECT language FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo "						
					<form action='".$_SERVER['PHP_SELF']."?myprofile=changelanguage' method='post' enctype='multipart/form-data'>
                      <tr>					  
                        <td>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>						
								<div class='bootstrap-select form-control'>
									<select name='language' class='form-control'>
                                        <option value=''>-- ".CHANGE_MYPROFILE_LANGUAGENOTE." --</option>
                                        <option value='en'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_EN."</option>
                                        <option value='de'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_DE."</option>
                                    </select>
								</div>
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
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
}

site_footer();	
?>