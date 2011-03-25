<?php
 $myuser = new User();
 $myuser->usertype_id = USERTYPE_ADMIN;
 $myuser->connection = $myconnection;
 $chk = $myuser->check_login();
 if ( $chk == false ){
            $_SESSION[SESSION_TITLE.'flash'] = $g_msg_unauthorized_request;
            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = $g_msg_unauthorized_request_redirect_page;
            header( "Location: gfwflash.php");
            exit();
 }

 $myquestion = new securityquestion();
 $myquestion->connection = $myconnection;
 $chk_que = $myquestion->get_list_array();

 $mycountry = new country($myconnection);
 $mycountry->connection = $myconnection;
 $chk_country = $mycountry->get_list_array();

 $myusertype = new usertype($myconnection);
 $myusertype->connection = $myconnection;
 $chk_usertype = $myusertype->get_list_array();

 $myuserstatus = new userstatus($myconnection);
 $myuserstatus->connection = $myconnection;
 $chk_userstatus = $myuserstatus->get_list_array();

 $myimage = new Image;

 if ( $_POST['submit'] == $CAP_add ) {
 $strERR = "";
 if ( trim($_POST['txtusername']) == "" ){
      $strERR .= $MSG_empty_username;
 }
 if ( trim($_POST['txtpassword']) == "" && trim($_POST['txtrepassword']) == "" ){
      if ( $_POST['chkpassword'] == "" ){
      $strERR .= $MSG_empty_password;
      }
 }
 if ( trim($_POST['txtpassword']) != trim($_POST['txtrepassword']) ){
      $strERR .= $MSG_unmatching_passwords;
 }
 if ( trim($_POST['txtfirstname']) == "" ){
      $strERR .= $MSG_empty_firstname;
 }
 if ( $_POST['lstusertype'] == -1) {
      $strERR .= $MSG_empty_usertype;
 }
 if ( $_POST['lstuserstatus'] == -1 ){
      $strERR .= $MSG_empty_userstatus;
 }
 if ( $_POST['lstsec_que'] == -1 ){
    $strERR .= $MSG_empty_sec_que;
}
elseif($_POST['lstsec_que'] == ""){
    $strERR .= $MSG_empty_sec_ans;
}
$myuser->error_description = $strERR;
 if ( trim ( $_FILES['fleimage']['name'] ) != ""  && $strERR == "" ) {
                                        $imgfilename = basename($_FILES["fleimage"]["name"]);
                                        $imgfilesize = $_FILES["fleimage"]["size"];
                                        //move the uploaded file to the CAR image directory and create the thumbnail
                                        $arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576,USER_DIR);
                                    
                                        if ($arrupload["err_code"] == -1) {
                                            $strERR .= $MSG_VAL_image_err1;
                                        }
                                        elseif ($arrupload["err_code"] == -2) {
                                            $strERR .= $MSG_VAL_image_err2;
                                        }
                                        elseif ($arrupload["err_code"] == -3) {
                                            $strERR .= $MSG_VAL_image_err3;
                                        }
                                        elseif ($arrupload["err_code"] == -4) {
                                            $strERR .= $MSG_VAL_image_err4;
                                        }
                                        elseif ($arrupload["err_code"] == -5) {
                                            $strERR .= $MSG_VAL_image_err5;
                                        }
                                        elseif ($arrupload["err_code"] == -6) {
                                            $strERR .= $MSG_VAL_image_err6;
                                        }
                                    

                                        //the first image uploaded is set as the default
                                        $int_default = 0;
}
$myuser->error_description = $strERR;
 if ( $strERR == "" ){
        $myuser = new User();
        $myuser->connection = $myconnection;
        $myuser->user_name = $_POST['txtusername'];
        //check user exist or not
        $chk = $myuser->exist();
        if ( $chk == true ){
            $myuser->error_description = "User already exist";
        }
        else{
              $password = $_POST['txtpassword'];
              $myuser->userpassword = $_POST['txtpassword'];
              $myuser->usertype_id = $_POST['lstusertype'];
              $myuser->userstatus_id = $_POST['lstuserstatus'];
              $myuser->emailid = $_POST['txtusername'];
              $myuser->firstname = $_POST['txtfirstname'];
              $myuser->lastname = $_POST['txtlastname'];
              $myuser->address = $_POST['txtaddress'];
              if ( trim($_POST['txtcity']) != "" ){
                    $mycity = new City();
                    $mycity->city_name = trim($_POST['txtcity']);
                    $mycity->connection = $myconnection;
                    $chk = $mycity->get_id();
                    if ( $chk == false ){
                        $mycity->country_id = $_POST['lstcountry'];
                        $chk = $mycity->update();
                    }
                    $myuser->city_id = $chk;
              }
              //$myuser->state_id = $_POST['lststate'];
              $myuser->country_id = $_POST['lstcountry'];
              if ( $_POST['chkpassword'] != ""){
              $password = substr(md5(microtime()),0,8) ;
              $myuser->userpassword = md5($password);
              }
              $myuser->image = $_FILES['fleimage']['name'];
              $myuser->sec_que_id = $_POST['lstsec_que'];
              $myuser->sec_ans = $_POST['txtsec_ans'];
              $chk = $myuser->update();
              if ( $chk == true ){
                    if ( trim ( $_FILES['fleimage']['name'] ) != "" && $myuser->id > 0 ) {
                                                //rename the uploaded Image file and the thumbnail
                                                if ( $myimage->rename_image ($myuser->id, $arrupload["imagefile"], USER_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
                                                    $strMSG = "Image uploaded & renamed";
                                                }
                                                else {
                                                    //Error while renaming the uploaded files
                                                    $strERR = "Error while renaming the uploaded files. Contact administrator";
                                                }
                    }
                    if ( $_POST['chkemailconfirm"'] != ""){
                    send_email_to_user($_POST["txtusername"],$password,$_POST["txtusername"],$myuser->id);
                    }
                          $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_added;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
              }
              else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
             }
        }
 }
 }
 if ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $myuser = new User();
      $myuser->id = $_GET['id'];
      $myuser->connection = $myconnection;
      $chk1 = $myuser->get_detail();
      $image = $myuser->image;
      $r_date = date('m/d/Y', strtotime($myuser->registrationdate));
      if ( $myuser->image != "" ) {
            $ext = explode('.', $myuser->image);
            $ext = $ext[count($ext)-1];
            $user_image = USER_DIR . $myuser->id . '.' . $ext;
      }
      if ( $chk == false ){
      header("Location: index.php");
      exit();
      }
      if ( $myuser->city_id != "" ){
      $mycity = new City();
      $mycity->id = $myuser->city_id;
      $mycity->connection = $myconnection;
      $chk2 = $mycity->get_detail();
      }
 }
 if ( $_POST['submit'] == $CAP_update ) {
 $strERR = "";

 if ( trim($_POST['txtfirstname']) == "" ){
      $strERR .= $MSG_empty_firstname;
 }
 if ( $_POST['lstusertype'] == -1) {
      $strERR .= $MSG_empty_usertype;
 }
 if ( $_POST['lstuserstatus'] == -1 ){
      $strERR .= $MSG_empty_userstatus;
 }
 if ( $_POST['lstsec_que'] == -1 ){
    $strERR .= $MSG_empty_sec_que;
}
elseif($_POST['lstsec_que'] == ""){
    $strERR .= $MSG_empty_sec_ans;
}
$myuser->error_description = $strERR;
if ( trim ( $_FILES['fleimage']['name'] ) != ""  && $strERR == "" ) {

                                        $imgfilename = basename($_FILES["fleimage"]["name"]);
                                        $imgfilesize = $_FILES["fleimage"]["size"];
                                        //move the uploaded file to the CAR image directory and create the thumbnail
                                        $arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576, USER_DIR);
                                    
                                        if ($arrupload["err_code"] == -1) {
                                            $strERR .= $MSG_VAL_image_err1;
                                        }
                                        elseif ($arrupload["err_code"] == -2) {
                                            $strERR .= $MSG_VAL_image_err2;
                                        }
                                        elseif ($arrupload["err_code"] == -3) {
                                            $strERR .= $MSG_VAL_image_err3;
                                        }
                                        elseif ($arrupload["err_code"] == -4) {
                                            $strERR .= $MSG_VAL_image_err4;
                                        }
                                        elseif ($arrupload["err_code"] == -5) {
                                            $strERR .= $MSG_VAL_image_err5;
                                        }
                                        elseif ($arrupload["err_code"] == -6) {
                                            $strERR .= $MSG_VAL_image_err6;
                                        }
                                    

                                        //the first image uploaded is set as the default
                                        $int_default = 0;
}
$myuser->error_description = $strERR;
 if ( $strERR == "" ){
            $myuser = new User();
            $myuser->id = $_POST['h_check_id'];
            $myuser->connection = $myconnection;
              $chk = $myuser->get_detail();
              $myuser->usertype_id = $_POST['lstusertype'];
              $myuser->userstatus_id = $_POST['lstuserstatus'];
              $myuser->emailid = $_POST['txtusername'];
              $myuser->firstname = $_POST['txtfirstname'];
              $myuser->lastname = $_POST['txtlastname'];
              $myuser->address = $_POST['txtaddress'];
              if ( trim($_POST['txtcity']) != "" ){
                    $mycity = new City();
                    $mycity->city_name = trim($_POST['txtcity']);
                    $mycity->connection = $myconnection;
                    $chk = $mycity->get_id();
                    if ( $chk == false ){
                        $mycity->country_id = $_POST['lstcountry'];
                        $chk = $mycity->update();
                    }
                    $myuser->city_id = $chk;
              }

              //$myuser->state_id = $_POST['lststate'];
              $myuser->country_id = $_POST['lstcountry'];
              $myuser->image = $_FILES['fleimage']['name'];
              $myuser->sec_que_id = $_POST['lstsec_que'];
              $myuser->sec_ans = $_POST['txtsec_ans'];
              $chk = $myuser->update();

              if ( $chk == true ){
                    if ( trim ( $_FILES['fleimage']['name'] ) != "" && $myuser->id > 0 ) {
                                                //rename the uploaded Image file and the thumbnail
                                               $myimage->delete_image ($myuser->id, $myuser->image, USER_DIR);
                                                if ( $myimage->rename_image ($myuser->id, $arrupload["imagefile"], USER_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
                                                    $strMSG = "Image uploaded & renamed";

                                                }
                                                else {
                                                    //Error while renaming the uploaded files
                                                    $strERR = "Error while renaming the uploaded files. Contact administrator";
                                                }
                    }
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_updated;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "user_list.php";
                            header( "Location: gfwflash.php");
                            exit();
              }
              else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "add_user.php";
                            header( "Location: gfwflash.php");
                            exit();
             }
        }
 }
 if ( $_POST['submit'] == $CAP_delete_image ){
                 $myuser = new User();
                 $myuser->connection = $myconnection;
                    $myuser->id = $_POST['h_id'];
                    $chk = $myuser->get_detail();
                    $r_date = date('m/d/Y', strtotime($myuser->registrationdate));
                  if ( delete_image ($myuser->id, $myuser->image, USER_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
                     $strMSG = "Image deleted from directory";
                     $image = "";
                     $chk = $myuser->delete_image_fromDB();
                     $myuser->error_description = $strMSG;
                    if ( $chk == true ){
                    $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_image_deleted;
                    $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "user_list.php";
                    header( "Location: gfwflash.php");
                    exit();
                    }
                    else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "add_user.php";
                            header( "Location: gfwflash.php");
                            exit();
                    }
                  }
                  else {
                      $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
                      $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "add_user.php";
                      header( "Location: gfwflash.php");
                      exit();
                  }
 }
 if ( $_POST['submit'] == $CAP_delete ) {
      $myuser = new User();
      $myuser->connection = $myconnection;
      $myuser->id = $_POST['h_check_id'];
      $chk = $myuser->delete();
      if ( $chk == true ){
                    $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_deleted;
                    $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "user_list.php";
                    header( "Location: gfwflash.php");
                    exit();
      }
      else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "add_user.php";
                            header( "Location: gfwflash.php");
                            exit();
      }
}
?>