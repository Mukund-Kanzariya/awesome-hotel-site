<?php

require '../../includes/init.php';

// Collect form data
$guestId = $_POST['id']; // Guest ID to update
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$oldImage = $_POST['oldimage']; // Old image field
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomnos = $_POST['roomno'];  // Array of room numbers
$total = $_POST['total'];
$status = 'active';

$image = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Directory for storing images
    $targetDir = "../../assets/images/guests/";
    $newImage = $_FILES['image']['name'];
    $targetFile = $targetDir . basename($newImage);

    // Delete the old image if it exists
    if ($oldImage && file_exists($targetDir . $oldImage)) {
        unlink($targetDir . $oldImage); // Delete old image
    }

    // Upload the new image
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        die("Error uploading the image.");
    }
} else {
    // Keep the old image if no new one is provided
    $newImage = $oldImage;
}

// Update guest details (excluding RoomNo for now)
$query = "UPDATE `guests` 
          SET `Name` = ?, `Mobile` = ?, `Email` = ?, `Address` = ?, `Image` = ?, 
              `CheckInDate` = ?, `CheckOutDate` = ?, `TotalBill` = ?, `Status` = ?
          WHERE `Id` = ?";
$params = [$name, $mobile, $email, $address, $newImage, $checkin, $checkout, $total, $status, $guestId];
execute($query, $params);

// Delete old room assignments for the guest
$deleteRoomQuery = "DELETE FROM `guestrooms` WHERE `GuestId` = ?";
execute($deleteRoomQuery, [$guestId]);

// Reset the availability of previously assigned rooms
$resetRoomQuery = "UPDATE `rooms` 
                   SET `IsAvailable` = TRUE 
                   WHERE `RoomNumber` IN (SELECT `RoomNo` FROM `guestrooms` WHERE `GuestId` = ?)";
execute($resetRoomQuery, [$guestId]);

// Loop through each selected room number and insert the updated room assignments
foreach ($roomnos as $roomno) {
    $roomInsertQuery = "INSERT INTO `guestrooms`(`GuestId`, `RoomNo`) VALUES (?, ?)";
    execute($roomInsertQuery, [$guestId, $roomno]);

    // Update room availability to false for the new assignments
    $rooms = "UPDATE `rooms` SET `IsAvailable` = FALSE WHERE `RoomNumber` = ?";
    execute($rooms, [$roomno]);
}


?>