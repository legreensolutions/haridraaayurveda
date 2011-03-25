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

    function validate_sec_que(){
        error = "";
        frm = document.getElementById("frmsecurityquestion");
        if(Trim(frm.txtquestion.value) == ""){
           error += "<?= $MSG_empty_sec_que ?>\n";
        }
        if ( error != "" ){
            alert(error);
            return false;
        }
        else{
            return true;
        }
    }
    function confirm_delete(){
    var ans = confirm("This will delete Security question Permanently");
    if ( ans == true )
        return true;
    else
        return false;
    }
    -->