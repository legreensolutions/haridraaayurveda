<form  name="frmimage_upload" id="frmimage_upload" method="post" action="<?php echo $current_url; ?>" onsubmit="return validate_image_upload();" enctype="multipart/form-data">
<table align="center" border="0" cellpadding="0" cellspacing="4" style="width:550px;" >
<tr>
    <td colspan="2" align="center" class="page_caption">
        <?= $CAP_pagecaption ?>
    </td>
</tr>
<tr>
    <td colspan="2" align="center" class="errormessage">
        <?php echo $strERR;?><br /><br />
    </td>
</tr>
<tr>
    <td style="width:30%" align="right" >
        <b><?= $CAP_upload_image ?> </b>
    </td>
    <td><input type="file" name="fleimage" id="fleimage" size="30" />
    </td>
</tr>
<tr>
    <td colspan="2" align="center">
        <input type="submit" name="submit" value="<?= $CAP_OBJ_upload ?>" onClick="return validate_image_upload();">
    </td>
</tr>


<tr>
    <td colspan="2" align="center">

        				<div align="left" style="padding-left:10px;overflow:auto;width:400px;height:395px;background-color:#F5F5F5;border:1px;border-color:#D6D6D6;border-style:solid;">
						<div align="center" style="padding-top:4px;"><strong><?= $CAPGallery ?></strong></div><br/>
						<?php
								$result =get_filenames(ROOT_PATH.$gallery_path,"jpg","",true);
								$n = sizeof($result);
								for ($i = 0 ; $i < $n ; $i++ ){
						?>
						<IMG width="80" src="<?= $result[$i]?>"/>    <?= $result[$i]?>	<br/>
						<?php  } ?>
						</div>

    </td>
</tr>


</table>
</form>

