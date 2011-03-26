<?php
$i=0;

GLOBAL $menu_list;
GLOBAL $g_msg_unauthorized_request;

$menu_list[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_home',"g_menuconf","Home");
$menu_list[$i][url]="index.php";
$menu_list[$i][usertype] = 0;
$menu_list[$i][page_name]="index";
$i++;

$menu_list[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_ayurveda',"g_menuconf","Ayurveda");
$menu_list[$i][url]="ayurveda.php";
$menu_list[$i][usertype] = -1;
$menu_list[$i][page_name]="ayurveda";
$i++;

$menu_list[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_aboutus',"g_menuconf","About us");
$menu_list[$i][url]="aboutus.php";
$menu_list[$i][usertype] = -1;
$menu_list[$i][page_name]="aboutus";
$i++;

$menu_list[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_contactus',"g_menuconf","Contact us");
$menu_list[$i][url]="contactus.php";
$menu_list[$i][usertype] = -1;
$menu_list[$i][page_name]="contactus";
$i++;

$menu_list[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_GFW Menu',"g_menuconf","GFW Menu");
$menu_list[$i][url]="#";
$menu_list[$i][usertype] = USERTYPE_ADMIN;
$menu_list[$i][submenu] = "gfw_menu";
$menu_list[$i][page_name]="";
$i++;

$g_menu_user_menu = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_user_menu',"g_menuconf","User Menu");

$menu_list[$i][caption] = $g_menu_user_menu;
$menu_list[$i][url]="#";
$menu_list[$i][usertype] = USERTYPE_ADMIN;
$menu_list[$i][submenu] = "user_menu_admin";
$menu_list[$i][page_name]="";
$i++;

$menu_list[$i][caption] = $g_menu_user_menu;
$menu_list[$i][url]="#";
$menu_list[$i][usertype] = USERTYPE_REGISTERED_USER;
$menu_list[$i][submenu] = "user_menu_registered_user";
$menu_list[$i][page_name]="";
$i++;

$menu_list[$i][caption] = $g_menu_user_menu;
$menu_list[$i][url]="#";
$menu_list[$i][usertype] = USERTYPE_EMPLOYEE;
$menu_list[$i][submenu] = "user_menu_employee";
$menu_list[$i][page_name]="";
$i++;

$menu_list[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_guestbook',"g_menuconf","Messages");
$menu_list[$i][url]="messages.php";
$menu_list[$i][usertype] = 0;
$menu_list[$i][submenu] = "guestbook_menu";
$menu_list[$i][page_name]="guestbook";
$i++;

$menu_list[$i][caption] = $g_menu_Login;
$menu_list[$i][url]="login.php";
$menu_list[$i][usertype] = 0;
$menu_list[$i][page_name]="login";
$i++;

// $menu_list[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Sign Up',"g_menuconf","Sign Up");
// $menu_list[$i][url]="signup.php";
// $menu_list[$i][usertype] = -1;
// $menu_list[$i][page_name]="signup";
// $i++;



GLOBAL $gfw_menu;
$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Search Conf',"g_menuconf","Search Conf");
$gfw_menu[$i][url]="gsconf_search.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;

$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Publish Conf (ALL)',"g_menuconf","Publish Conf (ALL)");
$gfw_menu[$i][url]="gsconf_publishall.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;

$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Import Conf',"g_menuconf","Import Conf");
$gfw_menu[$i][url]="gsconf_import.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;


$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Settings',"g_menuconf","Settings");
$gfw_menu[$i][url]="gsconf_settings.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;

$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Languages',"g_menuconf","Languages");
$gfw_menu[$i][url]="language_search.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;

$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Add Language',"g_menuconf","Add Language");
$gfw_menu[$i][url]="language.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;

$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Images',"g_menuconf","Images");
$gfw_menu[$i][url]="image_upload.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;


$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_backup',"g_menuconf","Backup Data");
$gfw_menu[$i][url]="backup.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;


$gfw_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_restore',"g_menuconf","Restore Data");
$gfw_menu[$i][url]="restore.php";
$gfw_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;


GLOBAL $user_menu_admin;
$user_menu_admin[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Profile',"g_menuconf","Profile");
$user_menu_admin[$i][url]="profile.php";
$user_menu_admin[$i][usertype] = USERTYPE_ADMIN;
$i++;
$user_menu_admin[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Change Password',"g_menuconf","Change Password");
$user_menu_admin[$i][url]="change_passwd.php";
$user_menu_admin[$i][usertype] = USERTYPE_ADMIN;
$i++;

$user_menu_admin[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Add Security Question',"g_menuconf","Add Security Question");
$user_menu_admin[$i][url]="securityquestion.php";
$user_menu_admin[$i][usertype] = USERTYPE_ADMIN;
$i++;

$user_menu_admin[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Search Security Question',"g_menuconf","Search Security Question");
$user_menu_admin[$i][url]="sec_que_search.php";
$user_menu_admin[$i][usertype] = USERTYPE_ADMIN;
$i++;

$user_menu_admin[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Add User',"g_menuconf","Add User");
$user_menu_admin[$i][url]="add_user.php";
$user_menu_admin[$i][usertype] = USERTYPE_ADMIN;
$i++;

$user_menu_admin[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_User List',"g_menuconf","User List");
$user_menu_admin[$i][url]="user_list.php";
$user_menu_admin[$i][usertype] = USERTYPE_ADMIN;
$i++;


GLOBAL $user_menu_registered_user;
$user_menu_registered_user[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Profile',"g_menuconf","Profile");
$user_menu_registered_user[$i][url]="profile.php";
$user_menu_registered_user[$i][usertype] = USERTYPE_REGISTERED_USER;
$i++;




GLOBAL $user_menu_employee;
$user_menu_employee[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'g_menu_Profile',"g_menuconf","Profile");
$user_menu_employee[$i][url]="profile.php";
$user_menu_employee[$i][usertype] = USERTYPE_EMPLOYEE;
$i++;





GLOBAL $guestbook_menu;

$guestbook_menu[$i][caption] = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'guestbook_menu_admin_list_messages',"g_menuconf","List Messages" );
$guestbook_menu[$i][url]="admin_list_messages.php";
$guestbook_menu[$i][usertype] = USERTYPE_ADMIN;
$i++;






?>

