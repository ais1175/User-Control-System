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
secure_url();

site_header_nologged();
site_navi_nologged();
site_content_nologged();
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".WELCOMETO." ".PROJECTNAME."!
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								".INDEXTEXT."	
                            </p>
                        </div>				
                    </div>					
                </div>
            </div>";								
site_footer();
?>