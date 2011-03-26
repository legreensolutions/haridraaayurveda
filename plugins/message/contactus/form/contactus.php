        <!-- form start-->
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmguestbook">
                <table cellspacing="5" border="0" cellpadding="0" align="center" class="form_tbl">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" class="error_description" >
                       <? echo $myuser->error_description; echo $guestbook_error ;?>
                    </td>
                </tr>
                <tr>
                    <td class="form_caption" ><?= $CAP_name ?></td>
                    <td><input type="text" name="txtname" id="txtname" value="" ></td>
                </tr>
                <tr>
                    <td class="form_caption" ><?= $CAP_address ?></td>
                    <td><input type="text" name="txtaddress" id="txtaddress" ></td>
                </tr>
                <tr>
                    <td class="form_caption" ><?= $CAP_phone ?></td>
                    <td><input type="text" name="txtphone" id="txtphone" ></td>
                </tr>
                <tr>
                    <td class="form_caption" ><?= $CAP_emailid ?></td>
                    <td><input type="text" name="txtemailid" id="txtemailid" ></td>
                </tr>
                <tr>
                    <td class="form_caption" ><?= $CAP_subject ?></td>
                    <td><input type="text" name="txtsubject" id="txtsubject" ></td>
                </tr>
                <tr>

                    <td colspan="2" valign="top" align="left"  class="form_caption" >
                    <?= $CAP_content ?><br>
                    <textarea rows="8" name="txtcontent" id="txtcontent" ></textarea></td>
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

