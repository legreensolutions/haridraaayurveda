<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
	exit();
}

class Pagination {

var $root_path='./';
var $current_url ;

// Pgination properties
	
var $max_records = 25;
var $page_num = 0;
var $start_record = 0 ;
var $total_records ;
var $total_pages;
var $querystring='';



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