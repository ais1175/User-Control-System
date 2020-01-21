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
	
$cookie = $_COOKIE["username"]; 

site_secure();

site_header();
site_navi_logged();
site_content_logged();

if(isset($_POST['submit'])){

	$securecode = $row["id"];
	$username = stripslashes($_POST['username']);
	$email 	= stripslashes($_POST['email']);	
	$socialClub = stripslashes($_POST['socialClub']);
	$isWhitelisted = stripslashes($_POST['isWhitelisted']);
		
	$sql = "UPDATE accounts SET username='".$username."', email='".$email."', socialClub='".$socialClub."', isWhitelisted='".$isWhitelisted."' WHERE id = '".$row["id"]."'";
   
   if (mysqli_query($conn, $sql)) {
      site_userchanged_done();
   } else {
      site_myprofile_done_error();
   }
   mysqli_close($conn);		
}

echo "
      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
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

			$sql = "SELECT id, username, email, socialClub, isWhitelisted from accounts GROUP BY ID";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
						// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "
					<form method='post' action='".$_SERVER['PHP_SELF']."?id=" . $row["id"]. "' enctype='multipart/form-data'>
                      <tr>
                        <td>
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='id' size='5' maxlength='5' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["id"]. "' required>
                        </td>
                        <td>			
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='username' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["username"]. "' required>
                        </td>
                        <td>						
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='socialClub' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["socialClub"]. "' required>
                        </td>						
                        <td>						
                          <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='email' size='50' maxlength='60' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["email"]. "' required>
                        </td>
                        <td>
						  <input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='isWhitelisted' size='2' maxlength='2' class='form-control text-left btn btn-flat btn-primary fc-today-button' value='" . $row["isWhitelisted"]. "' required>
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
      </div>";


site_footer();	
?>