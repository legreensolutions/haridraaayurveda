<?php
if ($_POST['submit'] == $CAP_submit){

if ( $_POST['txtname'] == "" ){
    $guestbook_error .= "<br/>".$MSG_empty_name;
}
if ( $_POST['txtemailid'] == "" ){
    $guestbook_error .= "<br/>".$MSG_empty_emailid;
}
if ( $_POST['txtsubject'] == "" ){
    $guestbook_error .= "<br/>".$MSG_empty_subject;
}
if ( $_POST['txtcontent'] == "" ){
    $guestbook_error .= "<br/>".$MSG_empty_content;
}
if ( $guestbook_error == "" ){
      $mymessage = new Message();
      $mymessage->name = $_POST['txtname'];
      $mymessage->address = $_POST['txtaddress'];
      $mymessage->phone = $_POST['txtphone'];
      $mymessage->emailid = $_POST['txtemailid'];
      $mymessage->subject = $_POST['txtsubject'];
      $mymessage->content = $_POST['txtcontent'];
      $mymessage->status_id = UNREAD;
      $mymessage->messagetype_name = GUESTBOOK;

      $mymessage->connection = $myconnection;
      $mymessage->get_messagetype_id();

      $chk = $mymessage->update();
                            if ($chk == false){
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_error;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            //echo $msg_unmatching_que_ans;exit();
                            }
                            else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_msgadded;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
                            }
}


}
?>