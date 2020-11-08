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

site_secure_staff_check();

if (isset($_GET["ucpchanger"])) $ucpchanger = trim(htmlentities($_GET["ucpchanger"]));
elseif (isset($_POST["ucpchanger"])) $ucpchanger = trim(htmlentities($_POST["ucpchanger"]));
else $ucpchanger = "view";

site_header();
site_navi_logged();
site_content_logged();
$sql = "SELECT id, username, email, socialclubname, betaAcess from users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($ucpchanger == "" . $row["id"]. "") {

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

	        $sql = "UPDATE users SET username='".$username."', email='".$email."', socialclubname='".$socialclubname."', betaAcess='".$betaAcess."' WHERE id = ".$row['id']."";
   
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
      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Team Account Control System - ".STAFF_USERCAHNEGED."</p>
              </div>
              <div class='card-body'>
			  <div class='row'>	
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title'> Team Account Control System - ".STAFF_USERCAHNEGED."</h4>
              </div>
              <div class='card-body'>
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
                    <form method='post' action='".$_SERVER['PHP_SELF']."?ucpchanger=".$row['id']."' enctype='multipart/form-data'>
                      <tr>
                        <td>
                          <p style='box-shadow: 0 0 1px rgba(0,0,0, .4);' class='btn btn-*'>" . $row["id"]. "</p>
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
                          <button type='submit' class='btn btn-primary' name='submit'>".STAFF_USERCONTROLSAVE."</submit>
                        </td>
                      </tr>						
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