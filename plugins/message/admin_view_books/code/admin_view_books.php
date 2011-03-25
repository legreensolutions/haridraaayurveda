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

if ($_POST['submit'] == $CAP_reply){
if ( $_POST['txtre_subject'] == "" ){
    $viewbook_error .= "<br/>".$MSG_empty_subject;
}
if ( $_POST['txtre_content'] == "" ){
    $viewbook_error .= "<br/>".$MSG_empty_content;
}

if ( $viewbook_error == "" ){

      $mymessage = new Message();
      $mymessage->connection = $myconnection;

      $mymessage->parentmessage_id = $_POST['h_id'];
      $mymessage->emailid = $_POST['h_emailid'];
      $mymessage->subject = $_POST['txtre_subject'];
      $mymessage->content = $_POST['txtre_content'];
      $mymessage->status_id = UNREAD;
      $mymessage->messagetype_name = GUESTBOOK;
      $mymessage->get_messagetype_id();
      $chk = $mymessage->update();
      //mail($strTo,$strSubject,$strMailbody,$headers);
      $headers = "Reply to admin";
//       echo  $mymessage->emailid."____".$mymessage->subject."_________".$mymessage->content."_______".$headers;exit();

     // mail($mymessage->emailid,$mymessage->subject,$mymessage->content,$headers);
                            if ($chk == false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_error;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
                            else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_reply;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "admin_list_guestbooks.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}

}

elseif ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $mymessage = new Message();
      $mymessage->id = $_GET['id'];
      $mymessage->connection = $myconnection;
      $chk = $mymessage->get_detail();
      $mymessage->change_status();
}
else{
header( "Location: index.php");
                            exit();
}
?>