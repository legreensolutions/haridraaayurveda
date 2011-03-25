<?php
$MSG_mesg = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_mesg ','user_list',"No Records Found ","Message on Empty Recordset");

$MSG_empty_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_username ','user_list',"Username Empty ","Message on Empty Username");

$MSG_invalid_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_invalid_username ','user_list',"Username is not a valid E-mail Address","Message on Invalid Username");

$RD_MSG_attempt_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_attempt_failed','user_list',"Attempt Failed","Message on attempt_failed");

$RD_MSG_mail_sent = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_mail_sent','user_list',"Check your mail to confirm registration","Message on Mail Sent");


$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','user_list',"U&nbsp;s&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;L&nbsp;i&nbsp;s&nbsp;t","caption page");

$CAP_username = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_username','user_list',"&nbsp;User&nbsp;Name&nbsp;","caption Username");

$CAP_firstname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_firstname','user_list',"&nbsp;First&nbsp;Name&nbsp;","caption First Name");

$CAP_lastname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_lastname','user_list',"&nbsp;Last&nbsp;Name&nbsp;","caption Lastname");

$CAP_address = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_address','user_list',"&nbsp;Address&nbsp;","caption Address");

$CAP_usertype = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_usertype','user_list',"&nbsp;User&nbsp;type&nbsp;","caption usertype");

$CAP_userstatus = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_userstatus','user_list',"&nbsp;User&nbsp;Status&nbsp;","caption userstatus");

$CAP_city = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_city','user_list',"&nbsp;City&nbsp;","caption City");

$CAP_country = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_country','user_list',"&nbsp;Country&nbsp;","caption Country");


$CAP_submit = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_submit','user_list',"Search","caption Submit");



?>