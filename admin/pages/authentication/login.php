<?php  
require '../../includes/init.php';

require_once '../../vendor/autoload.php';

// Initialize Google Client
// $clientID = '727218418612-j0f7i2p5igtlieq9hj1b498ig772u3ru.apps.googleusercontent.com';
// $clientSecret = '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';
$clientID = 'GOOGLE_CLIENT_ID';
$clientSecret = 'GOOGLE_CLIENT_SECRET';
$redirectUri = 'http://localhost/hotel/admin/pages/authentication/login';

// Create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Handle Google OAuth callback
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if (isset($token['error'])) {
        echo "Error: " . htmlspecialchars($token['error_description']);
    } elseif (isset($token['access_token'])) {
        $client->setAccessToken($token['access_token']);
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;

        // Check if user exists in database
        if ($conn) {
            $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['userId'] = $row['Id'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['roleId'] = $row['RoleId'];

                echo "<script>
                    alert('Login successful');
                    window.location.href='" . urlOf('index') . "';
                </script>";
            } else {
                echo "<script>
                    alert('Login failed. Please check your username and password.');
                    window.location.href='" . urlOf('pages/authentication/login') . "';
                </script>";
            }
            $stmt->close();
        } else {
            echo "Error: Unable to connect to the database.";
        }
    } else {
        echo "Error fetching the access token.";
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Login</title>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: #191970;
        width: 450px;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .login-container img {
        height: 80px;
        width: 100px;
        margin-bottom: 20px;
    }

    .login-container h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #FFFFFF;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #FFD700;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .input-field:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 8px rgba(108, 99, 255, 0.5);
    }

    .btn {
        width: 100%;
        padding: 10px;
        margin: 20px 0;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-login {
        background-color: #FFD700;
        color: black;
    }

    .btn-google {
        background-color: #FFFFFF;
        color: #757575;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ddd;
        margin-top: 10px;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-login:hover {
        background-color: white;
        color: black;
    }

    .btn-google img {
        width: 20px;
        margin-right: 10px;
    }

    .forgot-password {
        display: block;
        margin-top: 10px;
        font-size: 14px;
        color: #FFFFFF;
    }

    .forgot-password:hover {
        color: #FFD700;
    }

    .google-btn a {
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .google-btn a img {
        margin-right: 10px;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="../../assets/images/logomain.png" alt="Hotel Logo">
        <h2>Login to Your Account</h2>
        <form action="../../api/authentication/login" method="post">
            <input type="text" class="input-field" name="username" placeholder="Enter Username" required autofocus>
            <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
            <button type="submit" class="btn btn-login" onclick="sendData()">Login</button>
        </form>
        <a href="#" class="forgot-password">Forgot Password?</a>

        <!-- <div class="social-login">
            <div class="btn-google">
                <a href="<?= htmlspecialchars($client->createAuthUrl()) ?>">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"
                        alt="Google Logo">
                    Continue with Google
                </a>
            </div>
        </div> -->
    </div>

</body>

</html>

<?php } ?>