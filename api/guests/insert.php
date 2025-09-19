<?php
// // Enable error reporting for debugging
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Include init
require '../../includes/init.php';

// // Handle missing POST data
// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     http_response_code(405);
//     die("Invalid request method.");
// }

// // Validate required POST fields
// $required = ['name', 'mobile', 'email', 'address', 'checkin', 'checkout', 'roomtype', 'quantity', 'total'];
// foreach ($required as $field) {
//     if (empty($_POST[$field])) {
//         http_response_code(400);
//         die("Missing field: $field");
//     }
// }

// if (!isset($_POST['roomno']) || !is_array($_POST['roomno']) || count($_POST['roomno']) == 0) {
//     http_response_code(400);
//     die("Room numbers are missing.");
// }

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomnos = $_POST['roomno'];
$total = $_POST['total'];
$status = 'active';

$image = null;

// Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = "../../admin/assets/images/guests/";
    $imageName = basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $imageName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        http_response_code(500);
        die("Error uploading the image.");
    }

    $image = $imageName;
}

// Insert guest data
$query = "INSERT INTO `guests` (`Name`, `Mobile`, `Email`, `Address`, `Image`, `CheckInDate`, `CheckOutDate`, `TotalBill`, `Status`) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$params = [$name, $mobile, $email, $address, $image, $checkin, $checkout, $total, $status];

try {
    execute($query, $params);
    $guestId = lastInsertId();

    // Save to session if needed
    session_start();
    $_SESSION['GuestId'] = $guestId;

    // Insert room assignments
    foreach ($roomnos as $roomno) {
        // Insert into guestrooms
        $insertRoom = "INSERT INTO `guestrooms` (`GuestId`, `RoomNo`) VALUES (?, ?)";
        execute($insertRoom, [$guestId, $roomno]);

        // Mark room as unavailable
        $updateRoom = "UPDATE `rooms` SET IsAvailable = 0 WHERE RoomNumber = ?";
        execute($updateRoom, [$roomno]);
    }

    // Success
    echo json_encode(['success' => true, 'message' => 'Booking successful.']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
}