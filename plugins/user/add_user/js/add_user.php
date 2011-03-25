<!--
function Trim(strInput) {
    while (true) {
        if (strInput.substring(0, 1) != " ")
            break;
        strInput = strInput.substring(1, strInput.length);
    }
    while (true) {
        if (strInput.substring(strInput.length - 1, strInput.length) != " ")
            break;
        strInput = strInput.substring(0, strInput.length - 1);
    }
   return strInput;
}

function validate_admin_update(frm){
    error = "";
        frm = document.getElementById("frmfeedback");
        if(frm.txtusername.value==""){
            error = "<?= $MSG_empty_username ?>\n";
        }
        else{
        pattern = /\w+@\w+\.\w+/;
         //pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
        result = pattern.test(Trim(frm.txtusername.value));
        if( result == false) {
           error = "<?= $MSG_invalid_username?>\n";
        }
        }
    if (frm.h_check_id.value == ""){
    if (Trim(frm.txtpassword.value) == "" && Trim(frm.txtrepassword.value) == "" ) {
        if ( frm.chkpassword.checked != true ) {
        error += "<?= $MSG_empty_password ?>\n";
        }
    }
    else if( Trim(frm.txtpassword.value) != Trim(frm.txtrepassword.value) ){
            error += "<?= $MSG_unmatching_passwords ?>\n";
    }
    else{
             pattern = /[a-zA-Z0-9_-]{5,}/;
             result = pattern.test(Trim(frm.txtrepassword.value));
             if(result == false)
             error += "<?= $MSG_length_password ?>\n" ;
    }
    }
        if(frm.txtfirstname.value==""){
            error += "<?= $MSG_empty_firstname ?>\n";
        }
        if(frm.lstsec_que.value==-1){
            error += "<?= $MSG_empty_sec_que ?>\n";
        }
        else if(frm.txtsec_ans.value==""){
            error += "<?= $MSG_empty_sec_ans ?>\n";
        }


    if ( Trim(frm.lstusertype.value) == -1 ) {
        error += "<?= $MSG_empty_usertype?>\n";
    }
    if ( Trim(frm.lstuserstatus.value) == -1 ) {
        error+= "<?= $MSG_empty_userstatus?>\n";
    }
    if ( error == "" )
        return true;
    else
    alert(error);
        return false;
}
function delete_user(){
    var ans = confirm("This will delete User Permanently");
    if ( ans == true )
        return true;
    else
        return false;
}
function delete_image(){
    var ans = confirm("This will delete Image Permanently");
    if ( ans == true )
        return true;
    else
        return false;
}
 -->