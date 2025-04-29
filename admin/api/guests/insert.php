<?php

require '../../includes/init.php';

// Collect form data
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomnos = isset($_POST['roomno']) ? $_POST['roomno'] : [];  // Ensure roomnos is an array
$total = $_POST['total'];
$status = 'active';

// Check if an image is uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "../../assets/images/guests/";
    $image = $_FILES['image']['name'];
    $targetFile = $targetDir . basename($image);

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        die("Error uploading the image.");
    }
} else {
    $image = null;
}

// Insert guest details
$query = "INSERT INTO `guests`(`Name`, `Mobile`, `Email`, `Address`, `Image`, `CheckInDate`, `CheckOutDate`, `TotalBill`, `Status`) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$param = [$name, $mobile, $email, $address, $image, $checkin, $checkout, $total, $status];
execute($query, $param);

// Get the ID of the newly inserted guest
$guestId = lastInsertId();

// echo $guestId;
// Ensure room numbers are properly processed
if (!empty($roomnos) && is_array($roomnos)) {
    foreach ($roomnos as $roomno) {
        // Validate that the room number is not empty
        if (!empty($roomno)) {
            // Insert room number for the guest
            $roomInsertQuery = "INSERT INTO `guestrooms`(`GuestId`, `RoomNo`) VALUES (?, ?)";
            execute($roomInsertQuery, [$guestId, $roomno]);

            // Update room availability
            $rooms = "UPDATE `rooms` SET IsAvailable = FALSE WHERE RoomNumber = ?";
            execute($rooms, [$roomno]);
        } else {
            die('Invalid room number detected.');
        }
    }
} else {
    die('No rooms assigned to the guest.');
}

// Return success response (optional)
echo json_encode(['status' => 'success', 'guestId' => $guestId]);

?>