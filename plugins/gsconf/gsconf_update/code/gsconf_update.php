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

	if ($_GET["id"]!= "" || $_GET["id"] > 0  ) {
		$int_confid =$_GET["id"];
	}elseif($_POST["h_confid"]!= "" || $_POST["h_confid"] < 0  ) {
		$int_confid =$_POST["h_confid"];
	}else{
		$_SESSION[SESSION_TITLE.'flash'] = $errmsg_invalid_id;
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $errmsg_invalid_id_redirect_page;
		header( "Location: gfwflash.php");
		exit();
		
	}
	
	if(isset($_POST["h_confid"]) && $_POST["h_confid"] != ""  && $_POST["h_confinfo"] == md5("CONF_INFO") ){
		$int_confid = $_POST["h_confid"];
	
		if ($int_confid == -1) {
			$_SESSION[SESSION_TITLE.'flash'] = $errmsg_invalid_id;
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $errmsg_invalid_id_redirect_page;
			header( "Location: gfwflash.php");
			exit();
		}else {
			$this->gsconf->id=$int_confid;
			$this->gsconf->value=$_POST["txt_value"];
			if(isset($_POST["chk_publish"]) && $_POST["chk_publish"] == CONF_PUBLISH){
				$this->gsconf->publish=CONF_PUBLISH;
			}else{
				$this->gsconf->publish=CONF_NOT_PUBLISH;
			}
			if(isset($_POST["update"])) {
				if($this->gsconf->update()== true){
					$_SESSION[SESSION_TITLE.'flash'] = $msg_update_success;
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $msg_update_success_redirect_page;
					header( "Location: gfwflash.php");
					exit();
				}else{
					$_SESSION[SESSION_TITLE.'flash'] = $msg_update_failed;
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $msg_update_failed_redirect_page;
					header( "Location: gfwflash.php");
					exit();
				}
			}elseif(isset($_POST["delete"])) {
				if($this->gsconf->delete()== true){
					$_SESSION[SESSION_TITLE.'flash'] = $msg_delete_success;
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $msg_delete_success_redirect_page;
					header( "Location: gfwflash.php");
					exit();
				}else{
					$_SESSION[SESSION_TITLE.'flash'] = $msg_delete_failed;
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $msg_delete_failed_redirect_page;
					header( "Location: gfwflash.php");
					exit();
				}		
			}

		}
		
	}

		$this->gsconf->id=$int_confid;
		if ($this->gsconf->get_detail() == true) {
			$strvalue =stripcslashes($this->gsconf->value);
			$intpublish =stripcslashes($this->gsconf->publish);
			$int_confid = $this->gsconf->id;
			$configurationtype_id= $this->gsconf->configurationtype_id;
		}else{
// 			$strvalue ="";
// 			$int_confid = -1;
			$_SESSION[SESSION_TITLE.'flash'] = $errmsg_invalid_id;
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $errmsg_invalid_id_redirect_page;
			header( "Location: gfwflash.php");
			exit();
		}


 ?>