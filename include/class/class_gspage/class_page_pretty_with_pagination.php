<?php
// prevent execution of this page by direct call by browser
header ('Content-type: text/html; charset=utf-8');
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Page {
    // top part of html

    
    var $title='Green FrameWork';
    var $page_name='Home Page';
    var $layout='default.html';

    var $content_list = array();
    
    var $js_list = array();
    var $js_list_link = array();

    var $css_list = array();

    var $root_path='./';
    var $current_url ;
    


// Pgination properties
	
	var $max_records = 25;
	var $page_num = 0;
	var $start_record = 0 ;
	var $total_records ;
	var $total_pages;
	var $querystring='';



    function display(){
        
        $title=$this->title;
        $name=$this->name;
        $page_name = $this->page_name;
        $current_url = $this->current_url;

        if(count($this->content_list) > 0){
            foreach ($this->content_list as $content_tmp){
                if(isset($content_tmp['var_name']) && trim($content_tmp['var_name']) != ""){
                    ob_start();     
                        $file_name=$content_tmp['file_name'];
                        eval("\$file_name = \"$file_name\";");  
                        include($root_path.'include/'.$file_name);
                        if(isset($$content_tmp['var_name']) && trim($$content_tmp['var_name'])!=""){
                            $$content_tmp['var_name'] .= ob_get_contents();
                        }else{
                            $$content_tmp['var_name'] = ob_get_contents();
                        }
                    ob_end_clean();
                }else{
                        $file_name=$content_tmp['file_name'];
                        eval("\$file_name = \"$file_name\";");  
                        include($root_path.'include/'.$file_name);  
                }
            }
        }

        if(count($this->css_list) > 0){
            foreach ($this->css_list as $css_file){
                $file_name=$css_file;
                eval("\$file_name = \"$file_name\";");
               $css.='<link rel="stylesheet" type="text/css" href="http://'.$_SERVER["SERVER_NAME"].'/css/'.$file_name.'">';
            }
            
        }   
    
        if(count($this->js_list_link) > 0){
            foreach ($this->js_list_link as $js_link_file){
                $file_name=$js_link_file;
                eval("\$file_name = \"$file_name\";");  
                $js.='<script src="http://'.$_SERVER["SERVER_NAME"].'/js/'.$file_name.'" language="JavaScript" type="text/JavaScript"></script>';
            }   
        }

        if(count($this->js_list) > 0){
            $js.='<script language="JavaScript" type="text/JavaScript">';
            ob_start();
            foreach ($this->js_list as $js_file){
                $file_name=$js_file;
                eval("\$file_name = \"$file_name\";");  
                include($root_path.'js/'.$file_name);
            }
            $js .= ob_get_contents();
            ob_end_clean();
            $js.='</script>';
            
        }


        include($root_path.'layouts/'.$this->layout);
    }

    
    
    
function get_content($content_list){

ob_start();
	
	$current_url = $this->current_url;
	$myconnection = $this->db_connection;
	$page_name = $this->page_name;
	foreach ($content_list as $content){    
		include($root_path.'include/'.$content);    
	}
	$output = ob_get_contents();
ob_end_clean();
	return $output;
}


function pagination_ini(){
	if(trim($this->current_url)==""){
		$this->current_url = $_SERVER['PHP_SELF'];
	}
	if (isset($_GET["page_num"])) {
		$this->page_num = $_GET['page_num'];
	}
	$this->start_record = $this->page_num * $this->max_records;
	if (isset($_GET['total_records'])) {
		$this->total_records = $_GET['total_records'];
	}
}

function pagination(){
	$this->total_pages = ceil($this->total_records/$this->max_records)-1;
	$this->querystring = "";
	// extract query string
	if (!empty($_SERVER['QUERY_STRING'])) {
		$params = explode("&", $_SERVER['QUERY_STRING']);
		// get passed param into array and generate query string with new param
		$new_params = array();
		foreach ($params as $param) {
		if (stristr($param, "page_num") == false && 
			stristr($param, "total_records") == false) {
		array_push($new_params, $param);
		}
	}
	if (count($new_params) != 0) {
		$this->querystring = "&" . implode("&", $new_params);
	}
	}
	$this->querystring = sprintf("&total_records=%d%s", $this->total_records, $this->querystring);
}



	function pagination_style1(){
?>	
       <!-- print navigation bar START -->
	<table border="0" width="50%" >
	<tr> 
	<td class="pagination" width="23%" align="center"> <strong> 
	<?php if ($this->page_num > 0) { // Show if not first page ?>
	<a href="<?php printf("%s?page_num=%d%s", $this->current_url, 0, $this->querystring); ?>">First</a> 
	<?php } // Show if not first page ?>
	</strong></td>
	<td  class="pagination"  width="31%" align="center"> <strong> 
	<?php if ($this->page_num > 0) { // Show if not first page ?>
	<a href="<?php printf("%s?page_num=%d%s", $this->current_url, max(0, $this->page_num - 1), $this->querystring); ?>">Previous</a> 
	<?php } // Show if not first page ?>
	</strong></td>
	<td  class="pagination"  width="23%" align="center"> <strong> 
	<?php if ($this->page_num < $this->total_pages) { // Show if not last page ?>
	<a href="<?php printf("%s?page_num=%d%s", $this->current_url, min($this->total_pages, $this->page_num + 1), $this->querystring); ?>">Next</a> 
	<?php } // Show if not last page ?>
	</strong></td>
	<td  class="pagination"  width="23%" align="center"> <strong> 
	<?php if ($this->page_num < $this->total_pages) { // Show if not last page ?>
	<a href="<?php printf("%s?page_num=%d%s", $this->current_url, $this->total_pages, $this->querystring); ?>">Last</a> 
	<?php } // Show if not last page ?>
	</strong></td>
	</tr>
	</table>         
       <!-- print navigation bar END  -->

<?php
	}

function pagination_style2(){

	$int_page= $this->page_num - 5;
	$int_epage=$this->page_num + 5;
	if ($this->page_num - 5 < 0) {
		$int_page = 0;
		$int_epage = min(10, $this->total_pages);
	}
	if ($this->page_num + 5 > $this->total_pages) {
		$int_page = max(0, $this->total_pages-10);
		$int_epage = $this->total_pages;
	}
	while ($int_page <= $int_epage) {
		$str_link = $this->current_url . "?page_num=" . $int_page . $this->querystring;
		if ($this->page_num == $int_page) {
			echo '&nbsp;<a class="pagination_current_page" href="' . $str_link . '">' . ($int_page+1) . '</a>&nbsp;'; 
		}
			else {
			echo '&nbsp;<a class="pagination"  href="' . $str_link . '">' . ($int_page + 1) . '</a>&nbsp;'; 
		}
		$int_page = $int_page + 1;
	}

}


}// calss Page **************  END
?>