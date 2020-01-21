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
                <h4 class='card-title'> Team Account Control System - Spielerliste</h4>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class=' text-primary'>
                      <th>
                        Spieler Nummer
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
                        Account Whitelist
                      </th>
                    </thead>
                    <tbody>";

			$sql = "SELECT id, username, email, socialClub, isWhitelisted FROM accounts ORDER BY username";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
						// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "
                      <tr>
                        <td>
                          " . $row["id"]. "
                        </td>
                        <td>
                          " . $row["username"]. "
                        </td>						
                        <td>
                          " . $row["socialClub"]. "
                        </td>
                        <td>
                          " . $row["email"]. "
                        </td>
                        <td>
                          " . $row["isWhitelisted"]. "
                        </td>
                      </tr>";
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