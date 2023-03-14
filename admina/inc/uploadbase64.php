<?php
    include"inc/config.php";
    $imageBase64 = $post['poto'];//get base64 of image from client end
    if ($imageBase64!='') {
        $unique_name = uploadbase64image($imageBase64);//function call
    }
    

    //function to upload image and get an unique name to store in db

    function uploadbase64image($base64) {
        $direktori = "upload/"; 
        //uniqid(). date("Y-m-d-H-i-s") . ".png";
        $uniname = $direktori.date("Y-m-d-H-i-s") . ".png";
        $new_image_url =  $uniname;
        // $base641 = 'data:image/png;base64,' . $base64;
        $base642 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        //$image = imagecreatefromstring($base642);
        file_put_contents($new_image_url, $base642);
        return $uniname;
    }

    

$sql = "INSERT INTO product SET gambar='$unique_name'";
if ($post) {
    $db->fetch_custom($sql);
}