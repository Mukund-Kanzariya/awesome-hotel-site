<?php

require '../../includes/init.php';

// Collect form data
$id = $_POST['id'];
$role = $_POST['role'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$username = $_POST['username'];
$password = $_POST['password'];
$oldImage = $_POST['oldimage'];

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $targetDir = "../../assets/images/users/";
    $newImage = $_FILES['image']['name'];
    $targetFile = $targetDir . basename($newImage);

    if ($oldImage && file_exists($targetDir . $oldImage)) {
        unlink($targetDir . $oldImage);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    } else {
        die("Error uploading the image.");
    }
} else {
    $newImage = $oldImage;
}

$query = "UPDATE `Users` 
          SET `RoleId` = ?, `Name` = ?, `Mobile` = ?, `Email` = ?, `Image` = ?, `Address` = ?, 
              `City` = ?, `State` = ?, `Username` = ?, `Password` = ?
          WHERE `Id` = ?";

$params = [$role, $name, $mobile, $email, $newImage, $address, $city, $state, $username, $password, $id];

execute($query, $params);


?>