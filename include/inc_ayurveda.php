<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$head_beyond_healing = 'Beyond Healing';
$left_beyond_healing = 'LEFT Beyond Healing';
$right_beyond_healing = 'RIGHT Beyond Healing';


$head_treatments_available = 'Treatments Available';
$left_treatments_available = 'LEFT Treatments Available';
$right_treatments_available = 'RIGHT Treatments Available';
?>





<div id="beyond_healing">
    <div id="heading"><?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'head_beyond_healing','ayurveda',$head_beyond_healing); ?></div>
    <div id="left">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'left_beyond_healing','ayurveda',$left_beyond_healing); ?>
    </div>
    <div id="right">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'right_beyond_healing','ayurveda',$right_beyond_healing); ?>
    </div>
</div>

<div id="treatments">
    <div id="heading"><?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'head_treatments_available','ayurveda',$head_treatments_available); ?></div>
    <div id="left">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'left_treatments_available','ayurveda',$left_treatments_available); ?>
    </div>
    <div id="right">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'right_treatments_available','ayurveda',$right_treatments_available); ?>
    </div>
</div>


<div id="contactus_form">
    <div id="title">

    </div>

    <div id="form">
        <?php echo $contactus_form; ?>
    </div>

</div>

