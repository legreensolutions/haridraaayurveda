<?php


$MSG_length_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_length_password ','change_password',"Password Contain unwanted Characters or below 5 Characters ","Message on length of Password");

$MSG_empty_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_password ','change_password',"Password Empty ","Message on Empty Password");

$MSG_empty_new_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_new_password','change_password',"New Password Empty ","Message on Empty New Password");

$MSG_empty_retype_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_retype_password ','change_password',"Retype Password Empty ","Message on Empty Retype Password");

$MSG_unmatching_passwords = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_unmatching_passwords','change_password',"Unmatching Passwords","Message on Unmatching Passwords");

$RD_MSG_incorrect_password  = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_incorrect_password','change_password',"Password seems to be incorrect","Message on incorrect Passwords");

$RD_MSG_changed_password  = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_changed_password','change_password',"Password Changed.Check your mail to get the new password","Message on changed Passwords");

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','change_password',"C&nbsp;h&nbsp;a&nbsp;n&nbsp;g&nbsp;e&nbsp;&nbsp;P&nbsp;a&nbsp;s&nbsp;s&nbsp;w&nbsp;o&nbsp;r&nbsp;d","caption page");

$CAP_password = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_password','change_password',"Password","caption Password");

$CAP_new_password = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_new_password','change_password',"Current Password","caption New Password");

$CAP_retype_password = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_retype_password','change_password',"Retype Password","caption Retype Password");

$CAP_change = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_change','change_password',"Change","caption Change");

?>