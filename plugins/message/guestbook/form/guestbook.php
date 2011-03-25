        <!-- form start-->
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmguestbook">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br /><?= $CAP_page_caption?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage_passwd" align="center" >
                       <? echo $myuser->error_description; echo $guestbook_error ;?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  ><b><?= $CAP_name ?></b></td>
                    <td valign="top" align="left">
                    <input style="width:200px;" type="text" name="txtname" id="txtname" value="" >
                    </td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_address ?></b></td>
                    <td valign="top" align="left">
                    <input style="width:200px;"  type="text" name="txtaddress" id="txtaddress" >
                    </td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_phone ?></b></td>
                    <td valign="top" align="left">
                    <input style="width:200px;"  type="text" name="txtphone" id="txtphone" ></td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_emailid ?></b></td>
                    <td valign="top" align="left">
                    <input style="width:200px;"  type="text" name="txtemailid" id="txtemailid" ></td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_subject ?></b></td>
                    <td valign="top" align="left">
                    <input style="width:200px;"  type="text" name="txtsubject" id="txtsubject" ></td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_content ?></b></td>
                    <td valign="top" align="left">
                    <textarea style="width:318px;" rows="6" name="txtcontent" id="txtcontent" ></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                            <input value="<?= $CAP_submit ?>" type="submit" name="submit" onClick="return validate_guestbook();" />
                            <input name="h_id" value="<?php echo $h_id; ?>" type="hidden">
                    </td>
                </tr>
                </tbody>
                </table>
            </form>

            <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("txtname").focus();
   //-->
    </script>   