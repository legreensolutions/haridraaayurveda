<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class usertype {
    var $connection;
    var $id = gINVALID;
    var $usertype_name = "";
    var $description = "";
    var $loggedin_page = gINVALID;
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

function usertype($connection){
    $this->connection = $connection;
}
function get_id(){
    $strSQL = "SELECT id,usertype_name,description,loggedin_page FROM usertypes WHERE usertype_name = '".$this->usertype_name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->usertype_name = mysql_result($rsRES,0,'usertype_name');
        $this->description = mysql_result($rsRES,0,'description');
        $this->loggedin_page = mysql_result($rsRES,0,'loggedin_page');
        return $this->id;
    }
    else{
    return false;
    $this->error_number = 1;
    $this->error_description="This usertype doesn't exist";
    }
}
function get_detail(){
    $strSQL = "SELECT id,usertype_name,description,loggedin_page FROM usertypes WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->usertype_name = mysql_result($rsRES,0,'usertype_name');
        $this->description = mysql_result($rsRES,0,'description');
        $this->loggedin_page = mysql_result($rsRES,0,'loggedin_page');
        return $this->id;
    }
    else{
    return false;
    $this->error_number = 2;
    $this->error_description="This usertype doesn't exist";
    }
}

function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO usertypes (usertype_name,description,loggedin_page) VALUES ('";
    $strSQL .= addslashes(trim($this->usertype_name)) ."','";
    $strSQL .= addslashes(trim($this->description)) . "','";
    $strSQL .= addslashes(trim($this->loggedin_page))."')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_affected_rows($this->connection) > 0 ) {
        $this->id = mysql_insert_id();
        return $this->id;
    }
    else{
        $this->error_number = 3;
        $this->error_description="Can't insert this usertype";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE usertypes SET usertype_name = '".addslashes(trim($this->usertype_name))."',";
    $strSQL .= "loggedin_page = '".addslashes(trim($this->loggedin_page))."',";
    $strSQL .= "description = '".addslashes(trim($this->description))."'";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this usertype";
                return false;
            }
    }
}

function get_list_array(){
        $usertypes = array();$i=0;
        $strSQL = "SELECT id,usertype_name,description,loggedin_page FROM usertypes ORDER BY usertype_name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$usertype_name,$description,$loggedin_page) = mysql_fetch_row($rsRES) ){
              $usertypes[$i]["id"] = $id;
              $usertypes[$i]["usertype_name"] = $usertype_name;
              $usertypes[$i]["description"] = $description;
              $usertypes[$i]["loggedin_page"] = $loggedin_page;
              $i++;
        }
        return $usertypes;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list usertypes";
        return false;
        }
}
function get_list_array_bylimit($usertype_name=-1,$description="",$loggedin_page="",$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id,usertype_name,description,loggedin_page FROM usertypes WHERE 1 ";
        if ( $usertype_name != "" && $usertype_name != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  id  = '" . $usertype_name . "'" ;
            }else{
                $str_condition .= " AND id  = '" . $usertype_name . "'" ;
            } 
        }
        if ( $description != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  description  = '" . $description . "'" ;
            }else{
                $str_condition .= " AND description  = '" . $description . "'" ;
            } 
        }
        if ( $loggedin_page != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  loggedin_page  = '" . $loggedin_page . "'" ;
            }else{
                $str_condition .= " AND loggedin_page  = '" . $loggedin_page . "'" ;
            } 
        }
        if (trim($str_condition) !="") {
            $strSQL .= " AND  " . $str_condition . "  ";
        }
        $strSQL .= " ORDER BY usertype_name";
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
                $limited_data[$i]["usertype_name"] = $row["usertype_name"];
                $limited_data[$i]["description"] = $row["description"];
                $limited_data[$i]["loggedin_page"] = $row["loggedin_page"];
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