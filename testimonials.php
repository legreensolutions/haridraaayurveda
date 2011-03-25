<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/class/class_gspage/class_gspage.php');   // new Page Class

$page = new gsPage;

    $page->current_url = $current_url;  // current url for pages
    $page->title = "Green FrameWork";   // page Title
    $page->page_name = 'testimonials';     // page name for menu and other purpose
    $page->layout = 'haridraa_default.html';     // layout name

    $page->conf_list = array("conf.php");
    $page->menuconf_list = array("menu_conf.php");

    $page->connection_list = array("connection.php",);

    $page->function_list = array("functions.php","image.php");
    $page->class_list = array("class_user.php","class_gspagination.php","class_usertype.php","class_message.php");

    $index=0;
    $content_list[$index]['file_name']='inc_language.php';
    $content_list[$index]['var_name']='language';
    $index++;
    $content_list[$index]['file_name']='inc_haridraa_menu.php';
    $content_list[$index]['var_name']='haridraa_menu';
	$index++;
	$content_list[$index]['file_name']='inc_footer.php';
	$content_list[$index]['var_name']='footer';
    $page->content_list = $content_list;

    $page->plugin_path = 'plugins/message/';
    $page->plugin = 'guestbook';
    $page->get_plugin(); //completed pluggin with dynamic content will be displayed
?>                                `

