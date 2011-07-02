<div id="l">
    <div id="news_content_l">

            <div id="content">
<script type="text/javascript" src="js/lightbox/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightbox/jquery.lightbox-0.5.css" media="screen" />

<script type="text/javascript">
$(function() {
    $('#Gallery_NA a').lightBox();
});
</script>
<div id="Gallery_NA">
<a  href="images/news/archives/default.jpg" title="Haridraa Ayurveda :: News archives">News archives</a>
<?php
        $gallery_path = "images/news/archives";

		$result =get_filenames(ROOT_PATH.$gallery_path,"jpg","",true);
		$n = sizeof($result);
		for ($i = 0 ; $i < $n ; $i++ ){
?>
<a style="display:none;" title="Haridraa Ayurveda :: News archives" href="<?= $result[$i]?>" >News archives</a>

<?php  } ?>

</div>
            <div class="m_news">
            <div class="m_news_image">
               <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'news_content1_image','news','<IMG src="/images/news/gallery/consumer_protection_award.jpg" alt="Ayurveda">'); ?>
            </div>

             <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'news_content1','news'," Haridraa Ayurveda managing director Dr. Asha M. Pillai receiving the Consumer Protection Award from Saju Paul, MLA, Instituted by Consumer Protection - Kerala for its meritorious service in ayurveda."); ?>
             </div>


            <div class="m_news">
            <div class="m_news_image">
               <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'news_content1_image','news','<IMG src="/images/news/gallery/award_for_excellence.jpg" alt="Ayurveda">'); ?>
            </div>

             <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'news_content1','news'," Award for Excellence: Justice Narayana Kurup and Charles Dias MP presenting Kerala's Management Excellence Award to Dr. A V Vidyadharan in Kochi on Sunday 18 April 2011"); ?>
             </div>



            </div>


    </div>

</div>

