<?php
$MSG_empty_subject  = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_subject','admin_view_books',"Subject Empty","Message on empty subject");

$MSG_empty_content  = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_empty_content','admin_view_books',"Content Empty","Message on empty content");

$RD_MSG_reply  = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_reply','admin_view_books',"Reply has been sent","Message on reply");

$RD_MSG_error  = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_error','admin_view_books',"Can't sent this Reply","Message on error");

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','admin_view_books',"V&nbsp;i&nbsp;e&nbsp;w&nbsp;&nbsp;B&nbsp;o&nbsp;o&nbsp;k","caption page");

$CAP_emailid = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_emailid','admin_view_books',"Emailid","caption Emailid");

$CAP_subject = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_subject','admin_view_books',"Subject","caption Subject");

$CAP_content = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_content','admin_view_books',"Content","caption Content");

$CAP_want_reply = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_want_reply','admin_view_books',"Do You Want To Reply Now?","caption want reply");

$CAP_reply = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_reply','admin_view_books',"Reply","caption Reply");

$CAP_re_subject = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_re_subject','admin_view_books',"Subject","caption Re Subject");

$CAP_re_content = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_re_content','admin_view_books',"Content","caption Re Content");
?>