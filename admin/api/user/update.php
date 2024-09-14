<?php

require '../../includes/init.php';

$targetdir = "../../assets/images/user/";
$statusMsg = "";

if (isset($_POST["submit"])) {
    // Collect user inputs
    $id = $_POST['id']; // User ID for updating
    $name = $_POST['name'];
    $role = $_POST['role'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $oldImage = $_POST['oldimage']; // Old image from hidden input

    // Prepare SQL update query (excluding image initially)
    $updateFields = "`Name` = '$name', `RoleId` = '$role', `MobileNumber` = '$mobile', `Email` = '$email', `Address` = '$address', `City` = '$city', `State` = '$state', `Username` = '$username'";

    // Check if the password needs to be updated
    if (!empty($password)) {
        // You can hash the password here if needed:
        // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $updateFields .= ", `Password` = '$password'";
    }

    // Check if a new image is uploaded
    if (!empty($_FILES["user_image"]["name"])) {
        // Generate new random image name
        $random = rand(1, 99999);
        $image = $random . '-' . $_FILES["user_image"]["name"];
        
        // Handle new image upload
        $image_name = basename($image);
        $targetFilePath = $targetdir . $image_name;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allowed file types
        $allow_type = array('jpg', 'png', 'jpeg', 'webp');

        if (in_array($fileType, $allow_type)) {
            // Move the uploaded file
            if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $targetFilePath)) {
                // Delete the old image file if it exists
                if (!empty($oldImage) && file_exists($targetdir . $oldImage)) {
                    unlink($targetdir . $oldImage);
                }

                // Update user data with the new image in the database
                $updateFields .= ", `Image` = '$image'";
            } else {
                $statusMsg = '<p style="color:#EA4335;">Error uploading your file</p>';
            }
        } else {
            $statusMsg = '<p style="color:#EA4335;">Sorry, only jpg, png, & jpeg files are allowed</p>';
        }
    }

    // Construct the final SQL update query
    $sql = "UPDATE `user` SET $updateFields WHERE `Id` = '$id'";

    // Execute the query to update user data
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('User Updated Successfully');
            window.location.href = '".urlOf('pages/user/userList')."';
            </script>";
    } else {
        $statusMsg = '<p style="color:#EA4335;">Error updating user information</p>';
    }
}

?>
