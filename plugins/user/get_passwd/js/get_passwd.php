    <!--
    function validate_get_passwd(){
        error = "";
        frm = document.getElementById("frmget_passwd");
        if(frm.txtusername.value==""){
            error = "<?= $MSG_empty_username ?>\n";
        }
        if(frm.lstsec_que.value==-1){
            error += "<?= $MSG_empty_sec_que ?>\n";
        }
        if(frm.txtsec_ans.value==""){
            error += "<?= $MSG_empty_sec_ans ?>\n";
        }
        if ( error != "" ){
            alert(error);
            return false;
        }
        else{
            return true;
        }
    }
    -->