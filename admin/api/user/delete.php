<?php

require '../../includes/init.php';

if (isset($_GET['id'])) {
    // Get the user ID from the query string
    $userId = $_GET['id'];

    // Retrieve the user's image from the database
    $query = "SELECT `Image` FROM `user` WHERE `id` = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['Image'];
        $targetFilePath = "../../assets/images/user/" . $image;

        // Delete the image file if it exists
        if (!empty($image) && file_exists($targetFilePath)) {
            unlink($targetFilePath);
        }

        // Delete the user from the database
        $deleteQuery = "DELETE FROM `user` WHERE `id` = '$userId'";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "<script>
                alert('User Deleted Successfully');
                window.location.href = '".urlOf('pages/user/userList')."';
                </script>";
        } else {
            echo "<script>
                alert('Error deleting user from database');
                window.location.href = '".urlOf('pages/user/userList')."';
                </script>";
        }
    } else {
        echo "<script>
            alert('User not found');
            window.location.href = '".urlOf('pages/user/userList')."';
            </script>";
    }
} else {
    echo "<script>
        alert('Invalid request');
        window.location.href = '".urlOf('pages/user/userList')."';
        </script>";
}

?>
