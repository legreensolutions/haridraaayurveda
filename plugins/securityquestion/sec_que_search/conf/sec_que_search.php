<?php
$CAP_sec_que = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_que',"sec_que_search","Security Question","caption sec_que");

$CAP_Question = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_Question',"sec_que_search","Question","caption Question");

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','searchquestion',"S&nbsp;e&nbsp;a&nbsp;r&nbsp;c&nbsp;h&nbsp;&nbsp;Q&nbsp;u&nbsp;e&nbsp;s&nbsp;t&nbsp;i&nbsp;o&nbsp;n","caption searchquestion");

$CAP_submit_search = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_submit_search',"sec_que_search","Search","caption submit search");
?>