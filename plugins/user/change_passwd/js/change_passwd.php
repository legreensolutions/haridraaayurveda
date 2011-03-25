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

    function validate_change_passwd(){
        error = "";
        if(document.getElementById("passwd").value==""){
            error = "<?= $MSG_empty_password ?>\n";
        }
        if(document.getElementById("new_passwd").value==""){
            error += "<?= $MSG_empty_new_password ?>\n";
        }
        if(document.getElementById("retype_passwd").value==""){
            error += "<?= $MSG_empty_retype_password ?>\n";
        }
        if( document.getElementById("new_passwd").value != document.getElementById("retype_passwd").value ){
            error += "<?= $MSG_unmatching_passwords ?>\n";
        }
        if ( error == "" ){
             pattern = /[a-zA-Z0-9_-]{5,}/;
             result = pattern.test(document.getElementById("new_passwd").value);
             if(result == false)
             error = "<?= $MSG_length_password ?>\n" ;
        }
        if ( error != "" ){
            alert(error);
            return false;
        }else{
            return true;
        }
    }
    -->