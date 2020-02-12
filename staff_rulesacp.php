<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.4.8
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");

site_secure();
secure_url();

site_secure_staff_check();

site_header();
site_navi_logged();
site_content_logged();

if(isset($_POST['rules_sup'])){
    if(empty($_POST['title']) || empty($_POST['title_de']) || empty($_POST['content']) || empty($_POST['content_de'])){
        site_rules_not_done();
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
        
        $sql = "UPDATE rules_lang SET title='".$title."', title_de='".$title_de."', content='".$content."', content_de='".$content_de."' WHERE id = '1'";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            site_rules_done();
        }
        $conn->close();
    }
}
?>
<div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'><?php echo WELCOMETO; ?> <?php echo PROJECTNAME; ?>!</h5>
                <p class='category'>User Control Panel | <?php echo RULES_HEADER; ?></p>
              </div>
			  <div class='card-body'>
				<div class='row'>			
					<div class='col-sm-12'>
						<b><?php echo RULES_INFO; ?></b>
					</div>
				</div>
			  </div>
			  <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-12'>
			<?php	
				$sql = "SELECT title, title_de, content, content_de FROM rules_lang WHERE id = 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
			?>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method='post' enctype='multipart/form-data'>
                      <tr>				  
                        <td>
							<h6>
								<?php echo RULES_TITLE_EN; ?>
								<small class='text-muted'><?php echo RULES_TITLE_EN_TEXT; ?></small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='title' size='50' maxlength='100' class='form-control' value='<?=$row["title"]?>' required>
							</div>	
                        </td>
					  </tr>
                      <tr>				  
                        <td>
							<h6>
								<?php echo RULES_TITLE_DE; ?>
								<small class='text-muted'><?php echo RULES_TITLE_DE_TEXT; ?></small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-2_settings-90'></i>
									</div>      
								</div>
								<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='title_de' size='50' maxlength='100' class='form-control' value='<?=$row["title_de"]?>' required>
							</div>	
                        </td>
					  </tr>
                      <tr>					  
                        <td>
							<h6>
								<?php echo RULES_CONTENT_EN; ?>
								<small class='text-muted'><?php echo RULES_CONTENT_EN_TEXT; ?></small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-1_settings-gear-63'></i>
									</div>      
								</div>					
								<textarea style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='content' size='450' maxlength='1260' class='form-control' value='<?=$row["content"]?>' required></textarea>
							</div>	
                        </td>						
                      </tr>
                      <tr>					  
                        <td>
							<h6>
								<?php echo RULES_CONTENT_DE; ?>
								<small class='text-muted'><?php echo RULES_CONTENT_DE_TEXT; ?></small>
							</h6>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<div class='input-group-text'>
										<i class='now-ui-icons ui-1_settings-gear-63'></i>
									</div>      
								</div>					
								<textarea style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='content_de' size='450' maxlength='1260' class='form-control' value='<?=$row["content_de"]?>' required></textarea>
							</div>	
                        </td>						
                      </tr>                      					  
                      <tr>					  
						<td>						
							<button type='submit' name='rules_sup' class='btn btn-primary btn-round'>
								<i class='now-ui-icons ui-1_check'></i> <?php echo RULES_SAVE; ?>
							</button>
							</submit>
                        </td>							
                      </tr>						
					</form>

		<?php
				}
				mysqli_close($conn);
			}
		?>						 
              </div>
            </div>
          </div>
        </div>
		</div>
	</div>
</div>
<?php
site_footer();
?>