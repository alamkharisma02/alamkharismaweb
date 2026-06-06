<?php
$im = imagecreatefrompng('public/images/logo.png');
$w = imagesx($im);
$h = imagesy($im);
$colors = [];
for($x=0;$x<$w;$x+=20){
    for($y=0;$y<$h;$y+=20){
        $rgb = imagecolorat($im, $x, $y);
        $alpha = ($rgb >> 24) & 0x7F;
        if($alpha < 100){
            $colors[] = sprintf('%02x%02x%02x', ($rgb >> 16) & 0xFF, ($rgb >> 8) & 0xFF, $rgb & 0xFF);
        }
    }
}
echo "Total: " . count($colors) . "\n";
print_r(array_slice(array_unique($colors), 0, 20));
