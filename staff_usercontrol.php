<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.0
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".STAFF_USERCONTROL."
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
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
site_footer();	
?>