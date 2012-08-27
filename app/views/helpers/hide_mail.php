<?php
class HideMailHelper extends Helper {
    var $helpers = array('Html');

    function hide($mail, $imgAttr=null) {
        // chequea si la librería GD esta instalada en el server
        if (!extension_loaded('gd') || !function_exists('gd_info')) {
            return $mail;
        }

        $filepath = IMAGES_URL."mail/" ;
        $filename = $filepath.md5($mail).".png";
        $url = "mail/".md5($mail).".png";

        if(!file_exists($filename )) {

            if (!is_dir($filepath)) @mkdir($filepath);

            /*calculo el tamaÃ±o que va a tener la imagen*/
            $width = imagefontwidth(3)*strlen($mail);
            $height = imagefontheight(3);
            $image = imagecreatetruecolor($width,$height);

            /*el color rojo lo uso como background transparente*/
            $white = imagecolorallocate($image, 255, 255, 255);
            $fontColor = ImageColorAllocate($image, 88, 88, 90);

            imagefill($image, 0, 0, $white);
            imagecolortransparent($image, $white);
            imagestring($image, 3, 0, 0, $mail, $fontColor);

            imagepng($image, $filename);
            imagedestroy($image);
        }
        return $this->Html->image($url, $imgAttr);
    }
}
?>