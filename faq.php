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
site_header("".FAQ."");
site_navi_logged();
site_content_logged();

						$query = "select * from faq_lang";
						$result = mysqli_query($conn,$query);
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>";
					    while($faq = mysqli_fetch_array($result)){
	
						        $title_field = "title";
						        $content_field = "content";
						        if(isset($_SESSION['username']['secure_lang']) && $_SESSION['username']['secure_lang'] == 'de'){
							        $title_field = "title_de";
							        $content_field = "content_de";
						        }
						        $id = $faq['id'];
						        $title = $faq[$title_field];
						        $content = $faq[$content_field];
echo "
								".$title."";
						}
echo "						
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>
								$content	
                            </p>
                        </div>";
echo "				
                    </div>					
                </div>
            </div>";
site_footer();	
?>