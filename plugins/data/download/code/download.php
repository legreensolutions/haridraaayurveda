<?php


$error = "";
if (isset($_GET[download]) &&  trim($_GET[download])!="") {
	$filename = ROOT_PATH.DOWNLOAD_DIR.$_GET[download];

	if (file_exists($filename)) {
		
	}else{
		$error= 'File :: '.$_GET[download] ." not exists. <br/>";
	}

}else{
	$error= "Error :: Unable to download. <br/>";
}


if(trim($error)==""){
	if (strstr($HTTP_USER_AGENT,"MSIE")) {
		$content_disposition = '';
	} else {
		$content_disposition = ' attachment;';
	}
	
	
	header("Content-Type: text/plain");
	header("Content-disposition:$content_disposition filename= ".$_GET[download]);
	header("Pragma: no-cache");
	header("Cache-control: private, must-revalidate");
	header("Expires: 0");
 	readfile($filename);
// echo $filename;
	// end of save file
	// need write log 
	exit();
}
?>


