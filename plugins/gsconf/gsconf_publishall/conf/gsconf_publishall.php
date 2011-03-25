<?php
$RD_MSG_unpublished = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_unpublished','gsconf_publishall',"UnPublished ","Message on UnPublish");

$RD_MSG_published = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_published','gsconf_publishall',"Published ","Message on Publish");

$RD_MSG_on_fail = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_on_fail','gsconf_publishall',"Your attempt failed.Contact Admin","Message on Failure");

$MSG_empty_language = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'MSG_empty_language','gsconf_publishall',"Language Empty ","Message on Empty language");

$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','gsconf_publishall',"P&nbsp;u&nbsp;b&nbsp;l&nbsp;i&nbsp;s&nbsp;h&nbsp;&nbsp;C&nbsp;o&nbsp;n&nbsp;t&nbsp;e&nbsp;n&nbsp;t","caption publish");

$CAP_language = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_language','gsconf_publishall',"Please select the Language","caption language");

$CAP_publish = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_publish','gsconf_publishall',"Publish","caption publish");

$CAP_unpublish = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_unpublish','gsconf_publishall',"UnPublish","caption Unpublish");
?>