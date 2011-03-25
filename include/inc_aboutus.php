<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$tmp_aboutus_content = '<p><h1>About Haridraa Ayurveda :: </h1><br><br>The Principal of Government Ayurveda College, Tripunithura, C. Ratnakaran, will inaugurate the Haridraa Ayurveda centre on Thursday. The centre plans to start a medicinal plant park, said the partners of the venture.</p>';

 echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'aboutus_content','aboutus',$tmp_aboutus_content);
?>
			