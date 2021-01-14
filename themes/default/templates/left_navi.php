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

function site_navi_logged() {
echo "
    <section>
        <aside id='leftsidebar' class='sidebar'>
            <div class='menu'>
                <ul class='list'>
                    <li class='header'>".$_SESSION['username']['site_settings_site_name']."</li>
                    <li class='active'>
                        <a href='dashboard.php'>
                            <i class='material-icons'>home</i>
                            <span>".DASHBOARD."</span>
                        </a>
                    </li>
                    <li>
                        <a href='faq.php'>
                            <i class='material-icons'>bookmark</i>
                            <span>".FAQ."</span>
                        </a>
                    </li>
                    <li>
                        <a href='rules.php'>
                            <i class='material-icons'>assignment</i>
                            <span>".RULES."</span>
                        </a>
                    </li>					
                    <li class='header'>".USERACCOUNT."</li>
                    <li>
                        <a href='myprofile.php?myprofile=dashboard'>
                            <i class='material-icons'>contacts</i>
                            <span>".USERPROFILECHANGE."</span>
                        </a>
                    </li>
                    <li>
                        <a href='support.php'>
                            <i class='material-icons'>forum</i>
                            <span>".USERSUPPORT."</span>
                        </a>
                    </li>";
			if(intval($_SESSION['username']['secure_staff']) >= 5) {
				secure_url();
echo "				
                    <li class='header'>".SITESTAFF."</li>
                    <li>
                        <a href='siteconfig.php'>
                            <i class='material-icons'>settings_applications</i>
                            <span>".SITECONFIG_HEADER."</span>
                        </a>
                    </li>					
                    <li>
                        <a href='staff_userchanged.php'>
                            <i class='material-icons'>storage</i>
                            <span>".STAFF_USERCAHNEGED."</span>
                        </a>
                    </li>
                    <li>
                        <a href='staff_usercontrol.php'>
                            <i class='material-icons'>format_align_center</i>
                            <span>".STAFF_USERCONTROL."</span>
                        </a>
                    </li>
                    <li>
                        <a href='staff_faqacp.php'>
                            <i class='material-icons'>format_line_spacing</i>
                            <span>".FAQ_HEADER."</span>
                        </a>
                    </li>
                    <li>
                        <a href='staff_newsacp.php'>
                            <i class='material-icons'>format_align_left</i>
                            <span>".STAFF_NEWSACP."</span>
                        </a>
                    </li>
                    <li>
                        <a href='staff_rulesacp.php'>
                            <i class='material-icons'>wrap_text</i>
                            <span>".STAFF_RULESACP."</span>
                        </a>
                    </li>";
			}
	if(intval($_SESSION['username']['site_settings_dl_section']) >= 1) {
		echo "			
                    <li class='header'>".SITECONFIG_DOWNLOAD_SECTION."</li>";
				if(intval($_SESSION['username']['site_settings_dl_section_ragemp']) >= 1) {
					echo"
                    <li>
                        <a href='https://cdn.rage.mp/public/files/RAGEMultiplayer_Setup.exe'>
                            <i class='material-icons col-light-blue'>donut_large</i>
                            <span>".SITECONFIG_RAGEMP."</span>
                        </a>
                    </li>";
				}
				if(intval($_SESSION['username']['site_settings_dl_section_altv']) >= 1) {
					echo"				
                    <li>
                        <a href='https://cdn.altv.mp/altv-release.zip'>
                            <i class='material-icons col-light-blue'>donut_large</i>
                            <span>".SITECONFIG_ALTV."</span>
                        </a>
                    </li>";
				}
				if(intval($_SESSION['username']['site_settings_dl_section_fivem']) >= 1) {
					echo"					
                    <li>
                        <a href='https://runtime.fivem.net/client/FiveM.exe'>
                            <i class='material-icons col-light-blue'>donut_large</i>
                            <span>".SITECONFIG_FIVEM."</span>
                        </a>
                    </li>";
				}
	}			
echo "					
                </ul>			
            </div>
            <div class='legal'>
                <div class='copyright'>
                    &copy; ".PROJECTNAME.". All rights reserved.
                </div>
                <div class='version'>
                    <b>UCP Version: 2.5</b> with PHP ".phpversion()."
                </div>
            </div>
        </aside>"; 
}

function site_navi_nologged() {
echo "
    <section>
        <aside id='leftsidebar' class='sidebar'>
            <div class='menu'>
                <ul class='list'>
                    <li class='header'>".$_SESSION['username']['site_settings_site_name']."</li>
                    <li class='active'>
                        <a href='login.php'>
                            <i class='material-icons'>group</i>
                            <span>".LOGIN."</span>
                        </a>
                    </li>
                    <li>
                        <a href='register.php'>
                            <i class='material-icons'>group_add</i>
                            <span>".REGISTER."</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class='legal'>
                <div class='copyright'>
                    &copy; ".PROJECTNAME.". All rights reserved.
                </div>
                <div class='version'>
                    <b>UCP Version: 2.5</b> with PHP ".phpversion()."
                </div>
            </div>
        </aside>";   
}

?>