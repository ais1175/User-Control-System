<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1
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

if(isset($_POST['tweeting'])){
		$username = stripslashes($_POST['username']);
		$msg 	= stripslashes($_POST['msg']);	
		
		$sql = "insert into tweets (username, msg) value('".$username."', '".$msg."')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			site_tweetings_done();
		}
		$conn->close();
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
		<div class='row'>
		  <div class='col-md-12'>
              <div class='card'>
			  <div class='col-md-12'>
                <div class='author'>
                    <h5 class='title'>
					<div class='col-md-12'>
						<p class='description text-center'>
							<div style='padding:2px;width:100%;'>
								<div class='rules-item mb-6'>
									<div class='ti-content'>
										<div class='ti-text'>
											<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
												<div class='form-row'>
													<div class='col-sm-1'>
														<div class='avatar' style='float: left;'>
															<div class='author'>
																<div class='title'>
																	<img class='avatar border-gray' src='../themes/destiny-life/assets/img/mike.jpg' alt='...'>
																</div>
															</div>
														</div>";
															$id = 0 + $_COOKIE["secure"];
															$securecode = $row["id"];
															$sqlx = "SELECT username FROM accounts WHERE id = ".$_COOKIE["secure"]."";
															$resultx = $conn->query($sqlx);

															if ($resultx->num_rows > 0) {
																// output data of each row
																while($row = $resultx->fetch_assoc()) {
												echo"
																		<div class='category'>
																				".$row["username"]."
																		</div>
													</div>
													<div class='col-sm-2'>
														<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Deine Tweet Nachricht' type='text' name='username' class='form-control' value='" . $row["username"]. "' placeholder='Was gibt es Neues ?' value='' maxlength='10' id='border-right6'/>			
													</div>";
																}
															}		
													echo "
													<div class='col-sm-8'>
														<input required style='box-shadow: 0 0 1px rgba(0,0,0, .4);' aria-label='Deine Tweet Nachricht' type='text' name='msg' class='form-control' placeholder='Was gibt es Neues ?' value='' maxlength='220' id='border-right6'/>			
													</div>
													<div class='col-sm-1'>
														<button type='submit' class='form-control btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret' name='tweeting'><i class='now-ui-icons ui-1_check'></i></submit>			
													</div>													
												</div>				
											</form>	
										</div>
									</div>
								</div>
							</div>			
						</p>
					</div>
					</h5>
                  </a>
				  </div>
                </div>
				<div class='col-md-12'>
                <div class='description'>";
				
				
				$sql = "SELECT username, msg FROM tweets";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "
						<br>
						<div class='card'>
							<div class='category'>
								<div class='img img-raised'>
									<h5>
										<div class='font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6'>
											<i class='now-ui-icons users_single-02' style='float: left;'><p style='float: right;'>" . $row["username"]. "</p></i>
										</div>								
									</h5>
								</div>
							</div>
							<br>
							<br>
							<div class='category'>
								<div class='col-sm-12'>
									<h5>" . $row["msg"]. "</h5>
								</div>
							</div>
						</div>";
					}
				}
							
echo "
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