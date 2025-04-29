<?php

require '../../includes/init.php';

// Get the guest ID to delete
$id = $_GET['deleteId'];

$query1 = "SELECT Image FROM `guests` WHERE `Id` = ?";
$param = [$id];
$imageData = selectOne($query1, $param);

// Check if guest data was successfully retrieved
if ($imageData) {
    // Get the image path and room number
    $image = $imageData['Image'];
    $roomNo = $imageData['RoomNo'];
    $imagePath = "../../assets/images/guests/" . $image;

    // Start by deleting guest's data from the `guestrooms` table
    $deleteGuestRooms = "DELETE FROM `guestrooms` WHERE `GuestId` = ?";
    $deletedFromGuestRooms = execute($deleteGuestRooms, [$id]);

    // Check if guest room data deletion was successful
    if ($deletedFromGuestRooms) {
        // Proceed to delete the guest's image if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image
        }

        // Now, delete the guest entry from the `guests` table
        $deleteGuest = "DELETE FROM `guests` WHERE `Id` = ?";
        $deletedGuest = execute($deleteGuest, [$id]);

        // Check if the guest deletion was successful
        if ($deletedGuest) {
            // Update the room availability after guest deletion
            $updateRoom = "UPDATE `rooms` SET `IsAvailable` = TRUE WHERE `RoomNumber` = ?";
            execute($updateRoom, [$roomNo]);

            // Redirect to the guest list
            header("Location: ../../pages/guests/guestList");
            exit(); // Ensure the script stops after redirect
        } else {
            // If guest deletion failed, show an error message
            echo "<script>
            alert('Failed to delete guest');
            window.location.href='../../pages/guests/guestList';
            </script>";
        }
    } else {
        // If guest room data deletion failed, show an error message    
        echo "<script>
        alert('Failed to delete guest from guestrooms table');
        window.location.href='../../pages/guests/guestList';
        </script>";
    }
} else {
    // If guest data was not retrieved, show an error message
    echo "<script>
    alert('Guest data not found');
    window.location.href='../../pages/guests/guestList';
    </script>";
}

?>