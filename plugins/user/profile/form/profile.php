          <br /> <form  name="frmfeedback" method="post" action="<?php echo $current_url; ?>" onsubmit="return validate_prof(frmfeedback);" enctype="multipart/form-data">
      <!--<html> --> 
            <table align="center" border="0" cellpadding="0" cellspacing="4" style="width:550px;" >
                <tr>
                    <td colspan="2" align="center" class="page_caption">
                    <?= $CAP_pagecaption ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center" class="errormessage">
                    <?php echo $myuser->err_desc;echo $strERR;?><br /><br />
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right">
                        <img  src="<?=$user_image?>" height="80px" align="right">
                    </td>
                    <td>
<!-- content start -->


                        <TABLE style="width:450px;" align="center">
                        
                            <tr>
                                <td style="width:30%" align="right">
                                    <b><?= $CAP_username ?> </b>
                                </td>   
                                <td >
                                    <input readonly="true" style="width:200px;" align = "center" type="text" name="txtusername" value="<?if(isset($_POST['txtusername'])){echo $_POST['txtusername'];}else{echo $myuser->user_name;}?>"  >
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td style="width:30%" align="right" >&nbsp;</td>    
                                <td >&nbsp;</td>
                            </tr>
                            
                            <tr>
                                <td style="width:30%" align="right">
                                    <b><?= $CAP_firstname ?> </b>
                                </td>   
                                <td >
                                    <input style="width:200px;" align = "center" type="text" name="txtfirstname" value="<?if(isset($_POST['txtfirstname'])){echo $_POST['txtfirstname'];}else{echo $myuser->firstname;}?>"  >
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td style="width:30%" align="right">
                                    <b><?= $CAP_lastname ?> </b>
                                </td>   
                                <td >
                                    <input style="width:200px;" align = "center" type="text" name="txtlastname" value="<?if(isset($_POST['txtlastname'])){echo $_POST['txtlastname'];}else{echo $myuser->lastname;}?>"  >
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td style="width:30%" align="right">
                                    <b><?= $CAP_address ?> </b>
                                </td>   
                                <td >
                                    <input style="width:200px;" align = "center" type="text" name="txtaddress" value="<?if(isset($_POST['txtaddress'])){echo $_POST['txtaddress'];}else{echo $myuser->address;}?>"  >
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td style="width:30%" align="right">
                                    <b><?= $CAP_city ?> </b>
                                </td>   
                                <td >
                                    <input style="width:200px;" align = "center" type="text" name="txtcity" value="<?if(isset($_POST['txtcity'])){echo $_POST['txtcity'];}else{echo $city_name;}?>"  >
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td style="width:30%" align="right">
                                    <b><?= $CAP_country ?></b>
                                </td>   
                                <td >
                                    <?php
                                    if(isset($_POST['lstcountry'])){$countryid = $_POST['lstcountry'];}else{$countryid = $myuser->country_id;}
                                    populate_list_array("lstcountry", $data_country, "id", "country", $defaultvalue=$countryid,$disable=false);
                                    ?>
                                </td>
                            </tr>
                                <?if ( $image == "" ) {?>
                                <tr>
                                <td style="width:30%" align="right" >
                                    <b><?= $CAP_upload_image ?> </b>
                                </td>
                                <td colspan="2"><input type="file" name="fleimage" id="fleimage" size="30" /></td>
                                </tr>
                                <?}?>
                            <tr>
                                <td style="width:30%" align="right" >&nbsp;</td>    
                                <td >&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width:30%" align="right" >&nbsp;</td>    
                                <td align="center" ><A href="<?= $LIN_file_name_change_password ?>" name="change password"><?= $CAP_LIN_change_password ?></A></td>
                            </tr>
                            
                            <tr>
                                <td style="width:30%" align="right" >&nbsp;</td>    
                                <td >&nbsp;</td>
                            </tr>
                            
                            
                            
                            <tr>
                                <td colspan="2" align="center"><input type="submit" name="submit" value="<?= $CAP_OBJ_update ?>" onClick="return validate_prof(frmfeedback);">
                                <input type="hidden" name="h_check" value="<?php echo md5("profile_check"); ?>">                    
                                <?if ( $image != "" ) {?>
                                <input type="submit" name="delete" value="<?= $CAP_OBJ_delete_image ?>" onClick="return delete_image();"><input type="hidden" name="h_image" value="<?=$image?>">
                                <?}?>
                                </td>
                            </tr>
                        
                        </TABLE>

<!-- content end -->
                    </td>

                </tr>





                <tr>
                    <td colspan="2" align="center"><br />
                    
                    </td>
                </tr>
            </table>
            </form>