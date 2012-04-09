<?php
/**
 * Function for creating closeimages
 */
header("content-type: image/png"); 

$red   = $_GET['r'];
$green = $_GET['g'];
$blue  = $_GET['b'];

// Create a 30x30 image
$im    = imagecreatetruecolor(30, 30);
$color = imagecolorallocate($im, $red, $green, $blue);
$black = imagecolorallocate($im, 0, 0, 0);

// Make the background transparent
imagecolortransparent($im, $black);

// Draw a red rectangle
imagefilledrectangle($im, 10, 0, 20, 30, $color);
imagefilledrectangle($im, 0, 10, 30, 20, $color);

imagepng($im);

imagedestroy($im);
?>