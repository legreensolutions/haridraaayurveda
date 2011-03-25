<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$tmp_news_content = '<p><span><img src="images/haridraa/sub_content.jpg" alt="sample" width="205" height="28" /><br /></span><br /> <b>Haridraa at Tripunithura :: </b><br><br>The Principal of Government Ayurveda College, Tripunithura, C. Ratnakaran, will inaugurate the Haridraa Ayurveda centre on Thursday. The centre plans to start a medicinal plant park, said the partners of the venture.</p><hr /><p><span><span><img src="images/haridraa/sub_content.jpg" alt="sample" width="205" height="28" /></span></span><br /><br /></p><hr /><div class="block"><b>You Can Contact @</b> <br><br>Haridraa Ayurveda <br> Karippilly Road,<br> Alinchuvadu,<br> Padivattom, Kochi,<br> Ernakulam, Cochin,<br> Kerala - 682024  </div>';

 echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'news_content','index',$tmp_news_content);
?>
			