<?php
 // Unauthorised login check
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
//Get laguage names to dropdown
$error = "";
$mylanguage = new Language();
$mylanguage->connection = $myconnection;
$chk = $mylanguage->get_list_array();

//While click at import button
if ( $_POST['submit'] == $CAP_import ){
$mylanguage = new Language();
if ( trim($_POST['lstlanguage']) == -1 ){
    $error .= $MSG_empty_language;
}
$mylanguage->error_description = $error;
$conf_files="";
if ( $error == "" ){

      $temp_language_id = $_SESSION[SESSION_TITLE.'gLANGUAGE'];
      $_SESSION[SESSION_TITLE.'gLANGUAGE'] = trim($_POST['lstlanguage']);
      $result =get_filenames(ROOT_PATH."include/page_conf","php","","",false);
      $n = sizeof($result);if ( $n > 0 ) $a = 1;
      for ($i = 0 ; $i < $n ; $i++ ){
      $conf_files.= $result[$i]."\n";
      include($result[$i]);
      }

      $result =get_filenames(ROOT_PATH."include/class","php","_conf","",true);
      $n = sizeof($result);if ( $n > 0 ) $b = 1;
      for ($i = 0 ; $i < $n ; $i++ ){
      $conf_files.=  $result[$i]."\n";
      include($result[$i]);
      }

      $result =get_filenames(ROOT_PATH."plugins","php","","conf",true);
      $n = sizeof($result);if ( $n > 0 ) $c = 1;
      for ($i = 0 ; $i < $n ; $i++ ){
      $conf_files.=  $result[$i]."\n";
      include($result[$i]);
      }
      $_SESSION[SESSION_TITLE.'gLANGUAGE'] = $temp_language_id;

                            if ( $a == 1 || $b == 1 || $c == 1 ) {
										$conf_files = '<div ><br/><br/><strong>'.$CAP_import_msg_success.'</strong> <textarea cols="80" rows="12" >'.$conf_files."</textarea></div>";
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_lan_imported.$conf_files;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "gsconf_import.php";
										$_SESSION[SESSION_TITLE.'flash_refresh_page'] =150;
                            header( "Location: gfwflash.php");
                            exit();
                            }
                            else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_on_fail;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}
}

?>