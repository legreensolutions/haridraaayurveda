<?php

$conf_page_caption = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_page_caption',"restore","R&nbsp;e&nbsp;s&nbsp;t&nbsp;o&nbsp;r&nbsp;e&nbsp; &nbsp;D&nbsp;a&nbsp;t&nbsp;a&nbsp;b&nbsp;a&nbsp;s&nbsp;e","caption page");


$conf_browse = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'conf_browse',"restore","Browse and select the Backup file","caption browse");

$conf_restore = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'conf_restore',"restore","Restore Database","object caption restore");
define("BACKUP_DIR","files/tmp/");
?>