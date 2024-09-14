<?php

require '../../includes/init.php';

$targetdir = "../../assets/images/product/";
$watermark_path = "../../assets/images/watermark.png";
$statusMsg = "";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $category= $_POST["category"];
    $desc = $_POST["description"];
    $price = $_POST["price"];

    $random = rand(1, 99999);
    $image = $random . '-' . $_FILES["image"]["name"];

    $sql = "INSERT INTO `product`(`Name`, `CategoryId`,`Description`,`Price`, `Image`) VALUES ('$name','$category','$desc','$price','$image')";
    $result = mysqli_query($conn, $sql);
    
    if (!empty($_FILES["image"]["name"])) {
        $image_name = basename($image);
        $file_name = $image_name;
        $targetFilePath = $targetdir . $file_name;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $newFolder = "../../assets/images/product_image/";
        $newtargetFilePath = $newFolder . $file_name;

        $allow_type = array('jpg', 'png', 'jpeg', 'webp');

        if (in_array($fileType, $allow_type)) {

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $newtargetFilePath)) {
                $watermark_img = imagecreatefrompng($watermark_path);
                switch ($fileType) {
                    case 'jpg':
                        $im = imagecreatefromjpeg($newtargetFilePath);
                        break;
                    case 'jpeg':
                        $im = imagecreatefromjpeg($newtargetFilePath);
                        break;
                    case 'webp':
                        $im = imagecreatefromwebp($newtargetFilePath);
                        break;
                    case 'png':
                        $im = imagecreatefrompng($newtargetFilePath);
                        break;
                    default:
                        $im = imagecreatefromjpeg($newtargetFilePath);
                }

                $main_width = imagesx($im);
                $main_height = imagesy($im);
                $watermark_width = imagesx($watermark_img);
                $watermark_height = imagesy($watermark_img);

                $x = ($main_width - $watermark_width) / 2;
                $y = ($main_height - $watermark_height) / 2;

                imagecopy($im, $watermark_img, $x, $y, 0, 0, $watermark_width, $watermark_height);


                imagepng($im, $targetFilePath);
                imagedestroy($im);

                if (file_exists($targetFilePath)) {
                    echo "<script>
                        alert('Product Insert Successfully');
                        window.location.href = '".urlOf('pages/product/productList')."';
                        </script>";
                } else {
                    $statusMsg = '<p style="color:#EA4335;">Error watermark</p>';
                }
            } else {
                $statusMsg = '<p style="color:#EA4335;">Error upload your watermark</p>';
            }
        } else {
            $statusMsg = '<p style="color:#EA4335;">Sorry only jpg, png, & jpeg file uploaded</p>';
        }
    } else {
        $statusMsg = '<p style="color:#EA4335;">Please select a file to upload</p>';
    }
}
//  insert end


?>
