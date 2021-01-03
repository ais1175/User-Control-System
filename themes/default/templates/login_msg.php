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

function site_register_done() {
  site_header_nologged();
  site_navi_nologged();
  site_content_nologged();
		echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_9."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_10."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_10."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_11."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_12."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_13."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_14."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_15."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_16."
                            </p>
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
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".PROJECTNAME."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".MSG_17."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
  site_footer(); 
  exit();   
}
?>