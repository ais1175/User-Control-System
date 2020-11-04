<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.5
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
                <p class='category'>User Control Panel | ".RULES."</p>
              </div>
              <div class='card-body'>
			<div class='row'>
		  <div class='col-md-4'>
            <div class='card card-user'>
              <div class='image'>
                <img src='themes/".SITE_THEMES."/assets/img/bg5.jpg' alt='...'>
              </div>
              <div class='card-body'>
                <div class='author'>
                  <a href='#'>
                    <img class='avatar border-gray' src='themes/".SITE_THEMES."/assets/img/mike.jpg' alt='...'>
                    <h5 class='title'>
						          Whitelistsystem
					          </h5>
                  </a>
                </div>
                <p class='description text-center'>
                <p class='description text-center'>
				<div style='padding:2px;width:100%;'>
					<div class='rules-item mb-6'>
						<h5>Grundlegendes</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span><b>Auf ".PROJECTNAME." wird jede Whitelist in unseren Teamspeak Server abgehalten.</span></b><br /><br />
								<span>Verhalte dich wie folgt:</span><br /><br /> 
								<span>1. Lese vorher unser Regelwerk gut durch.</span><br />
								<span>2. Wenn du unser Regelwerk kannst, dann komm in unseren Teamspeak Server.</span><br />
								<span>3. Gehe nun in den folgenden Channel: Warte auf Whitelist</span><br />
								<span>4. Warte nun Bitte ab bis ein Supporter/in Zeit hat.</span><br />
								<span>5. Wir wünschen dir nun Viel Glück!</span>
							</div>
						</div>
					</div>
				</div>
				<br />				
                </p>
              </div>
            </div>
          </div>			
		  <div class='col-md-8'>
            <div class='card card-user'>
              <div class='image'>
                <img src='themes/".SITE_THEMES."/assets/img/bg5.jpg' alt='...'>
              </div>
              <div class='card-body'>
                <div class='author'>
					        <img class='avatar border-gray' src='themes/".SITE_THEMES."/assets/img/mike.jpg' alt='...'>";
					        $query = "select * from rules_lang";
					        $result = mysqli_query($conn,$query);
	
					    while($row = mysqli_fetch_array($result)){
	
						        $title_field = "title";
						        $content_field = "content";
						        if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'de'){
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
                  </a>
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