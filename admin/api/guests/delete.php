<?php

require '../../includes/init.php';

$id = $_GET['deleteId'];

$query1 = "SELECT Image,RoomNo FROM `guests` WHERE `Id` = ?";
$param = [$id];
$imageData = selectOne($query1, $param);

// Ensure the result is retrieved properly
if ($imageData && isset($imageData['Image'])) {
    $image = $imageData['Image']; 
    $imagePath = "../../assets/images/guests/" . $image;
    
    if (file_exists($imagePath)) {
        unlink($imagePath); 

        $query = "DELETE FROM `guests` WHERE `Id` = ?";
        execute($query, [$id]);

        header("location:../../pages/guests/guestList");

    } else {
        echo "<script>
        alert('Image not found in folder');
        window.location.href='../../pages/guests/guestList';
        </script>";
    }
} else {
    echo "<script>
    alert('Image not retrieved from database');
    window.location.href='../../pages/guests/guestList';
    </script>";
}

$roomno=$imageData['RoomNo'];
$query="UPDATE `rooms` SET `IsAvailable`= TRUE WHERE RoomNumber=?";
$param=[$roomno];
execute($query,$param);

?>
