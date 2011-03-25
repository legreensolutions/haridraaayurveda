<?php session_start();
echo '<img  alt="." src="gfwcaptcha.php?width=120&height=40&characters=5&'.date("h:i:s").'" />&nbsp;&nbsp; <input type="image" title="Try another?"  alt="Reload"  src="images/gfw/reload.gif"  style="cursor:pointer;" onclick="return captcha_reaload();" />';
?>