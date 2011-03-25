<?
  function send_email_to_user($uname, $passwd,$email,$id) {
// function used to mail to user and admin (user info and password)
    $strFrom=EMAIL_INFO;
    $strTo = $email;

    $strSubject="Activate your chowder account";
//     To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
//     Additional headers
    $headers .= 'From: claimchowder Registration <'.$strFrom.'>'."\r\n";
    $headers .= 'Reply-To: <'.$strFrom.'>'."\r\n";

    $strMailbody = "Hi " . $uname . ",<br /><br />";
    $strMailbody .="Thanks for registering with us at claimchowder.com. We look forward to seeing you around the site.<br />";
    $strMailbody .="To complete your registration, you need to confirm that you received this email. To do simply click the link below:<br />";
    $strMailbody .="<a  target=\"_blank\"  href=\"".WEB_URL."/login.php?".md5("AL")."=".md5($id)."\">click here to activate your chowder account</a>";
    $strMailbody .="<br />Here is your password for ".WEB_URL." Site .<br> You can change it after you log into the site.<br /><br />";
   
    
    $strMailbody .="Your Username :". $uname ."<br />";
    $strMailbody .="Your Password :". $passwd . "<br /><br /><br /><br /><br />
    Thanks,<br />
    claimchowder.com<br /><br />";
    $strMailbody .="If clicking the link does not work, just copy and paste the entire link into your browser. If you are still having problems, simply forward this email to ".EMAIL_SUPPORT." and we will do our best to help you. <br/> <br/>
    Welcome to claimchowder.com!";
    
    //Send the mail to the Registered User with activation link
    //mail($strTo,$strSubject,$strMailbody,$headers);
      echo $strMailbody;
//     exit();
}
?>