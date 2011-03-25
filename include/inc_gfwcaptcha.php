<?php
// putenv('GDFONTPATH=' . realpath('./files/fonts/'));
putenv('GDFONTPATH=' . realpath('./'));
$width = isset($_GET['width']) ? $_GET['width'] : '120';
$height = isset($_GET['height']) ? $_GET['height'] : '40';
$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';

// $captcha = new CaptchaSecurityImages($width,$height,$characters);
$captcha = new gfwCaptcha();
$captcha->font = 'files/fonts/monofont.ttf';

// $captcha->font = 'AnjaliOldLipi.ttf';
// $captcha->font_size = 19;
// $captcha->gfwChar = '1 2 3 4 5 6 7 8 9 അ ആ ത വ ബ ന മ ച ഴ സ ദ ഫ ഗ ഹ ജ ക ല';

 $captcha->CaptchaSecurityImages($width,$height,$characters);

?>