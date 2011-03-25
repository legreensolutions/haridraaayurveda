<form target="_self" method="GET" action="<?php echo $current_url; ?>" name="frmsec_que_search">
<table  align="center" style="text-align: left;" border="0" cellpadding="0" cellspacing="6" >
  <tbody>
    <tr>
      <td colspan="2" align="center" width="100%">&nbsp;</td>
    </tr>
    <tr>
                    <td colspan="4" align="center" class="page_caption">
                     <br /><?= $CAP_page_caption?><br /><br />
                    </td>
    </tr>
     <tr>
      <td width="25%" align="right"><b><?= $CAP_search_language?></b></td>
      <td width="25%" align="left"><?php //loadsec_que("lstsec_que", -1, "Select Question",$_GET[lstsec_que],false,'style="width:210px; height:22;"');
                  //populate_list_array("lstsec_que", $chk, "id", "question", $defaultvalue=-1,$disable=false)?>
            <input type="text" name="txtlanguage" id="txtlanguage" value="<?= $_GET["txtlanguage"] ?>" />
      </td>
    </tr>
     <tr>
      <td width="25%" align="right"><b><?= $CAP_publish?></b></td>
      <td width="25%" align="left">
            <input <?php if(isset($_GET["chkpublish"])){ ?> checked="true" <?php } ?> type="checkbox" name="chkpublish" id="chkpublish" value=<?= CONF_PUBLISH?>/>
     </td>
    </tr>

    <tr>
      <td colspan="2" align="center" width="100%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" width="100%"> <input name="submit" value="<?= $CAP_submit_search?>" type="submit"><input type="hidden" name="h_conf_search" value="<?php echo md5("CONF_SEARCH"); ?>"></td>
    </tr>

  </tbody>
</table>
</form>

<table  width="100%"   align="center" border="0" cellpadding="1px" cellspacing="1px">
     <tr><td colspan="3">&nbsp;</td></tr>
   <?php
    if ( $data_bylimit == false ){?>
     <tr><td colspan="3">&nbsp;</td></tr>
     <tr><td colspan="3" align="center" class="message" ><?= $mesg ?></td></tr>
     <tr><td colspan="3">&nbsp;</td></tr>
    <?
     }
     else{?>
    <tr class="tableheader">
        <td></td>
        <td  align="center"><?= $CAP_language?></td>
        <td  align="center"><?= $CAP_publish?></td>
    </tr>

     <?
     //to number each record in a page
    
     $style = "tbl_row_lite";
     $index = 0;
     $slno = $Mypagination->start_record+1;;

     while ( $count_data_bylimit > $index ){
        $link = "language.php?id=".$data_bylimit[$index]["id"]."";
         if ( $style == "tbl_row_lite" ){
            $style="tbl_row_dark";
        }
        else{
            $style="tbl_row_lite";
        }

        ?>
    <tr onmouseover="this.className='tbl_row_highlight'" onmouseout="this.className='<?php echo $style; ?>'"  class="<?php echo $style; ?>" >
        <td style="width:30px" ><?= $slno++ ?></td>
        <td><a href="<?php echo $link; ?>"><?php echo $data_bylimit[$index]["language"]; ?></a></td>
        <td align="center" style="width:100px"><?php echo $data_bylimit[$index]["publish_status"]; ?></td>
    </tr><?php
         $index++;
    }
    ?>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr><td colspan="3" align="center">
        <!--For pagination. we can create a  diff style  & use-->
        <?$Mypagination->pagination_style1();?>
        </td></tr>
      <?}?>
      </table>