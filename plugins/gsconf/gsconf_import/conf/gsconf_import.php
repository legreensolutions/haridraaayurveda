<?php

$RD_MSG_lan_imported = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_que_imported','gsconf_import',"Configurations successfully imported for selected language ","Message on language import");

$RD_MSG_on_fail = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_on_fail','language',"Your attempt failed.Contact Admin","Message on Failure");

$MSG_empty_language = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'MSG_empty_language','gsconf_import',"Please Choose language from list .... ","Message on Empty language");


$CAP_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption','gsconf_import',"I&nbsp;m&nbsp;p&nbsp;o&nbsp;r&nbsp;t&nbsp;&nbsp; C&nbsp;o&nbsp;n&nbsp;f&nbsp;i&nbsp;g&nbsp;u&nbsp;r&nbsp;a&nbsp;t&nbsp;i&nbsp;o&nbsp;n&nbsp;s&nbsp; &nbsp;f&nbsp;o&nbsp;r&nbsp; &nbsp;L&nbsp;a&nbsp;n&nbsp;g&nbsp;u&nbsp;a&nbsp;g&nbsp;e","caption language");

$CAP_language = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_language','gsconf_import',"Language","caption language");

$CAP_import = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_import','gsconf_import',"Import","caption import");

$CAP_import_msg_success = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_import_msg_success','gsconf_import',"Configuration Imported From<br><br>","caption import");

?>