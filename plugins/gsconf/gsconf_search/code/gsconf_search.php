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
		//for pagination
		$Mypagination = new Pagination(50);
	
		$this->gsconf->connection = $myconnection;

		//for pagination
		$this->gsconf->total_records = $Mypagination->total_records;

		$data_bylimit = $this->gsconf->get_list_array_bylimit($_GET["lstlanguage"],$_GET["lstconfigurationtype"],$_GET["txtconfigurationname"],$_GET["txtpagename"],$_GET["txtvalue"],$_GET["txtdescription"],$_GET["chk_publish"],$Mypagination->start_record,$Mypagination->max_records);
		
		if ( $data_bylimit == false ){
			$mesg = "No records found";
		}else{
			$count_data_bylimit=count($data_bylimit);
			$Mypagination->total_records = $this->gsconf->total_records;
			$Mypagination->paginate();

		}


?>