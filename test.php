<?php
    //text to add
    $text = 'Immobilier Bénin';

    //background image 
    $image = imagecreatefrompng('bg.png');

    //color of text
    $textColor = imagecolorallocate($image, 229, 85, 78);

    //font
    $fontPath = 'Heebo-Medium.ttf';

    //function that write image on text
    imagettftext($image, 90, 7, 575, 850, $textColor, $fontPath, $text);

    //set browser content type
    header('Content-type: image/png');

    //send image to browser
    imagepng($image);
    imagepng($image, 'newImage.png');

    //clear image
    imagedestroy($image);

?>
