<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class state {
    var $connection;
    var $id = gINVALID;
    var $state_name = "";
    var $state_code = gINVALID;
    var $country_id = gINVALID;
    var $country_name = "";
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

function state($connection){
    $this->connection = $connection;
}
function get_id(){
    $strSQL = "SELECT S.id AS id,state_name,statecode,country_id,country_name FROM states S,countries C WHERE ";
    $strSQL .= "S.country_id=C.id AND state_name = '".$this->state_name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->state_name = mysql_result($rsRES,0,'state_name');
        $this->statecode = mysql_result($rsRES,0,'statecode');
        $this->country_id = mysql_result($rsRES,0,'country_id');
        $this->country_name = mysql_result($rsRES,0,'country_name');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This state doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT S.id AS id,state_name,statecode,country_id,country_name FROM states S,countries C WHERE ";
    $strSQL .= "S.country_id=C.id AND S.id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->state_name = mysql_result($rsRES,0,'state_name');
        $this->statecode = mysql_result($rsRES,0,'statecode');
        $this->country_id = mysql_result($rsRES,0,'country_id');
        $this->country_name = mysql_result($rsRES,0,'country_name');

        $states = array();$i=0;
        $states[$i]["id"] =  $this->id;
        $states[$i]["state_name"] = $this->state_name;
        $states[$i]["statecode"] = $this->statecode;
        $states[$i]["country_id"] = $this->country_id;
        $states[$i]["country_name"] = $this->country_name;

        return $states ;
    }else{
        $this->error_number = 2;
        $this->error_description="Contact administrator to get its details";
        return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO states (state_name,statecode,country_id) VALUES ('";
    $strSQL .= addslashes(trim($this->state_name)) ."','";
    $strSQL .= addslashes(trim($this->statecode)) . "','";
    $strSQL .= addslashes(trim($this->country_id))."')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_affected_rows($this->connection) > 0 ) {
        $this->id = mysql_insert_id();
        return $this->id;
    }
    else{
        $this->error_number = 3;
        $this->error_description="Can't insert this state";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE states SET state_name = '".addslashes(trim($this->state_name))."',";
    $strSQL .= "statecode = '".addslashes(trim($this->statecode))."',";
    $strSQL .= "country_id = ".addslashes(trim($this->country_id));
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this state";
                return false;
            }
    }
}

function get_list_array(){
        $states = array();$i=0;
        $strSQL = "SELECT S.id AS state_id,state_name,statecode,country_id,country_name FROM states S,countries C";
        $strSQL .= " WHERE S.country_id = C.id ORDER BY state_name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$state_name,$statecode,$country_id,$country_name) = mysql_fetch_row($rsRES) ){
              $states[$i]["id"] = $id;
              $states[$i]["state_name"] = $state_name;
              $states[$i]["statecode"] = $statecode;
              $states[$i]["country_id"] = $country_id;
              $states[$i]["country_name"] = $country_name;
              $i++;
        }
        return $states;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list states";
        return false;
        }
}
function get_list_array_bylimit($state_name=-1,$statecode=-1,$country_id=-1,$country_name="",$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT S.id AS state_id,state_name,statecode,country_id,country_name FROM ";
        $strSQL .= "states S,countries C WHERE S.country_id = C.id ";
        if ( $state_name != "" && $state_name != -1  ) {
            if (trim($str_condition) =="") {
                $str_condition = "  S.id  = '" . $state_name . "'" ;
            }else{
                $str_condition .= " AND S.id  = '" . $state_name . "'" ;
            } 
        }
        if ( $statecode != "" && $statecode != -1   ) {
            if (trim($str_condition) =="") {
                $str_condition = "  S.id  = '" . $statecode . "'" ;
            }else{
                $str_condition .= " AND S.id  = '" . $statecode . "'" ;
            } 
        }
        if ( $country_id != "" && $country_id != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  country_id  = '" . $country_id . "'" ;
            }else{
                $str_condition .= " AND country_id  = '" . $country_id . "'" ;
            } 
        }
        if ( $country_name != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  C.country_name  = '" . $country_name . "'" ;
            }else{
                $str_condition .= " AND C.country_name  = '" . $country_name . "'" ;
            } 
        }
        if (trim($str_condition) !="") {
            $strSQL .= " AND  " . $str_condition . "  ";
        }
        $strSQL .= "ORDER BY state_name";
        //taking limit  result of that in $rsRES .$start_record is starting record of a page.$max_records num of records in that page
        $strSQL_limit = sprintf("%s LIMIT %d, %d", $strSQL, $start_record, $max_records);
        $rsRES = mysql_query($strSQL_limit, $this->connection) or die(mysql_error(). $strSQL_limit);
        //echo $strSQL;
        if ( mysql_num_rows($rsRES) > 0 ){

            //without limit  , result of that in $all_rs
            if (trim($this->total_records)!="" && $this->total_records > 0) {
                
            } else {
                $all_rs = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL_limit); 
                $this->total_records = mysql_num_rows($all_rs);
            }
    
            while ( $row = mysql_fetch_assoc($rsRES) ){
                $limited_data[$i]["id"] = $row["state_id"];
                $limited_data[$i]["state_name"] = $row["state_name"];
                $limited_data[$i]["statecode"] = $row["statecode"];
                $limited_data[$i]["country_id"] = $row["country_id"];
                $limited_data[$i]["country_name"] = $row["country_name"];
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