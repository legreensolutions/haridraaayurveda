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

             <?php echo $this->gsconf->get_conf(CONF_TYPE_TEXT,'news_content','news'," 'Haridraa' Best experience i've had with ayurveda. Pleasant, responsive, creative, quality - they are tough to beat. Haridraa' Best experience i've had with ayurveda. Pleasant, responsive, creative, quality - they are tough to beat."); ?>
            </div>


    </div>

</div>

