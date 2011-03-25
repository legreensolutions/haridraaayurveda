<?php
if ($_POST['submit'] == $CAP_change){

if ( $_POST['passwd'] == "" ){
    $passwd_error .= "<br/>".$MSG_empty_password;
}
if ( $_POST['new_passwd'] == "" ){
    $passwd_error .= "<br/>".$MSG_empty_new_password;
}
if ( $_POST['retype_passwd'] == "" ){
    $passwd_error .= "<br/>".$MSG_empty_retype_password;
}
if ( $_POST['new_passwd'] != $_POST['retype_passwd'] ){
    $passwd_error .= "<br/>".$MSG_unmatching_passwords;
}
if ( $passwd_error == "" ){
      $pass = md5(trim($_POST['passwd']));
      $new_pass = md5(trim($_POST['new_passwd']));
      $myuser = new User();
      $myuser->id = $_SESSION[SESSION_TITLE.'userid'];
      $myuser->connection = $myconnection;
      $chk = $myuser->change_password($new_pass,$pass);
                            if ($chk == false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_incorrect_password;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "profile.php";
                            header( "Location: gfwflash.php");
                            exit();
                            //echo $msg_unmatching_que_ans;exit();
                            }
                            else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_changed_password;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "profile.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}

}
?>