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
require_once("include/features.php");

site_secure();
secure_url();

site_secure_staff_check();

site_header("".FAQ_HEADER."");
site_navi_logged();
site_content_logged();

if(isset($_POST['faq_sup'])){
    if(empty($_POST['title']) || empty($_POST['title_de']) || empty($_POST['content']) || empty($_POST['content_de'])){
        site_faq_not_done();
    }
    else
    {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $title_de 	= filter_input(INPUT_POST, 'title_de', FILTER_SANITIZE_STRING);
        $content 	= filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
        $content_de 	= filter_input(INPUT_POST, 'content_de', FILTER_SANITIZE_STRING);

		// The 2nd check to make sure that nothing bad can happen.
        if (preg_match('/[A-Za-z0-9]+/', $_POST['title']) == 0) {
            site_title_not_valid();
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['title_de']) == 0) {
            site_title_not_valid();
        }
		if (preg_match('/[A-Za-z0-9]+/', $_POST['content']) == 0) {
            site_content_not_valid();
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['content_de']) == 0) {
            site_content_not_valid();
        }
        
        $sql = "UPDATE faq_lang SET title='".$title."', title_de='".$title_de."', content='".$content."', content_de='".$content_de."' WHERE id = '1'";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            site_faq_done();
        }
        $conn->close();
    }
}
echo "
			<div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='card'>				
                        <div class='header'>
                            <h2>
								".FAQ_HEADER."
                            </h2>
                        </div>
                        <div class='body'>
                            <p class='m-t-15 m-b-30'>";
				$sql = "SELECT title, title_de, content, content_de FROM faq_lang WHERE id = 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($faq = $result->fetch_assoc()) {
					echo"
					<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
                      <tr>				  
                        <td>
							<h6>
								".FAQ_TITLE_EN."
								<small class='text-muted'>".FAQ_TITLE_EN_TEXT."</small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='title' size='50' maxlength='100' class='form-control' value='".$faq["title"]."' required>
							</div>	
                        </td>
					  </tr>
                      <tr>				  
                        <td>
							<h6>
								".FAQ_TITLE_DE."
								<small class='text-muted'>".FAQ_TITLE_DE_TEXT."</small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='title_de' size='50' maxlength='100' class='form-control' value='".$faq["title_de"]."' required>
							</div>	
                        </td>
					  </tr>
                      <tr>					  
                        <td>
							<h6>
								".FAQ_CONTENT_EN."
								<small class='text-muted'>".FAQ_CONTENT_EN_TEXT."</small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-1_settings-gear-63'></i>
									</div>      
								</div>					
								<textarea style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='content' size='450' maxlength='1260' class='form-control' value='".$faq["content"]."' required></textarea>
							</div>	
                        </td>						
                      </tr>
                      <tr>					  
                        <td>
							<h6>
								".FAQ_CONTENT_DE."
								<small class='text-muted'>".FAQ_CONTENT_DE_TEXT."</small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-1_settings-gear-63'></i>
									</div>      
								</div>					
								<textarea style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='content_de' size='450' maxlength='1260' class='form-control' value='".$faq["content_de"]."' required></textarea>
							</div>	
                        </td>						
                      </tr>                      					  
                      <tr>					  
						<td>						
							<button type='submit' name='faq_sup' class='btn btn-primary btn-round'>
								<i class='now-ui-icons ui-1_check'></i> ".FAQ_SAVE."
							</button>
							</submit>
                        </td>							
                      </tr>						
					</form>";

				}
				mysqli_close($conn);
			}
echo "
									<br>
									<div class='form-group'>
										<div class='form-line'></div>
										<br>
										".FAQ_INFO."
									</div>		
                            </p>
                        </div>
                    </div>					
                </div>
            </div>";
site_footer();
?>