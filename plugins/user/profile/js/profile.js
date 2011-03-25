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

function validate_prof(frm){
    var strERR = "";
    if ( Trim(frm.txtfirstname.value) == "" ){
       strERR += "-- First Name cannot be empty\n";
    }
    if ( strERR == "" )
        return true;
    else{
    alert(strERR);
    return false;
    }
}
function delete_image(){
    var ans = confirm("This will delete Image Permanently");
    if ( ans == true )
        return true;
    else
        return false;
}