<?php   /*
    This forms most of the HTML contents of User Sign up page
    */
    ?>
        <!-- form start-->

    <?//copy?>
     <br />
         <form  name="frmsignup" id="frmsignup" method="post" action="<?php echo $current_url; ?>" enctype="multipart/form-data">
            <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center" class="page_caption"  width="100%">
                     <br /><?= $CAP_page_caption?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage_passwd" align="center"  width="100%">
                       <? echo $myuser->error_description; ?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="right" class="passwd_caption" width="50%">
                        <b><?= $CAP_username ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="text" name="txtusername" id="txtusername" value="<?if(isset($_POST['txtusername'])){echo $_POST['txtusername'];}?>" ></td>
                </tr>
                 <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%" >
                        <b><?= $CAP_password ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="password" name="txtpasswd" id="txtpasswd" value="<?if(isset($_POST['txtpasswd'])){echo $_POST['txtpasswd'];}?>" ></td>
                </tr>

                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%" >
                        <b><?= $CAP_repassword ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="password" name="txtrepasswd" id="txtrepasswd" value="<?if(isset($_POST['txtrepasswd'])){echo $_POST['txtrepasswd'];}?>" ></td>
                </tr>

                <tr>
                    <td  width="50%" align="right" >&nbsp;</td>
                    <td  width="50%">&nbsp;</td>
                </tr>

                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%">
                        <b><?= $CAP_firstname ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="text" name="txtfirstname" id="txtfirstname" value="<?if(isset($_POST['txtfirstname'])){echo $_POST['txtfirstname'];}?>" ></td>
                </tr>

               <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%" >
                        <b><?= $CAP_lastname ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="text" name="txtlastname" id="txtlastname" value="<?if(isset($_POST['txtlastname'])){echo $_POST['txtlastname'];}?>" >
                    </td>
                </tr>

                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%" >
                        <b><?= $CAP_address ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="text" name="txtaddress" id="txtaddress" value="<?if(isset($_POST['txtaddress'])){echo $_POST['txtaddress'];}?>" >
                    </td>
                </tr>

                 <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%" >
                        <b><?= $CAP_city ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <input class="passwd_box"  type="text" name="txtcity" id="txtcity" value="<?if(isset($_POST['txtcity'])){echo $_POST['txtcity'];}?>" >
                    </td>
                </tr>

                <tr>
                    <td valign="bottom" align="right" class="passwd_caption"  width="50%" >
                        <b><?= $CAP_country ?></b>
                    </td>
                    <td valign="top" align="left"  width="50%">
                    <?if(isset($_POST['lstcountry'])){ $value = $_POST['lstcountry']; } else{ $value = -1;}
                     populate_list_array("lstcountry", $chk_con, "id", "country", $defaultvalue=$value,$disable=false)
                  ?>
                  </td>
                </tr>
                <tr>
                    <td  valign="bottom" align="right" class="passwd_caption"  width="50%">
                        <b><?= $CAP_image ?></b>
                    </td>
                    <td  width="50%"><input type="file" name="fleimage" id="fleimage" size="30" />
                    </td>
                </tr>
                <tr>
                    <td  width="50%" align="right">
                        <b><?= $CAP_sec_que ?></b>
                    </td>   
                    <td  width="50%">
                         <? if(isset($_POST['lstsec_que'])){ $value = $_POST['lstsec_que']; } else{ $value = -1;}
                         populate_list_array("lstsec_que", $chk_que, "id", "question", $defaultvalue=$value,$disable=false)?>
                    </td>
                </tr>
                <tr>
                    <td  width="50%" align="right">
                        <b><?= $CAP_sec_ans ?></b>
                    </td>   
                    <td  width="50%">
                        <input class="passwd_box"  type="text" name="txtsec_ans" id="txtsec_ans" value="<?if(isset($_POST['txtsec_ans'])){echo $_POST['txtsec_ans'];}?>" />
                    </td>
                </tr>
    <tr>
        <td  width="50%" align="right"><b><?= $MSG_enter_security_code?></b></td>
        <td  width="50%">
             <input id="security_code" name="security_code" type="text" />
        </td>
     </tr>
     <tr>
        <td>&nbsp;&nbsp;</td>
        <td>
            <small><?= $MSG_text_in_image?></small>
        </td>
     </tr>
     <tr>
        <td align="left"></td>
        <td><div id="div_captcha" style="width:200px;height:40px;"><img alt="." src="gfwcaptcha.php?width=120&height=40&characters=5" />&nbsp;&nbsp; <input type="image" alt="Reload" title="Try another?" src="images/gfw/reload.gif"  style="cursor:pointer;" onclick="return captcha_reaload();" /></div>
        </td>
     </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"  width="100%">
                      <input type="submit" name="submit" value="<?= $CAP_submit?>" onClick="return validate_signup();" />
                    </td>
                </tr>

            </table>
            </form>
                     <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("txtusername").focus();
   //-->
    </script>