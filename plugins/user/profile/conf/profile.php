<?php
$CAP_pagecaption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_pagecaption','profile',"P&nbsp;&nbsp;r&nbsp;&nbsp;o&nbsp;&nbsp;f&nbsp;&nbsp;i&nbsp;&nbsp;l&nbsp;&nbsp;e","Page caption");

$CAP_username = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_username','profile',"User Name","caption User Name");

$CAP_firstname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_firstname','profile',"First Name","caption First Name");

$CAP_lastname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_lastname','profile',"Last Name","caption Last Name");

$CAP_address = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_address','profile',"Address","caption Address");

$CAP_city = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_city','profile',"City","caption City");

$CAP_state = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_state','profile',"State","caption State");

$CAP_country = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_country','profile',"Country","caption Country");

$CAP_upload_image = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_upload_image','profile',"Upload Image","caption Upload Image");

$CAP_LIN_change_password = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_LIN_change_password','profile',"Change Password","link caption Change Password");

$LIN_file_name_change_password = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'LIN_file_name_change_password','profile',"change_passwd.php","link file name Change Password");


$CAP_OBJ_update = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_OBJ_update','profile',"Update","caption Update");
$CAP_OBJ_delete_image = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_OBJ_delete_image','profile',"Delete image","caption Delete image");


$MSG_VAL_first_name = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_first_name','profile',"Firstname cannot be empty <br>");


$MSG_VAL_image_err1 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err1','profile',"File not uploaded. Please select a valid image file   <br>");

$MSG_VAL_image_err2 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err2','profile',"nvalid File Type. Please select a jpg/jpeg/png file   <br>");

$MSG_VAL_image_err3 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err3','profile',"Invalid file size. Please upload a file with size less than 1 MB    <br>");

$MSG_VAL_image_err4 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err4','profile',"Invalid Image Dimension. Please upload an image within the allowed dimension (150x100 to 800x600)   <br>");

$MSG_VAL_image_err5 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err5','profile',"Unable to move the file to the directory   <br>");

$MSG_VAL_image_err6 = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_VAL_image_err6','profile',"Unable to create the thumbnail    <br>");

 
$MSG_image_uploaded = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_uploaded','profile',"Image uploaded & renamed");

$MSG_image_err_upload = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_err_upload','profile',"Error while renaming the uploaded files. Contact administrator");

$MSG_profile_updated = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_profile_updated','profile',"Profile Updated.");

$RD_file_name_profile_updated = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'RD_file_name_profile_updated','profile',"profile.php");

$FLASH_file_name = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'FLASH_file_name','profile',"gfwflash.php");

$MSG_image_deleted = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_deleted','profile',"Image deleted from directory");

$MSG_image_err_delete = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG_image_err_delete','profile',"Error while deleting files. Contact administrator");




?>