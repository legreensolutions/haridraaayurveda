
        <!-- form start-->
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmview_books">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br /><?= $CAP_page_caption?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage_passwd" align="center" >
                       <? echo $myuser->error_description; echo $viebook_error ;?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  >
                        <b><?= $CAP_emailid ?></b></td>
                    <td valign="top" align="left">
                    <input readonly="true" style="width:200px;"  type="text" name="txtemailid" id="txtemailid" value="<?= $mymessage->emailid?>" >
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  >
                        <b><?= $CAP_subject ?></b></td>
                    <td valign="top" align="left">
                    <input readonly="true" style="width:200px;"  type="text" name="txtsubject" id="txtsubject" value="<?= $mymessage->subject?>" >
                    </td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_content ?></b></td>
                    <td valign="top" align="left">
                    <textarea readonly="true" style="width:318px;" rows="6" name="txtcontent" id="txtcontent" ><?= $mymessage->content?></textarea>
                    </td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><hr /></td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><?= $CAP_want_reply ?></td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_re_subject ?></b></td>
                    <td valign="top" align="left">
                    <input style="width:200px;"  type="text" name="txtre_subject" id="txtre_subject" value="Re: <?= $mymessage->subject?>"></td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_re_content ?></b></td>
                    <td valign="top" align="left">
                    <textarea style="width:318px;" rows="6" name="txtre_content" id="txtre_content" ></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                            <input value="<?= $CAP_reply ?>" type="submit" name="submit" onClick="return validate_view_books();" />
                            <input name="h_id" value="<?= $mymessage->id?>" type="hidden">
                            <input name="h_emailid" value="<?= $mymessage->emailid?>" type="hidden">
                    </td>
                </tr>
                </tbody>
                </table>
            </form>

            <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("txtre_subject").focus();
   //-->
    </script>   