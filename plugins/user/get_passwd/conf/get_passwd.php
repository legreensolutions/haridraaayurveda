<?php

$MSG_empty_username = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_username ','get_password',"Username Empty ","Message on Empty Username");

$MSG_empty_sec_que = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_sec_que','get_password',"Security Question Empty ","Message on Empty Sec_Que");

$MSG_empty_sec_ans = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_sec_ans ','get_password',"Answer Empty ","Message on Empty Sec_Ans");

$RD_MSG_unmatching_que_ans = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_unmatching_que_ans','get_password',"Security Question and Answer are not matching","Message on Unmatching Que_Ans");

$RD_MSG_mail_sent = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_mail_sent','get_password',"Check your mail to get the new password","Message on Mail Sent");

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','get_password',"G&nbsp;e&nbsp;t&nbsp;&nbsp;P&nbsp;a&nbsp;s&nbsp;s&nbsp;w&nbsp;o&nbsp;r&nbsp;d","caption page");

$CAP_username = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_username','get_password',"Username","caption Username");

$CAP_sec_que = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_que','get_password',"Security Question","caption sec_que");

$CAP_sec_ans = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_ans','get_password',"Security Answer","caption sec_ans");

$CAP_submit = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_submit','get_password',"Submit","caption Submit");

?>