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
            <form  target="_self" method="post" action="<?= $current_url?>" name="frmlogin">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                     <br /><?= $conf_page_caption?><br /><br />
                    </td>
                </tr>
                    <tr>
                        
                        <td class="errormessage_login" align="center" >
                       <? echo $myuser->err_desc; echo $login_error ;?>
                        </td>
                        
                    </tr>   
                    <tr>
                        <td valign="bottom" align="left" class="login_caption"  >
                            <table width="100%">
                            <tbody>
                            <tr>
                            <td  class="login_caption" ><?= $conf_username ?></td>
                            
                            </tr>
                            </tbody>
                            </table>
                        </td>
                    </tr>           
                    <tr>
                        <td valign="top" align="left"><INPUT onclick="clean_loginname();"   type="text" name="loginname" id="loginname"  title="<?= $msg_default_username ?>"  value="<?= $msg_default_username ?>" ></td>
                        
                    </tr>                       
                    <tr>
                        
                        <td align="left" class="login_caption" ><?= $conf_password ?></td>
                        
                    </tr>   
                    <tr>
                        <td valign="top" align="left"><INPUT   type="password" name="passwd" id="passwd" ></td>
                        
                    </tr>
      
            
                    <tr>
                        
                        <td align="left"> 
                            <input  value="<?= $conf_sign_in ?>" type="submit" name="submit" >
                            <input name="h_id" value="<?php echo $h_id; ?>" type="hidden"><input name="h_login" value="pass" type="hidden">&nbsp;&nbsp;<a class="login_forgot_link" href="<?= $conf_forgot_password_link ?>"><?= $conf_forgot_password ?></a> <br/><br/>
                        </td>
                        
                    </tr>       
                            
                </tbody>
                </table>
            </form>

            <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("loginname").focus();
            document.getElementById("loginname").select();
   //-->
    </script>   