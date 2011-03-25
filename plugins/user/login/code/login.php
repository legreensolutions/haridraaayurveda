<?php
if ( isset ( $_GET[md5("AL")] ) && trim ( $_GET[md5("AL")] ) != ""  ){
    $strSQL = "SELECT * FROM users WHERE userstatus_id =".USERSTATUS_TO_BE_ACTIVATED." and md5(id) = '" .$_GET[md5("AL")] ."'" ;
    $result = mysql_query($strSQL, $myconnection);
    $row_a_user = mysql_fetch_assoc($result);
    // if user exist
    if (mysql_num_rows($result) == 1){
        // activate user userstatusid active= 1, disabled=3
        $strSQL = "UPDATE users SET userstatus_id='".USERSTATUS_ACTIVE."' WHERE md5(id) = '" .$_GET[md5("AL")] ."'" ;
        mysql_query($strSQL, $myconnection);
        $login_error=$msg_email_activation_success;
    }
    else{
        /* Either unable to find the user entry User
        or multiple entries
        both are errorneous situations*/
            $login_error=$msg_email_activation_failed;
    }
}
if ($_POST['submit'] == "Sign In"){
if ( $_POST['loginname'] == "" ){
    $login_error .= $msg_empty_loginname;
}
if ( $_POST['passwd'] == "" ){
    $login_error .= "<br/>".$msg_empty_password;
}
if ( $login_error == "" ){
      $uname = trim($_POST['loginname']);
      $pass = md5(trim($_POST['passwd']));
      $myuser = new User(gInvalid,$uname,$pass,$myconnection);
      $chk = $myuser->login();
      if ( $chk == true ){
          $chk = $myuser->register_login();
          header ("Location: ".$myuser->loggedin_page);
          exit();
      }else{
	$login_error .= $msg_error_login;
	}
	
}

}
?>