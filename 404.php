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
secure_url();
site_header_nologged("404");
site_navi_nologged();
site_content_nologged();

echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								404
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='error-message'>
								This page doesn't exist	
                            </p>
                        </div>
                    </div>					
                </div>
            </div>";
	  
site_footer();
?>