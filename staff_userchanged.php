<?php 
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.2
// * 
// * Copyright (c) 2020 - 2021 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");
	
site_secure();
secure_url();

site_secure_staff_check();

if (isset($_GET["ucpchanger"])) $ucpchanger = trim(htmlentities($_GET["ucpchanger"]));
elseif (isset($_POST["ucpchanger"])) $ucpchanger = trim(htmlentities($_POST["ucpchanger"]));
else $ucpchanger = "view";

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

site_header("".STAFF_USERCAHNEGED."");
site_navi_logged();
site_content_logged();
$sql = "SELECT id, username, email, socialclubname, betaAcess from users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($userchange = $result->fetch_assoc()) {
    if ($ucpchanger == "" . $userchange["id"]. "") {

      if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['socialclubname'])){
          site_login_notfound_done();
        } else {
          $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
          $email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
          $socialclubname 	= filter_input(INPUT_POST, 'socialclubname', FILTER_SANITIZE_STRING);
          $betaAcess 	= filter_input(INPUT_POST, 'betaAcess', FILTER_SANITIZE_STRING);

			// The 2nd check to make sure that nothing bad can happen.    
			if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
				site_login_username_not_valid();
			}
			if (preg_match('/[A-Za-z0-9]+/', $_POST['email']) == 0) {
			      site_login_username_not_valid();
			}
			if (preg_match('/[A-Za-z0-9]+/', $_POST['socialclubname']) == 0) {
				site_login_username_not_valid();
			}
			if (preg_match('/[A-Za-z0-9]+/', $_POST['betaAcess']) == 0) {
				site_login_username_not_valid();
			}
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				site_login_user_no_valid_email();
			}

	        $sql = "UPDATE users SET username='".$username."', email='".$email."', socialclubname='".$socialclubname."', betaAcess='".$betaAcess."' WHERE id = ".$userchange['id']."";
   
          if (mysqli_query($conn, $sql)) {
            site_userchanged_done();
          } else {
            site_myprofile_done_error();
          }
          mysqli_close($conn);
        }            		
      }
      if(isset($_POST['delete'])){
        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['socialclubname'])){
          site_login_notfound_done();
        } else {
          $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
          $email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
          $socialclubname 	= filter_input(INPUT_POST, 'socialclubname', FILTER_SANITIZE_STRING);
          $betaAcess 	= filter_input(INPUT_POST, 'betaAcess', FILTER_SANITIZE_STRING);

			// The 2nd check to make sure that nothing bad can happen.    
			if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
				site_login_username_not_valid();
			}
			if (preg_match('/[A-Za-z0-9]+/', $_POST['email']) == 0) {
			      site_login_username_not_valid();
			}
			if (preg_match('/[A-Za-z0-9]+/', $_POST['socialclubname']) == 0) {
				site_login_username_not_valid();
			}
			if (preg_match('/[A-Za-z0-9]+/', $_POST['betaAcess']) == 0) {
				site_login_username_not_valid();
			}
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				site_login_user_no_valid_email();
			}

	        $sql = "DELETE FROM users WHERE id = ".$userchange['id']."";
   
          if (mysqli_query($conn, $sql)) {
            site_userchanged_done();
          } else {
            site_myprofile_done_error();
          }
          mysqli_close($conn);
        }            		
      }	  
    }
  }
}
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".STAFF_USERCAHNEGED."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								<div class='table-responsive'>
									<table class='table'>
										<thead class=' text-primary'>
											<th>
												".STAFF_USERCONTROLUSERID."
											</th>
											<th>
												".STAFF_USERCONTROLUSERNAME."
											</th>					  
											<th>
												".STAFF_USERCONTROLSOCIALCLUB."
											</th>
											<th>
												".STAFF_USERCONTROLEMAIL."
											</th>				  
											<th>
												".STAFF_USERCONTROLACCOUNTWHITELIST."
											</th>
											<th>
												".STAFF_USERCONTROLOPTION."
											</th>					  
										</thead>
									<tbody>";

									$sql = "SELECT id, username, email, socialclubname, betaAcess from users ORDER BY id ASC LIMIT ".$start_from.", ".$limit."";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while($userchange = $result->fetch_assoc()) {
										echo "
											<form method='post' action='".$_SERVER['PHP_SELF']."?ucpchanger=".$userchange['id']."' enctype='multipart/form-data'>
												<tr>
													<td>
														<p style='box-shadow: 0 0 1px rgba(0,0,0, .4);' class='btn btn-*'>" . $userchange["id"]. "</p>
													</td>
													<td>			
														<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='username' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $userchange["username"]. "' required>
													</td>
													<td>						
														<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='socialclubname' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $userchange["socialclubname"]. "' required>
													</td>						
													<td>						
														<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='email' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $userchange["email"]. "' required>
													</td>
													<td>
														<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='betaAcess' size='1' maxlength='1' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $userchange["betaAcess"]. "' required>
													</td>
													<td>
														<button type='submit' class='btn btn-primary' name='submit'>".STAFF_USERCONTROLSAVE."</button></submit>&nbsp;
														<button type='submit' class='btn btn-primary' name='delete'>".STAFF_USERCONTROLDELETE."</button></submit>
													</td>													
												</tr>						
											</form>";
										}
									}					

									echo "		  
										</tbody>
									</table>";
									
									$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM users"); 
									$userchange_db = mysqli_fetch_row($result_db);  
									$total_records = $userchange_db[0];  
									$total_sites = ceil($total_records / $limit); 
									$siteLink = "
									<nav>
										<ul class='pagination'>";  
									for ($i=1; $i<=$total_sites; $i++) {
										$siteLink .= "
											<li class='bg-teal'>
												<a class='waves-effect' href='".$_SERVER['PHP_SELF']."?site=".$i."'>".$i."</a>
											</li>";	
									}
									echo $siteLink . "
										</ul>
									</nav>
								</div>
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
  site_footer();	
?>