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

function site_userchanged_done() {
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
								".MSG_3."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";	
  site_footer();
  die();	  
}

function site_support_posted_done() {
  site_header("".USERSUPPORT."");
  site_navi_logged();
  site_content_logged();
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
								".MSG_4."<br><br>".SUPPORTDELETE1."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";  
  site_footer();
  die();
}

// Tweet System MSG done
function site_tweetings_done() {	
  site_header("".DASHBOARD."");
  site_content_logged();
  site_navi_logged();
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
								".MSG_5."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";  
  site_footer();
  die();	  
}

function site_tweetings_liked_done() {	
  site_header("".DASHBOARD."");
  site_content_logged();
  site_navi_logged();
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
								".MSG_6."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";  
  site_footer();
  die();	  
}

function site_myprofile_done_error() {	
  site_header("".USERPROFILECHANGE."");
  site_navi_logged();
  site_content_logged();
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
								".MSG_7."
								<br>
								" . mysqli_error($conn) . "
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
  site_footer();
  die();
}

function site_myprofile_done() {	
  site_header("".USERPROFILECHANGE."");
  site_navi_logged();
  site_content_logged();
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
								".MSG_8."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";
  site_footer();
  die();
}



function site_news_not_done() { 
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
								".MSG_18."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>"; 
  site_footer();
  die();
}

function site_title_not_valid() {
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
								".MSG_19."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";	
  site_footer();
  die();
}

function site_content_not_valid() { 
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
								".MSG_20."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>"; 
  site_footer();
  die();
}

function site_news_done() {
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
								".MSG_21."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";	
  site_footer();
  die();
}

function site_rules_done() {
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
								".MSG_22."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";	
  site_footer();
  die();
}

function site_rules_not_done() {
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
								".MSG_23."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";	
  site_footer();
  die();
}

function site_faq_done() {
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
								".MSG_25."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";	
  site_footer();
  die();
}

function site_faq_not_done() {
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
								".MSG_24."
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";	
  site_footer();
  die();
}
?>