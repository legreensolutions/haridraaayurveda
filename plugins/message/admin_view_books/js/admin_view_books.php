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

    function validate_view_books(){
        error = "";
        if(document.getElementById("txtre_subject").value==""){
            error = "<?= $MSG_empty_subject ?>\n";
        }
        if(document.getElementById("txtre_content").value==""){
            error += "<?= $MSG_empty_content ?>\n";
        }


        if ( error != "" ){
            alert(error);
            return false;
        }else{
            return true;
        }
    }
    -->