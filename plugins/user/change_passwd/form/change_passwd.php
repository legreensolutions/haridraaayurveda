<?php   /*
    This forms most of the HTML contents of User Login page
    On clicking the Login Button
    the page is called by itself
    If successful user is redirected to the concerned Logged in page
    Else
    Invalid Login information is displayed
    */

    ?>
        <!-- form start-->
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmchange_passwd">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br /><?= $CAP_page_caption?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage_passwd" align="center" >
                       <? echo $myuser->error_description; echo $passwd_error ;?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  >
                        <b><?= $CAP_password ?></b></td>
                    </td>
                    <td valign="top" align="left">
                    <input class="passwd_box"  type="password" name="passwd" id="passwd" value="" >
                    </td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_new_password ?></b></td>
                    <td valign="top" align="left">
                    <input class="passwd_box"  type="password" name="new_passwd" id="new_passwd" >
                    </td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" ><b><?= $CAP_retype_password ?></b></td>
                    <td valign="top" align="left">
                    <input class="passwd_box"  type="password" name="retype_passwd" id="retype_passwd" ></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                            <input value="<?= $CAP_change ?>" type="submit" name="submit" onClick="return validate_change_passwd();" />
                            <input name="h_id" value="<?php echo $h_id; ?>" type="hidden">
                    </td>
                </tr>
                </tbody>
                </table>
            </form>

            <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("passwd").focus();
   //-->
    </script>   