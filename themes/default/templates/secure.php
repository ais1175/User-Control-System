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

?>