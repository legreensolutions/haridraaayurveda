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
        $Mypagination = new Pagination(20);

        $Mylanguage = new Language($myconnection);
        $Mylanguage->connection = $myconnection;
        

        //for pagination
        $Mylanguage->total_records = $Mypagination->total_records;
        if ( $_GET['chkpublish'] != "" ){
            $publish = CONF_PUBLISH;
        }
        else{
            $publish = CONF_NOT_PUBLISH;
        }
        $data_bylimit = $Mylanguage->get_list_array_bylimit($_GET["txtlanguage"],$publish,$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $Mylanguage->total_records;
            $Mypagination->paginate();

        }

?>