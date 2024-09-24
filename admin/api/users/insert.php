<?php

require '../../includes/init.php';

// Collect form data
$role = $_POST['role'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$username = $_POST['username'];
$password = $_POST['password'];

// Handle the image upload
if(isset($_FILES['image'])) {
    $targetDir = "../../assets/images/users/"; // Path to save the image
    $image = $_FILES['image']['name'];
    $targetFile = $targetDir . basename($image);

    // Move the uploaded file to the server
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        // File uploaded successfully
    } else {
        // Handle file upload error
        die("Error uploading the image.");
    }
} else {
    $image = null; // Set to null if no image is uploaded
}

// Insert data into the database
$query = "INSERT INTO `Users`(`RoleId`, `Name`,  `Mobile`, `Email`, `Image`, `Address`, `City`, `State`, `Username`, `Password`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$param = [$role, $name, $mobile, $email, $image, $address, $city, $state, $username, $password];
execute($query, $param);

?>