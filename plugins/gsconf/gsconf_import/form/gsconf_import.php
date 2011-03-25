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
                     <br /><?= $CAP_page_caption;?><br /><br />
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
                    <?populate_list_array("lstlanguage", $chk, "id", "language", $defaultvalue=-1,$disable=false)?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" width="100%">&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" width="100%">
                             <input value="<?= $CAP_import ?>" type="submit" name="submit" onClick="return validate_language();" />
                    </td>
                </tr>
                </tbody>
                </table>
            </form>

            <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("lstlanguage").focus();
   //-->
    </script>   