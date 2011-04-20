<?
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
if ( $_POST['submit'] == $CAP_OBJ_upload ) {
$strERR = "";
    if ( trim ( $_FILES['fleimage']['name'] ) == "" ){
    $strERR .= $MSG_VAL_image;
    }

    if ( trim ( $_FILES['fleimage']['name'] ) != ""  && $strERR == "" ) {
        $myimage = new Image;
        $imgfilename = basename($_FILES["fleimage"]["name"]);
        $imgfilesize = $_FILES["fleimage"]["size"];
        //move the uploaded file to the CAR image directory and create the thumbnail
        $arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576, IMAGE_DIR);

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
        else{
            rename_image ($_FILES["fleimage"]["name"], $arrupload["imagefile"], IMAGE_DIR);
            $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_image_uploaded;
            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "image_upload.php";
            header( "Location: ".$FLASH_file_name);
            exit();
        }
        //the first image uploaded is set as the default
        $int_default = 0;
    }

    }
    ?>

