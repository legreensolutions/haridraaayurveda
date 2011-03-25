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


$Mylanguage = new Language($myconnection);
$Mylanguage->connection = $myconnection;
$chk = $Mylanguage->get_list_array();
$error = "";

if ($_POST['submit'] == $CAP_publish || $_POST['submit'] == $CAP_unpublish){
  if ( trim($_POST['lstlanguage']) == -1 ){
      $error .= $MSG_empty_language;
      $Mylanguage->error_description = $error;
  }
  else{
  $language_id = $_POST['lstlanguage'];
      if ($_POST['submit'] == $CAP_publish){
      $val = $this->gsconf->publish_all($language_id);
      if ( $val == true ){
      $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_published;
      $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "gsconf_publishall.php";
      header( "Location: gfwflash.php");
      exit();
      }
      else{
      $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_on_fail;
      $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "gsconf_publishall.php";
      header( "Location: gfwflash.php");
      exit();
      }
      }
      else{
      $val = $this->gsconf->unpublish_all($language_id);
      if ( $val == true ){
      $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_unpublished;
      $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "gsconf_publishall.php";
      header( "Location: gfwflash.php");
      exit();
      }
      else{
      $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_on_fail;
      $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "gsconf_publishall.php";
      header( "Location: gfwflash.php");
      exit();
      }
      }
  }
}

?>