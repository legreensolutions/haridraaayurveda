<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$tmp_contactus_content = '<p><h1>Contact us :: </h1>You can fill the Gust Book for contact
</p><div class="block"><b>Also You Can Contact @</b> <br><br>Haridraa Ayurveda <br> Karippilly Road,<br> Alinchuvadu,<br> Padivattom, Kochi,<br> Ernakulam, Cochin,<br> Kerala - 682024  </div><br><br><br><br><br><br>';

 echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'contactus_content','contactus',$tmp_contactus_content);
?>
			