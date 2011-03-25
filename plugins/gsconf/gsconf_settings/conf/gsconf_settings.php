<?php

$conf_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_page_caption','gsconf_settings',"G&nbsp;&nbsp;F&nbsp;&nbsp;W&nbsp;&nbsp;&nbsp;&nbsp;S&nbsp;&nbsp;e&nbsp;&nbsp;t&nbsp;&nbsp;t&nbsp;&nbsp;i&nbsp;&nbsp;n&nbsp;&nbsp;g&nbsp;&nbsp;s");

$conf_show_debug_window = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_show_debug_window','gsconf_settings',"Show Debug Window","caption Show Debug Window");


$conf_enable_online_editting = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_enable_online_editting','gsconf_settings',"Enable Online Editing","caption enable online editing");

$conf_enable_gallery= $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_enable_gallery','gsconf_settings',"View Gallery with Editor ");

$conf_language = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_language','gsconf_settings',"Language","caption language");



$msg_update_success = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_update_success','gsconf_settings',"Configuration successfully updated","Message on successfull update");

$msg_update_success_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'msg_update_success_redirect_page','gsconf_settings',"gsconf_settings.php","Redirect page on sucessfull update");

$msg_update_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_update_failed','gsconf_settings',"Configuration update failed","Message on update failed");

$msg_update_failed_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'msg_update_failed_redirect_page','gsconf_settings',"gsconf_settings.php","Redirect page on update failed");






$conf_submit_update = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'conf_submit_update','gsconf_settings',"Update","caption submit update");




?>