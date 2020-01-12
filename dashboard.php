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

$username = trim($row["username"]);
$sql = "select id from accounts where username = '".$username."'";
$rs = mysqli_query($conn,$sql);

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
                <p class='category'>User Control Panel | Dashboard</p>
              </div>
              <div class='card-body'>		  
			<div class='row'>			
				<div class='col-sm-12'>
					<b>Willkommen ";
					$id = 0 + $_COOKIE["secure"];
					$securecode = $row["id"];
					$sql = "SELECT username FROM accounts WHERE id = ".$_COOKIE["secure"]."";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo"".$row["username"]."";
						}
					}		
echo "						
					 im Dashboard!
				</div>				
			</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();	
?>