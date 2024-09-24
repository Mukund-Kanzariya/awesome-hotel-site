<?php

session_start();

require '../../includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($username) || empty($password)) {
        echo "<script>
            alert('Please enter both username and password.');
            window.location.href='".urlOf('pages/authentication/login')."';
        </script>";
        exit;
    }

    try {
        // Prepared statement to prevent SQL injection (using PDO)
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE UserName = :username AND Password = :password");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Fetch user data and set session variables
            $_SESSION['userId'] = $result['Id'];
            $_SESSION['username'] = $result['UserName'];
            $_SESSION['roleId'] = $result['RoleId'];

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
    } catch (PDOException $e) {
        echo "<script>
            alert('Database error: ' . $e->getMessage());
            window.location.href='".urlOf('pages/authentication/login')."';
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request method');
        window.location.href='".urlOf('pages/authentication/login')."';
    </script>";
}

?>