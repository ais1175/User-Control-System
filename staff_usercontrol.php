<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.5
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

echo "
      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Team Account Control System - ".STAFF_USERCONTROL."</p>
              </div>
              <div class='card-body'>
			  <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title'> Team Account Control System - ".STAFF_USERCONTROL."</h4>
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
                    </thead>
                    <tbody>";

			$sql = "SELECT id, username, email, socialclubname, betaAcess FROM users ORDER BY username";
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
                          " . $row["socialclubname"]. "
                        </td>
                        <td>
                          " . $row["email"]. "
                        </td>
                        <td>
                          " . $row["betaAcess"]. "
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
      </div>
    </div>";
site_footer();	
?>