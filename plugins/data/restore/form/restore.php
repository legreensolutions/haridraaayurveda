<script language="JavaScript" type="text/javascript">
<!--
function ValidateFileType(){
var myForm=document.frmUpload;
var blnSuccess = false;
var intLength=myForm.userfile.value.length;

    // Validate File Extensions

    if (intLength > 2) {
        blnSuccess = true;
            if ((myForm.userfile.value.substr(intLength-3,3).toLowerCase() == ".gz" && (intLength > 4))) {
                blnSuccess = true;
            }
            else {
                alert("Sorry, This does not appear to be a valid Database Archive");
                blnSuccess = false;
            }

    }
    else {
        alert("Please select a valid Database Archive to proceed");
        blnSuccess = false;
    }

return blnSuccess;

}

-->
</script>

<table class="tbl_border" align="center" style="text-align: left; "
 border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr class="page_caption">
      <td class="page_caption">&nbsp;&nbsp; </td>
    </tr> 
    <tr class="page_caption">
      <td class="page_caption">&nbsp;&nbsp;<?= $conf_page_caption?> </td>
    </tr>  
    <tr>
      <td  align="center"><?php if(isset($_GET[msg])) { echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_GET[msg];}else{ echo $msg; } ?></td>
    </tr>


    <tr>
		<tr>
      <td><table class="notes" align="center" style="text-align: left; width: 150px;"
 border="0" cellpadding="0" cellspacing="0">
            <tr><td align="center" > &nbsp;</td></tr>
        <tr> <td><?= $conf_browse?></td></tr>
        <tr> <td>
            <form name="frmUpload" enctype="multipart/form-data" action="<?php echo $current_url; ?>"   method="POST" >
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                <input name="userfile" type="file" value="" id="3"> 
                <input type="submit"  name="Submit" value="<?= $conf_restore?>" >
                <input type="hidden"  name="h_restore" value="<?php echo md5("RESTORE_DB"); ?>" >
            </form>
        </td></tr>
        
        <tr> <td>&nbsp;</td></tr>
    </table>  </td>
    </tr>
    <tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
  </table>
  
<br>

<br>