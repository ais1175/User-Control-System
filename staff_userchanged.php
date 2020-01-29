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
	
site_secure();
secure_url();

site_secure_staff_check();

site_header();
site_navi_logged();
site_content_logged();

if(isset($_POST['submit'])){
  if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['socialclubname'])){
    site_login_notfound_done();
  }
  else
  {
	  $securecode = $row["id"];
	  $username = strip_tags(trim(htmlspecialchars($_POST['username'])));
	  $email 	= strip_tags(trim(htmlspecialchars($_POST['email'])));	
	  $socialclubname = strip_tags(trim(htmlspecialchars($_POST['socialclubname'])));
	  $betaAcess = strip_tags(trim(htmlspecialchars($_POST['betaAcess'])));
    
    // CHECK USERNAME FROM KEY
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
    
    // CHECK VALID USER EMAIL
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			site_login_user_no_valid_email();
		}

	  $sql = "UPDATE users SET username='".$username."', email='".$email."', socialclubname='".$socialclubname."', betaAcess='".$betaAcess."' ORDER BY id";
   
    if (mysqli_query($conn, $sql)) {
      site_userchanged_done();
    } else {
      site_myprofile_done_error();
    }
    mysqli_close($conn);
  }    		
}

echo "
      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Team Account Control System - Spielerliste</p>
              </div>
              <div class='card-body'>
			<div class='row'>	
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title'> Team Account Control System - Spieler bearbeiten</h4>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class=' text-primary'>
                      <th>
                        ID
                      </th>
                      <th>
                        Username
                      </th>					  
                      <th>
                        Social Club
                      </th>
                      <th>
                        E-Mail
                      </th>				  
                      <th>
                        Whitelisten
                      </th>
                      <th>
                        Option
                      </th>					  
                    </thead>
                    <tbody>";

			$sql = "SELECT id, username, email, socialclubname, betaAcess from users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
						// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "
					<form method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>
                      <tr>
                        <td>
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='id' size='5' maxlength='5' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["id"]. "' required>
                        </td>
                        <td>			
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='username' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["username"]. "' required>
                        </td>
                        <td>						
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='socialclubname' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["socialclubname"]. "' required>
                        </td>						
                        <td>						
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='email' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["email"]. "' required>
                        </td>
                        <td>
						  <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='betaAcess' size='2' maxlength='2' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["betaAcess"]. "' required>
                        </td>
                        <td>
                          <button type='submit' class='btn btn-primary' name='submit'>ändern</submit>
                        </td>						
					</form>";
				}
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
        </div>
      </div>
    </div>";
site_footer();	
?>