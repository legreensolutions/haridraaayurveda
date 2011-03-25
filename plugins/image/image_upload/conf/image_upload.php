<?
$CAP_pagecaption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_pagecaption','image_upload',"I&nbsp;m&nbsp;a&nbsp;g&nbsp;e&nbsp;&nbsp;U&nbsp;p&nbsp;l&nbsp;o&nbsp;a&nbsp;d","Page caption");

$CAP_upload_image = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_upload_image','image_upload',"Upload Image","caption Upload Image");

$CAP_OBJ_upload = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_OBJ_update','image_upload',"Upload","caption upload");


$MSG_VAL_image = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image','image_upload',"Image cannot be empty ");

$MSG_VAL_image_err1 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err1','image_upload',"File not uploaded. Please select a valid image file   <br>");

$MSG_VAL_image_err2 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err2','image_upload',"Invalid File Type. Please select a jpg/jpeg/png file   <br>");

$MSG_VAL_image_err3 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err3','image_upload',"Invalid file size. Please upload a file with size less than 1 MB    <br>");

$MSG_VAL_image_err4 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err4','image_upload',"Invalid Image Dimension. Please upload an image within the allowed dimension (150x100 to 800x600)   <br>");

$MSG_VAL_image_err5 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err5','image_upload',"Unable to move the file to the directory   <br>");

$MSG_VAL_image_err6 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err6','image_upload',"Unable to create the thumbnail    <br>");

 
$RD_MSG_image_uploaded = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_uploaded','image_upload',"Image uploaded");

$MSG_image_err_upload = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_err_upload','image_upload',"Error while renaming the uploaded files. Contact administrator");

$FLASH_file_name = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'FLASH_file_name','image_upload',"gfwflash.php");
$gallery_path = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'gallery_path',"image_upload","images/gallery");
$CAPGallery = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'CAPGallery',"image_upload","Gallery");
?>