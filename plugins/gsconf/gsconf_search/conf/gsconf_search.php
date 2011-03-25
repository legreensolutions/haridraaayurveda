<?php
$conf_language = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP language',"gsconf_search","Language","caption language");


$conf_configurationtype = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP configurationtype',"gsconf_search","Configuration Type","caption configurationtype");

$conf_pagename = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP pagename',"gsconf_search","Page Name","caption pagename");

$conf_confname = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP confname',"gsconf_search","Configuration Name","caption confname");

$conf_value = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP value',"gsconf_search","Value","caption value");


$conf_description = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP description',"gsconf_search","Description","caption description");

$conf_publish = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP description',"gsconf_search","Publish","caption Publish");


$conf_submit_search = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP search',"gsconf_search","Search","caption submit search");
?>