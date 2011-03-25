<?php
$msg_email_activation_success = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_email_activation_success',"login","Your account has been activated. Please login using your User Name and Password ","Message on successfull email activation");

$msg_email_activation_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_email_activation_failed',"login","Your account has not been activated. Please contact Administrator ","Message on failed email activation");

$msg_empty_loginname = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_empty_loginname',"login","Login Name Empty ","Message on Empty Login name");

$msg_empty_password = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_empty_password',"login","Password Empty ","Message on Empty Login name");

$msg_default_username = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'msg_default_username',"login","Enter your email address ","Message for default username object");

$msg_error_login = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_error_login',"login","Invalid Login/Password","msg_error_login");

$conf_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_page_caption',"login","L&nbsp;&nbsp;o&nbsp;&nbsp;g&nbsp;&nbsp;i&nbsp;&nbsp;n","caption page");

$conf_username = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_username',"login","User Name","caption User Name");

$conf_password = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_password',"login","Password","caption Password");


$conf_sign_in = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'conf_sign_in',"login","Sign In","caption Sign In");


 $conf_forgot_password = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'conf_forgot_password',"login","I forgot my password","object caption forgot password");

$conf_forgot_password_link = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'conf_forgot_password_link',"login","get_passwd.php","forgot password link page");


?>