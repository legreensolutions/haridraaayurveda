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
$mylanguage = new Language();
if ($_POST['insert'] == $CAP_insert || $_POST['update'] == $CAP_update){
$mylanguage = new Language();
if ( trim($_POST['txtlanguage']) == "" ){
    $error .= $MSG_empty_language;
}
$mylanguage->error_description = $error;
if ( $error == "" ){
      $mylanguage->connection = $myconnection;
      //$id = $mylanguage->get_id();
      $mylanguage->language = trim($_POST['txtlanguage']);
      if ( $_POST['chkpublish'] != "" ){
            $mylanguage->publish = CONF_PUBLISH;
      }
      else{
            $mylanguage->publish = CONF_NOT_PUBLISH;
      }
      $mylanguage->id = $_POST['h_id'];
      $chk = $mylanguage->update();
                            if ($chk == false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_on_fail;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            //echo $msg_unmatching_que_ans;exit();
                            }
                            elseif ( $_POST['update'] == $CAP_update && $chk != false ) {
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_lan_updated;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "language_search.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
                            elseif ($_POST['insert'] == $CAP_insert && $chk != false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_lan_added;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "language.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}
}
elseif ($_POST['delete'] == $CAP_delete){
    $mylanguage = new Language();
    $mylanguage->connection = $myconnection;
    $mylanguage->id = $_POST['h_id'];
    $chk = $mylanguage->delete();
                            if ( $chk == false ){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_on_fail;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "language_search.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
                            else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_lan_deleted;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "language_search.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}
elseif (isset($_GET['id']) && $_GET['id'] > 0){
$h_id = $_GET['id'];
$mylanguage = new Language();
$mylanguage->connection = $myconnection;
$mylanguage->id = $_GET['id'];
$chk = $mylanguage->get_detail();
}
?>