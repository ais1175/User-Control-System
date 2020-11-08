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
require_once("include/features.php");

site_secure();
secure_url();
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
                <p class='category'>User Control Panel | ".FAQ."</p>
              </div>
              <div class='card-body'>
			<div class='row'>			
		  <div class='col-md-12'>
            <div class='card card-user'>
              <div class='card-body'>
                <div class='author'>";
					        $query = "select * from faq_lang";
					        $result = mysqli_query($conn,$query);
	
					    while($row = mysqli_fetch_array($result)){
	
						        $title_field = "title";
						        $content_field = "content";
						        if(isset($_SESSION['secure_lang']) && $_SESSION['secure_lang'] == 'de'){
							        $title_field = "title_de";
							        $content_field = "content_de";
						        }
						        $id = $row['id'];
						        $title = $row[$title_field];
						        $content = $row[$content_field];
echo "		
                    <h5 class='title'>
						".$title."
					</h5>
                </div>
				<div class='card' id='post_".$id."'>		
					<div class='col-md-12'>			 			  
						$content
					</div>
				</div>";
				      }
echo "				
                </p>
              </div>
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