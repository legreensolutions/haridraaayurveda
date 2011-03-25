<?php
$this->js_list_link = array("tinymce/jscripts/tiny_mce/tiny_mce.js"); 

$gallery_path = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'gallery_path',"gsconf_update","images/gallery");
$CAPGallery = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'CAPGallery',"gsconf_update","Gallery");

$errmsg_invalid_id = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'errmsg_invalid_id',"gsconf_update","Invalid Id, Please contact System Admin","Invalid conf Id");
$errmsg_invalid_id_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'errmsg_invalid_id_redirect_page',"gsconf_update","index.php","Redirect page on invalid Configuration ID");



$msg_update_success = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_update_success',"gsconf_update","Configuration successfully updated","Message on successfull update");

$msg_update_success_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'msg_update_success_redirect_page',"gsconf_update","gsconf_search.php","Redirect page on sucessfull update");

$msg_update_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_update_failed',"gsconf_update","Configuration update failed","Message on update failed");

$msg_update_failed_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'msg_update_failed_redirect_page',"gsconf_update","gsconf_search.php","Redirect page on update failed");




$msg_delete_success = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_delete_success',"gsconf_update","Configuration successfully deleted","Message on successfull delete");

$msg_delete_success_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'msg_delete_success_redirect_page',"gsconf_update","gsconf_search.php","Redirect page on sucessfull delete");

$msg_delete_failed = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'msg_delete_failed',"gsconf_update","Configuration delete failed","Message on delete failed");

$msg_delete_failed_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'R D Page delete failed',"gsconf_update","gsconf_search.php","Redirect page on delete failed");


$conf_publish = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'conf_publish',"gsconf_update","Publish","caption Publish");

$conf_submit_update = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'conf_submit_update',"gsconf_update","Update","caption submit update");

$conf_submit_delete = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'conf_submit_delete',"gsconf_update","Delete","caption submit delete");



?>