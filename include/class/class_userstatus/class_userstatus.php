<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class userstatus {
    var $connection;
    var $id = gINVALID;
    var $userstatus_name = "";
    var $description = "";
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

function userstatus($connection){
    $this->connection = $connection;
}
function get_id(){
    $strSQL = "SELECT id,userstatus_name,description FROM userstatuses WHERE userstatus_name = '".$this->userstatus_name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->userstatus_name = mysql_result($rsRES,0,'userstatus_name');
        $this->description = mysql_result($rsRES,0,'description');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This userstatus doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id,userstatus_name,description FROM userstatuses WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->userstatus_name = mysql_result($rsRES,0,'userstatus_name');
        $this->description = mysql_result($rsRES,0,'description');
        return $this->id;
    }
    else{
    $this->error_number = 2;
    $this->error_description="This userstatus doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO userstatuses (userstatus_name,description) VALUES ('";
    $strSQL .= addslashes(trim($this->userstatus_name)) ."','";
    $strSQL .= addslashes(trim($this->description)) . "')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_affected_rows($this->connection) > 0 ) {
        $this->id = mysql_insert_id();
        return $this->id;
    }
    else{
        $this->error_number = 3;
        $this->error_description="Can't insert this userstatus";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE userstatuses SET userstatus_name = '".addslashes(trim($this->userstatus_name))."',";
    $strSQL .= "description = '".addslashes(trim($this->description))."'";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this userstatus";
                return false;
            }
    }
}

function get_list_array(){
        $userstatuses = array();$i=0;
        $strSQL = "SELECT id,userstatus_name,description FROM userstatuses ORDER BY userstatus_name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$userstatus_name,$description) = mysql_fetch_row($rsRES) ){
              $userstatuses[$i]["id"] = $id;
              $userstatuses[$i]["userstatus_name"] = $userstatus_name;
              $userstatuses[$i]["description"] = $description;
              $i++;
        }
        return $userstatuses;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list userstatuses";
        return false;
        }
}
function get_list_array_bylimit($userstatus_name=-1,$description="",$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id,userstatus_name,description FROM userstatuses WHERE 1 ";
        if ( $userstatus_name != "" && $userstatus_name != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  id  = '" . $userstatus_name . "'" ;
            }else{
                $str_condition .= " AND id  = '" . $userstatus_name . "'" ;
            } 
        }
        if ( $description != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  description  = '" . $description . "'" ;
            }else{
                $str_condition .= " AND description  = '" . $description . "'" ;
            } 
        }
        if (trim($str_condition) !="") {
            $strSQL .= " AND  " . $str_condition . "  ";
        }
        $strSQL .= " ORDER BY userstatus_name ";
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
                $limited_data[$i]["userstatus_name"] = $row["userstatus_name"];
                $limited_data[$i]["description"] = $row["description"];
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