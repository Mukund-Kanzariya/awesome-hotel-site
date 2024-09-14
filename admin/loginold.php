<?php  

session_start();

require '../../includes/init.php';

?>


<!doctype html>
<html lang="en">
<!-- [Head] start -->


<!-- Mirrored from html.phoenixcoded.net/light-able/bootstrap/pages/login-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 05:48:52 GMT -->

<head>
    <title>Login | Light Able Admin & Dashboard Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
    <meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon" />
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="<?= urlOf('assets/fonts/phosphor/duotone/style.css') ?>" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="<?= urlOf('assets/fonts/tabler-icons.min.css') ?>" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="<?= urlOf('assets/fonts/feather.css') ?>" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="<?= urlOf('assets/fonts/fontawesome.css') ?>" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="<?= urlOf('assets/fonts/material.css') ?>" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="<?= urlOf('assets/css/style.css') ?>" id="main-style-link" />
    <link rel="stylesheet" href="<?= urlOf('assets/css/style-preset.css') ?>" />

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">

    <!-- code start for login with googel -->
     
    <?php
require_once '../../vendor/autoload.php';

// init configuration
$clientID = '727218418612-j0f7i2p5igtlieq9hj1b498ig772u3ru.apps.googleusercontent.com'; //this is crated when you have created a application on google cloud
$clientSecret = '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'; //same as above
$redirectUri = 'http://localhost/admin/pages/authentication/login.php'; //paste URL of your login page

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    // Fetch the token and check if it's valid
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if (isset($token['error'])) {
        echo "Error: " . htmlspecialchars($token['error_description']);
    } elseif (isset($token['access_token'])) {
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        // Prepared statement to prevent SQL injection
        if ($conn) { // Ensure database connection is available
            $stmt = $conn->prepare("SELECT * FROM user WHERE Email = ?");
            $stmt->bind_param("s", $email); // Bind email to prevent SQL injection
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

            $stmt->close(); // Close statement
        } else {
            echo "Error: Unable to connect to the database."; // Database connection error
        }

    } else {
        echo "Error fetching the access token.";
    }
} else {
?>

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main v1">
        <div class="auth-wrapper">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= urlOf('assets/images/authentication/img-auth-login.png') ?>" alt="images"
                                class="img-fluid mb-3" />
                            <h4 class="f-w-500 mb-1">Login with your UserName</h4><br>
                        </div>
                        <form action="../../api/authentication/login" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Enter UserName"
                                    autofocus />
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter Password" /><br>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn custom">Login</button>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="button" class="btn btn-success">
                                    <a href="<?= htmlspecialchars($client->createAuthUrl()) ?>">Continue with Google</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="<?= urlOf('assets/js/plugins/popper.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/simplebar.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/bootstrap.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/fonts/custom-font.js') ?>"></script>
    <script src="<?= urlOf('assets/js/pcoded.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/feather.min.js') ?>"></script>


</body>

</html>