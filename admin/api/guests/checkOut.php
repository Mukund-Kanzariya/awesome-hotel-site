<?php

require '../../includes/init.php';

// Get the guest ID and the array of room numbers
$id = $_POST['id'];
$roomnos = $_POST['roomno'];  // This is now an array of room numbers

$status = "checked out";

// Update the guest's status to "checked out"
$guestQuery = "UPDATE `guests` SET `Status` = ? WHERE `Id` = ?";
$param1 = [$status, $id];
execute($guestQuery, $param1);

// Ensure roomnos is an array before iterating
if (is_array($roomnos)) {
    foreach ($roomnos as $roomno) {
        $roomQuery = "UPDATE `rooms` SET `IsAvailable` = TRUE WHERE `RoomNumber` = ?";
        $param2 = [$roomno];
        execute($roomQuery, $param2);
    }
} else {
    // Handle error if roomnos is not an array
    error_log("Expected roomno to be an array, got: " . print_r($roomnos, true));
}

?>