<?php

$MSG_empty_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_username ','signup',"Username Empty ","Message on Empty Username");

$MSG_invalid_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_invalid_username ','signup',"Username is not a valid E-mail Address","Message on Invalid Username");

$MSG_empty_firstname = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_firstname ','signup',"Firstname Empty ","Message on Empty First");

$MSG_empty_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_password ','signup',"Password Empty ","Message on Empty Password");

$MSG_empty_retype_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_retype_password ','signup',"Retype Password Empty ","Message on Empty Retype Password");

$MSG_unmatching_passwords = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_unmatching_passwords','signup',"Unmatching Passwords","Message on Unmatching Passwords");

$MSG_length_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_length_password ','signup',"Password Contain unwanted Characters or below 5 Characters ","Message on length of Password");

$MSG_invalid_filename = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_invalid_filename ','signup',"Filename is not valid","Message on Invalid Filename");

$MSG_empty_sec_que = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_sec_que','signup',"Security Question Empty ","Message on Empty Sec_Que");

$MSG_empty_sec_ans = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_sec_ans ','signup',"Answer Empty ","Message on Empty Sec_Ans");

$MSG_enter_security_code = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_enter_security_code','signup',"Please enter the security Code","Message enter security code");

$MSG_text_in_image = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_text_in_image','signup',"type the text you see in the image.","Message type the text");

$MSG_invalid_security_code = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_invalid_security_code','signup',"Sorry, you have provided an invalid security code","Message invalid security code");

$MSG_empty_security_code = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_security_code','signup',"security code cannot be empty","Message security code cannot be empty");


$RD_MSG_attempt_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_attempt_failed','signup',"Attempt Failed","Message on attempt_failed");

$RD_MSG_mail_sent = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_mail_sent','signup',"Check your mail to confirm registration","Message on Mail Sent");

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','signup',"S&nbsp;&nbsp;i&nbsp;&nbsp;g&nbsp;&nbsp;n&nbsp;&nbsp;&nbsp;&nbsp; U&nbsp;&nbsp;p","caption page");

$CAP_username = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_username','signup',"Username","caption Username");

$CAP_password = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_password','signup',"Password","caption Password");

$CAP_repassword = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_repassword','signup',"Retype Password","caption RePassword");

$CAP_firstname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_firstname','signup',"Firstname","caption Firstname");

$CAP_lastname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_lastname','signup',"Lastname","caption Lastname");

$CAP_address = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_address','signup',"Address","caption Address");

$CAP_city = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_city','signup',"City","caption City");

$CAP_country = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_country','signup',"Country","caption Country");

$CAP_image = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_image','signup',"Upload Image","caption Image");

$CAP_sec_que = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_que','signup',"Security Question","caption sec_que");

$CAP_sec_ans = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_ans','signup',"Security Answer","caption sec_ans");

$CAP_submit = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_submit','signup',"Submit","caption Submit");





$MSG_VAL_image_err1 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err1','profile',"File not uploaded. Please select a valid image file   <br>");

$MSG_VAL_image_err2 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err2','profile',"nvalid File Type. Please select a jpg/jpeg/png file   <br>");

$MSG_VAL_image_err3 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err3','profile',"Invalid file size. Please upload a file with size less than 1 MB    <br>");

$MSG_VAL_image_err4 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err4','profile',"Invalid Image Dimension. Please upload an image within the allowed dimension (150x100 to 800x600)   <br>");

$MSG_VAL_image_err5 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err5','profile',"Unable to move the file to the directory   <br>");

$MSG_VAL_image_err6 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err6','profile',"Unable to create the thumbnail    <br>");

$MSG_image_uploaded = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_uploaded','profile',"Image uploaded & renamed");

$MSG_image_err_upload = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_err_upload','profile',"Error while renaming the uploaded files. Contact administrator");

?>