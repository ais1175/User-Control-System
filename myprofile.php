<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.0
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

site_secure();

if(isset($_POST['submit'])){
	
	$securecode = $row["id"];
	$email 	= stripslashes($_POST['email']);	
	$socialClub = stripslashes($_POST['socialClub']);
	$password = stripslashes($_POST['password']);
	$hashPassword = password_hash($password,PASSWORD_BCRYPT);
	
		
	$sql = "UPDATE accounts SET email='".$email."', socialClub='".$socialClub."', password='".$hashPassword."' WHERE id = '".$_COOKIE["secure"]."'";
   
   if (mysqli_query($conn, $sql)) {
      site_myprofile_done();
   } else {
      site_myprofile_done_error();
   }
   mysqli_close($conn);	
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
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
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
                    	<span data-notify='message'>Du musst bei jeder Änderung alle Felder ausfühlen!</span>
					</div>
                </div>
			  <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class=' text-primary'>			  
                      <th>
						<h6>
							Social Club
							<small class='text-muted'>Für die Whitelist</small>
						</h6>
                      </th>
                      <th>
						<h6>
							E-Mail
							<small class='text-muted'>Für das kommende Twitter Modul</small>
						</h6>
                      </th>
                      <th>
						<h6>
							Passwort
							<small class='text-muted'>UCP sowie für den Game Server</small>
						</h6>
                      </th>						  
                    </thead>
                    <tbody>";
				$sql = "SELECT socialClub, password, email FROM accounts WHERE id = ".$_COOKIE["secure"]."";
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
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='socialClub' size='50' maxlength='60' class='form-control' value='" . $row["socialClub"]. "' required>
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
							<button type='submit' name='submit' class='btn btn-primary btn-round'>
								<i class='now-ui-icons ui-1_check'></i> Speichern
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
  </div>";

site_footer();	
?>