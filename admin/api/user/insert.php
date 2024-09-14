<?php

require '../../includes/init.php';

$targetdir = "../../assets/images/user/";
$statusMsg = "";

if (isset($_POST["submit"])) {
    // Collect user inputs
    $name = $_POST['name'];
    $role = $_POST['role'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password for security

    // Handle Image Upload
    $random = rand(1, 99999);
    $image = $random . '-' . $_FILES["image"]["name"];

    // Insert into database
    $sql = "INSERT INTO `user`(`Name`, `RoleId`, `MobileNumber`, `Email`, `Address`, `City`, `State`, `Username`, `Password`, `Image`) 
            VALUES ('$name', '$role', '$mobile', '$email', '$address', '$city', '$state', '$username', '$password', '$image')";

    $result = mysqli_query($conn, $sql);

    if (!empty($_FILES["image"]["name"])) {
        // Image file handling
        $image_name = basename($image);
        $file_name = $image_name;
        $targetFilePath = $targetdir . $file_name;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allowed file types
        $allow_type = array('jpg', 'png', 'jpeg', 'webp');

        if (in_array($fileType, $allow_type)) {
            // Move the uploaded file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                if (file_exists($targetFilePath)) {
                    echo "<script>
                        alert('User Inserted Successfully');
                        window.location.href = '".urlOf('pages/user/userList')."';
                        </script>";
                } else {
                    $statusMsg = '<p style="color:#EA4335;">Error during file upload</p>';
                }
            } else {
                $statusMsg = '<p style="color:#EA4335;">Error uploading your file</p>';
            }
        } else {
            $statusMsg = '<p style="color:#EA4335;">Sorry, only jpg, png, & jpeg files are allowed</p>';
        }
    } else {
        $statusMsg = '<p style="color:#EA4335;">Please select an image to upload</p>';
    }
}

?>