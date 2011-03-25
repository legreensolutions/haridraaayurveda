<?php
 $myuser = new User();
 $myuser->usertype_id = USERTYPE_ADMIN;
 $myuser->connection = $myconnection;
 $chk = $myuser->check_login();
 if ( $chk == false ){
            $_SESSION[SESSION_TITLE.'flash'] = $g_msg_unauthorized_request;
            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = $g_msg_unauthorized_request_redirect_page;
            header( "Location: gfwflash.php");
            exit();
 }
$error = "";
if ($_POST['insert'] == $CAP_insert || $_POST['update'] == $CAP_update){

if ( trim($_POST['txtquestion']) == "" ){
    $error .= $MSG_empty_sec_que;
}
$mysec_que->error_description = $error;
if ( $error == "" ){
      $mysec_que = new securityquestion();
      $mysec_que->connection = $myconnection;
      $mysec_que->question = trim($_POST['txtquestion']);
      $mysec_que->id = $_POST['h_id'];
      $chk = $mysec_que->update();
                            if ($chk == false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_on_fail;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            //echo $msg_unmatching_que_ans;exit();
                            }
                            elseif ( $_POST['update'] == $CAP_update && $chk != false ) {
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_que_updated;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "sec_que_search.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
                            elseif ($_POST['insert'] == $CAP_insert && $chk != false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_que_added;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "securityquestion.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}
}
elseif ($_POST['delete'] == $CAP_delete){
    $mysec_que = new securityquestion();
    $mysec_que->connection = $myconnection;
    $mysec_que->id = $_POST['h_id'];
    $chk = $mysec_que->delete();
                            if ( $chk == false ){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_on_fail;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "sec_que_search.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
                            else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_que_deleted;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "sec_que_search.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}
elseif (isset($_GET['id']) && $_GET['id'] > 0){
$h_id = $_GET['id'];
$mysec_que = new securityquestion();
$mysec_que->connection = $myconnection;
$mysec_que->id = $_GET['id'];
$chk = $mysec_que->get_detail();
}
?>