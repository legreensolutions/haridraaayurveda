<?php if ($configurationtype_id != CONF_TYPE_DYNAMIC_TEXT && $configurationtype_id != CONF_TYPE_OBJECT_CAPTIONS  && $configurationtype_id != CONF_TYPE_SYSTEMCONF  ){ ?>
<script language="javascript" type="text/javascript">
	// Notice: The simple theme does not use all options some of them are limited to the advanced theme
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect,forecolor,backcolor",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
	theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		content_css : "example_advanced.css"
});
</script>
<? 

} ?>
<!-- form update start-->
	<form target="_self" method="post" action="<?php echo $current_url; ?>" name="frmconf">

	<table  align="center" style="text-align: left; width: 100%; height: 118px;"
	border="0" cellpadding="0" cellspacing="4">
	<tbody>

		<tr>
			<td align="center" class="errormessage" colspan="2"><?php echo $error_msg ?></td>
		</tr>	
		<tr>
		<td align="center" colspan="2" class="info">
			<table>
				<tr><td><textarea rows="25" cols="70" name="txt_value"><?php echo $strvalue; ?></textarea></td>

			<?php  if ($_SESSION[SESSION_TITLE.'gENABLE_GALLERY'] == true && $configurationtype_id != CONF_TYPE_DYNAMIC_TEXT && $configurationtype_id != CONF_TYPE_OBJECT_CAPTIONS  && $configurationtype_id != CONF_TYPE_SYSTEMCONF  ){  ?>

				<td>
						<div align="center" style="overflow:auto;width:300px;height:395px;background-color:#F5F5F5;border:1px;border-color:#D6D6D6;border-style:solid;">
						<div align="center" style="padding:4px;"><strong><?= $CAPGallery ?></strong></div><br/>
						<?php 
								$result =get_filenames(ROOT_PATH.$gallery_path,"jpeg","",true);
								$n = sizeof($result);
								for ($i = 0 ; $i < $n ; $i++ ){
						?>
						<IMG width="80" src="<?= $result[$i]?>"/>  <br/>  <?= $result[$i]?>		<br/>
						<?php  } ?>
						</div>
				</td>
			<?php }?>
				</tr>
			</table>
		</td>
		</tr>
		
	<tr>
	
	<td align="center" colspan="2"><strong>[</strong> <input <?php if ($intpublish == CONF_PUBLISH ){ ?> checked="true" <?php } ?> type="checkbox" name="chk_publish" value="<?= CONF_PUBLISH ?>" > <?= $conf_publish ?> <strong>]</strong>&nbsp;&nbsp;&nbsp;<input name="update" value="<?= $conf_submit_update ?>" type="submit"> &nbsp;&nbsp;
<input name="delete" onClick="return delete_conf();" value="<?= $conf_submit_delete ?>" type="submit"> 
	<input type="hidden" name="h_confinfo" value="<?php echo md5("CONF_INFO"); ?>">
	<input type="hidden" name="h_confid" value="<?= $int_confid ?>" >
	
	</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	</tbody>
	</table>
	<br>
	</form> <!-- form update ends-->