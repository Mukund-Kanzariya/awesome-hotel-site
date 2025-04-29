<?php

require '../../includes/init.php';

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomnos = $_POST['roomno'];  // This will now be an array of room numbers
$total = $_POST['total'];
$status = 'active';

if (isset($_FILES['image'])) {
    $targetDir = "../../admin/assets/images/guests/";
    $image = $_FILES['image']['name'];
    $targetFile = $targetDir . basename($image);

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        die("Error uploading the image.");
    }
} else {
    $image = null;
}

// Insert guest details (excluding RoomNo for now)
$query = "INSERT INTO `guests`(`Name`, `Mobile`, `Email`, `Address`, `Image`, `CheckInDate`, `CheckOutDate`, `TotalBill`, `Status`) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$param = [$name, $mobile, $email, $address, $image, $checkin, $checkout, $total, $status];
execute($query, $param);

// Get the ID of the newly inserted guest
$guestId = lastInsertId(); 

session_start();

$_SESSION['GuestId'] = $guestId; 

// Loop through each selected room number and insert them with the guest ID
foreach ($roomnos as $roomno) {
    // Insert room number for the guest
    $roomInsertQuery = "INSERT INTO `guestrooms`(`GuestId`, `RoomNo`) VALUES (?, ?)";
    execute($roomInsertQuery, [$guestId, $roomno]);

    // Update room availability
    $rooms = "UPDATE `rooms` SET IsAvailable = FALSE WHERE RoomNumber = ?";
    execute($rooms, [$roomno]);
}

?>