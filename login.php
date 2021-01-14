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

if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['login'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		site_login_notfound_done();
	}
	else
	{	
		session_regenerate_id();
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

		// The 2nd check to make sure that nothing bad can happen.
		if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
			site_login_username_not_valid();
		}
		if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
			site_login_max_pass_long();
		}

		$sql = "select * from users where username = '".$username."' LIMIT 1";
		$rs = mysqli_query($conn,$sql);
		$numRows = mysqli_num_rows($rs);
	
		if($numRows  == 1){
			$account = mysqli_fetch_assoc($rs);
			if(password_verify($password,$account['password'])){
				$sqlsession = "SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section site_online, site_name from config WHERE id = 1";
				$resultsession = $conn->query($sqlsession);

				if ($resultsession->num_rows > 0) {
					// output data of each row
					while($session = $resultsession->fetch_assoc()) {
						if ($session["site_online"] == "1") {
							$_SESSION['username']['site_settings_site_online'] = $session["site_online"];
							$_SESSION['username']['site_settings_site_name'] = $session["site_name"];
							$_SESSION['username']['site_settings_dl_section'] = $session["site_dl_section"];
							$_SESSION['username']['site_settings_dl_section_ragemp'] = $session["site_rage_section"];
							$_SESSION['username']['site_settings_dl_section_altv'] = $session["site_altv_section"];
							$_SESSION['username']['site_settings_dl_section_fivem'] = $session["site_fivem_section"];
						}
					}
				}
				
				$_SESSION['username']['secure_first'] = $account["id"];
				$_SESSION['username']['secure_granted'] = "granted";
				$_SESSION['username']['secure_staff'] = $account["adminLevel"];
				$_SESSION['username']['secure_lang'] = $account["language"];
				$_SESSION['username']["secure_key"] = sitehash($username);

				header("Location:dashboard.php");
			}else{
				site_login_password_none_correct();
			}
		}else{
			site_login_user_notfound();
		}
		mysqli_close($conn);
	}	
}

site_header_nologged("".LOGIN."");
site_navi_nologged();
site_content_nologged();
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".LOGIN."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='row clearfix'>
								<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
									<div class='form-group'>
										<div class='form-line'>
											<label class='title' for='exampleFormControlInput1'><i class='material-icons'>person</i> ".SOCIALCLUBNAME."</label>
											<input required aria-label='Social Club Name' type='text' name='username' class='form-control' placeholder='".SOCIALCLUBNAME." *' value='' maxlength='30' id='exampleInputEmail1' autocomplete='off'/>
										</div>
									</div>										
									<div class='form-group'>										
										<div class='form-line'>
											<label class='title' for='exampleFormControlInput1'><i class='material-icons'>lock</i> ".PASSWORD."</label>
											<input required aria-label='Password' type='password' name='password' class='form-control' placeholder='".PASSWORD." *' value='' maxlength='30' id='exampleInputPassword1' autocomplete='off'/>
										</div>				
									</div>				
									<button type='submit' class='btn btn-primary' name='login'>".LOGIN."</submit>					
								</form>	
                            </p>
                        </div>			
                    </div>					
                </div>
            </div>";
site_footer();	  
?>