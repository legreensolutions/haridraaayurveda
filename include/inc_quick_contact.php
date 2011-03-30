    <script language="javascript" type="text/javascript">
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
        if(document.getElementById("txtname").value=="" || document.getElementById("txtname").value=="Name" ){
            error = "Name Empty\n";
        }
        if(document.getElementById("txtemailid").value=="" || document.getElementById("txtemailid").value=="Email"){
            error += "Emailid Empty\n";
        }
        if(document.getElementById("txtcontent").value=="" || document.getElementById("txtcontent").value=="Message"){
            error += "Message Empty\n";
        }
        if ( error != "" ){
            alert(error);
            document.getElementById("txtname").focus();
            return false;
        }else{
            return true;
        }
    }



    function clean_name(){
        if(document.getElementById("txtname").value=="Name"){
            document.getElementById("txtname").value = "";
        }
    }

    function clean_email(){
        if(document.getElementById("txtemailid").value=="Email"){
            document.getElementById("txtemailid").value = "";
        }
    }

    function clean_message(){
        if(document.getElementById("txtcontent").value=="Message"){
            document.getElementById("txtcontent").value = "";
        }
    }





    -->
    </script>




        <!-- form start-->
            <form  target="_self" method="post" action="contactus.php" name="frmguestbook">
            <input onclick="clean_name();" onfocus="clean_name();" type="text" name="txtname" id="txtname" value="Name" >
            <input onclick="clean_email();"  onfocus="clean_email();" type="text" name="txtemailid" id="txtemailid" value="Email" >
            <input type="hidden" name="txtsubject" id="txtsubject" value="Quick Contact" >
            <textarea onclick="clean_message();" onfocus="clean_message();"  rows="8" name="txtcontent" id="txtcontent" >Message</textarea>
            <input value="Submit" type="submit" name="submit" onClick="return validate_guestbook();" />
                            <input name="h_id" value="<?php echo $h_id; ?>" type="hidden">
            </form>

            <!-- form end-->

