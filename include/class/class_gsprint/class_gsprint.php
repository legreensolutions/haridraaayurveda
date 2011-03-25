<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
	exit();
}

class gsPrint {

	var $page_top = .18;
	var $page_left = .18;
	var $page_width = 8.3;
	var $page_height = 8;

	var $page_break = .18;
	

	var $margin_top = 0;
	var $margin_bottom = 0;
	var $margin_left = 0;
	var $margin_right = 0;

	var $pages = array();


	function get_pages(){
	$print_new_page = false;
	$print_table_end = false;		
	$check_ie = false;
	$browser = $_SERVER[HTTP_USER_AGENT];
	$my_browser =$browser;
	if (substr_count($browser,"Firefox") > 0) {
		$my_browser ="F";
	}elseif (substr_count($browser,"Opera") > 0) {
		$my_browser ="O";
	}elseif (substr_count($browser,"MSIE") > 0) {
		$my_browser ="I";
		$check_ie=true;
	}


	$page_top =$this->page_top;
	$page_width = $this->page_width;
	$page_height = $this->page_height;
	$page_left = $this->page_left;

	$print_new_page = false;

		ob_start();		
		foreach ($this->pages as $page){
			?>
			
				<div style="display:block; width:<?=$page_width?>in; height:<?=$page_height?>in; left:<?=$page_left?>in; top:<?=$page_top?>in;">

<?php if($print_new_page == true && $check_ie == false  ){ ?>  <p   style="page-break-before:always;"></p> <?php } ?> 
<?= $page ?>
<?php if($check_ie == true ){ ?> <p  style="page-break-after:always;" ></p><?php } ?>				</div>
			
			<?php	
			$page_top =($page_top+$page_height + $this->page_break) ;
			$print_new_page= true;
		}
		
		$output= ob_get_contents();
		ob_end_clean();
		return $output;
	}

	
}// calss gsPrint **************  END
?>