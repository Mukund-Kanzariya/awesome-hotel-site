<?php

require '../../includes/init.php';

$id = $_GET['deleteId'];

$query = "SELECT `Image` FROM `Users` WHERE `Id` = ?";
$param = [$id];
$imageData = selectOne($query, $param);

// Ensure the result is retrieved properly
if ($imageData && isset($imageData['Image'])) {
    $image = $imageData['Image']; 
    $imagePath = "../../assets/images/users/" . $image;
    
    if (file_exists($imagePath)) {
        unlink($imagePath); 

        $query = "DELETE FROM `Users` WHERE `Id` = ?";
        execute($query, [$id]);

        header("location:../../pages/users/userList");

    } else {
        echo "<script>
        alert('Image not found in folder');
        window.location.href='../../pages/users/userList';
        </script>";
    }
} else {
    echo "<script>
    alert('Image not retrieved from database');
    window.location.href='../../pages/users/userList';
    </script>";
}

?>
