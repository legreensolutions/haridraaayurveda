<form target="_self" method="POST" action="set_language.php" name="frmlang">
<table  align="right" style="text-align: left;"
 border="0" cellpadding="0" cellspacing="6">
  <tbody>
     <tr>
      <td><?php 

 $myuser = new User();
 $myuser->usertype_id = USERTYPE_ADMIN;
 $myuser->connection = $myconnection;
 $chk = $myuser->check_login();


 if ( $chk == false ){
	loadlanguage("lstlanguage",-1, "Select Language",$_SESSION[SESSION_TITLE.'gLANGUAGE'],false,'style="width:180px; height:20;"');
 }else{
	loadlanguage_admin("lstlanguage",-1, "Select Language",$_SESSION[SESSION_TITLE.'gLANGUAGE'],false,'style="width:180px; height:20;"');

 }

 ?></td>
      <td class="caption" ><input name="submit" value="GO" type="submit"><input type="hidden" name="h_check" value="<?php echo md5("CONF_LANG"); ?>"> <input type="hidden" name="h_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>"> </td>
    </tr> 

  </tbody>
</table>
</form>