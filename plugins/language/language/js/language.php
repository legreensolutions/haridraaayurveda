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

    function validate_language(){
        error = "";
        frm = document.getElementById("frmlanguage");
        if(Trim(frm.txtlanguage.value) == ""){
           error += "<?= $MSG_empty_language ?>\n";
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
    var ans = confirm("This will delete Language Permanently");
    if ( ans == true )
        return true;
    else
        return false;
    }
    -->