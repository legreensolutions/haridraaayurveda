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

function validate_image_upload(){
        error = "";
        frm = document.getElementById("frmimage_upload");
        if (Trim(frm.fleimage.value) == "") {
            error += "<?= $MSG_VAL_image ?>\n";
        }
        if (error != ""){
            alert(error);
            return false;
        }else{
        return true;
        }
}
    -->