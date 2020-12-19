<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.7
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

site_secure();
secure_url();

if (isset($_GET["support"])) $support = trim(htmlentities($_GET["support"]));
elseif (isset($_POST["support"])) $support = trim(htmlentities($_POST["support"]));
else $support = "view";

if ($support == "remoticket") {
	if(isset($_POST['sup_rem'])){
		$sql3 = "DELETE FROM support";
		$result3 = mysqli_query($conn, $sql3);
		if($result3)
		{
			site_header();
			site_navi_logged();
			site_content_logged();	
		echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".SUPPORTDELETEINFO."<br><br>".SUPPORTDELETE1."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
			$conn->close();
			site_footer();
			die();
		} 
	}		           		
} 

if ($support == "addticket") {
	if(isset($_POST['posted_sup'])){
		if(empty($_POST['username']) || empty($_POST['msg']) || empty($_POST['bug'])){
			site_login_notfound_done();
		}
		else
		{
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$msg 	= filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
			$bug 	= filter_input(INPUT_POST, 'bug', FILTER_SANITIZE_STRING);
			$posted 	= date('Y-m-d H:i:s');

			// CHECK USERNAME FROM KEY
			if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
				site_login_username_not_valid();
			}

			// CHECK USERNAME FROM KEY
			if (preg_match('/[A-Za-z0-9]+/', $_POST['msg']) == 0) {
				site_login_username_not_valid();
			}

			// CHECK USERNAME FROM KEY
			if (preg_match('/[A-Za-z0-9]+/', $_POST['bug']) == 0) {
				site_login_username_not_valid();
			}
			
			$sql = "insert into support (username, msg, bug, posted) value('".$username."', '".$msg."', '".$bug."', NOW())";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				site_support_posted_done();
			}
			$conn->close();
		}
	}
	
	site_header();
	site_navi_logged();
	site_content_logged();

echo"
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".SUPPORTINFO."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>"; 
			
				$sql = "SELECT username FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
echo"
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
					<form action='".$_SERVER['PHP_SELF']."?support=addticket' method='post' enctype='multipart/form-data'>
                      <tr>				  
                        <td>
							<h6 class='title'>
								".SUPPORTUSERNAME."
								<small class='text-muted'>".SUPPORTUSERINFO1."</small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='username' size='50' maxlength='60' class='form-control' value='".$row["username"]."' required>
							</div>	
                        </td>
					  </tr>
                      <tr>				  
                        <td>
							<h6 class='title'>
								".SUPPORTSUBJECT."
								<small class='text-muted'>".SUPPORTUSERINFO2."</small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='bug' size='50' maxlength='60' class='form-control' required>
							</div>	
                        </td>
					  </tr>
                      <tr>					  
                        <td>
							<h6 class='title'>
								".SUPPORTMSG."
								<small class='text-muted'>".SUPPORTUSERINFO3."</small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-1_settings-gear-63'></i>
									</div>      
								</div>				
								<textarea style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='msg' size='50' maxlength='260' class='form-control textarea' required></textarea>
							</div>	
                        </td>						
                      </tr>					  
                      <tr>					  
						<td>						
							<button type='submit' name='posted_sup' class='btn btn-primary btn-round'>
								<i class='now-ui-icons ui-1_check'></i> ".SUPPORTSAVE."
							</button>
							</submit>
                        </td>							
                      </tr>				  						
					</form>
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";

				}
				mysqli_close($conn);
			}

	site_footer();
	die();		
}

site_header();
site_navi_logged();
site_content_logged();

echo"
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".WELCOMETO." Support System!
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".SUPPORTADDTICKET1."
								<a href='".$_SERVER['PHP_SELF']."?support=addticket'><div class='btn btn-primary btn-round'>".SUPPORTADDTICKET2."</div></a>
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
			
if(intval($_SESSION['username']['secure_staff']) >= 3) {
echo"
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								<form method='post' action='".$_SERVER['PHP_SELF']."?support=remoticket' enctype='multipart/form-data'>
									<button type='submit' name='sup_rem' class='btn btn-primary btn-round'><i class='now-ui-icons ui-1_simple-remove'></i> ".SUPPORTDELETE2."</submit>
								</form>
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>

                <div class='table-responsive'>
                  <table class='table'>
                    <thead class=' text-primary'>
                      <th>
                        ".SUPPORTUSERID."
                      </th>
                      <th>
					  	".SUPPORTUSERNAME."
                      </th>					  
                      <th>
					  	".SUPPORTSUBJECT."
                      </th>
                      <th>
					  	".SUPPORTMSG."
                      </th>				  
                      <th>
					  	".SUPPORTDATE."
                      </th>				  
                    </thead>
                    <tbody>";
					
			$sql = "SELECT id, username, msg, bug, posted FROM support";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
						// output data of each row
				while($row = $result->fetch_assoc()) {
echo"					
                      <tr>
                        <td>
                          ".$row["id"]."
                        </td>
                        <td>
                          ".$row["username"]."
                        </td>						
                        <td>
                          ".$row["bug"]."
                        </td>
                        <td>
                          ".$row["msg"]."
                        </td>
                        <td>
                          ".$row["posted"]."
                        </td>					
                      </tr>";	  
				}
			}
echo"									  
                    </tbody>
                  </table>
                </div>";

}
echo"

                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";

site_footer();
?>
