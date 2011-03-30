<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
	exit();
}

class gsPage {
	// top part of html


	var $title='Green FrameWork';
	var $page_name='Home Page';
	var $layout='default.html';

	var $connection_list = array();
	var $conf_list = array();
	var $menuconf_list = array();
	var $class_list = array();
	var $pageconf_list = array();
	var $content_list = array();
	var $js_list = array();
	var $js_list_link = array();
	var $css_list = array();
	var $function_list = array();

	var $root_path='./';
	var $connection_path='include/connection/';
	var $conf_path='include/conf/';
	var $menuconf_path='include/menuconf/';
	var $pageconf_path='include/page_conf/';
	var $class_path='include/class/';
	var $include_path='include/';
	var $function_path='include/functions/';

	var $plugin_path='plugins/';

	var $gsconf_path='include/class/class_gsconf/';

	var $plugin_output='';

	var $js_path='js/';
	var $js_link_path='js/';
	var $css_path='css/';
	var $current_url ;

	var $use_gsconf=true;
	var $gsconf;

	var $debug_state=false;
	var $debug_output='';

	var $plugin ;


	function display(){

		$title=$this->title;
		$name=$this->name;
		$page_name = $this->page_name;
		$current_url = $this->current_url;


		ob_start();
		$filename = $this->root_path.$this->conf_path.'gfw_conf.php';
		eval("\$filename = \"$filename\";");
		if (file_exists($filename)) {
			include($filename);
		}else{
			echo 'File :: '.$filename ." not exists. <br/>";
		}
		$debug_output .= ob_get_contents();
		ob_end_clean();






		if(count($this->conf_list) > 0){
			foreach ($this->conf_list as $conf_file){
				ob_start();
				$filename = $this->root_path.$this->conf_path.$conf_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}


		if(count($this->connection_list) > 0){
			foreach ($this->connection_list as $connection_file){
				ob_start();
				$filename = $this->root_path.$this->connection_path.$connection_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}


		if ($this->use_gsconf == true){

			ob_start();
			$filename = $this->root_path.$this->gsconf_path.'class_gsconf_conf.php';
			eval("\$filename = \"$filename\";");
			if (file_exists($filename)) {
				include($filename);

			}else{
				echo 'File :: '.$filename ." not exists. <br/>";
			}
			$debug_output .= ob_get_contents();
			ob_end_clean();

			ob_start();
			$filename = $this->root_path.$this->gsconf_path.'class_gsconf.php';
			eval("\$filename = \"$filename\";");
			if (file_exists($filename)) {
				include($filename);

				$this->gsconf = new gsConf;
				$this->gsconf->connection = $myconnection;

			}else{
				echo 'File :: '.$filename ." not exists. <br/>";
			}
			$debug_output .= ob_get_contents();
			ob_end_clean();


		}


		ob_start();
		$filename = $this->root_path.$this->pageconf_path.'g_pageconf.php';
		eval("\$filename = \"$filename\";");
		if (file_exists($filename)) {
			include($filename);
		}else{
			echo 'File :: '.$filename ." not exists. <br/>";
		}
		$debug_output .= ob_get_contents();
		ob_end_clean();


		if(count($this->menuconf_list) > 0){
			foreach ($this->menuconf_list as $menuconf_file){
				ob_start();
				$filename = $this->root_path.$this->menuconf_path.$menuconf_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}




		if(count($this->function_list) > 0){
			foreach ($this->function_list as $function_file){
				ob_start();
				$filename = $this->root_path.$this->function_path.$function_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}


		if(count($this->class_list) > 0){
			foreach ($this->class_list as $class_file){
				$class_file = substr($class_file,0,strlen($class_file)-4);


				ob_start();
				$filename = $this->root_path.$this->class_path.$class_file."/".$class_file."_conf.php";
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();



				ob_start();
				$filename = $this->root_path.$this->class_path.$class_file."/".$class_file.".php";
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}



		if(count($this->pageconf_list) > 0){
			foreach ($this->pageconf_list as $pageconf_file){
				ob_start();
				$filename = $this->root_path.$this->pageconf_path.$pageconf_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}


		if(count($this->css_list) > 0){
			foreach ($this->css_list as $css_file){
				$filename =$this->css_path.$css_file;
				eval("\$filename = \"$filename\";");
				if (file_exists( $this->root_path.$filename)) {
					$css.='<link rel="stylesheet" type="text/css" href="'.$filename.'">';
				}else{
					$debug_output .= 'File :: '.$filename ." not exists <br/>";
				}

			}

		}


		if(count($this->js_list_link) > 0){
			foreach ($this->js_list_link as $js_link_file){
				$filename =$this->js_link_path.$js_link_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($this->root_path.$filename)) {
					$js.='<script src="'.$filename.'" language="JavaScript" type="text/JavaScript"></script>';
				}else{
					$debug_output .= 'File :: '.$filename ." not exists. <br/>";
				}
			}
		}


		if(count($this->js_list) > 0){
			$js.='<script language="JavaScript" type="text/JavaScript">';
			foreach ($this->js_list as $js_file){
				$filename = $this->root_path.$this->js_link_path.$js_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					ob_start();
					include($filename);
					$js .= ob_get_contents();
					ob_end_clean();
				}else{
					$debug_output .='File :: '.$filename ." not exists. <br/>";
				}
			}
			$js.='</script>';
		}




		if(count($this->content_list) > 0){
			foreach ($this->content_list as $content_tmp){

				$filename = $this->root_path.$this->include_path.$content_tmp['file_name'];
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)){
					ob_start();
					include($filename);
					if(isset($content_tmp['var_name']) && trim($content_tmp['var_name']) != ""){
						if(isset($$content_tmp['var_name']) && trim($$content_tmp['var_name'])!=""){
							$$content_tmp['var_name'] .= ob_get_contents();
						}else{
							$$content_tmp['var_name'] = ob_get_contents();
						}

					}else{
							$debug_output .= ob_get_contents();
					}
					ob_end_clean();
				}else{
					$debug_output .= 'File :: '.$filename ." not exists. <br/>";
				}
			}
		}

		if ( defined('gDEBUG') ){
			$this->debug_state = gDEBUG;
		}

		$this->debug_output.=$debug_output;

		if($this->debug_state == true){
			$this->debug_output($this->debug_output);
		}

		include($root_path.'layouts/'.$this->layout);

	}


	function get_plugin(){

		$title=$this->title;
		$name=$this->name;
		$page_name = $this->page_name;
		$current_url = $this->current_url;


		ob_start();
		$filename = $this->root_path.$this->conf_path.'gfw_conf.php';
		eval("\$filename = \"$filename\";");
		if (file_exists($filename)) {
			include($filename);
		}else{
			echo 'File :: '.$filename ." not exists. <br/>";
		}
		$debug_output .= ob_get_contents();
		ob_end_clean();

		if(count($this->conf_list) > 0){
			foreach ($this->conf_list as $conf_file){
				ob_start();
				$filename = $this->root_path.$this->conf_path.$conf_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}

		if(count($this->connection_list) > 0){
			foreach ($this->connection_list as $connection_file){
				ob_start();
				$filename = $this->root_path.$this->connection_path.$connection_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}



		if ($this->use_gsconf == true){

			ob_start();
			$filename = $this->root_path.$this->gsconf_path.'class_gsconf_conf.php';
			eval("\$filename = \"$filename\";");
			if (file_exists($filename)) {
				include($filename);
			}else{
				echo 'File :: '.$filename ." not exists. <br/>";
			}
			$debug_output .= ob_get_contents();
			ob_end_clean();




			ob_start();
			$filename = $this->root_path.$this->gsconf_path.'class_gsconf.php';
			eval("\$filename = \"$filename\";");
			if (file_exists($filename)) {
				include($filename);

				$this->gsconf = new gsConf;
				$this->gsconf->connection = $myconnection;

			}else{
				echo 'File :: '.$filename ." not exists. <br/>";
			}
			$debug_output .= ob_get_contents();
			ob_end_clean();

		}

		ob_start();
		$filename = $this->root_path.$this->pageconf_path.'g_pageconf.php';
		eval("\$filename = \"$filename\";");
		if (file_exists($filename)) {
			include($filename);
		}else{
			echo 'File :: '.$filename ." not exists. <br/>";
		}
		$debug_output .= ob_get_contents();
		ob_end_clean();

		if(count($this->menuconf_list) > 0){
			foreach ($this->menuconf_list as $menuconf_file){
				ob_start();
				$filename = $this->root_path.$this->menuconf_path.$menuconf_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}

		if(count($this->function_list) > 0){
			foreach ($this->function_list as $function_file){
				ob_start();
				$filename = $this->root_path.$this->function_path.$function_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}


		ob_start();
		$filename = $this->root_path.$this->plugin_path.$this->plugin."/conf/".$this->plugin.".php";
		eval("\$filename = \"$filename\";");
		if (file_exists($filename)) {
			include($filename);
		}else{
			echo 'File :: '.$filename ." not exists. <br/>";
		}
		$debug_output .= ob_get_contents();
		ob_end_clean();

		if(count($this->class_list) > 0){
			foreach ($this->class_list as $class_file){
				$class_file = substr($class_file,0,strlen($class_file)-4);


				ob_start();
				$filename = $this->root_path.$this->class_path.$class_file."/".$class_file."_conf.php";
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();



				ob_start();
				$filename = $this->root_path.$this->class_path.$class_file."/".$class_file.".php";
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}



		if(count($this->pageconf_list) > 0){
			foreach ($this->pageconf_list as $pageconf_file){
				ob_start();
				$filename = $this->root_path.$this->pageconf_path.$pageconf_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					include($filename);
				}else{
					echo 'File :: '.$filename ." not exists. <br/>";
				}
				$debug_output .= ob_get_contents();
				ob_end_clean();
			}

		}

		if(count($this->css_list) > 0){
			foreach ($this->css_list as $css_file){
				$filename =$this->css_path.$css_file;
				eval("\$filename = \"$filename\";");
				if (file_exists( $this->root_path.$filename)) {
					$css.='<link rel="stylesheet" type="text/css" href="'.$filename.'">';
				}else{
					$debug_output .= 'File :: '.$filename ." not exists <br/>";
				}

			}

		}


		if(count($this->js_list_link) > 0){
			foreach ($this->js_list_link as $js_link_file){
				$filename =$this->js_link_path.$js_link_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($this->root_path.$filename)) {
					$js.='<script src="'.$filename.'" language="JavaScript" type="text/JavaScript"></script>';
				}else{
					$debug_output .= 'File :: '.$filename ." not exists. <br/>";
				}
			}
		}


		if(count($this->js_list) > 0){
			$js.='<script language="JavaScript" type="text/JavaScript">';
			foreach ($this->js_list as $js_file){
				$filename = $this->root_path.$this->js_link_path.$js_file;
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					ob_start();
					include($filename);
					$js .= ob_get_contents();
					ob_end_clean();
				}else{
					$debug_output .='File :: '.$filename ." not exists. <br/>";
				}
			}
			$js.='</script>';
		}




		$filename = $this->root_path.$this->plugin_path.$this->plugin."/css/".$this->plugin.".css";
		eval("\$filename = \"$filename\";");
		if (file_exists( $this->root_path.$filename)) {
			$css.='<link rel="stylesheet" type="text/css" href="'.$filename.'">';
		}else{
			$debug_output .= 'File :: '.$filename ." not exists <br/>";
		}


		$filename = $this->root_path.$this->plugin_path.$this->plugin."/js/".$this->plugin.".js";
		eval("\$filename = \"$filename\";");
		if (file_exists($this->root_path.$filename)) {
			$js.='<script src="'.$filename.'" language="JavaScript" type="text/JavaScript"></script>';
		}else{
			$debug_output .= 'File :: '.$filename ." not exists. <br/>";
		}




		$filename = $this->root_path.$this->plugin_path.$this->plugin."/js/".$this->plugin.".php";
		eval("\$filename = \"$filename\";");
		if (file_exists($filename)) {
			ob_start();
			include($filename);
			$js.='<script language="JavaScript" type="text/JavaScript">';
			$js .= ob_get_contents();
			$js.='</script>';
			ob_end_clean();
		}else{
			$debug_output .='File :: '.$filename ." not exists. <br/>";
		}





		if(count($this->content_list) > 0){
			foreach ($this->content_list as $content_tmp){

				$filename = $this->root_path.$this->include_path.$content_tmp['file_name'];
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)){
					ob_start();
					include($filename);
					if(isset($content_tmp['var_name']) && trim($content_tmp['var_name']) != ""){
						if(isset($$content_tmp['var_name']) && trim($$content_tmp['var_name'])!=""){
							$$content_tmp['var_name'] .= ob_get_contents();
						}else{
							$$content_tmp['var_name'] = ob_get_contents();
						}

					}else{
							$debug_output .= ob_get_contents();
					}
					ob_end_clean();
				}else{
					$debug_output .= 'File :: '.$filename ." not exists. <br/>";
				}
			}
		}

				$filename = $this->root_path.$this->plugin_path.$this->plugin."/functions/".$this->plugin.".php";
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					ob_start();
					include($filename);
					$this->plugin_output .= ob_get_contents();
					ob_end_clean();

				}else{
					ob_start();
					echo 'File :: '.$filename ." not exists. <br/>";
					$debug_output .= ob_get_contents();
					ob_end_clean();
				}


				$filename = $this->root_path.$this->plugin_path.$this->plugin."/code/".$this->plugin.".php";
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					ob_start();
					include($filename);
					$this->plugin_output .= ob_get_contents();
					ob_end_clean();

				}else{
					ob_start();
					echo 'File :: '.$filename ." not exists. <br/>";
					$debug_output .= ob_get_contents();
					ob_end_clean();
				}



				$filename = $this->root_path.$this->plugin_path.$this->plugin."/form/".$this->plugin.".php";
				eval("\$filename = \"$filename\";");
				if (file_exists($filename)) {
					ob_start();
					include($filename);
					$this->plugin_output .= ob_get_contents();
					ob_end_clean();

				}else{
					ob_start();
					echo 'File :: '.$filename ." not exists. <br/>";
					$debug_output .= ob_get_contents();
					ob_end_clean();
				}


		if (defined('gDEBUG') ){
			$this->debug_state = gDEBUG;
		}

		$this->debug_output.=$debug_output;
		if($this->debug_state == true){
			$this->debug_output($this->debug_output);
		}

		include($root_path.'layouts/'.$this->layout);

	}





	function get_content($content_list){

	ob_start();

		$current_url = $this->current_url;
		$myconnection = $this->db_connection;
		$page_name = $this->page_name;
		foreach ($content_list as $content){
			include($root_path.$include_path.$content);
		}
		$output = ob_get_contents();
	ob_end_clean();
		return $output;
	}

	function debug_output($debug_output){
		echo '<div style="overflow:auto; width:100%; height:120px;background-color:#FFF87B; position:absolute;" onclick="this.style.display=\'none\';" title="Click to close Error Console">';
		echo '<div align="center"><span style="font-weight : bold; font-size:16px;" >Debug Window</span></div> <br/>';

		echo 'Pagename : '.$this->page_name.'<br/>';
		echo $debug_output;
		echo '<br/><div align="center"><a href="#" onclick="this.style.display=\'none\'; return false;">Close</a></div>';
		echo  '</div>';
	}


}// calss Page **************  END
?>

