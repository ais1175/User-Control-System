<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.1
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

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

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

										$sql = "SELECT id, username, email, socialclubname, betaAcess FROM users ORDER BY id ASC LIMIT ".$start_from.", ".$limit."";
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
									</table>";
									
									$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM users"); 
									$row_db = mysqli_fetch_row($result_db);  
									$total_records = $row_db[0];  
									$total_sites = ceil($total_records / $limit); 
									$siteLink = "
									<nav>
										<ul class='pagination'>";  
									for ($i=1; $i<=$total_sites; $i++) {
										$siteLink .= "
											<li class='bg-teal'>
												<a class='waves-effect' href='".$_SERVER['PHP_SELF']."?site=".$i."'>".$i."</a>
											</li>";	
									}
									echo $siteLink . "
										</ul>
									</nav>
								</div>
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
site_footer();	
?>