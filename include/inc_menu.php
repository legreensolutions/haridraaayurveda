<div style="width:100%; height:30px; background-color:#454216;" id="menu"></div>
<script language="JavaScript">
<!--
var menuConfig = [
{
	'height':  16,
	'width' : 100,
	'firstX' : 0,
	'firstY' : 122,
	'nextX' : 1,
	'hideAfter' : 600,
	'css'   : 'gurtl0o',
	'trace' : true
},
{
	'height':  23,
	'width' : 180,
	'firstY' : 25,
	'firstX' :  0,
	'nextY' : -1,
	'css' : 'gurtl1o'
},
{
	'firstX' : 111,
	'firstY' : 0
}
];



<?php
GLOBAL $menu_debug_output;
function gen_menu_hierarchy($menu_list){
GLOBAL $g_menu_Login; 
GLOBAL $g_menu_Logout;
GLOBAL $g_menu_Logout_page;
    $str_menu = "";
    $first_menu = true;
    foreach ($menu_list as $my_menu) {
		if ( $my_menu["caption"] == $g_menu_Login && $_SESSION[SESSION_TITLE.'userid'] > 0){
			$my_menu["caption"] = $g_menu_Logout;
			$my_menu["url"] = $g_menu_Logout_page;
		}

    	if ( ($my_menu["usertype"] == 0) || ($my_menu["usertype"] == $_SESSION[SESSION_TITLE.'usertypeid']) || ($my_menu["usertype"] == -1 && !isset($_SESSION[SESSION_TITLE.'usertypeid'])) ){

			if ( !$first_menu ){
				$str_menu .= ",";
			}
			if ( $my_menu["url"] == '#' ){
				$str_menu .= "['" . $my_menu["caption"] . "'";
			}else{
				

				if(strstr($my_menu["url"],"?")){
					$tmp_file= explode("?",$my_menu["url"]);
					$filename = ROOT_PATH.$tmp_file[0];
				}else{
					$filename = ROOT_PATH.$my_menu["url"];
				}

				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					// ok
				}else{
					GLOBAL $menu_debug_output;
					$menu_debug_output .= 'From Menu :: File :: '.$filename ." not exisist. <br/>";
					$my_menu["url"] ="#";
				}
				

				
				$str_menu .= "[get_link('" . $my_menu["caption"] . "','".$my_menu["url"]."')";
			}

			if ( $my_menu["submenu"] != "" ){
				$submenu = $my_menu["submenu"];
				$str_menu .= ", null,  ";
				GLOBAL $$submenu;
				$str_menu .= gen_menu_hierarchy($$submenu);	
			}
			$str_menu .= ']';
        }
            $first_menu = false;
    }
		return $str_menu;
    }

?>
var menuHierarchy = [ <?php echo gen_menu_hierarchy($menu_list); ?> ];



function get_link(caption,url) {
	return '<a href="'+url+'">'+caption+'</a>'
}




new menu (menuHierarchy, menuConfig);
//-->
</script>

<?php $this->debug_output.=$menu_debug_output;  ?>