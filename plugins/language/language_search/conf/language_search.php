<?php
$CAP_search_language = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_search_language',"language_search","Search language","caption search_language");

$CAP_language = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_language',"language_search","Language","caption language");

$CAP_publish = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_publish',"language_search","Publish","caption publish");

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','language_search',"S&nbsp;e&nbsp;a&nbsp;r&nbsp;c&nbsp;h&nbsp;&nbsp;L&nbsp;a&nbsp;n&nbsp;g&nbsp;u&nbsp;a&nbsp;g&nbsp;e","caption searchlanguage");

$CAP_submit_search = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_submit_search',"language_search","Search","caption submit search");
?>