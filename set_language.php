<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/conf/conf.php');
require(ROOT_PATH.'include/conf/gfw_conf.php');

if(isset($_POST["h_check"]) && $_POST["h_check"] == md5("CONF_LANG") && $_POST["lstlanguage"] != gINVALID ){
	$_SESSION[SESSION_TITLE.'gLANGUAGE'] = $_POST["lstlanguage"];
	header("Location: ".$_POST["h_url"]);
	exit();
}elseif(isset($_GET["h_c"]) && $_GET["h_c"] == md5("CONF_LANG") && $_GET["lang"] != "" ){
	$_SESSION[SESSION_TITLE.'gLANGUAGE'] = $_GET["lang"];
	if(trim($_GET["url"])=="") {
		header("Location: index.php");
	}else{
		header("Location: ".$_GET["url"]);
	}
	exit();
}else{
	if(trim($_GET["url"])=="") {
		header("Location: index.php");
	}else{
		header("Location: ".$_GET["url"]);
	}
	exit();
}

?>