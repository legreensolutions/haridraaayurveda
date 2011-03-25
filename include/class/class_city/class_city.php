<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class City {
    var $connection;
    var $id = gINVALID;
    var $city_name = "";
    var $state_id = gINVALID;
    var $state_name = "";
    var $country_id = gINVALID;
    var $country_name = "";
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";


function get_id(){
    $strSQL = "SELECT C.id AS id,C.city_name AS city_name,C.state_id AS state_id,S.state_name AS state_name,";
    $strSQL .= "C.country_id AS country_id, CO.country_name AS country_name ";
    $strSQL .= "FROM ((cities C  LEFT JOIN countries CO ON C.country_id = CO.id) ";
    $strSQL .= " LEFT JOIN states S ON C.state_id = S.id ) WHERE ";
    $strSQL .= "C.city_name = '".$this->city_name."' ";

    if($this->state_id > 0){
    $strSQL .= "AND C.state_id = '".$this->state_id."' ";
    }

    if($this->country_id > 0){
    $strSQL .= "AND C.country_id = '".$this->country_id."' ";
    }

    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->city_name = mysql_result($rsRES,0,'city_name');
        $this->state_id = mysql_result($rsRES,0,'state_id');
        $this->state_name = mysql_result($rsRES,0,'state_name');
        $this->country_id = mysql_result($rsRES,0,'country_id');
        $this->country_name = mysql_result($rsRES,0,'country_name');
        return $this->id;
    }else{
        $this->error_number = 1;
        $this->error_description="This city doesn't exist";
        return false;
    }
}



function get_detail(){
    $strSQL = "SELECT C.id AS id,C.city_name AS city_name,C.state_id AS state_id,S.state_name AS state_name,";
    $strSQL .= "C.country_id AS country_id, CO.country_name AS country_name ";
    $strSQL .= "FROM ((cities C LEFT JOIN countries CO ON C.country_id = CO.id) ";
    $strSQL .= " LEFT JOIN states S ON C.state_id = S.id ) WHERE ";
    $strSQL .= " C.id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->city_name = mysql_result($rsRES,0,'city_name');
        $this->state_id = mysql_result($rsRES,0,'state_id');
        $this->state_name = mysql_result($rsRES,0,'state_name');
        $this->country_id = mysql_result($rsRES,0,'country_id');
        $this->country_name = mysql_result($rsRES,0,'country_name');

        $cities = array();$i=0;
        $cities[$i]["id"] =  $this->id;
        $cities[$i]["city_name"] = $this->city_name;
        $cities[$i]["state_id"] = $this->state_id;
        $cities[$i]["state_name"] = $this->state_name;
        $cities[$i]["country_id"] = $this->country_id;
        $cities[$i]["country_name"] = $this->country_name;

        return $cities ;
    }else{
        $this->error_number = 2;
        $this->error_description="Contact administrator to get its details";
        return false;
    }
}


function update(){
    if ( $this->id == "" || $this->id == gINVALID) {

    if ( $this->city_name != "" ){
    $strSQL = "INSERT INTO cities (city_name,state_id,country_id) VALUES ('";
    $strSQL .= addslashes(trim($this->city_name)) ."','";
    $strSQL .= addslashes(trim($this->state_id)) . "','";
    $strSQL .= addslashes(trim($this->country_id))."')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
          if ( mysql_affected_rows($this->connection) > 0 ) {
              $this->id = mysql_insert_id();
              return $this->id;
          }else{
              $this->error_number = 3;
              $this->error_description="Can't insert this city";
              return false;

          }
    }
    }
    elseif($this->id > 0 ) {
    if ( $this->city_name != "" ){
    $strSQL = "UPDATE cities SET city_name = '".addslashes(trim($this->city_name))."',";
    $strSQL .= "state_id = ".addslashes(trim($this->state_id)).",";
    $strSQL .= "country_id = ".addslashes(trim($this->country_id));
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this city";
                return false;
            }
    }
    }
}

function get_list_array(){
        $cities = array();$i=0;
        $strSQL = "SELECT C.id AS id,C.city_name AS city_name,C.state_id AS state_id,S.state_name AS state_name,";
        $strSQL .= "C.country_id AS country_id, CO.country_name AS country_name ";
        $strSQL .= "FROM (( cities C  LEFT JOIN countries CO ON C.country_id = CO.id) ";
        $strSQL .= " LEFT JOIN states S ON C.state_id = S.id )";
        $strSQL .= " ORDER BY city_name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            while ( list ($id,$city_name,$state_id,$state_name,$country_id,$country_name) = mysql_fetch_row($rsRES) ){
                $cities[$i]["id"] =  $id;
                $cities[$i]["city_name"] = $city_name;
                $cities[$i]["state_id"] = $state_id;
                $cities[$i]["state_name"] = $state_name;
                $cities[$i]["country_id"] = $country_id;
                $cities[$i]["country_name"] = $country_name;
                $i++;
            }
            return $cities;
        }else{
        $this->error_number = 4;
        $this->error_description="Can't list cities";
        return false;
        }
}

function get_list_array_bylimit($city_name=-1,$state_id=-1,$country_id=-1,$state_name="",$country_name="",$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT C.id AS cityid,C.city_name AS city_name,C.state_id AS state_id ,S.state_name AS state_name,";
        $strSQL .= "C.country_id AS country_id, CO.country_name AS country_name ";
        $strSQL .= "FROM ((cities C  LEFT JOIN countries CO ON C.country_id = CO.id) ";
        $strSQL .= " LEFT JOIN states S ON C.state_id = S.id ) WHERE 1 ";
        if ($city_name != "" && $city_name != -1  ) {
            if (trim($str_condition) =="") {
                $str_condition = "  C.id  = '" . $city_name . "'" ;
            }else{
                $str_condition .= " AND C.id  = '" . $city_name . "'" ;
            } 
        }
        if ( $state_id != "" && $state_id != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  C.state_id  = '" . $state_id . "'" ;
            }else{
                $str_condition .= " AND C.state_id  = '" . $state_id . "'" ;
            } 
        }
        if ( $state_name != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  S.state_name  = '" . $state_name . "'" ;
            }else{
                $str_condition .= " AND S.state_name  = '" . $state_name . "'" ;
            } 
        }
        if ( $country_id != "" && $country_id != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  C.country_id  = '" . $country_id . "'" ;
            }else{
                $str_condition .= " AND C.country_id  = '" . $country_id . "'" ;
            } 
        }
        if ( $country_name != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  CO.country  = '" . $country_name . "'" ;
            }else{
                $str_condition .= " AND CO.country  = '" . $country_name . "'" ;
            } 
        }
        if (trim($str_condition) !="") {
            $strSQL .= " AND  " . $str_condition . "  ";
        }
        $strSQL .= "ORDER BY city_name";
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
                $limited_data[$i]["id"] = $row["cityid"];
                $limited_data[$i]["city_name"] = $row["city_name"];
                $limited_data[$i]["state_id"] = $row["state_id"];
                $limited_data[$i]["state_name"] = $row["state_name"];
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