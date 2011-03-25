<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
/*
id
parentmessage_id
fromuser_id
name        #
address #
phone       #
emailid #
ipaddress
touser_id
submit_date (date time) * - automatic
subject *
content *
status_id ( 0 for unread , 1 for read ) *
message_type ( guest book, message) */

class Message {
    var $connection;
    var $id = gINVALID;
    var $parentmessage_id = gINVALID;
    var $fromuser_id = gINVALID;
    var $name="";
    var $address="";
    var $phone=0;
    var $emailid="";
    var $ipaddress = "";
    var $touser_id = gINVALID;
    var $submit_date;
    var $subject = "";
    var $content = "";
    var $status_id = gINVALID;
    var $messagetype_name = "";
    var $messagetype_id = gINVALID;

    var $error = false;
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

   /*
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
*/


    function get_detail(){
    $strSQL = "SELECT * FROM messages WHERE id='".$this->id."'";;
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->subject = mysql_result($rsRES,0,'subject');
        $this->content = mysql_result($rsRES,0,'content');
        $this->emailid = mysql_result($rsRES,0,'emailid');

        $messages = array();$i=0;
        $messages[$i]["id"] =  $this->id;
        $messages[$i]["subject"] = $this->subject;
        $messages[$i]["content"] = $this->content;
        $messages[$i]["emailid"] = $this->emailid;

        return $messages ;
    }else{
        $this->error_number = 2;
        $this->error_description="Contact administrator to get its details";
        return false;
    }
    }
    function change_status(){
    $strSQL = "Update messages SET status_id = ".READ." WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 )
        return true;
    }

    function get_messagetype_id(){

    $strSQL = "SELECT id FROM messagetypes WHERE messagetype_name = '".$this->messagetype_name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    $this->messagetype_id = mysql_result($rsRES,0,'id');
    return true;
    }

    function update(){
    if ( $this->id == "" || $this->id == gINVALID) {

    $strSQL = "INSERT INTO messages (parentmessage_id,name,address,phone,emailid,ipaddress,";
    $strSQL .= "submit_date,subject,content,status_id,messagetype_id) VALUES (";
    $strSQL .= addslashes(trim($this->parentmessage_id)) .",'";
    $strSQL .= addslashes(trim($this->name)) . "','";
    $strSQL .= addslashes(trim($this->address)) . "','";
    $strSQL .= addslashes(trim($this->phone)) . "','";
    $strSQL .= addslashes(trim($this->emailid)) . "','";
    $strSQL .= addslashes(trim($this->ipaddress)) . "',";
    $strSQL .=  "now(),'";
    $strSQL .= addslashes(trim($this->subject)) . "','";
    $strSQL .= addslashes(trim($this->content)) . "',";
    $strSQL .= addslashes(trim($this->status_id)) . ",";
    $strSQL .= addslashes(trim($this->messagetype_id)) .")";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
          if ( mysql_affected_rows($this->connection) > 0 ) {
              $this->id = mysql_insert_id();
              return $this->id;
          }else{
              $this->error_number = 3;
              $this->error_description="Can't insert this Message";
              return false;

          }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE messages SET parentmessage_id = '".addslashes(trim($this->parentmessage_id))."',";
    $strSQL .= "fromuser_id = ".addslashes(trim($this->fromuser_id)).",";
    $strSQL .= "name = '".addslashes(trim($this->name))."',";
    $strSQL .= "address = '".addslashes(trim($this->address))."',";
    $strSQL .= "phone = ".addslashes(trim($this->phone)).",";
    $strSQL .= "emailid = '".addslashes(trim($this->emailid))."',";
    $strSQL .= "ipaddress = '".addslashes(trim($this->ipaddress))."',";
    $strSQL .= "touser_id = ".addslashes(trim($this->touser_id)).",";
    $strSQL .= "submit_date = '".addslashes(trim($this->submit_date))."',";
    $strSQL .= "subject = '".addslashes(trim($this->subject))."',";
    $strSQL .= "content = '".addslashes(trim($this->content))."',";
    $strSQL .= "status_id = ".addslashes(trim($this->status_id)).",";
    $strSQL .= "messagetype_id = ".addslashes(trim($this->messagetype_id));
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this Message";
                return false;
            }
    }
    }
    /*
    function get_list_array(){
        $cities = array();$i=0;
        $strSQL = "SELECT M.*,MT.*";
        $strSQL .= "FROM messages M,messagetypes MT ";
        $strSQL .= " WHERE M.messagetype_id = MT.id";
        //$strSQL .= " ORDER BY city_name";
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
    } */

function get_list_array_bylimit($start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT * FROM messages WHERE 1 ";

        $strSQL .= "ORDER BY emailid";
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
                $limited_data[$i]["emailid"] = $row["emailid"];
                $limited_data[$i]["subject"] = $row["subject"];
                $limited_data[$i]["submit_date"] = $row["submit_date"];
                $limited_data[$i]["name"] = $row["name"];
                $limited_data[$i]["address"] = $row["address"];
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