<script type="text/javascript" src="js/lightbox/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightbox/jquery.lightbox-0.5.css" media="screen" />

<script type="text/javascript">
$(function() {
    $('#Gallery a').lightBox();
});
</script>

<div id="footer_menu" >
 <ul>
  <li class="home"> <a href="index.php" title="Home"> <span>Home</span> </a> </li>
  <li class="about_us"> <a href="aboutus.php" title="About Haridraa"> <span>About Haridraa</span> </a> </li>
  <li class="treatments"> <a href="treatments.php" title="Treatments"> <span>Treatments</span> </a> </li>
  <li class="facilities"> <a href="facilities.php" title="Facilities"> <span>Facilities</span> </a> </li>
  <li class="testimonials"> <a href="testimonials.php" title="Testimonials"> <span>Testimonials</span> </a> </li>
  <li id="Gallery">
  <a href="images/gallery/default.jpg" title="Haridraa Ayurveda :: Gallery"> <span>Gallery</span> </a>

  <?php
        $gallery_path = "images/gallery";

		$result =get_filenames(ROOT_PATH.$gallery_path,"jpg","",true);
		$n = sizeof($result);
		for ($i = 0 ; $i < $n ; $i++ ){
?>
<a style="display:none;" title="Haridraa Ayurveda :: Gallery" href="<?= $result[$i]?>" >Haridraa Gallery</a>

<?php  } ?>


   </li>
</ul>













</div>
<div id="copyright" >
&copy; Haridraa Ayurveda all right reaserved - A Center for Treatment and Research
</div>

