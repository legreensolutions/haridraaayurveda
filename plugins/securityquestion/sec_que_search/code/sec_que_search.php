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


        $Mysec_que = new securityquestion($myconnection);
        $Mysec_que->connection = $myconnection;
        $chk = $Mysec_que->get_list_array();

        //for pagination
        $Mysec_que->total_records = $Mypagination->total_records;

        $data_bylimit = $Mysec_que->get_list_array_bylimit($_GET["lstsec_que"],$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $Mysec_que->total_records;
            $Mypagination->paginate();

        }

?>