<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$tmp_facilities_content = '<p>			<p>The concept of <i><a href="#" title="Panchakarma">Panchakarma</a></i> (Devanāgarī: पंचकर्म‌) is believed to eliminate toxic elements from the body. Eight disciplines of Ayurveda treatment, called Ashtanga (Devanāgarī: अष्टांग), are given below:<ul><li><a href="#" title="Surgery">Surgery</a> (<i>Shalya-chikitsa</i>).</li><li>Treatment of diseases above the <a href="#" title="Clavicle">clavicle</a> (<i>Salakyam</i>).</li><li>Internal <a href="#" title="Medicine">medicine</a> (<i>Kaaya-chikitsa</i>).</li><li><a href="#" title="Demonic possession">Demonic possession</a> (<i><a href="/wiki/Bhuta" title="Bhuta" class="mw-redirect">Bhuta</a> <a href="#" title="VIDYA">vidya</a></i>): Ayurveda believes in demonic intervention and—as a form of traditional medicine—identifies a number of ways to counter the supposed effect of these interferences. <i>Bhuta vidya</i> has been called psychiatry.</li><li><a href="#" title="Paediatrics" class="mw-redirect">Paediatrics</a> (<i>Kaumarabhrtyam</i>).</li><li><a href="#" title="Toxicology">Toxicology</a> (<i>Agadatantram</i>).</li><li>Prevention and building <a href="#" title="Immunity">immunity</a> (<i><a href="#" title="Rasayana">rasayanam</a></i>).</li><li><a href="#" title="Aphrodisiacs" class="mw-redirect">Aphrodisiacs</a> (<i>Vajikaranam</i>).</li></p>';

 echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'facilities_content','facilities',$tmp_facilities_content);
?>

