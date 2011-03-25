<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class country {
    var $connection;
    var $id = gINVALID;
    var $country_name = "";
    var $country = "";
    var $iso2 = "";
    var $iso3 = "";
    var $numericcode = gINVALID;
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

function country($connection){
    $this->connection = $connection;
}
function get_id(){
    $strSQL = "SELECT id,country_name,country,iso2,iso3,numericcode FROM countries ";
    $strSQL .= "WHERE country_name = '".$this->country_name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->country = mysql_result($rsRES,0,'country');
        $this->country_name = mysql_result($rsRES,0,'country_name');
        $this->iso2 = mysql_result($rsRES,0,'iso2');
        $this->iso3 = mysql_result($rsRES,0,'iso3');
        $this->numericcode = mysql_result($rsRES,0,'numericcode');
        return $this->id;
    }
    else{
        $this->error_number = 1;
        $this->error_description="This country doesn't exist";
        return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id,country_name,country,iso2,iso3,numericcode FROM countries ";
    $strSQL .= "WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->country = mysql_result($rsRES,0,'country');
        $this->country_name = mysql_result($rsRES,0,'country_name');
        $this->iso2 = mysql_result($rsRES,0,'iso2');
        $this->iso3 = mysql_result($rsRES,0,'iso3');
        $this->numericcode = mysql_result($rsRES,0,'numericcode');
        return $this->id;
    }
    else{
        $this->error_number = 2;
        $this->error_description="This country doesn't exist";
        return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO countries (country_name,country,iso2,iso3,numericcode) VALUES ('";
    $strSQL .= addslashes(trim($this->country_name)) ."','";
    $strSQL .= addslashes(trim($this->country)) ."','";
    $strSQL .= addslashes(trim($this->iso2)) . "','";
    $strSQL .= addslashes(trim($this->iso3)) . "','";
    $strSQL .= addslashes(trim($this->numericcode))."')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_affected_rows($this->connection) > 0 ) {
        $this->id = mysql_insert_id();
        return $this->id;
    }
    else{
        $this->error_number = 3;
        $this->error_description="Can't insert this country";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE countries SET country_name = '".addslashes(trim($this->country_name))."',";
    $strSQL .= "country = '".addslashes(trim($this->country))."',";
    $strSQL .= "iso2 = '".addslashes(trim($this->iso2))."',";
    $strSQL .= "iso3 = '".addslashes(trim($this->iso3))."',";
    $strSQL .= "numericcode = ".addslashes(trim($this->numericcode));
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this country";
                return false;
            }
    }
}

function get_list_array(){
        $countries = array();$i=0;
        $strSQL = "SELECT id,country_name,country,iso2,iso3,numericcode FROM countries ORDER BY country_name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$country_name,$country,$iso2,$iso3,$numericcode) = mysql_fetch_row($rsRES) ){
              $countries[$i]["id"] = $id;
              $countries[$i]["country_name"] = $country_name;
              $countries[$i]["country"] = $country;
              $countries[$i]["iso2"] = $iso2;
              $countries[$i]["iso3"] = $iso3;
              $countries[$i]["numericcode"] = $numericcode;

              $i++;
        }
        return $countries;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list countries";
        return false;
        }
}
function get_list_array_bylimit($country=-1,$country_name=-1,$iso2="",$iso3="",$numericcode=-1,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";
        $strSQL = "SELECT id,country_name,country,iso2,iso3,numericcode FROM countries WHERE 1 ";
        if ($country_name != -1 && $country_name != "") {
            if (trim($str_condition) =="") {
                $str_condition = "  id  = '" . $country_name . "'" ;
            }else{
                $str_condition .= " AND id  = '" . $country_name . "'" ;
            } 
        }
        if ($country != -1 && $country != "") {
            if (trim($str_condition) =="") {
                $str_condition = "  id  = '" . $country . "'" ;
            }else{
                $str_condition .= " AND id  = '" . $country . "'" ;
            } 
        }
        if ($iso2 != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  iso2  = '" . $iso2 . "'" ;
            }else{
                $str_condition .= " AND iso2  = '" . $iso2 . "'" ;
            } 
        }
        if ($iso3 != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = "  iso3  = '" . $iso3 . "'" ;
            }else{
                $str_condition .= " AND iso3  = '" . $iso3 . "'" ;
            } 
        }
        if ( $numericcode != "" && $numericcode != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  numericcode  = '" . $numericcode . "'" ;
            }else{
                $str_condition .= " AND numericcode  = '" . $numericcode . "'" ;
            } 
        }
        if (trim($str_condition) != "") {
            $strSQL .= " AND  " . $str_condition . "  ";
        }
        $strSQL .= " ORDER BY country_name";
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
                $limited_data[$i]["country_name"] = $row["country_name"];
                $limited_data[$i]["country"] = $row["country"];
                $limited_data[$i]["iso2"] = $row["iso2"];
                $limited_data[$i]["iso3"] = $row["iso3"];
                $limited_data[$i]["numericcode"] = $row["numericcode"];
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