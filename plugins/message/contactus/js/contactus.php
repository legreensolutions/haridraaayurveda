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

    function validate_guestbook(){
        error = "";
        if(document.getElementById("txtname").value==""){
            error = "<?= $MSG_empty_name ?>\n";
        }
        if(document.getElementById("txtemailid").value==""){
            error += "<?= $MSG_empty_emailid ?>\n";
        }
        if(document.getElementById("txtsubject").value==""){
            error += "<?= $MSG_empty_subject ?>\n";
        }
        if(document.getElementById("txtcontent").value==""){
            error += "<?= $MSG_empty_content ?>\n";
        }
        if ( error != "" ){
            alert(error);
            document.getElementById("txtname").focus();
            return false;
        }else{
            return true;
        }
    }
    -->