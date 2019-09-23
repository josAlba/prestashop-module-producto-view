<?php

if(isset($_GET['t'])){
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}else{
    header('Content-Type: image/png');
}

$img        = imagecreatefromjpeg($_GET['i']);
$img2       = imagecreatefromjpeg($_GET['i']);

$w = imagesx($img);
$h = imagesy($img);

imagefilter($img, IMG_FILTER_NEGATE); 
imagefilter($img,  IMG_FILTER_CONTRAST, -90);
$remove     = imagecolorallocate($img, 0, 0, 0);
imagecolortransparent($img, $remove);
imagefilter($img,  IMG_FILTER_CONTRAST, 0);
imagefilter($img2,IMG_FILTER_GAUSSIAN_BLUR);

for ($x = 0; $x < $w; $x++) {
    for ($y = 0; $y < $h; $y++) {

        $rgb = imagecolorat($img, $x, $y);
        $colors = imagecolorsforindex($img,  $rgb);

        $tmp    = implode(',',$colors);
       
        if($tmp != '0,0,0,0'  && true==true){

            $rgb = imagecolorat($img2, $x, $y);
            $colors = imagecolorsforindex($img2,  $rgb);

            $orgb = imagecolorallocate($img,$colors['red'],$colors['green'],$colors['blue']);
            imagesetpixel($img,$x,$y,$orgb);
        }
    }
}

imagepng($img);
imagedestroy($img);