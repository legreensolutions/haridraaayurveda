<?php
session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/conf/conf.php');
require(ROOT_PATH.'include/class/class_user/class_user.php');
 

$myuser = new User();
$chk = $myuser->logout();
if ($chk == true){
    header("Location: login.php");
    exit();
}
?>