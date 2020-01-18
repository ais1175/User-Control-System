<?php 
// ************************************************************************************//
// * User Control Panel ( UCP ) >> PDO Edition <<
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: Creative Commons licenses
// ************************************************************************************//
require_once("include/features.php");

if(isset($_POST['login'])){
	
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $sql = "SELECT id, username, password FROM accounts WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        site_login_user_notfound();
    } else{
        $validPassword = password_verify($passwordAttempt, $user['password']);

        if($validPassword){
            $_SESSION['secure'] = $user['id'];
            $_SESSION['secure_logged_in'] = time()+2592000;
			$_SESSION['secure'] = $securecode;
			$expires = time()+2592000;
			$securecode = $row["id"];
			setcookie("secure", $securecode, $expires,  "/");
            header('Location: dashboard.php');
            exit;
            
        } else{
            site_login_password_none_correct();
        }
    }
}

site_header();
site_navi_nologged();
site_content_nologged();

echo "
      <div class='content'>
                <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Login</p>
              </div>
              <div class='card-body'>
			<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
			<div class='form-row'>
				<div class='form-group col-md-6'>
					<label for='exampleFormControlInput1'><i id='email-icon' class='now-ui-icons users_single-02'></i> Social Club Name</label>
					<input required aria-label='Social Club Name' type='text' name='username' class='form-control' placeholder='Social Club Name *' value='' maxlength='30' id='exampleInputEmail1'/>
				</div>
				<div class='form-group col-md-4'>
					<label for='exampleFormControlInput1'><i id='message-icon' class='now-ui-icons ui-1_lock-circle-open'></i> Passwort</label>
					<input required aria-label='Password' type='password' name='password' class='form-control' placeholder='Passwort *' value='' maxlength='30' id='exampleInputPassword1'/>
				</div>				
			</div>				
			<button type='submit' class='btn btn-primary' name='login'>Login</submit>					
			</form>				
              </div>
            </div>
          </div>
        </div>
      </div>";
site_footer();	  
?>
