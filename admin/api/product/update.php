<?php

require '../../includes/init.php';

$id = $_POST['id'];

$targetdir = "../../assets/images/product/";
$watermark_path = "../../assets/images/watermark.png";
$statusMsg = "";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $desc = $_POST["description"];
    $price = $_POST["price"];

    $random = rand(1, 99999);
    $image = $random . '-' . $_FILES["product_image"]["name"];
    $old_image = $_POST["oldimage"];

    $product = $targetdir . $old_image;
    $product_image = "../../assets/images/product_image/" . $old_image;

    if (!empty($_FILES["product_image"]["name"])) {
        $update_file = $image;

        // Delete old images
        if (file_exists($product)) {
            unlink($product);
        }
        if (file_exists($product_image)) {
            unlink($product_image);
        }

        // Check if the file already exists
        if (file_exists($targetdir . $image)) {
            header("location: ../../pages/addProduct?already_exists_file");
            exit();
        }

        // Handle file upload
        $fileType = pathinfo($targetdir . $image, PATHINFO_EXTENSION);
        $allow_type = array('jpg', 'png', 'jpeg', 'webp');

        if (in_array($fileType, $allow_type)) {
            $newtargetFilePath = "../../assets/images/product_image/" . $image;

            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $newtargetFilePath)) {
                // Apply watermark
                $watermark_img = imagecreatefrompng($watermark_path);
                switch ($fileType) {
                    case 'jpg':
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

                // Save the image
                switch ($fileType) {
                    case 'jpg':
                    case 'jpeg':
                        imagejpeg($im, $targetdir . $image);
                        break;
                    case 'webp':
                        imagewebp($im, $targetdir . $image);
                        break;
                    case 'png':
                        imagepng($im, $targetdir . $image);
                        break;
                }

                imagedestroy($im);

                if (file_exists($targetdir . $image)) {
                    echo "<script>
                    </script>";
                } else {
                    $statusMsg = '<p style="color:#EA4335;">Error applying watermark</p>';
                }
            } else {
                $statusMsg = '<p style="color:#EA4335;">Error uploading your watermark</p>';
            }
        } else {
            $statusMsg = '<p style="color:#EA4335;">Sorry, only jpg, png, & jpeg files are allowed</p>';
        }
    } else {
        $update_file = $old_image;
    }

    $sql = "UPDATE `product` SET `Name`='$name',`CategoryId`='$category',`Description`='$desc',`Price`='$price',`Image`='$update_file' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Update Successfully');
        window.location.href = '".urlOf('pages/product/productList')."';
        </script>";
    } else {
        echo '<p style="color:#EA4335;">Error updating product</p>';
    }
}
?>
