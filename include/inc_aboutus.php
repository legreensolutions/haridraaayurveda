<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$head_beyond_healing = 'Beyond Healing';
$left_beyond_healing = 'Haridraa Ayurveda is relentless endeavor towards helping each of its patients attain a disease free life that will be physically, emotionally and spiritually satisfying. This is achieved by providing a holistic health care service comprising the combined effectiveness of Ayurveda with several traditional techniques including Yoga, Pranayama, Meditation etc

We, at Haridraa Ayurveda, strongly believe that while Ayurveda has a long tradition and history, only rational application and sincere administration will enable the successful treatment and cure of almost all the major health problems
facing modern world. Having understood this reality, Haridraa Ayurveda provides a comprehensive facility for earnest Ayurvedic health care.
';
$right_beyond_healing = 'Ayurveda is a truly effective and complete medical system capable of providing answers to any and all the medical crisis challenging modern man in his ultra modern world. KERALA, fortunately has been able to retain a tradition of Ayurveda that has not been completely diluted by the intrusions of contemporary culture and medicine and there is still a large population here that relies on Ayurveda for most of their medical needs.

Welcome to HARIDRAA Ayurveda. A centre of excellence providing tailor made treatments and wellness packages rooted strongly in principles of Ayurveda and carefully designed to suit the needs of each individual patient or customer.';


$head_treatments_available = 'Treatments Available';
$left_treatments_available = 'Ahyangam(General Body Massage)
Swedanam(Steam Bath)
Nasyam
Pizhichil(Rejuvenation Therapy)
Sirodhara
Udwarthanam(Fat Reduction)
Potala Swedanam(Kizhi)
Patra Rotala Swedanam
Njavara Kizhi
';
$right_treatments_available = 'Weight Reduction Treatments
Stress Relieving Treatments
Detoxification Treatments
Rejuvination Treatments
Anti Aging Treatments
Wellness Treatments';
?>





<div id="beyond_healing">
    <div id="heading"><?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'head_beyond_healing','aboutus',$head_beyond_healing); ?></div>
    <div id="left">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'left_beyond_healing','aboutus',$left_beyond_healing); ?>
    </div>
    <div id="right">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'right_beyond_healing','aboutus',$right_beyond_healing); ?>
    </div>
</div>

<div id="treatments">
    <div id="heading"><?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'head_treatments_available','aboutus',$head_treatments_available); ?></div>
    <div id="left">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'left_treatments_available','aboutus',$left_treatments_available); ?>
    </div>
    <div id="right">
        <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'right_treatments_available','aboutus',$right_treatments_available); ?>
    </div>
</div>


<div id="quick_contact">
    <div id="title">

    </div>

    <div id="form">
        <?php echo $quick_contact; ?>
    </div>

</div>

