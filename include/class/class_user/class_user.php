<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class User {
    var $connection;
    var $id = gINVALID;
    var $user_name;
    var $userpassword;
    var $usertype_id = gINVALID;
    var $userstatus_id = gINVALID;
    var $usertype_name = "";
    var $userstatus_name = "";
    var $loggedin_page;
    var $firstname;
    var $lastname;
    var $emailid;
    var $address;
    var $city_id = gINVALID;
    var $state_id = gINVALID;
    var $country_id = gINVALID;
    var $image = "";
    var $ipaddress = "";
    var $registrationdate;
    var $lastlogin;
    var $sec_que_id = gINVALID;
    var $sec_ans = "";
    var $error = false;
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

    function User ( $id="",$uname="",$pass="",$connection="",$usertype_id = USERTYPE_REGISTERED_USER,$userstatus_id = USERSTATUS_TO_BE_ACTIVATED ){
        $this->id = $id;
        $this->user_name = $uname;
        $this->userpassword = $pass;
        $this->connection=$connection;
        $this->usertype_id = $usertype_id;
        $this->userstatus_id = $userstatus_id;
    }

    function login(){
          $strSQL = "SELECT U.id AS uid,user_name,userpassword,usertype_id,firstname,lastname,emailid,address,";
          $strSQL .= "city_id,state_id,country_id,ipaddress,registrationdate,lastlogin,userstatus_id,loggedin_page ";
          $strSQL .= "FROM users U,usertypes UT,userstatuses US WHERE user_name = '".$this->user_name;
          $strSQL .= "' AND userpassword='".$this->userpassword."' ";
          $strSQL .= "AND userstatus_id = ".USERSTATUS_ACTIVE." AND U.usertype_id = UT.id";
          $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
          if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'uid');
                $this->user_name = mysql_result($rsRES,0,'user_name');
                $this->userpassword = mysql_result($rsRES,0,'userpassword');
                $this->usertype_id = mysql_result($rsRES,0,'usertype_id');
                $this->userstatus_id = mysql_result($rsRES,0,'userstatus_id');
                $this->loggedin_page = mysql_result($rsRES,0,'loggedin_page');
                $this->firstname = mysql_result($rsRES,0,'firstname');
                $this->lastname = mysql_result($rsRES,0,'lastname');
                $this->emailid = mysql_result($rsRES,0,'emailid');
                $this->address = mysql_result($rsRES,0,'address');
                $this->city_id = mysql_result($rsRES,0,'city_id');
                $this->state_id = mysql_result($rsRES,0,'state_id');
                $this->country_id = mysql_result($rsRES,0,'country_id');
                $this->ipaddress = mysql_result($rsRES,0,'ipaddress');
                $this->registrationdate = mysql_result($rsRES,0,'registrationdate');
                $this->lastlogin = mysql_result($rsRES,0,'lastlogin');
                return true;
          }
          else{
                $this->error_description = "Login Failed";
                return false;
          }
    }
    function register_login(){
           $_SESSION[SESSION_TITLE.'userid'] = $this->id;
           $_SESSION[SESSION_TITLE.'username'] = $this->user_name;
           $_SESSION[SESSION_TITLE.'usertypeid'] = $this->usertype_id;
           $_SESSION[SESSION_TITLE.'userstatusid'] = $this->userstatus_id;
            return true;
    }
    function logout(){
        $chk = session_destroy();
        if ($chk == true){
            return true;
        }
        else{
                return false;
        }
    }
    function check_login(){
        if ( isset($_SESSION[SESSION_TITLE.'userid']) && $_SESSION[SESSION_TITLE.'userid'] > 0 ) {
            if ( trim($this->usertype_id) == "" || trim($this->usertype_id) == -1 ){
                return true;
            }else{
                if ( $this->usertype_id == $_SESSION[SESSION_TITLE.'usertypeid']){
                        return true;
                    
                }else{
                        return false;
                }
            }

       }else{
                   return false;
       }
    }

    function update(){
        if ( $this->id == "" || $this->id == gINVALID) {
              $strSQL = "INSERT INTO users (user_name,userpassword,firstname,lastname,emailid,";
              if ( $this->address != "" ){
              $strSQL .= "address,";
              }
              if ( $this->city_id ) {
              $strSQL .= "city_id,";
              }
              if ( $this->state_id ) {
              $strSQL .= "state_id,";
              }
              $strSQL .= "country_id,";
              if ( $this->image != "" ){
              $strSQL .= "image,";
              }
              $strSQL .= "usertype_id,userstatus_id,registrationdate,securityquestion_id,answer) ";
              $strSQL .= "VALUES ('".addslashes(trim($this->user_name))."','";
              $strSQL .= md5(addslashes(trim($this->userpassword)))."','";
              $strSQL .= addslashes(trim($this->firstname))."','";
              $strSQL .= addslashes(trim($this->lastname))."','";
              $strSQL .= addslashes(trim($this->emailid))."',";
              if ( $this->address != "" ){
              $strSQL .= "'".addslashes(trim($this->address))."',";
              }
              if ( $this->city_id ) {
              $strSQL .= addslashes(trim($this->city_id)).",";
              }
              if ( $this->state_id ) {
              $strSQL .= addslashes(trim($this->state_id)).",";
              }
              $strSQL .= addslashes(trim($this->country_id)).",";
              if ( $this->image != "" ){
              $strSQL .= "'" . addslashes(trim($this->image))."',";
              }
              $strSQL .= $this->usertype_id.",".$this->userstatus_id.",";
              $strSQL .= "now(),";
              $strSQL .= addslashes(trim($this->sec_que_id)).",'";
              $strSQL .= addslashes(trim($this->sec_ans))."')";
              $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
              if ( mysql_affected_rows($this->connection) > 0 ){
                    $this->id = mysql_insert_id();;
                    return true;
              }
              else{
                $this->error_description = "Registration Failed";
                return false;
              }

        }
        elseif($this->id > 0 ) {
            $strSQL = "UPDATE users SET ";
            $strSQL .= "firstname = '".addslashes(trim($this->firstname))."',";
            $strSQL .= "lastname = '".addslashes(trim($this->lastname))."',";
            $strSQL .= "usertype_id = '".addslashes(trim($this->usertype_id))."',";
            $strSQL .= "userstatus_id = '".addslashes(trim($this->userstatus_id))."',";
            if ( $this->address != "" ){
            $strSQL .= "address = '".addslashes(trim($this->address))."',";
            }
            if ( $this->city_id ) {
            $strSQL .= "city_id = ".addslashes(trim($this->city_id)).",";
            }
            if ( $this->state_id ) {
            $strSQL .= "state_id = ".addslashes(trim($this->state_id)).",";
            }
            $strSQL .= "country_id = ".addslashes(trim($this->country_id)).",";
            if ( $this->image != "" ){
            $strSQL .= "image = '".addslashes(trim($this->image))."',";
            }
            $strSQL .= "lastlogin = '".addslashes(trim($this->lastlogin))."',";
            $strSQL .= "securityquestion_id = '".addslashes(trim($this->sec_que_id))."',";
            $strSQL .= "answer = '".addslashes(trim($this->sec_ans))."'";
            $strSQL .= " WHERE id = ".$this->id;//$this->id
            $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_description = "User Update Failed";
                return false;
            }
        }

    }

    function update_userstatus(){
        $strSQL = "UPDATE users SET userstatus_id = ".$this->userstatus_id;
        $strSQL .= " WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) > 0 ) {
                    return true;
            }
            else{
                $this->error_description = "User Status Update Failed";
                return false;
            }
    }
    function delete(){
        $strSQL = "DELETE FROM users WHERE id =".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) > 0 ) {
                    return true;
            }
            else{
                $this->error_description = "Can't Delete This User";
                return false;
            }
    }
    function get_newpassword(){
    GLOBAL $g_orgname;
    $strSQL = "SELECT user_name,firstname FROM users U,securityquestions S WHERE securityquestion_id = S.id AND ";
    $strSQL .= "user_name = '".addslashes(trim($_POST['txtusername']))."' AND securityquestion_id = ".$_POST['lstsec_que'];
    $strSQL .= " AND answer = '".addslashes(trim($_POST['txtsec_ans']))."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ) {
            $email = mysql_result($rsRES,0,'user_name');
            $fname = mysql_result($rsRES,0,'firstname');
            //Generating & updating password
            $password = substr(md5(microtime()),0,8) ;
            $strSQL = "UPDATE users SET userpassword = '".md5($password)."' WHERE user_name = '".$this->user_name."'";
            $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            //Creating mail to user
            $page_email = $email;
            $str_subject = "New Password for ".$g_orgname;
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$g_orgname.' <'.EMAIL_INFO.'>'."\r\n";
            $message = "Dear " . $fname . ",<br />
                <br />
                Here is your new password for ".$g_orgname.". <br><br>
                Your Username: " . $this->user_name . "<br>
                Your Password: " . $password . "<br /><br /><br />
                
                Thanks,<br /><br />
                ".$g_orgname."<br />";
                // send password to user
//                 echo $message;exit();
                mail($page_email,$str_subject,$message,$headers);
                return true;
        }
        else{
             $this->error_description = "Invalid email address!, Please check the email entered";
             return  false;
        }
    }
    function change_password($newpasswd,$oldpasswd){
                    $strSQL = "UPDATE users SET ";
                    $strSQL .= "userpassword = '" .$newpasswd. "' ";
                    $strSQL .= "WHERE id = '" . $this->id . "' AND userpassword = '".$oldpasswd."'";
                    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
                    if ( mysql_affected_rows($this->connection) > 0 ) {
                        return true;
                    }
                    else{
                        return false;
                        $this->error_description = "Incorrect password";
                    }
    }
    function exist(){
        $strSQL = "SELECT 1 FROM users WHERE user_name = '".$this->user_name."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            return true;
        }
        else{
            return false;
        }
    }
    function get_detail(){
        //if ( isset($_SESSION[SESSION_TITLE.'userid']) &&$_SESSION[SESSION_TITLE.'userid'] > 0 ) {
        $strSQL = "SELECT * FROM users WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'id');
                $this->user_name = mysql_result($rsRES,0,'user_name');
                //$this->userpassword = mysql_result($rsRES,0,'userpassword');
                $this->usertype_id = mysql_result($rsRES,0,'usertype_id');
                $this->userstatus_id = mysql_result($rsRES,0,'userstatus_id');
                $this->firstname = mysql_result($rsRES,0,'firstname');
                $this->lastname = mysql_result($rsRES,0,'lastname');
                $this->emailid = mysql_result($rsRES,0,'emailid');
                $this->address = mysql_result($rsRES,0,'address');
                $this->city_id = mysql_result($rsRES,0,'city_id');
                $this->state_id = mysql_result($rsRES,0,'state_id');
                $this->country_id = mysql_result($rsRES,0,'country_id');
                $this->image = mysql_result($rsRES,0,'image');
                $this->ipaddress = mysql_result($rsRES,0,'ipaddress');
                $this->registrationdate = mysql_result($rsRES,0,'registrationdate');
                $this->lastlogin = mysql_result($rsRES,0,'lastlogin');
                $this->sec_que_id = mysql_result($rsRES,0,'securityquestion_id');
                $this->sec_ans = mysql_result($rsRES,0,'answer');
                return true;
        }
        else{
            return false;
        }
        /*}
        else{
            return false;
        } */
    }
    function delete_image_fromDB(){
        $strSQL = "UPDATE users SET image='' WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
                        return true;
        }
        else{
                        return false;
                        $this->error_description = "Image not deleted";
         }
    }
    function get_list_array($txtsearch,$lstusertype,$lstuserstatus){
        $data = array();$i=0;
        $strSQL = "SELECT U.id AS uid,user_name,firstname,usertype_id,userstatus_id,usertype_name,userstatus_name,";
        $strSQL .= "registrationdate FROM users U,usertypes UT,userstatuses US WHERE usertype_id=UT.id AND userstatus_id=US.id";
        if ( $txtsearch != "" ){
        $strSQL .= " AND ( firstname LIKE '%".$txtsearch."%' OR user_name LIKE '%".$txtsearch."%' )";
        }
        if ( $lstusertype != -1 && $lstusertype != ""){
        $strSQL .= " AND usertype_id = ".$lstusertype;
        }
        if ( $lstuserstatus != -1 && $lstuserstatus != ""){
        $strSQL .= " AND userstatus_id = ".$lstuserstatus;
        }
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$user_name,$firstname,$usertype_id,$userstatus_id,$usertype_name,$userstatus_name,$registrationdate) = mysql_fetch_row($rsRES) ){
              $data[$i]["id"] = $id;
              $data[$i]["user_name"] = $user_name;
              $data[$i]["firstname"] = $firstname;
              $data[$i]["usertype_id"] = $usertype_id;
              $data[$i]["userstatus_id"] = $userstatus_id;
              $data[$i]["usertype_name"] = $usertype_name;
              $data[$i]["userstatus_name"] = $userstatus_name;
              $r_date = date('m/d/Y', strtotime($registrationdate));
              $data[$i]["registrationdate"] = $r_date;
              $i++;
        }
        return $data;
        }
        else{
        return false;
        }
    }
    function get_list_array_bylimit($username,$firstname,$lastname,$address,$city,$country,$usertype,$userstatus,$start_record = 0,$max_records = 25){
        $limited_data = array();$i=0;
        $strSQL = "SELECT U.id AS uid,user_name,firstname,lastname,address,";
        $strSQL .= "city_id,city_name,U.country_id,country,";
        $strSQL .= "usertype_id,usertype_name,userstatus_id,userstatus_name,";
        $strSQL .= "registrationdate FROM ((((users U INNER JOIN usertypes UT ON usertype_id=UT.id) ";
        $strSQL .= " LEFT JOIN userstatuses US ON userstatus_id=US.id )";
        $strSQL .= " LEFT JOIN cities C ON city_id = C.id )";
        $strSQL .= " LEFT JOIN countries CO ON U.country_id = CO.id ) ";

        if ($username != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = " user_name  LIKE '%" . $username . "%'" ;
            }else{
                $str_condition .= " AND user_name  LIKE '%" . $username . "%'" ;
            } 
        }
        if ($firstname != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = " firstname  LIKE '%" . $firstname . "%'" ;
            }else{
                $str_condition .= " AND firstname  LIKE '%" . $firstname . "%'" ;
            } 
        }
        if ($lastname != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = " lastname  LIKE '%" . $lastname . "%'" ;
            }else{
                $str_condition .= " AND lastname  LIKE '%" . $lastname . "%'" ;
            } 
        }
        if ($address != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = " address  LIKE '%" . $address . "%'" ;
            }else{
                $str_condition .= " AND address  LIKE '%" . $address . "%'" ;
            } 
        }
        if ( $city != "" ) {
            if (trim($str_condition) =="") {
                $str_condition = " C.city_name LIKE '%" . $city . "%'" ;
            }else{
                $str_condition .= " C.city_name LIKE '%" . $city;
            } 
        }
        if ( $country != "" && $country != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = " U.country_id = " . $country;
            }else{
                $str_condition .= " AND U.country_id = " . $country;
            } 
        }
        if ( $usertype != "" && $usertype != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = " usertype_id = " . $usertype;
            }else{
                $str_condition .= " AND usertype_id = " . $usertype;
            } 
        }
        if ( $userstatus != "" && $userstatus != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = " userstatus_id = " . $userstatus;
            }else{
                $str_condition .= " AND userstatus_id = " . $userstatus;
            } 
        }

        if (trim($str_condition) !="") {
            $strSQL .= " WHERE  " . $str_condition . "  ";
        }
        $strSQL .= "ORDER BY user_name";

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

        while ( list ($id,$user_name,$firstname,$lastname,$address,$city_id,$city_name,$country_id,$country,$usertype_id,$usertype_name,$userstatus_id,$userstatus_name,$r_date) = mysql_fetch_row($rsRES) ){
              $limited_data[$i]["id"] = $id;
              $limited_data[$i]["user_name"] = $user_name;
              $limited_data[$i]["firstname"] = $firstname;
              $limited_data[$i]["lastname"] = $lastname;
              $limited_data[$i]["address"] = $address;
              $limited_data[$i]["city_id"] = $city_id;
              $limited_data[$i]["city"] = $city_name;
              $limited_data[$i]["country_id"] = $country_id;
              $limited_data[$i]["country"] = $country;

              $limited_data[$i]["usertype_id"] = $usertype_id;
              $limited_data[$i]["userstatus_id"] = $userstatus_id;
              $limited_data[$i]["usertype_name"] = $usertype_name;
              $limited_data[$i]["userstatus_name"] = $userstatus_name;
              $r_date = date('m/d/Y', strtotime($r_date));
              $limited_data[$i]["registrationdate"] = $r_date;
              $i++;
        }
        return $limited_data;
        }
        else{
        return false;
        }
    }

    function get_xml(){
        if ( isset($_SESSION[SESSION_TITLE.'userid']) && $_SESSION[SESSION_TITLE.'userid'] > 0 ) {
        echo '<?xml version="1.0" encoding="ISO-8859-1" ?>
        <root>';
        echo "<data>";
        echo "<row>";
        echo "<id>" .$this->id."</id>";
        echo "<user_name>".$this->user_name."</user_name>";
        echo "<firstname>".$this->firstname."</firstname>";
        echo "<lastname>".$this->lastname."</lastname>";
        echo "<address>".$this->address."</address>";
        echo "<city_id>".$this->city_id."</city_id>";
        echo "<state_id>".$this->state_id."</state_id>";
        echo "<country_id>".$this->country_id."</country_id>";
        echo "</row>";
        echo "</data>";
        echo "</root>";
        //return $data;
        }
        else{
        return false;
        }
    }
}
?>