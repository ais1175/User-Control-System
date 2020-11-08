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

function site_secure() {
	if(!isset($_SESSION['username']['secure_first']) || $_SESSION['username']['secure_granted'] !== 'granted') {
		site_header_nologged();
		site_navi_nologged();
		site_content_nologged();
		echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				        <div class='row'>			
					        <div class='col-sm-8'>
						        <b>".MSG_1."</b>				
					        </div>				
				        </div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
		site_footer();
		die();
	}  
}

function site_secure_staff_check() {
	if(intval($_SESSION['username']['secure_staff']) < 5) {
		site_header_nologged();
		site_navi_nologged();
		site_content_nologged();
		echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				        <div class='row'>			
					        <div class='col-sm-8'>
						        <b>".MSG_2."</b>				
					        </div>				
				        </div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
		site_footer();
		die();		
   }
}

function site_secure_staff() {
	if(intval($_SESSION['username']['secure_staff']) >= 5) {
		secure_url();
    echo "
		<div class='logo'>
			<a href='dashboard.php' class='simple-text logo-normal'>
				<i class='now-ui-icons business_badge'></i> ".SITESTAFF."
			</a>
		</div>   
          <li>
            <a href='./staff_userchanged.php'>
              <i class='now-ui-icons ui-2_settings-90'></i>
              <p>".STAFF_USERCAHNEGED."</p>
            </a>
          </li>	
          <li>
            <a href='./staff_usercontrol.php'>
              <i class='now-ui-icons design_bullet-list-67'></i>
              <p>".STAFF_USERCONTROL."</p>
            </a>
          </li>
          <li>
            <a href='./staff_faqacp.php'>
              <i class='now-ui-icons files_single-copy-04'></i>
              <p>".FAQ_HEADER."</p>
            </a>
          </li>		  
          <li>
            <a href='./staff_newsacp.php'>
              <i class='now-ui-icons education_paper'></i>
              <p>".STAFF_NEWSACP."</p>
            </a>
          </li>
          <li>
            <a href='./staff_rulesacp.php'>
              <i class='now-ui-icons shopping_tag-content'></i>
              <p>".STAFF_RULESACP."</p>
            </a>
          </li>";
	} 
}

function site_secure_member() {
		secure_url();
    echo "
		<div class='logo'>
			<a href='dashboard.php' class='simple-text logo-normal'>
				<i class='now-ui-icons business_badge'></i> ".USERACCOUNT."
			</a>
		</div>   
          <li>
            <a href='./user.php'>
              <i class='now-ui-icons users_single-02'></i>
              <p>".USERPROFILE."</p>
            </a>
          </li>
          <li>
            <a href='./myprofile.php?myprofile=dashboard'>
              <i class='now-ui-icons ui-2_settings-90'></i>
              <p>".USERPROFILECHANGE."</p>
            </a>
          </li>
          <li>
            <a href='./support.php'>
              <i class='now-ui-icons business_bulb-63'></i>
              <p>".USERSUPPORT."</p>
            </a>
          </li>";
}

function site_userchanged_done() {
  echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Team Account Control System - Spieler bearbeiten</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_3."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();	  
}

function site_support_posted_done() {
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
                <p class='category'>User Control Panel | Support - Dein Ticket</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_4."<br><br>".SUPPORTDELETE1."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();
}

// Tweet System MSG done
function site_tweetings_done() {	
  site_header();
  site_content_logged();
  site_navi_logged();
  echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Tweet System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_5."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();	  
}

// Tweet System LIKED done
function site_tweetings_liked_done() {	
  site_header();
  site_content_logged();
  site_navi_logged();
  echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Tweet System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_6."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();	  
}

function site_myprofile_done_error() {	
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
                <p class='category'>User Control Panel | Mein Account bearbeiten</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_7."
						<br>
						" . mysqli_error($conn) . "
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();
}

function site_myprofile_done() {	
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
                <p class='category'>User Control Panel | Mein Account bearbeiten</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_8."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();
}

function site_register_done() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();

  echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_9."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
}

function site_login_notfound_done() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();
  
 echo "
          <div class='content'>
           <div class='row'>
            <div class='col-md-12'>
              <div class='card'>
                <div class='card-header'>
                  <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                  <p class='category'>User Control Panel | Secure System</p>
                </div>
                <div class='card-body'>			  
                  <div class='row'>			
                    <div class='col-sm-8'>
                      ".MSG_10."
                    </div>				
                  </div>										
                </div>
              </div>
            </div>
          </div>
        </div>";
  site_footer();
  die();
}

function site_register_notfound_done() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();
    
  echo "
            <div class='content'>
             <div class='row'>
              <div class='col-md-12'>
                <div class='card'>
                  <div class='card-header'>
                    <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                    <p class='category'>User Control Panel | Secure System</p>
                  </div>
                  <div class='card-body'>			  
                    <div class='row'>			
                      <div class='col-sm-8'>
                        ".MSG_10."
                      </div>				
                    </div>										
                  </div>
                </div>
              </div>
            </div>
          </div>";
  site_footer();
  die();
}

function site_login_password_none_correct() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();

  echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_11."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();
}

function site_login_user_notfound() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();

  echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_12."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer();
  die();
}

function site_login_user_no_valid_email() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();
  
  echo "
          <div class='content'>
           <div class='row'>
            <div class='col-md-12'>
              <div class='card'>
                <div class='card-header'>
                  <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                  <p class='category'>User Control Panel | Secure System</p>
                </div>
                <div class='card-body'>			  
                  <div class='row'>			
                    <div class='col-sm-8'>
                      ".MSG_13."
                    </div>				
                  </div>										
                </div>
              </div>
            </div>
          </div>
        </div>";
  site_footer();
  die();
}

function site_login_username_not_valid() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();
  
  echo "
          <div class='content'>
           <div class='row'>
            <div class='col-md-12'>
              <div class='card'>
                <div class='card-header'>
                  <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                  <p class='category'>User Control Panel | Secure System</p>
                </div>
                <div class='card-body'>			  
                  <div class='row'>			
                    <div class='col-sm-8'>
                      ".MSG_14."
                    </div>				
                  </div>										
                </div>
              </div>
            </div>
          </div>
        </div>";
  site_footer();
  die();
}

function site_login_max_pass_long() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();
  
  echo "
          <div class='content'>
           <div class='row'>
            <div class='col-md-12'>
              <div class='card'>
                <div class='card-header'>
                  <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                  <p class='category'>User Control Panel | Secure System</p>
                </div>
                <div class='card-body'>			  
                  <div class='row'>			
                    <div class='col-sm-8'>
                      ".MSG_15."
                    </div>				
                  </div>										
                </div>
              </div>
            </div>
          </div>
        </div>";
  site_footer();
  die();
}

function site_login_user_already() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();
  
  echo "
          <div class='content'>
           <div class='row'>
            <div class='col-md-12'>
              <div class='card'>
                <div class='card-header'>
                  <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                  <p class='category'>User Control Panel | Secure System</p>
                </div>
                <div class='card-body'>			  
                  <div class='row'>			
                    <div class='col-sm-8'>
                      ".MSG_16."
                    </div>				
                  </div>										
                </div>
              </div>
            </div>
          </div>
        </div>";
  site_footer();
  die();
}

function site_logout() {	
  site_header_nologged();
  setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  session_destroy();
  site_navi_nologged();
  site_content_nologged();

  echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						".MSG_17."
					</div>				
				</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
  site_footer(); 
  exit();   
}

function site_news_not_done() {  
  echo "
            <div class='content'>
             <div class='row'>
              <div class='col-md-12'>
                <div class='card'>
                  <div class='card-header'>
                    <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                    <p class='category'>User Control Panel | News System</p>
                  </div>
                  <div class='card-body'>			  
                    <div class='row'>			
                      <div class='col-sm-8'>
                        ".MSG_18."
                      </div>				
                    </div>										
                  </div>
                </div>
              </div>
            </div>
          </div>";
  site_footer();
  die();
}

function site_title_not_valid() {   
  echo "
              <div class='content'>
               <div class='row'>
                <div class='col-md-12'>
                  <div class='card'>
                    <div class='card-header'>
                      <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                      <p class='category'>User Control Panel | News System</p>
                    </div>
                    <div class='card-body'>			  
                      <div class='row'>			
                        <div class='col-sm-8'>
                          ".MSG_19."
                        </div>				
                      </div>										
                    </div>
                  </div>
                </div>
              </div>
            </div>";
  site_footer();
  die();
}

function site_content_not_valid() {  
  echo "
                <div class='content'>
                 <div class='row'>
                  <div class='col-md-12'>
                    <div class='card'>
                      <div class='card-header'>
                        <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                        <p class='category'>User Control Panel | News System</p>
                      </div>
                      <div class='card-body'>			  
                        <div class='row'>			
                          <div class='col-sm-8'>
                            ".MSG_20."
                          </div>				
                        </div>										
                      </div>
                    </div>
                  </div>
                </div>
              </div>";
  site_footer();
  die();
}

function site_news_done() {
  echo "
                  <div class='content'>
                   <div class='row'>
                    <div class='col-md-12'>
                      <div class='card'>
                        <div class='card-header'>
                          <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                          <p class='category'>User Control Panel | News System</p>
                        </div>
                        <div class='card-body'>			  
                          <div class='row'>			
                            <div class='col-sm-8'>
                              ".MSG_21."
                            </div>				
                          </div>										
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
  site_footer();
  die();
}

function site_rules_done() {
  echo "
                    <div class='content'>
                     <div class='row'>
                      <div class='col-md-12'>
                        <div class='card'>
                          <div class='card-header'>
                            <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                            <p class='category'>User Control Panel | Rules System</p>
                          </div>
                          <div class='card-body'>			  
                            <div class='row'>			
                              <div class='col-sm-8'>
                                ".MSG_22."
                              </div>				
                            </div>										
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>";
  site_footer();
  die();
}

function site_rules_not_done() {
  echo "
                    <div class='content'>
                     <div class='row'>
                      <div class='col-md-12'>
                        <div class='card'>
                          <div class='card-header'>
                            <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                            <p class='category'>User Control Panel | News System</p>
                          </div>
                          <div class='card-body'>			  
                            <div class='row'>			
                              <div class='col-sm-8'>
                                ".MSG_23."
                              </div>				
                            </div>										
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>";
  site_footer();
  die();
}

function site_faq_done() {
  echo "
                  <div class='content'>
                   <div class='row'>
                    <div class='col-md-12'>
                      <div class='card'>
                        <div class='card-header'>
                          <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                          <p class='category'>User Control Panel | ".FAQ_HEADER."</p>
                        </div>
                        <div class='card-body'>			  
                          <div class='row'>			
                            <div class='col-sm-8'>
                              ".MSG_25."
                            </div>				
                          </div>										
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
  site_footer();
  die();
}

function site_faq_not_done() {
  echo "
                  <div class='content'>
                   <div class='row'>
                    <div class='col-md-12'>
                      <div class='card'>
                        <div class='card-header'>
                          <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                          <p class='category'>User Control Panel | ".FAQ_HEADER."</p>
                        </div>
                        <div class='card-body'>			  
                          <div class='row'>			
                            <div class='col-sm-8'>
                              ".MSG_24."
                            </div>				
                          </div>										
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
  site_footer();
  die();
}

function site_header() {
  // starting the session
  session_start();
  // starting secure urls
  secure_url();
  // starting header section
  echo "
  <!DOCTYPE html>
  <html lang='en'>
  <head>
	<!-- ####################################################### -->
	<!-- #   Powered by User Control Panel Version 1.7         # -->
	<!-- #   Copyright (c) 2020 DerStr1k3r.                    # -->
	<!-- #   All rights reserved.                              # -->
	<!-- ####################################################### -->
	<meta charset='utf-8' />
	<link rel='apple-touch-icon' sizes='76x76' href='themes/".SITE_THEMES."/assets/img/apple-icon.png'>
	<link rel='icon' type='image/png' href='themes/".SITE_THEMES."/assets/img/favicon.png'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
	<title>".SITETITLE."</title>";
  
  header("X-Frame-Options: sameorigin");
  header("X-XSS-Protection: 1; mode=block");
  header("X-Content-Type-Options: nosniff");
  header("Strict-Transport-Security: max-age=31536000");
  header("Referrer-Policy: origin-when-cross-origin");
  header("Expect-CT: max-age=7776000, enforce");
  header("Feature-Policy: vibrate 'self'; usermedia *; sync-xhr 'self'");

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
	$securecode = $row["id"];

  $_SESSION["secure"] = sitehash($securecode);
	$sql = "select * from accounts where username = '".$username."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  > 0){
    $row = mysqli_fetch_assoc($rs);
		$_SESSION['username']['secure_first'] = $row["id"];
		$_SESSION['username']['secure_staff'] = $row["adminLevel"];
		$_SESSION['username']['secure_granted'] = "granted";
		if(isset($_POST["username"]) && ! empty($_POST["username"]))
		{
			$_SESSION['username']['secure_first'] = $row["id"];
			$_SESSION['username']['secure_staff'] = $row["adminLevel"];
			$_SESSION['username']['secure_granted'] = "granted";
		} 			
	}
  echo " 
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700,200' rel='stylesheet' />
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous' />
	<link href='themes/".SITE_THEMES."/assets/css/bootstrap.min.css' rel='stylesheet' />
	<link href='themes/".SITE_THEMES."/assets/css/now-ui-dashboard.php?v=1.5.0' rel='stylesheet' />
  <link href='themes/".SITE_THEMES."/assets/site/site.php' rel='stylesheet' />
  </head>
  <body class='' style='overflow: hidden;'>
    <div class='wrapper'>";
}

function site_header_nologged() {
  secure_url();
  echo "
  <!DOCTYPE html>
  <html lang='en'>
  <head>
	<!-- ####################################################### -->
	<!-- #   Powered by User Control Panel Version 1.7         # -->
	<!-- #   Copyright (c) 2020 DerStr1k3r.                    # -->
	<!-- #   All rights reserved.                              # -->
	<!-- ####################################################### -->
	<meta charset='utf-8' />
	<link rel='apple-touch-icon' sizes='76x76' href='themes/".SITE_THEMES."/assets/img/apple-icon.png'>
	<link rel='icon' type='image/png' href='themes/".SITE_THEMES."/assets/img/favicon.png'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
	<title>".SITETITLE."</title>";

  // starting the session
  session_start();

  header("X-Frame-Options: sameorigin");
  header("X-XSS-Protection: 1; mode=block");
  header("X-Content-Type-Options: nosniff");
  header("Strict-Transport-Security: max-age=31536000");
  header("Referrer-Policy: origin-when-cross-origin");
  header("Expect-CT: max-age=7776000, enforce");
  header("Feature-Policy: vibrate 'self'; usermedia *; sync-xhr 'self'");

  echo " 
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700,200' rel='stylesheet' />
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous' />
	<link href='themes/".SITE_THEMES."/assets/css/bootstrap.min.css' rel='stylesheet' />
	<link href='themes/".SITE_THEMES."/assets/css/now-ui-dashboard.php?v=1.5.0' rel='stylesheet' />
  <link href='themes/".SITE_THEMES."/assets/site/site.php' rel='stylesheet' />
  </head>
  <body class='' style='overflow: hidden;'>
    <div class='wrapper'>";   
}

function site_navi_logged() {
  echo "
    <div class='sidebar' data-color='green'>
      <div class='logo'>
        <a href='dashboard.php' class='simple-text logo-normal'>
         <i class='now-ui-icons business_badge'></i> ".SITETITLE."
        </a>
      </div>
      <div class='sidebar-wrapper' id='sidebar-wrapper'>
        <ul class='nav'>       
          <li>
            <a href='./dashboard.php'>
              <i class='now-ui-icons design_app'></i>
              <p>".DASHBOARD."</p>
            </a>
          </li>
          <li>
            <a href='./faq.php'>
              <i class='now-ui-icons files_single-copy-04'></i>
              <p>".FAQ."</p>
            </a>
          </li>		  
          <li>
            <a href='./rules.php'>
              <i class='now-ui-icons business_badge'></i>
              <p>".RULES."</p>
            </a>
          </li>";
          site_secure_member();
          site_secure_staff();
  echo"        		  
        </ul>
      </div>      
    </div>"; 
}

function site_navi_nologged() {
  echo "
    <div class='sidebar' data-color='blue'>
      <div class='logo'>
        <a href='index.php' class='simple-text logo-normal'>
          <i class='now-ui-icons business_badge'></i> ".SITETITLE."
        </a>
      </div>
      <div class='sidebar-wrapper' id='sidebar-wrapper'>
        <ul class='nav'>        
          <li>
            <a href='./login.php'>
              <i class='now-ui-icons design_app'></i>
              <p>".LOGIN."</p>
            </a>
          </li>
          <li>
            <a href='./register.php'>
              <i class='now-ui-icons education_atom'></i>
              <p>".REGISTER."</p>
            </a>
          </li>
        </ul>
      </div>
    </div>";   
}

function site_content_nologged() {
  echo "
    <div class='main-panel' id='main-panel'>
      <nav class='navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute'>
        <div class='container-fluid'>
          <div class='navbar-wrapper'>
            <div class='navbar-toggle'>
              <button type='button' class='navbar-toggler'>
                <span class='navbar-toggler-bar bar1'></span>
                <span class='navbar-toggler-bar bar2'></span>
                <span class='navbar-toggler-bar bar3'></span>
              </button>
            </div>
            <a class='navbar-brand' href='index.php'>".HOME_NOLOGGED."</a>
          </div>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigation' aria-controls='navigation-index' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
          </button>
          <div class='collapse navbar-collapse justify-content-end' id='navigation'>
            <form method='get' action='' id='changer_lang'>
              <p> 
                <a href='".$_SERVER['PHP_SELF']."?secure_lang=en'>
                  <input type='hidden' name='secure_lang' value='secure_lang_en' />
                  <img src='./themes/".SITE_THEMES."/assets/flags/en.svg' alt='en' width='16' height='16'>
                </a>&nbsp;
                <a href='".$_SERVER['PHP_SELF']."?secure_lang=de'>
                  <input type='hidden' name='secure_lang' value='secure_lang_de' />
                  <img src='./themes/".SITE_THEMES."/assets/flags/de.svg' alt='de' width='16' height='16'>
                </a>
              </p>
            </form>
          </div>
        </div>
      </nav>
      <div class='panel-header panel-header-sm'></div>";	  
}

function site_content_logged() {
  echo "
    <div class='main-panel' id='main-panel' data-color='black'>
      <nav class='navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute' data-color='black'>
        <div class='container-fluid'>
          <div class='navbar-wrapper'>
            <div class='navbar-toggle'>
              <button type='button' class='navbar-toggler'>
                <span class='navbar-toggler-bar bar1'></span>
                <span class='navbar-toggler-bar bar2'></span>
                <span class='navbar-toggler-bar bar3'></span>
              </button>
            </div>
            <a class='navbar-brand' href='dashboard.php'>".DASHBOARD."</a>
          </div>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigation' aria-controls='navigation-index' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
          </button>
          <form method='get' action='' id='changer_lang'>
          <p>
            <a href='".$_SERVER['PHP_SELF']."?secure_lang=en'>
              <input type='hidden' name='secure_lang' value='secure_lang_en' />
              <img src='./themes/".SITE_THEMES."/assets/flags/en.svg' alt='en' width='16' height='16'>
            </a>&nbsp;
            <a href='".$_SERVER['PHP_SELF']."?secure_lang=de'>
              <input type='hidden' name='secure_lang' value='secure_lang_de' />
              <img src='./themes/".SITE_THEMES."/assets/flags/de.svg' alt='de' width='16' height='16'>
            </a>
          </p>
        </form>
        </div>
        <div class='collapse navbar-collapse justify-content-end' id='navigation'>
        <form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
            <button class='btn btn-primary' type='logout' name='logout'>
              <p>".SITE_LOGOUT."</p>
            </submit>		  	
        </form>
      </div>        
      </nav>
      <div class='panel-header panel-header-sm'></div>";
}

function site_footer() {
  echo "
      <footer class='footer'>
        <div class=' container-fluid '>
          <nav>
            <ul>
              <li>
                <a href='".DISCORDURL."'>
                  ".DISCORD."
                </a>
              </li>
              <li>
                <a href='".TEAMSPEAKURL."'>
                  ".TEAMSPEAK."
                </a>
              </li>
              <li>
                <a href='".IMPRINTURL."'>
                  ".IMPRINT."
                </a>
              </li>
            </ul>
          </nav>
          <div class='copyright' id='copyright'>
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script> ".PROJECTNAME.". All rights reserved. ".PROJECTNAME." is not associated in any way with Rockstar North.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src='themes/".SITE_THEMES."/assets/js/core/jquery.min.js'></script>
  <script src='themes/".SITE_THEMES."/assets/js/core/popper.min.js'></script>
  <script src='themes/".SITE_THEMES."/assets/js/core/bootstrap.min.js'></script>
  <script src='themes/".SITE_THEMES."/assets/js/plugins/perfect-scrollbar.jquery.min.js'></script>
  <script src='themes/".SITE_THEMES."/assets/js/plugins/chartjs.min.js'></script>
  <script src='themes/".SITE_THEMES."/assets/js/plugins/bootstrap-notify.js'></script>
  <script src='themes/".SITE_THEMES."/assets/js/now-ui-dashboard.min.js?v=1.5.0' type='text/javascript'></script>
  <script src='themes/".SITE_THEMES."/assets/site/site.js'></script>
  <script src='themes/".SITE_THEMES."/assets/framework/lang.js'></script>
  </body>
  </html>";   
}
?>