<?php
$MSG_mesg = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_mesg ','admin_list_guestbooks',"No Records Found ","Message on Empty Recordset");

/*$MSG_empty_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_username ','user_list',"Username Empty ","Message on Empty Username");

$MSG_invalid_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_invalid_username ','user_list',"Username is not a valid E-mail Address","Message on Invalid Username");

$RD_MSG_attempt_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_attempt_failed','user_list',"Attempt Failed","Message on attempt_failed");

$RD_MSG_mail_sent = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_mail_sent','user_list',"Check your mail to confirm registration","Message on Mail Sent");
*/

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','admin_list_guestbooks',"G&nbsp;u&nbsp;e&nbsp;s&nbsp;t&nbsp;&nbsp;L&nbsp;i&nbsp;s&nbsp;t","caption page");

$CAP_emailid = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_emailid','admin_list_guestbookst',"&nbsp;Emailid&nbsp;","caption Emailid");

$CAP_subject = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_subject','admin_list_guestbooks',"&nbsp;Subject&nbsp;","caption Subject");

$CAP_date = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_date','admin_list_guestbooks',"&nbsp;Date&nbsp;","caption Date");

$CAP_address = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_address','admin_list_guestbooks',"&nbsp;Address&nbsp;","caption Address");

$CAP_name = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_name','admin_list_guestbooks',"&nbsp;Name&nbsp;","caption Name");

$CAP_submit = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_submit','admin_list_guestbooks',"Search","caption Submit");



?>