<?php

$RD_MSG_que_deleted = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_que_deleted','securityquestion',"Security Question deleted ","Message on Sec_Que deletion");

$RD_MSG_que_added = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_que_added','securityquestion',"Security Question Added ","Message on Sec_Que Insertion");

$RD_MSG_que_updated = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_que_updated','securityquestion',"Security Question Updated ","Message on Sec_Que updation");

$RD_MSG_on_fail = $this->gsconf->get_conf(CONF_TYPE_MESSAGES,'RD_MSG_on_fail','securityquestion',"Your attempt failed.Contact Admin","Message on Failure");

$MSG_empty_sec_que = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'MSG_empty_sec_que','securityquestion',"Security Question Empty ","Message on Empty Sec_Que");

$CAP_page_caption_add = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption_add','language',"A&nbsp;d&nbsp;d&nbsp;&nbsp;Q&nbsp;u&nbsp;e&nbsp;s&nbsp;t&nbsp;i&nbsp;o&nbsp;n","caption Question add");

$CAP_page_caption_edit = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_page_caption_edit','language',"E&nbsp;d&nbsp;i&nbsp;t&nbsp;&nbsp;Q&nbsp;u&nbsp;e&nbsp;s&nbsp;t&nbsp;i&nbsp;o&nbsp;n","caption Question edit");

$CAP_sec_que = $this->gsconf->get_conf(CONF_TYPE_CAPTIONS,'CAP_sec_que','securityquestion',"Security Question","caption sec_que");

$CAP_insert = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_insert','securityquestion',"Insert","caption insert");

$CAP_update = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_update','securityquestion',"Update","caption update");

$CAP_delete = $this->gsconf->get_conf(CONF_TYPE_OBJECT_CAPTIONS,'CAP_delete','securityquestion',"Delete","caption delete");

?>