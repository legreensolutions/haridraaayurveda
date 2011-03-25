<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Language {
    var $connection;
    var $id = gINVALID;
    var $publish = CONF_NOT_PUBLISH;
    var $publish_status = "No";
    var $language = "";

    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";


function get_id(){
    $strSQL = "SELECT id AS id,language_name,publish ";
    $strSQL .= "FROM languages  WHERE language_name = '".$this->language."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->language = mysql_result($rsRES,0,'language_name');
        $this->publish = mysql_result($rsRES,0,'publish');
        if ( $this->publish == CONF_NOT_PUBLISH ) $this->publish_status = "No";
        else $this->publish_status = "Yes";
        return $this->id;
    }else{
        $this->error_number = 1;
        $this->error_description="This Language doesn't exist";
        return false;
    }
}

function get_detail(){
    $strSQL = "SELECT id AS id,language_name,publish ";
    $strSQL .= "FROM languages  WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->language = mysql_result($rsRES,0,'language_name');
        $this->publish = mysql_result($rsRES,0,'publish');
        if ( $this->publish == 0 ) $this->publish_status = "No";
        else $this->publish_status = "Yes";

        $languages = array();$i=0;
        $languages[$i]["id"] =  $this->id;
        $languages[$i]["language"] = $this->language;
        $languages[$i]["publish"] = $this->publish;

        return $languages ;
    }else{
        $this->error_number = 2;
        $this->error_description="Contact administrator to get its details";
        return false;
    }
}


function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO languages (language_name,publish) VALUES ('";
    $strSQL .= addslashes(trim($this->language)) ."','";
    $strSQL .= addslashes(trim($this->publish)) . "')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
          if ( mysql_affected_rows($this->connection) > 0 ) {
              $this->id = mysql_insert_id();
              return $this->id;
          }else{
              $this->error_number = 3;
              $this->error_description="Can't insert this Language";
              return false;
          }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE languages SET language_name = '".addslashes(trim($this->language))."',";
    $strSQL .= "publish = ".addslashes(trim($this->publish))."";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this Language";
                return false;
            }
    }
}
function delete(){
        $strSQL = "DELETE FROM languages WHERE id =".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) > 0 ) {
                    return true;
            }
            else{
                $this->error_description = "Can't Delete This Language";
                return false;
            }
    }
function get_list_array(){
        $cities = array();$i=0;

        $strSQL = "SELECT id AS id,language_name,publish FROM languages";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            while ( list ($id,$language,$publish) = mysql_fetch_row($rsRES) ){
                $languages[$i]["id"] =  $id;
                $languages[$i]["language"] = $language;
                $languages[$i]["publish"] = $publish;
                if ( $languages[$i]["publish"] == CONF_NOT_PUBLISH )
                    $languages[$i]["publish_status"] = "No";
                else
                    $languages[$i]["publish_status"] = "Yes";
                $i++;
            }
            return $languages;
        }else{
        $this->error_number = 4;
        $this->error_description="Can't list languages";
        return false;
        }
}

function get_list_array_bylimit($language="",$publish=-1,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";
        $strSQL = "SELECT id AS id,language_name,publish FROM languages ";
        if ($language != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = " language_name  LIKE '%" . $language . "%'" ;
            }else{
                $str_condition .= " AND language_name  LIKE '%" . $language . "%'" ;
            } 
        }
        if ( $publish != "" && $publish != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  publish  = '" . $publish . "'" ;
            }else{
                $str_condition .= " AND publish  = '" . $publish . "'" ;
            } 
        }
        if (trim($str_condition) !="") {
            $strSQL .= " WHERE  " . $str_condition . "  ";
        }
        $strSQL .= "ORDER BY language_name";
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
                $limited_data[$i]["language"] = $row["language_name"];
                $limited_data[$i]["publish"] = $row["publish"];
                if ( $limited_data[$i]["publish"] == CONF_NOT_PUBLISH )
                    $limited_data[$i]["publish_status"] = "No";
                else
                    $limited_data[$i]["publish_status"] = "Yes";
                $i++;
            }
            return $limited_data;
        }else{
            $this->error_number = 5;
            $this->error_description="Can't get limited data";
            return false;
        }
}
}
?>