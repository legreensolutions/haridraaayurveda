<?php

$MSG_empty_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_username ','add_user',"Username Empty ","Message on Empty Username");

$MSG_invalid_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_invalid_username ','add_user',"Username is not a valid E-mail Address","Message on Invalid Username");

$MSG_empty_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_password ','add_user',"Either u have to type password or click the check box to generate Password","Message on Empty Password");

$MSG_empty_retype_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_retype_password ','add_user',"Retype Password Empty ","Message on Empty Retype Password");

$MSG_unmatching_passwords = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_unmatching_passwords','add_user',"Unmatching Passwords","Message on Unmatching Passwords");

$MSG_length_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_length_password ','add_user',"Password Contain unwanted Characters or below 5 Characters ","Message on length of Password");

$MSG_invalid_filename = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_invalid_filename ','add_user',"Filename is not valid","Message on Invalid Filename");

$MSG_empty_firstname = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_firstname ','add_user',"Firstname Empty ","Message on Empty First");

$MSG_empty_usertype = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_usertype ','add_user',"Usertype Empty ","Message on Empty usertype");

$MSG_empty_userstatus = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_userstatus ','add_user',"Userstatus Empty ","Message on Empty userstatus");

$MSG_empty_sec_que = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_sec_que','add_user',"Security Question Empty ","Message on Empty Sec_Que");

$MSG_empty_sec_ans = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_sec_ans ','add_user',"Answer Empty ","Message on Empty Sec_Ans");

$RD_MSG_image_deleted = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_image_deleted','add_user',"Image deleted","Message on image Deletion");

$RD_MSG_deleted = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_deleted','add_user',"User Deleted","Message on Deletion");

$RD_MSG_updated = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_updated','add_user',"User Updated","Message on Updation");

$RD_MSG_attempt_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_attempt_failed','add_user',"Attempt Failed","Message on attempt_failed");

$RD_MSG_added = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_mail_sent','add_user',"User added","Message on Mail Sent");



$CAP_page_caption_add = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption_add','add_user',"A&nbsp;&nbsp;d&nbsp;&nbsp;d&nbsp;&nbsp;&nbsp;&nbsp;U&nbsp;&nbsp;s&nbsp;&nbsp;e&nbsp;&nbsp;r","caption page add");

$CAP_page_caption_update = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption_update','add_user',"U&nbsp;&nbsp;p&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;&nbsp;t&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;&nbsp;U&nbsp;&nbsp;s&nbsp;&nbsp;e&nbsp;&nbsp;r","caption page update");

$CAP_username = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_username','add_user',"Username","caption Username");

$CAP_password = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_password','add_user',"Password","caption Password");

$CAP_repassword = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_repassword','add_user',"Retype Password","caption RePassword");

$CAP_usertype = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_usertype','add_user',"Usertype","caption Usertype");

$CAP_userstatus = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_userstatus','add_user',"Userstatus","caption Userstatus");

$CAP_firstname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_firstname','add_user',"Firstname","caption Firstname");

$CAP_lastname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_lastname','add_user',"Lastname","caption Lastname");

$CAP_address = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_address','add_user',"Address","caption Address");

$CAP_city = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_city','add_user',"City","caption City");

$CAP_country = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_country','add_user',"Country","caption Country");

$CAP_image = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_image','add_user',"Upload Image","caption Image");

$CAP_sec_que = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_que','add_user',"Security Question","caption sec_que");

$CAP_sec_ans = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_ans','add_user',"Security Answer","caption sec_ans");

$CAP_add = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_add','add_user',"Add User","caption add");

$CAP_update = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_update','add_user',"Update User","caption update");

$CAP_delete = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_delete','add_user',"Delete User","caption delete");

$CAP_delete_image = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_delete_image','add_user',"Delete Image","caption delete_image");





$MSG_VAL_image_err1 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err1','add_user',"File not uploaded. Please select a valid image file   <br>");

$MSG_VAL_image_err2 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err2','add_user',"nvalid File Type. Please select a jpg/jpeg/png file   <br>");

$MSG_VAL_image_err3 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err3','add_user',"Invalid file size. Please upload a file with size less than 1 MB    <br>");

$MSG_VAL_image_err4 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err4','add_user',"Invalid Image Dimension. Please upload an image within the allowed dimension (150x100 to 800x600)   <br>");

$MSG_VAL_image_err5 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err5','add_user',"Unable to move the file to the directory   <br>");

$MSG_VAL_image_err6 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err6','add_user',"Unable to create the thumbnail    <br>");

$MSG_image_uploaded = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_uploaded','add_user',"Image uploaded & renamed");

$MSG_image_err_upload = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_err_upload','add_user',"Error while renaming the uploaded files. Contact administrator");

?>