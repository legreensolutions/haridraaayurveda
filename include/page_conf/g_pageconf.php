<?php
// This is Global Page Configuration file
// All the Conf defined in this page is commonly used configurations (Common error messages)

// types of conf
//***************
// CONF_TYPE_TEXT
// CONF_TYPE_DYNAMIC_TEXT
// CONF_TYPE_MESSAGES
// CONF_TYPE_CAPTIONS
// CONF_TYPE_OBJECT_CAPTIONS
// CONF_TYPE_SYSTEMCONF

// get_conf($language_id,$configurationtype_id,$configuration_name,$page_name,$value="",$description="")
GLOBAL $g_msg_unauthorized_request;
$g_msg_unauthorized_request = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'g_msg_unauthorized_request ',"g_pageconf","<strong>Unauthorized Page Request</strong><br/> <br/> You are not authorized to access this page. This attempt will be reported to the system Administrator. ","Message for Unauthorized Page Request");

GLOBAL $g_msg_unauthorized_request_redirect_page;
$g_msg_unauthorized_request_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'g_msg_unauthorized_request_redirect_page',"g_pageconf","index.php","Unauthorized Page Request Delfault redirect page");

GLOBAL $g_orgname;
$g_orgname = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'g_orgname',"g_pageconf","Le Greens","This is Organisation Name");

GLOBAL $g_obj_select_default_text;
$g_obj_select_default_text = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'obj_select_default_text',"g_pageconf","Choose from list..","This is Select object default text");

GLOBAL $g_menu_Login; 
$g_menu_Login=$this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Login',"g_pageconf","Login");
GLOBAL $g_menu_Logout;
$g_menu_Logout=$this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Logout',"g_pageconf","Logout");
GLOBAL $g_menu_Logout_page;
$g_menu_Logout_page=$this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Logout_page',"g_pageconf","logout.php");


?>