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
 $mycountry = new country($myconnection);
 $mycountry->connection = $myconnection;
 $chk_country = $mycountry->get_list_array();

 $myusertype = new usertype($myconnection);
 $myusertype->connection = $myconnection;
 $chk_usertype = $myusertype->get_list_array();

 $myuserstatus = new userstatus($myconnection);
 $myuserstatus->connection = $myconnection;
 $chk_userstatus = $myuserstatus->get_list_array();

 //for pagination
        $Mypagination = new Pagination(20);
        $myuser->connection = $myconnection;
        //for pagination
        $myuser->total_records = $Mypagination->total_records;

        $data_bylimit = $myuser->get_list_array_bylimit($_GET["txtusername"],$_GET["txtfirstname"],$_GET["txtlastname"],$_GET["txtaddress"],$_GET["txtcity"],$_GET["lstcountry"],$_GET["lstusertype"],$_GET["lstuserstatus"],$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $myuser->total_records;
            $Mypagination->paginate();

        }
?>