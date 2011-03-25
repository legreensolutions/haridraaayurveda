<?php
    $myquestion = new securityquestion();
    $myquestion->connection = $myconnection;
    $chk_que = $myquestion->get_list_array();
    if ( $chk == false ){

    }

    $mycountry = new country($myconnection);
    $mycountry->connection = $myconnection;
    $chk_con = $mycountry->get_list_array();
    if ( $chk == false ){

    }

    $myimage = new Image;

if ($_POST['submit'] == $CAP_submit){
if ( $_POST['txtusername'] == "" ){
    $strERR .= "<br/>".$MSG_empty_username;
}
if ( $_POST['txtpasswd'] == "" ){
    $strERR .= "<br/>".$MSG_empty_password;
}
if ( $_POST['txtrepasswd'] == "" ){
    $strERR .= "<br/>".$MSG_empty_retype_password;
}
if ( $_POST['txtpasswd'] != $_POST['txtrepasswd'] ){
    $strERR .= "<br/>".$MSG_unmatching_passwords;
}
if ( $_POST['txtfirstname'] == "" ){
    $strERR .= "<br/>".$MSG_empty_firstname;
}
if ( $_POST['lstsec_que'] == -1 ){
    $strERR .= "<br/>".$MSG_empty_sec_que;
}
    if (trim($_POST["security_code"]) == "") {
        $strERR .= "<br/>".$MSG_empty_security_code;
    }
    elseif ( trim($_POST["security_code"]) != $_SESSION[SESSION_TITLE.'security_code'] ) {
        $strERR .= "<br/>".$MSG_invalid_security_code;
    }

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

if ( $strERR == "" ){

        $myuser = new User();
        $myuser->connection = $myconnection;
        $myuser->user_name = $_POST['txtusername'];
        //check user exist or not
        $chk = $myuser->exist();
        if ( $chk == true ){
            $strERR = "User already exist";
        }
        else{
              $password = $_POST['txtpasswd'];
              $myuser->userpassword = $_POST['txtpasswd'];

              $myuser->emailid = $_POST['txtusername'];
              $myuser->firstname = $_POST['txtfirstname'];
              $myuser->lastname = $_POST['txtlastname'];
              $myuser->address = $_POST['txtaddress'];

              $mycity = new City();
              $mycity->connection = $myconnection;
              $mycity->city_name = trim($_POST['txtcity']);
              $city_id= $mycity->get_id();
              if($city_id == false){
                  $mycity->state_id= $_POST['lststate'];
                  $mycity->country_id= $_POST['lstcountry'];
                  $city_id= $mycity->update();
              }

              $myuser->city_id = $city_id;

              $myuser->country_id = $_POST['lstcountry'];
              $myuser->usertype_id = USERTYPE_REGISTERED_USER;
              $myuser->userstatus_id = USERSTATUS_TO_BE_ACTIVATED;

              $myuser->image = $_FILES['fleimage']['name'];

              $myuser->sec_que_id = $_POST['lstsec_que'];
              $myuser->sec_ans = $_POST['txtsec_ans'];
              $chk = $myuser->update();
              if ( $chk == true ){
                    if ( trim ( $_FILES['fleimage']['name'] ) != "" && $myuser->id > 0 ) {
                        //rename the uploaded Image file and the thumbnail
                        if ( $myimage->rename_image ($myuser->id, $arrupload["imagefile"], USER_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
                        $strMSG = $MSG_image_uploaded;
                        }
                        else {
                        //Error while renaming the uploaded files
                        $strERR = $MSG_image_err_upload;
                        }
                    }
                    send_email_to_user($_POST["txtusername"],$password,$_POST["txtusername"],$myuser->id);

                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_mail_sent;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();

             }
             else{
                            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_mail_sent;
                            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
                            header( "Location: gfwflash.php");
                            exit();
             }
        }
}

$myuser->error_description = $strERR;
}

?>