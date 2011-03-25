<?php
if ($_POST['submit'] == $CAP_submit){

if ( $_POST['txtusername'] == "" ){
    $passwd_error .= "<br/>".$MSG_empty_username;
}
if ( $_POST['lstsec_que'] == -1 ){
    $passwd_error .= "<br/>".$MSG_empty_sec_que;
}
if ( $_POST['txtsec_ans'] == "" ){
    $passwd_error .= "<br/>".$MSG_empty_sec_ans;
}
if ( $passwd_error == "" ){
      $myuser = new User();
      $myuser->user_name = trim($_POST['txtusername']);
      $myuser->id = $_POST['lstsec_que'];
      $myuser->sec_ans = trim($_POST['txtsec_ans']);
      $myuser->connection = $myconnection;    
      $chk = $myuser->get_newpassword();
                            if ($chk == false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_unmatching_que_ans;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            //echo $msg_unmatching_que_ans;exit();
                            }
                            else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_mail_sent;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}
}
else{
    $myquestion = new securityquestion();
    $myquestion->connection = $myconnection;
    $chk = $myquestion->get_list_array();
    if ( $chk == false ){

    }
}
?>