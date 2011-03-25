<?php
$mesg_error = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'MSG  Error','gfwflash',"Empty Message List","Error Message");

$gfw_default_redirect_page = $this->gsconf->get_conf(CONF_TYPE_SYSTEMCONF,'R D GFW Flash','gfwflash',"index.php","GFW Flash Delfault redirect page");

?>