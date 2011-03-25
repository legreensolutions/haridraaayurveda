<form target="_self" method="GET" action="<?php echo $current_url; ?>" name="frmsearch">
<table  align="center" style="text-align: left;"
 border="0" cellpadding="0" cellspacing="6">
  <tbody>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

     <tr>
      <td class="caption" ><?= $conf_language ?></td>
      <td><?php loadlanguage_admin("lstlanguage", -1, "Select Language",$_GET[lstlanguage],false,'style="width:210px; height:22;"'); ?></td>
    </tr> 
     <tr>
      <td class="caption" ><?= $conf_configurationtype ?></td>
      <td><?php loadconfigurationtypes("lstconfigurationtype", -1, "Select Configuration Type",$_GET[lstconfigurationtype],false,'style="width:210px; height:22;"'); ?></td>
    </tr> 

     <tr>
      <td class="caption" ><?= $conf_pagename ?></td>
      <td><input  style="width: 210px; height:22;"  maxlength="100" size="35"
 name="txtpagename" value="<?php echo $_GET[txtpagename]; ?>"></td>
    </tr> 
     

    <tr>
      <td class="caption" ><?=  $conf_confname; ?></td>
      <td><input  style="width: 210px; height:22;"  maxlength="100" size="35"
 name="txtconfigurationname" value="<?php echo $_GET[txtconfigurationname]; ?>"></td>
    </tr>    
    
     <tr>
      <td class="caption" ><?=  $conf_value; ?></td>
      <td><input  style="width: 210px; height:22;"  maxlength="100" size="35"
 name="txtvalue" value="<?php echo $_GET[txtvalue]; ?>"></td>
    </tr>    
     <tr>
      <td class="caption" ><?=  $conf_description; ?></td>
      <td><input  style="width: 210px; height:22;"  maxlength="100" size="35"
 name="txtdescription" value="<?php echo $_GET[txtdescription]; ?>"></td>
    </tr>    
    
     <tr>
      <td class="caption" ><?=  $conf_publish; ?></td>
      <td><input type="checkbox"  name="chk_publish" value="1" <?php if(isset($_GET[chk_publish]) && $_GET[chk_publish] == 1) { ?> checked="true" <?php } ?> ></td>
    </tr>  
 
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;</td>
      <td><input name="submit" value="<?= $conf_submit_search ?>" type="submit"><input type="hidden" name="h_conf_search" value="<?php echo md5("CONF_SEARCH"); ?>"></td>
    </tr>

  </tbody>
</table>
</form>
<table  width="100%"   align="center" border="0" cellpadding="1px" cellspacing="1px">
     <tr><td colspan="6">&nbsp;</td></tr>
   <?php
    if ( $data_bylimit == false ){?>
     <tr><td colspan="6">&nbsp;</td></tr>
     <tr><td colspan="6" align="center" class="message" ><?= $mesg ?></td></tr>
     <tr><td colspan="6">&nbsp;</td></tr>
    <?
     }
     else{?>
    <tr class="tableheader">
		<td></td>
		<td  align="center">Language  </td>  
		<td  align="center">Conf Type</td>
		<td  align="center">Conf Name</td>
		<td  align="center">Page name</td>
		<td  align="center">Value</td>
		<td  align="center">Description</td>
		<td  align="center">Publish</td>

    </tr>

     <?
     //to number each record in a page
    
     $style = "tbl_row_lite";
	 $index = 0;
	 $slno = $Mypagination->start_record+1;

     while ( $count_data_bylimit > $index ){
        $link = "gsconf_update.php?id=".$data_bylimit[$index]["id"]."";
         if ( $style == "tbl_row_lite" ){
            $style="tbl_row_dark";
        }
        else{
            $style="tbl_row_lite";
        }

        ?>
    <tr onmouseover="this.className='tbl_row_highlight'" onmouseout="this.className='<?php echo $style; ?>'"  class="<?php echo $style; ?>" >
        <td><?= $slno++ ?></td>
        <td><?php echo $data_bylimit[$index]["language_name"]; ?></td>
        <td><?php echo $data_bylimit[$index]["configurationtype_name"]; ?></td>
        <td><a href="<?php echo $link; ?>"><?php echo $data_bylimit[$index]["configuration_name"]; ?></a></td>
        <td><?php echo $data_bylimit[$index]["page_name"]; ?></td>
        <td><?php echo  substr(htmlentities( stripslashes( nl2br($data_bylimit[$index]["value"]))) ,0,50) ; ?></td>
        <td><?php echo $data_bylimit[$index]["description"]; ?></td>
        <td align="center"><?php echo $data_bylimit[$index]["publish_status"]; ?></td>
    </tr><?php
         $index++;
    }
    ?>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6" align="center">
        <!--For pagination. we can create a  diff style  & use-->
        <?$Mypagination->pagination_style1();?>
        </td></tr>
      <?}?>
      </table>