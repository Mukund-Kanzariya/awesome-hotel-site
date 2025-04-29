<?php
require '../../includes/init.php';

// Collect form data
$guestId = $_POST['id'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomnos = isset($_POST['roomno']) ? $_POST['roomno'] : [];
$total = $_POST['total'];
$status = 'active';  // Set the status as active, or adjust as needed

// Check if an image is uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "../../assets/images/guests/";
    $image = $_FILES['image']['name'];
    $targetFile = $targetDir . basename($image);

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        die("Error uploading the image.");
    }

    // If a new image is uploaded, delete the old image
    $query = "SELECT Image FROM guests WHERE Id = ?";
    $oldImage = selectOne($query, [$guestId])['Image'];
    if ($oldImage && file_exists($targetDir . $oldImage)) {
        unlink($targetDir . $oldImage);
    }
} else {
    // Retain the old image if no new image is uploaded
    $query = "SELECT Image FROM guests WHERE Id = ?";
    $image = selectOne($query, [$guestId])['Image'];
}

// Update guest details in the `guests` table
$query = "UPDATE `guests` 
          SET `Name` = ?, `Mobile` = ?, `Email` = ?, `Address` = ?, `Image` = ?, `CheckInDate` = ?, `CheckOutDate` = ?, `TotalBill` = ?, `Status` = ?
          WHERE `Id` = ?";
$param = [$name, $mobile, $email, $address, $image, $checkin, $checkout, $total, $status, $guestId];
execute($query, $param);

// Handle room number updates
if (!empty($roomnos) && is_array($roomnos)) {
    // Fetch old room numbers assigned to this guest
    $oldRoomsQuery = "SELECT RoomNo FROM `guestrooms` WHERE `GuestId` = ?";
    $oldRooms = selectAll($oldRoomsQuery, [$guestId]);

    // Mark old rooms as available
    if (!empty($oldRooms)) {
        foreach ($oldRooms as $oldRoom) {
            $roomUpdateQuery = "UPDATE `rooms` SET IsAvailable = TRUE WHERE RoomNumber = ?";
            execute($roomUpdateQuery, [$oldRoom['RoomNo']]);
        }

        // Remove old room assignments for this guest
        $deleteOldRoomsQuery = "DELETE FROM `guestrooms` WHERE `GuestId` = ?";
        execute($deleteOldRoomsQuery, [$guestId]);
    }

    // Assign new rooms to the guest
    foreach ($roomnos as $roomNo) {
        $assignRoomQuery = "INSERT INTO `guestrooms` (`GuestId`, `RoomNo`) VALUES (?, ?)";
        execute($assignRoomQuery, [$guestId, $roomNo]);

        // Mark the new room as unavailable
        $roomUpdateQuery = "UPDATE `rooms` SET IsAvailable = FALSE WHERE RoomNumber = ?";
        execute($roomUpdateQuery, [$roomNo]);
    }
}

// Return a success message
// echo json_encode(['status' => 'success', 'message' => 'Guest and rooms updated successfully']);
?>