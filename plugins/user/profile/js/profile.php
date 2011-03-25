    //<!--
    function clean_loginname(){
        if(document.getElementById("loginname").value=="<?= $msg_default_username ?>"){
            document.getElementById("loginname").value = "";
        }
    }
    //-->