<?php

require '../../includes/init.php';

// Get the guest ID and the array of room numbers
$id = $_POST['id'];
$roomnos = $_POST['roomno'];  // This should be an array of room numbers

$status = "checked out";

// Update the guest's status to "checked out"
$guestQuery = "UPDATE `guests` SET `Status` = ? WHERE `Id` = ?";
$param1 = [$status, $id];
execute($guestQuery, $param1);

// Loop through each room number to update its availability
foreach ($roomnos as $roomno) {
    $roomQuery = "UPDATE `rooms` SET `IsAvailable` = TRUE WHERE `RoomNumber` = ?";
    $param2 = [$roomno];
    execute($roomQuery, $param2);
}

?>