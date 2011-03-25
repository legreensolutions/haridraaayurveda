<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class securityquestion {
    var $connection;
    var $id = gINVALID;
    var $question = "";
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

function get_id(){
    $strSQL = "SELECT id,question FROM securityquestions WHERE question = '".$this->question."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->question = mysql_result($rsRES,0,'question');
        return $this->id;
    }else{
        $this->error_number = 1;
        $this->error_description="This security question doesn't exist";
        return false;
    }
}



function get_detail(){
    $strSQL = "SELECT id,question FROM securityquestions WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->question = mysql_result($rsRES,0,'question');
        return $this->id;
    }else{
        $this->error_number = 2;
        $this->error_description="Contact administrator to get its details";
        return false;
    }
}


function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO securityquestions (question) VALUES ('";
    $strSQL .= addslashes(trim($this->question)) ."')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
          if ( mysql_affected_rows($this->connection) > 0 ) {
              $this->id = mysql_insert_id();
              return $this->id;
          }else{
              $this->error_number = 3;
              $this->error_description="Can't insert this question";
              return false;
          }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE securityquestions SET question = '".addslashes(trim($this->question))."'";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this question";
                return false;
            }
    }
}

function get_list_array(){
        $questions = array();$i=0;
        $strSQL = "SELECT id,question FROM securityquestions ORDER BY question";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            while ( list ($id,$question) = mysql_fetch_row($rsRES) ){
                $questions[$i]["id"] =  $id;
                $questions[$i]["question"] = $question;
                $i++;
            }
            return $questions;
        }else{
        $this->error_number = 4;
        $this->error_description="Can't list Security questions";
        return false;
        }
}

function get_list_array_bylimit($question=-1,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id,question FROM securityquestions WHERE 1 ";
        if ( $question != "" && $question != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  id  = '" . $question . "'" ;
            }else{
                $str_condition .= " AND id  = '" . $question . "'" ;
            } 
        }
        if (trim($str_condition) !="") {
            $strSQL .= " AND  " . $str_condition . "  ";
        }
        $strSQL .= " ORDER BY question";
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
                $limited_data[$i]["question"] = $row["question"];
                $i++;
            }
            return $limited_data;
        }else{
            $this->error_number = 5;
            $this->error_description="Can't get limited data";
            return false;
        }
}

function delete(){
    if($this->id > 0 ) {
        $strSQL = " DELETE FROM securityquestions WHERE id = '".$this->id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
        }
        else{
            $this->error_number = 6;
            $this->error_description="Can't deltete this Question";
            return  false;
        }
    }
}
}


?>