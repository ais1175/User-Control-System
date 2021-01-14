<?php 
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.5
// * 
// * Copyright (c) 2020 - 2021 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");
	
site_secure();
secure_url();

site_secure_staff_check();

if (isset($_GET["siteconfig"])) $siteconfig = trim(htmlentities($_GET["siteconfig"]));
elseif (isset($_POST["siteconfig"])) $siteconfig = trim(htmlentities($_POST["siteconfig"]));
else $siteconfig = "view";

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

site_header("".SITECONFIG_HEADER."");
site_navi_logged();
site_content_logged();
$sql = "SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_online, site_name from config";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($siteconfigchange = $result->fetch_assoc()) {
    if ($siteconfig == "" . $siteconfigchange["id"]. "") {
      if(isset($_POST['submit'])){
		  $site_online 		= filter_input(INPUT_POST, 'site_online', FILTER_SANITIZE_STRING);
		  $site_name 		= filter_input(INPUT_POST, 'site_name', FILTER_SANITIZE_STRING);
          $site_dl_section 		= filter_input(INPUT_POST, 'site_dl_section', FILTER_SANITIZE_STRING);
          $site_rage_section 	= filter_input(INPUT_POST, 'site_rage_section', FILTER_SANITIZE_STRING);
          $site_altv_section 	= filter_input(INPUT_POST, 'site_altv_section', FILTER_SANITIZE_STRING);
          $site_fivem_section 	= filter_input(INPUT_POST, 'site_fivem_section', FILTER_SANITIZE_STRING);
		  
		  $sql = "UPDATE config SET site_dl_section='".$site_dl_section."', site_rage_section='".$site_rage_section."', site_altv_section='".$site_altv_section."', site_fivem_section='".$site_fivem_section."', site_online='".$site_online."', site_name='".$site_name."' WHERE id = ".$siteconfigchange['id']."";
		  $_SESSION['username']['site_settings_site_online'] = $site_online;
		  $_SESSION['username']['site_settings_site_name'] = $site_name;
		  $_SESSION['username']['site_settings_dl_section'] = $site_dl_section;		  
		  $_SESSION['username']['site_settings_dl_section_ragemp'] = $site_rage_section;
		  $_SESSION['username']['site_settings_dl_section_altv'] = $site_altv_section;
		  $_SESSION['username']['site_settings_dl_section_fivem'] = $site_fivem_section;		  
          if (mysqli_query($conn, $sql)) {
            echo"
				<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>
                        <div class='header'>
                            <h2>
                                ".SITECONFIG_HEADER."
                                <small>".SITECONFIG_HEADERNOTE."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <div class='alert alert-success'>
                                ".SITECONFIG_DONE."
                            </div>
                        </div>
                    </div>
                </div>";
          } else {
            echo"
				<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>
                        <div class='header'>
                            <h2>
                                ".SITECONFIG_HEADER."
                                <small>".SITECONFIG_HEADERNOTE."</small>
                            </h2>
                        </div>
                        <div class='body'>
                            <div class='alert alert-danger'>
                                ".SITECONFIG_ERROR."
                            </div>
                        </div>
                    </div>
                </div>";
          }            		
      }  
    }
  }
}
echo "
				<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>
                        <div class='header'>
                            <h2>
                                ".SITECONFIG_HEADER."
								<small>".SITECONFIG_HEADERNOTE."</small>
                            </h2>
                        </div>
                        <div class='body'>";

				$sql = "SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_online, site_name from config ORDER by id DESC LIMIT 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($siteconfigchange = $result->fetch_assoc()) {
					echo "
							<form class='form-horizontal' method='post' action='".$_SERVER['PHP_SELF']."?siteconfig=".$siteconfigchange['id']."' enctype='multipart/form-data'>
                                <div class='row clearfix'>
                                    <div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
                                        <label for='email_address_2'>".SITECONFIG_ONLINE."</label>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
                                        <div class='form-group'>
                                            <div class='form-line'>
												<input type='text' name='site_online' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_ONLINE."' value='" . $siteconfigchange["site_online"]. "' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row clearfix'>
                                    <div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
                                        <label for='password_2'>".SITECONFIG_NAME."</label>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <input type='text' name='site_name' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_NAME."' value='" . $siteconfigchange["site_name"]. "' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row clearfix'>
                                    <div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
                                        <label for='password_2'>".SITECONFIG_DOWNLOAD_SECTION."</label>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <input type='text' name='site_dl_section' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_DOWNLOAD_SECTION."' value='" . $siteconfigchange["site_dl_section"]. "' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row clearfix'>
                                    <div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
                                        <label for='password_2'>".SITECONFIG_RAGEMP."</label>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <input type='text' name='site_rage_section' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_RAGEMP."' value='" . $siteconfigchange["site_rage_section"]. "' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row clearfix'>
                                    <div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
                                        <label for='password_2'>".SITECONFIG_ALTV."</label>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <input type='text' name='site_altv_section' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_ALTV."' value='" . $siteconfigchange["site_altv_section"]. "' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row clearfix'>
                                    <div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
                                        <label for='password_2'>".SITECONFIG_FIVEM."</label>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <input type='text' name='site_fivem_section' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_FIVEM."' value='" . $siteconfigchange["site_fivem_section"]. "' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>								
                                <div class='row clearfix'>
                                    <div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
                                        <button type='submit' class='btn btn-primary m-t-15 waves-effect' name='submit'>".STAFF_USERCONTROLSAVE."</button>
                                    </div>
                                </div>
                            </form>";
					}
				}					

		echo "		  			
                        </div>
                    </div>
				</div>";
  site_footer();	
?>