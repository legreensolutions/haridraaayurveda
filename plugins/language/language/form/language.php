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
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmlanguage" id="frmlanguage">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br /><?if ( $mylanguage->id != "" && $mylanguage->id != gINVALID ){echo $CAP_page_caption_edit;}
                             else{echo $CAP_page_caption_add;}?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage_passwd" align="center" >
                       <? echo $mylanguage->error_description; ?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right">
                        <b><?= $CAP_language ?></b></td>
                    </td>
                    <td valign="top" align="left">
                    <input type="text" name="txtlanguage" id="txtlanguage" value="<?= $mylanguage->language?>">
                    </td>
                </tr>
                <?if ( $mylanguage->id != "" && $mylanguage->id != gINVALID ){?>
                <tr>
                    <td valign="bottom" align="right">
                        <b><?= $CAP_publish ?></b></td>
                    </td>
                    <td valign="top" align="left">
                    <input type="checkbox" name="chkpublish" id="chkpublish" value="<?= $mylanguage->publish?>" <?if($mylanguage->publish==CONF_PUBLISH){?>"checked"<?}?> />
                    </td>
                </tr>
                <?}?>
                <tr>
                    <td colspan="2" align="center" width="100%">&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" width="100%">
                            <?if ( $mylanguage->id != "" && $mylanguage->id != gINVALID ){?>
                             <input value="<?= $CAP_update ?>" type="submit" name="update" onClick="return validate_language();" />
                             <input value="<?= $CAP_delete ?>" type="submit" name="delete" onClick="return confirm_delete();" />
                             <?}else{?>
                            <input value="<?= $CAP_insert ?>" type="submit" name="insert" onClick="return validate_language();" />
                            <?}?>

                            <input name="h_id" value="<?php echo $mylanguage->id; ?>" type="hidden">
                    </td>
                </tr>
                </tbody>
                </table>
            </form>

            <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("txtlanguage").focus();
   //-->
    </script>   