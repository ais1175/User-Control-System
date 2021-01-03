<?php 
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.2
// * 
// * Copyright (c) 2020 - 2021 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

site_secure();
secure_url();

if (isset($_GET["like"])) $like = trim(htmlentities($_GET["like"]));
elseif (isset($_POST["like"])) $like = trim(htmlentities($_POST["like"]));
else $like = "view";

$limit = 3;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;


if(isset($_POST['tweeting'])){
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$msg 	= filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
	$posted 	= time();	
	// The 2nd check to make sure that nothing bad can happen. 	
	if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
		site_login_username_not_valid();
	}
	if (preg_match('/[A-Za-z0-9]+/', $_POST['msg']) == 0) {
		site_login_username_not_valid();
	}
	$sql = "insert into tweets (username, msg, posted) value('".$username."', '".$msg."', NOW())";
	$result = mysqli_query($conn, $sql);
	if($result) {
        echo "
        <div class='alert alert-info alert-with-icon' data-notify='container'>
                <button type='button' aria-hidden='true' class='close'>
                        <i class='now-ui-icons ui-1_simple-remove'></i>
                </button>
                <span data-notify='icon' class='now-ui-icons ui-1_bell-53'></span>
                <span data-notify='message'><b>".DASHBOARDTWITTERNOTE1."</b></span>
        </div>";
	}
	$conn->close();
	header("Location:dashboard.php");
	die();
}
$sqlh = "SELECT id, username, msg, liked, posted FROM tweets";
$resulth = mysqli_query($conn, $sqlh);
if ($resulth->num_rows > 0) {
  // output data of each row
	while($dashboard = $resulth->fetch_assoc()) {
		if ($like == "" . $dashboard["id"]. "") {		
			if(isset($_POST['like_tweet'])){
				$sqlg = "SELECT id, username, msg, liked, posted FROM tweets";
				$resultg = mysqli_query($conn, $sqlg);
				$adding1 = "1";
				$adding2 = $dashboard["liked"];
				$done = $adding1 + $adding2;
				if($resultg) {
					$sql2likedx = "UPDATE tweets SET liked='".$done."' WHERE id = " . $dashboard["id"]. "";
					$result2likedx = mysqli_query($conn, $sql2likedx);
					if($result2likedx)
					{
						site_tweetings_liked_done();
					}
				}
			}
		}
	}
}

if(isset($_POST['tweeting_del'])){
	$sql3 = "DELETE FROM tweets";
	$result3 = mysqli_query($conn, $sql3);
	if($result3)
	{
        echo "
				<div class='alert alert-success'>
					<strong>Well done!</strong> ".DASHBOARDTWITTERNOTE2."
				</div>";
	}
	$conn->close();
	header("Location:dashboard.php");
	die();
}

site_header("".DASHBOARD."");
site_navi_logged();
site_content_logged();

if(intval($_SESSION['username']['secure_staff']) >= 5) {
echo "
			<div class='row clearfix'>
                <div class='col-lg-6 col-md-6 col-sm-9 col-xs-12'>
                    <div class='info-box bg-cyan hover-expand-effect'>
                        <div class='icon'>
                            <i class='material-icons'>help</i>
                        </div>
                        <div class='content'>
                            <div class='text'>".DASHBOARDSUPPORT."</div>";

					$sqlsupport = "SELECT id FROM support ORDER by id DESC LIMIT 1";
					$resultsupport = $conn->query($sqlsupport);

					if ($resultsupport->num_rows > 0) {
						// output data of each row
						while($dashboard = $resultsupport->fetch_assoc()) {
							echo "
                            <div class='number count-to' data-from='0' data-to='".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."' data-speed='1000' data-fresh-interval='20'>".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."</div>";
						}
					}					

echo "
                        </div>
                    </div>
                </div>
                <div class='col-lg-6 col-md-6 col-sm-9 col-xs-12'>
                    <div class='info-box bg-orange hover-expand-effect'>
                        <div class='icon'>
                            <i class='material-icons'>person_add</i>
                        </div>
                        <div class='content'>
                            <div class='text'>".DASHBOARDUSERS."</div>";

					$sqlusers = "SELECT id FROM users ORDER by id DESC LIMIT 1";
					$resultusers = $conn->query($sqlusers);

					if ($resultusers->num_rows > 0) {
						// output data of each row
						while($dashboard = $resultusers->fetch_assoc()) {
							echo "
                            <div class='number count-to' data-from='0' data-to='".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."' data-speed='1000' data-fresh-interval='20'>".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."</div>";
						}
					}					

echo "							
                        </div>
                    </div>
                </div>
            </div>";
}
echo"			
			
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>";
					$query = "select * from news_lang";
					$result = mysqli_query($conn,$query);

					while($dashboard = mysqli_fetch_array($result)){
						$title_field = "title";
						$content_field = "content";
						if(isset($_SESSION['username']['secure_lang']) && $_SESSION['username']['secure_lang'] == 'de'){
							$title_field = "title_de";
							$content_field = "content_de";
						}
						$id = $dashboard['id'];
						$title = $dashboard[$title_field];
						$content = $dashboard[$content_field];
						$shortcontent = substr($content, 0, 260)."...";					
					echo "					
                        <div class='header' id='post_".$id."'>
                            <h2>
                                ".NEWS." ".$title."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='lead'>
                                $shortcontent
                            </p>
                        </div>";
					}
					echo "				
                    </div>
                </div>
            </div>
				
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".DASHBOARDTWITTER.": ".DASHBOARDTWITTERNOTE3."			
                            </h2>	
                        </div>
                        <div class='body'>
							<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>";
							$sqlx = "SELECT username FROM users WHERE id = ".$_SESSION['username']['secure_first']."";
							$resultx = $conn->query($sqlx);
							if ($resultx->num_rows > 0) {
								// output data of each row
								while($dashboard = $resultx->fetch_assoc()) {
							echo"
                                    <div class='title'>
										<div style='display:none;'>
											<input required style='box-shadow: 0 0 1px rgba(92,90,90,0.7);' type='text' name='username' class='form-control' value='".htmlentities($dashboard['username'], ENT_QUOTES, 'UTF-8')."' placeholder='' value='' maxlength='10' id='border-right6' />
										</div>
                                    </div>";
								}
							}		
							echo "
                                    <div class='content'>
                                        <textarea required style='background:rgba(92,90,90,0.7); box-shadow: 0px 12px 33px 0px rgba(62, 73, 84, 0.08);' type='text' name='msg' class='form-control form-line' placeholder='".DASHBOARDTWITTERNOTE3."' value='' maxlength='220' id='border-right6'/></textarea>	
                                    </div>
                                    <div class='title'></div><br>
                                    <div class='content'>
                                        <button class='btn btn-primary waves-effect' style='float:left;' name='tweeting'><i class='material-icons'>location_on</i> ".DASHBOARDTWITTER."</button>
							</form>";
							if(intval($_SESSION['username']['secure_staff']) >= 7) {
								echo " 	<form action='".$_SERVER['PHP_SELF']."?=tweeting_del' method='post' enctype='multipart/form-data'>
											<button type='submit' class='btn btn-primary waves-effect' style='float:right;' name='tweeting_del' data-placement-from='top' data-placement-align='right' data-animate-enter='' data-animate-exit='' data-color-name='bg-black'><i class='material-icons'>delete</i></button>
										</form>";
							}
						echo"
									</div>
                            <p class='lead'>
							<br>";

						$sqlposted = "SELECT id, username, msg, liked, posted FROM tweets ORDER BY id ASC LIMIT ".$start_from.", ".$limit."";
						$resultposted = $conn->query($sqlposted);

						if ($resultposted->num_rows > 0) {
							// output data of each row
							while($dashboard = $resultposted->fetch_assoc()) {
								echo "
							<div class='list-group'>
                                <a href='#' class='list-group-item'>
                                    <h4 class='list-group-item-heading'>
										<span>
											<h5 style='float: left'>
												".htmlentities($dashboard['username'], ENT_QUOTES, 'UTF-8')." - ".htmlentities($dashboard['posted'], ENT_QUOTES, 'UTF-8')."
											</h5>												
										</span>														
										<span>
											<form action='".$_SERVER['PHP_SELF']."?like=".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."' method='post' enctype='multipart/form-data'>
												<button class='btn btn-primary waves-effect' name='like_tweet' style='float: right;'><div class='demo-google-material-icon'> <i class='material-icons'>person</i> <span class='icon-name'>".htmlentities($dashboard['liked'], ENT_QUOTES, 'UTF-8')."</span> </div></button>
											</form>
										</span>
									</h4>
									<br>
                                    <p class='list-group-item-text'>
										<span>
											<h5>".htmlentities($dashboard['msg'], ENT_QUOTES, 'UTF-8')."</h5>
										</span>
                                    </p>
                                </a>
                            </div>";
							}
						}		
						$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM tweets"); 
						$tweets_db = mysqli_fetch_row($result_db);  
						$total_records = $tweets_db[0];  
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
                            </p>
						</div>
                    </div>					
                </div>
            </div>
            <div class='row clearfix'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                    <div class='card'>
                        <div class='header'>
                            <div class='row clearfix'>
                                <div class='col-xs-12 col-sm-6'>
                                    <h2>".DASHBOARDCPUUSE." (%)</h2>
                                </div>
                                <div class='col-xs-12 col-sm-6 align-right'>
                                    <div class='switch panel-switch-btn'>
                                        <span class='m-r-10 font-12'>".DASHBOARDCPUREALTIME."</span>
										<div class='switch'>
											<label>".DASHBOARDCPUUSEOFF."<input type='checkbox' id='realtime' checked=''><span class='lever switch-col-black'></span>".DASHBOARDCPUUSEON."</label>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='body'>
                            <div id='real_time_chart' class='dashboard-flot-chart'></div>
                        </div>
                    </div>
                </div>
            </div>";			  
	
site_footer();	
?>