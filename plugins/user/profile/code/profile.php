<?php
 $myuser = new User();
 $myuser->connection = $myconnection;
 $myuser->usertype_id = $_SESSION[SESSION_TITLE.'usertypeid'];
 $data_user = $myuser->check_login();
    if ( $data_user != true ) {
        $_SESSION[SESSION_TITLE.'flash'] = $g_msg_unauthorized_request;
        $_SESSION[SESSION_TITLE.'flash_redirect_page'] = $g_msg_unauthorized_request_redirect_page;
        header( "Location: gfwflash.php");
        exit();
    }
 $mycity = new City();
 $mycity->connection = $myconnection;

 $mycountry = new country($myconnection);
 $mycountry->connection = $myconnection;
 $data_country = $mycountry->get_list_array();

 $myimage = new Image;

if ( $_POST['submit'] == $CAP_OBJ_update ) {
$strERR = "";
    if ( trim($_POST['txtfirstname']) == "" ){
    $strERR .= $MSG_VAL_first_name;
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
        $myuser->id = $_SESSION[SESSION_TITLE.'userid'];
        $myuser->connection = $myconnection;
        $data_user = $myuser->get_detail();
        $myuser->firstname = $_POST['txtfirstname'];
        $myuser->lastname = $_POST['txtlastname'];
        $myuser->address = $_POST['txtaddress'];
                        
        $mycity->city_name = trim($_POST['txtcity']);
        $city_id= $mycity->get_id();
        if($city_id == false){
            $mycity->state_id= $_POST['lststate'];
            $mycity->country_id= $_POST['lstcountry'];
            $city_id= $mycity->update();
        }

        $myuser->city_id = $city_id;
        $myuser->state_id = $_POST['lststate'];
        $myuser->country_id = $_POST['lstcountry'];
        $this->lastlogin =  date('Y-m-d');
        $myuser->image = $_FILES['fleimage']['name'];
        $data_user = $myuser->update();
        if ( $data_user == true ){
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
            $_SESSION[SESSION_TITLE.'flash'] = $MSG_profile_updated;
            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = $RD_file_name_profile_updated;
            header( "Location: ".$FLASH_file_name);
            exit();
        }
    }
 }elseif ( $_POST['delete'] == $CAP_OBJ_delete_image ){
    $myuser = new User();
    $myuser->connection = $myconnection;
           $myuser->id = $_SESSION[SESSION_TITLE.'userid'];
        $data_user = $myuser->get_detail();
        if ( $myimage->delete_image($myuser->id, $myuser->image, USER_DIR) ) {
            $strMSG = $MSG_image_deleted;
            $image = "";
            $myuser->delete_image_fromDB();
        }else {
            //Error while renaming the uploaded files
            $strERR = $MSG_image_err_delete;
        }
 }

$myuser->id = $_SESSION[SESSION_TITLE.'userid'];
$data_user = $myuser->get_detail();
$image = $myuser->image;
if ( $myuser->image != "" ) {
    $ext = explode('.', $myuser->image);
    $ext = $ext[count($ext)-1];
    $user_image = USER_DIR . $myuser->id . '.' . $ext;
}else{
    $user_image = USER_DIR . 'user.gif';
}
if ( $myuser->city_id != "" ){
    $mycity->id = $myuser->city_id;
    $mycity->get_detail();
    $city_name = $mycity->city_name;
}
    

 ?>