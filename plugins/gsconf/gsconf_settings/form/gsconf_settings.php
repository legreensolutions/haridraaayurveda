<!-- form update start-->
    <form target="_self" method="post" action="<?php echo $current_url; ?>" name="frmsettings">

    <table  align="center" style="text-align: left; height: 118px;"
    border="0" cellpadding="0" cellspacing="4">
    <tbody>

        <tr>
            <td align="center" class="errormessage" colspan="2"><?php echo $error_msg ?></td>
        </tr>   


                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br /><?= $conf_page_caption?><br /><br />
                    </td>
                </tr>

     <tr>
      <td class="caption" ><?= $conf_show_debug_window ?></td>
      <td><input <?php if($_SESSION[SESSION_TITLE.'gDEBUG'] == true){ ?> checked="true" <?php }?>  type ="checkbox" name="chkdebug" value="1" size="20" /></td>
    </tr> 
     

      <tr>
      <td class="caption" ><?= $conf_enable_online_editting ?></td>
      <td><input <?php if($_SESSION[SESSION_TITLE.'gEDIT_MODE'] == true){ ?> checked="true" <?php }?> type ="checkbox" name="chkeditor" value="1" size="20" /></td>
    </tr> 
      <tr>
      <td class="caption" ><?= $conf_enable_gallery ?></td>
      <td><input <?php if($_SESSION[SESSION_TITLE.'gENABLE_GALLERY'] == true){ ?> checked="true" <?php }?> type ="checkbox" name="chkvieweditor" value="1" size="20" /></td>
    </tr> 

 
     <tr>
      <td class="caption" ><?= $conf_language ?></td>
      <td><?php loadlanguage("lstlanguage", -1, "Select Language",$_SESSION[SESSION_TITLE.'gLANGUAGE'],false,'style="width:210px; height:22;"'); ?></td>
    </tr>

    <tr>
    
    <td align="center" colspan="2"><input name="update" value="<?= $conf_submit_update ?>" type="submit"> &nbsp;&nbsp;
    <input type="hidden" name="h_check" value="<?php echo md5("CONF_SETTINGS"); ?>">

    
    </td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    <br>
    </form> <!-- form update ends-->