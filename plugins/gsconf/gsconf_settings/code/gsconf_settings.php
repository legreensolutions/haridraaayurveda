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
	if(isset($_POST["h_check"]) && $_POST["h_check"] != ""  && $_POST["h_check"] == md5("CONF_SETTINGS") ){
	
            if(isset($_POST["chkdebug"])){
                $_SESSION[SESSION_TITLE.'gDEBUG'] = true;
            }else{
                $_SESSION[SESSION_TITLE.'gDEBUG'] = false;            
            }
            
            if(isset($_POST["chkeditor"])){
                $_SESSION[SESSION_TITLE.'gEDIT_MODE'] = true;
            }else{
                $_SESSION[SESSION_TITLE.'gEDIT_MODE'] = false;            
            }
             
            if(isset($_POST["chkvieweditor"])){
                $_SESSION[SESSION_TITLE.'gENABLE_GALLERY'] = true;
            }else{
               $_SESSION[SESSION_TITLE.'gENABLE_GALLERY'] = false;            
            }


            if(isset($_POST["lstlanguage"]) && $_POST["lstlanguage"] != gINVALID ){
                $_SESSION[SESSION_TITLE.'gLANGUAGE'] = $_POST["lstlanguage"];
            }else{
                $_SESSION[SESSION_TITLE.'gLANGUAGE'] = CONF_LANG_ENGLISH;          
            }            
            
            
            
 			$_SESSION[SESSION_TITLE.'flash'] = $msg_update_success;
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $msg_update_success_redirect_page;
			header( "Location: gfwflash.php");
			exit();
		
	}


 ?>