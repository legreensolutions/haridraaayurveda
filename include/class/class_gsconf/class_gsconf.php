<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
	exit();
}

class gsConf {

	var $root_path='./';
	var $connection;
	var $editor_mode=false;
	var $editor_page='gsconf_update.php';
	var $editor_page_width=700;
	var $editor_page_height=500;
	var $editor_page_top=100;
	var $editor_page_left=100;

	var $search_page='gsconf_search.php';

	var $id ;

	var $language_id ;
	var $language_name;

	var $configurationtype_id ;
	var $configurationtype_name;

	var $configuration_name ;

	var $page_id ;
	var $page_name ;

	var $value ;

	var $publish ;
	var $publish_status ;


// for error handling
	var $err_no=gINVALID;
	var $err_desc="";

// for pagination
	var $total_records = "";


	function get_conf($configurationtype_id,$configuration_name,$page_name,$value="",$description="",$language_id="") {
		if($language_id==""){
			if(isset($_SESSION[SESSION_TITLE.'gLANGUAGE']) && $_SESSION[SESSION_TITLE.'gLANGUAGE'] > 0){
				$language_id=$_SESSION[SESSION_TITLE.'gLANGUAGE'];
			}else{
				$language_id=CONF_LANG_ENGLISH;
			}
		}
		 
		$strSQL = "SELECT C.id, C.value, C.publish FROM configurations C, pages P WHERE P.id= C.page_id AND P.page_name='".$page_name."' AND C.language_id='".$language_id."'  AND C.configurationtype_id='".$configurationtype_id."' AND C.configuration_name='".$configuration_name."' ";
		$result = mysql_query($strSQL, $this->connection) or die (mysql_error() . $strSQL);
		$count_conf= mysql_num_rows($result);

		if ($count_conf > 0) {
			$row_conf = mysql_fetch_assoc($result);
			if($row_conf['publish'] == CONF_NOT_PUBLISH) {
				$conf_value = stripslashes(nl2br($value));
			}else{
				$conf_value = stripslashes($row_conf['value']);
			}
			$conf_id = $row_conf['id'];

		} else {

			$strSQL = "SELECT P.id FROM pages P WHERE  P.page_name='".addslashes(nl2br($page_name))."' ";
			$result = mysql_query($strSQL, $this->connection) or die (mysql_error() . $strSQL);
			$count_page= mysql_num_rows($result);
			if ($count_page > 0) {
				$page_id = mysql_result($result,0,'id');
			}else{
				$strSQL = "INSERT INTO pages (page_name) VALUES ('".addslashes(nl2br($page_name))."')";
				$result = mysql_query($strSQL, $this->connection) or die (mysql_error() . $strSQL);
				$page_id = mysql_insert_id();
			}

			$strSQL = "INSERT INTO `configurations` (  `configuration_name` , `page_id` , `value` , `description` , `language_id` , `configurationtype_id` )  VALUES ('".addslashes(nl2br($configuration_name))."', '".$page_id."', '".addslashes(nl2br($value))."', '".addslashes(nl2br($description))."', '".$language_id."', '".$configurationtype_id."' )";
			$result = mysql_query($strSQL, $this->connection) or die (mysql_error() . $strSQL);
			$conf_value = stripslashes($value); 
			$conf_id = mysql_insert_id();
		}

	if (defined('gEDIT_MODE') ){
		$this->editor_mode = gEDIT_MODE;
	}

	if($this->editor_mode == true &&  $configurationtype_id != CONF_TYPE_DYNAMIC_TEXT && $configurationtype_id != CONF_TYPE_OBJECT_CAPTIONS && $configurationtype_id != CONF_TYPE_SYSTEMCONF  ){
		$conf_value = '<div style=" cursor:pointer;border:1px;border-color:red;border-style:solid; color:inherit;" onclick="window.open(\''.$this->editor_page.'?id='.$conf_id.'\',\'popuppage\',\'width='.$this->editor_page_width.',menubar=0,location=0,resizable=1,scrollbars=yes,height='.$this->editor_page_height.',top='.$this->editor_page_top.',left='.$this->editor_page_left.'\');" >'.$conf_value.'</div>';
	}
	
		return $conf_value;

	}






    function get_list_array_bylimit($language_id=-1,$configurationtype_id=-1,$configuration_name="",$page_name="",$value="",$description="", $publish="", $start_record = 0,$max_records = 25){

        $limited_data = array();
		$i=0;

        $strSQL = "SELECT C.*, P.page_name, L.language_name, CT.configurationtype_name FROM configurations C, pages P, languages L, configurationtypes CT WHERE P.id= C.page_id AND L.id=C.language_id AND CT.id=C.configurationtype_id";

		if ($language_id != -1 && $language_id != "" ) {
			if (trim($str_condition) =="") {
				$str_condition = "  C.language_id  = '" . $language_id . "'" ;
			}else{
				$str_condition .= " AND C.language_id ='" . $language_id . "'" ;
			} 
		}

		if ($configurationtype_id != -1 && $configurationtype_id != "") {
			if (trim($str_condition) =="") {
				$str_condition = "  C.configurationtype_id  = '" . $configurationtype_id . "'" ;
			}else{
				$str_condition .= " AND C.configurationtype_id ='" . $configurationtype_id . "'" ;
			} 
		}

		if ($page_name != "") {
			if (trim($str_condition) =="") {
				$str_condition = "  P.page_name LIKE '%" . addslashes($page_name) . "%'" ;
			}else{
				$str_condition .= " AND P.page_name LIKE '%" . addslashes($page_name) . "%'" ;
			} 
		}

		if ($configuration_name != "") {
			if (trim($str_condition) =="") {
				$str_condition = "  C.configuration_name LIKE '%" . addslashes($configuration_name) . "%'" ;
			}else{
				$str_condition .= " AND C.configuration_name LIKE '%" . addslashes($configuration_name) . "%'" ;
			} 
		}

		if ($value != "") {
			if (trim($str_condition) =="") {
				$str_condition = "  C.value LIKE '%" . addslashes($value) . "%'" ;
			}else{
				$str_condition .= " AND C.value LIKE '%" . addslashes($value) . "%'" ;
			} 
		}

		if ($description != "") {
			if (trim($str_condition) =="") {
				$str_condition = "  C.description LIKE '%" . addslashes($description) . "%'" ;
			}else{
				$str_condition .= " AND C.description LIKE '%" . addslashes($description) . "%'" ;
			} 
		}


		if ($publish != "") {
			if (trim($str_condition) =="") {
				$str_condition = "  C.publish ='" . $publish . "'" ;
			}else{
				$str_condition .= " AND C.publish LIKE '" . $publish . "'" ;
			} 
		}


		if (trim($str_condition) !="") {
			$strSQL .= " AND  " . $str_condition . "  ";
		}

        //taking limit  result of that in $rsRES .$start_record is starting record of a page.$max_records num of records in that page
        $strSQL_limit = sprintf("%s LIMIT %d, %d", $strSQL, $start_record, $max_records);
        $rsRES = mysql_query($strSQL_limit, $this->connection) or die(mysql_error(). $strSQL_limit);

        if ( mysql_num_rows($rsRES) > 0 ){

			//without limit  , result of that in $all_rs
			if (trim($this->total_records)!="" && $this->total_records > 0) {
				
			} else {
				$all_rs = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL_limit); 
				$this->total_records = mysql_num_rows($all_rs);
			}
	
			while ( $row = mysql_fetch_assoc($rsRES) ){
				$limited_data[$i]["id"] = $row["id"];
				$limited_data[$i]["language_id"] = $row["language_id"];
				$limited_data[$i]["language_name"] = $row["language_name"];
				$limited_data[$i]["configurationtype_id"] = $row["configurationtype_id"];
				$limited_data[$i]["configurationtype_name"] = $row["configurationtype_name"];
				$limited_data[$i]["page_name"] = $row["page_name"];
				$limited_data[$i]["configuration_name"] = $row["configuration_name"];
				$limited_data[$i]["value"] = $row["value"];
				$limited_data[$i]["description"] = $row["description"];
				$limited_data[$i]["publish"] = $row["publish"];
				if($row["publish"]==CONF_PUBLISH){
					$limited_data[$i]["publish_status"] = "Yes";	
				}else{
					$limited_data[$i]["publish_status"] = "No";
				}
				$i++;
			}
			return $limited_data;
        }else{
        	return false;
        }
    }


    function update(){
        if ( $this->id == "" || $this->id == gINVALID) {

			$strSQL = "SELECT P.id FROM pages P WHERE  P.page_name='".addslashes(nl2br($this->page_name))."' ";
			$result = mysql_query($strSQL, $this->connection) or die (mysql_error() . $strSQL);
			$count_page= mysql_num_rows($result);
			if ($count_page > 0) {
				$this->page_id = mysql_result($result,0,'id');
			}else{
				$strSQL = "INSERT INTO pages (page_name) VALUES ('".addslashes(nl2br($this->page_name))."')";
				$result = mysql_query($strSQL, $this->connection) or die (mysql_error() . $strSQL);
				$this->page_id = mysql_insert_id();
			}


			$strSQL = "INSERT INTO `configurations` (  `configuration_name` , `page_id` , `value` , `description` , `language_id` , `configurationtype_id` )  VALUES ('".addslashes(nl2br($this->configuration_name))."', '".$this->page_id."', '".addslashes(nl2br($this->value))."', '".addslashes(nl2br($this->description))."', '".$this->language_id."', '".$this->configurationtype_id."' )";

              $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
              if ( mysql_affected_rows($this->connection) > 0 ){
                    $this->id = mysql_insert_id();;
                    return true;
              }
              else{
                $this->err_desc = "Can't add Configuration";
                return false;
              }

        }
        elseif($this->id > 0 ) {
            $strSQL = "UPDATE `configurations` SET ";
            $strSQL .= "publish = '".$this->publish."',";
            $strSQL .= "value = '".addslashes(trim($this->value))."'";

            $strSQL .= " WHERE id = ".$this->id;
            $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                return true;
            }
            else{
                $this->err_desc = "Can't edit Configuration";
                return false;
            }
        }

    }



    function delete(){

        $strSQL = "DELETE FROM `configurations` WHERE id =".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) > 0 ) {
                    return true;
            }
            else{
                $this->err_desc = "Can't Delete This Configuration";
                return false;
            }
    }




    function get_detail(){


        $strSQL = "SELECT C.*, P.page_name, L.language_name, CT.configurationtype_name FROM configurations C, pages P, languages L, configurationtypes CT WHERE P.id= C.page_id AND L.id=C.language_id AND CT.id=C.configurationtype_id AND C.id = ".$this->id;

        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'id');

                $this->configuration_name = mysql_result($rsRES,0,'configuration_name');

                $this->page_id = mysql_result($rsRES,0,'page_id');
                $this->page_name = mysql_result($rsRES,0,'page_name');

                $this->language_id = mysql_result($rsRES,0,'language_id');
                $this->language_name = mysql_result($rsRES,0,'language_name');

                $this->configurationtype_id = mysql_result($rsRES,0,'configurationtype_id');
                $this->configurationtype_name = mysql_result($rsRES,0,'configurationtype_name');


                $this->value = mysql_result($rsRES,0,'value');
                $this->description = mysql_result($rsRES,0,'description');

                $this->publish = mysql_result($rsRES,0,'publish');
               if($this->publish==CONF_PUBLISH){
						$this->publish_status = "Yes";	
					}else{
						$this->publish_status = "No";
					}
		
                return true;
        }
        else{
            return false;
        }
    }

function publish_all($language_id){
            $strSQL = "UPDATE `configurations` SET ";
            $strSQL .= "publish = '".CONF_PUBLISH."' ";
            $strSQL .= " WHERE language_id = '".$language_id."'";
            $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
                return true;
            
}
function unpublish_all($language_id){
            $strSQL = "UPDATE `configurations` SET ";
            $strSQL .= "publish = '".CONF_NOT_PUBLISH."' ";
            $strSQL .= " WHERE language_id = '".$language_id."'";
            $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
                return true;
            
}


}// calss gsConf **************  END
?>