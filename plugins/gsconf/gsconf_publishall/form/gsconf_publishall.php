        <!-- form start-->
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmpublishall" id="frmpublishall">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br /><?= $CAP_page_caption?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage_passwd" align="center" >
                       <? echo $Mylanguage->error_description; ?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right">
                        <b><?= $CAP_language ?></b></td>
                    </td>
                    <td valign="top" align="left">
                    <? populate_list_array("lstlanguage", $chk, "id", "language", $defaultvalue=-1,$disable=false)?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input value="<?= $CAP_publish ?>" type="submit" name="submit" onClick="return validate_publish();" />
                        <input value="<?= $CAP_unpublish ?>" type="submit" name="submit" onClick="return validate_publish();" />
                    </td>
                </tr>
                </tr>
                </tbody>
                </table>
            </form>

            <!-- form end-->