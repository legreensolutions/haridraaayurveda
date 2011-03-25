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
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmget_passwd" id="frmget_passwd">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption" width="100%">
                     <br /><?= $CAP_page_caption?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage_passwd" align="center" width="100%">
                       <? echo $myuser->error_description; echo $passwd_error ;?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%" >
                        <b><?= $CAP_username ?></b>
                    </td>
                    <td valign="top" align="left" width="50%">
                    <input class="passwd_box"  type="text" name="txtusername" id="txtusername" value="" >
                    </td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption" width="50%" ><b><?= $CAP_sec_que ?></b></td>
                    <td valign="top" align="left"  width="50%">
                    <?
                    populate_list_array("lstsec_que", $chk, "id", "question", $defaultvalue=-1,$disable=false)
                    //loadsec_que("lstsec_que", -1, "Select Security Question",$sec_que_id,false,"",'style="width:165px;"');
                    ?>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="passwd_caption"  width="50%"><b><?= $CAP_sec_ans ?></b></td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="text" name="txtsec_ans" id="txtsec_ans" >
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"  width="100%">&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"  width="100%">
                            <input value="<?= $CAP_submit ?>" type="submit" name="submit" onClick="return validate_get_passwd();" />
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