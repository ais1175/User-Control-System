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
                <p class='category'>User Control Panel | User Profile</p>
              </div>
              <div class='card-body'>
			<div class='row'>
		    <div class='col-md-4'>
            <div class='card card-user'>
              <div class='image'>
                <img src='themes/".SITE_THEMES."/assets/img/bg5.jpg' alt='...'>
              </div>
              <div class='card-body'>
                <div class='author'>
                  <a href='#'>
                    <img class='avatar border-gray' src='themes/".SITE_THEMES."/assets/img/mike.jpg' alt='...'>
                    <h5 class='title'>
                    ".PLAYERNOTE2."
					          </h5>
                  </a>
                </div>
                <p class='description text-center'>
				<div style='padding:2px;width:100%;'>
					<div class='rules-item mb-6'>
						<div class='ti-content'>
							<div class='ti-text'>
								<span><b>".PLAYERNOTE1."</span></b><br />
							</div>
						</div>
					</div>
				</div>
				<br />				
                </p>
              </div>
            </div>
          </div>
		  <div class='col-md-8'>
            <div class='card card-user'>
              <div class='image'>
                <img src='themes/".SITE_THEMES."/assets/img/bg5.jpg' alt='...'>
              </div>
              <div class='card-body'>
                <div class='author'>
                  <a href='#'>
                    <img class='avatar border-gray' src='";
						$sql = "SELECT userava FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "" . $row["userava"]. "";
							}	
						}		
echo "' alt='...'>
                    <h5 class='title'>";
						$sql = "SELECT username FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo " " . $row["username"]. "";
							}
						}
echo "						
					</h5>
                  </a>
                </div>
                <p class='description text-center'>";
				$sql = "SELECT username, socialclubname, email, banAces, betaAcess, adminLevel, FirstLogin, usersig FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "
								<div class='table-responsive'>
									<table class='table'>
										<thead class=' text-primary'>               
											<tr>
												<th>
													".PLAYERID."
												</th>
												<th>
													".PLAYERSOCIALCLUB."
												</th>
												<th>
													".PLAYEREMAIL."
												</th>
												<th>
													".PLAYERBANNED."
												</th>
												<th>
													".PLAYERADMIN."
												</th>
												<th>
													".PLAYERWHITELISTED."
												</th>				
											</tr>
										</thead>
										<tbody>
												<tr>
													<td>
														".$_SESSION['username']['secure_first']."
													</td>
													<td>
														" . $row["socialclubname"]. "
													</td>
													<td>
														" . $row["email"]. "
													</td>
													<td>
														" . $row["banAces"]. "
													</td>
													<td>
														" . $row["adminLevel"]. "
													</td>
													<td>
														" . $row["betaAcess"]. "
													</td>						
												</tr>      
										</tbody>
									</table>
								</div>
								<br>
								<span class='text-center'>" . $row["usersig"]. "</span>";
					}
				}
							
echo "
                </p>
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