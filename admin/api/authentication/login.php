<?php

session_start(); // Start the session

require '../../includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//jo form ma ane aya same method hase toj ee aagad vadhse,
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);//ss specify the both username and password are string

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $_SESSION['userId'] = $row['Id'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['roleId'] = $row['RoleId'];
        
        echo "<script>
            alert('Login successful');
            window.location.href='".urlOf('index')."';
        </script>";
    } else {
        echo "<script>
            alert('Login failed. Please check your username and password.');
            window.location.href='".urlOf('pages/authentication/login')."';
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
        alert('Invalid request method');
        window.location.href='".urlOf('pages/authentication/login')."';
    </script>";
}

?>
