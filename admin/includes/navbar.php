<?php 

// require_once 'init.php';

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// if (isset($_SESSION['userId'])) {
//     $id = $_SESSION['userId'];
    
//     $query = "SELECT user.Id, user.Name, user.MobileNumber, user.Email, user.Address, user.City, user.State, user.Username,user.Image, role.Rolename AS RoleId 
//               FROM `user` 
//               INNER JOIN `role` ON user.RoleId = role.Id  
//               WHERE user.Id = '$id'";
    
//     $result = mysqli_query($conn, $query);
//     if ($result && mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         $name = $row['Username'];
//         $role = $row['RoleId'];
//     } else {
//         echo "<script>
//             alert('User not found.');
//         </script>";
//     }
// } else {
//     echo "<script>
//         alert('User ID is not set.');
//     </script>";
// }

?>

<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="<?= urlOf('') ?>" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <!-- <img src="<?= urlOf('assets/images/favicon.svg') ?>" alt="logo image" class="logo-lg" /> -->
                <div class=" " style="margin-top: 10px;margin-left: 50px;">
                    <!-- Adjust the margin-top as needed -->
                    <img src="<?= urlOf('assets/images/logomain.png') ?>" height="75px" width="90px" alt="">
                    <!-- Adjust the margin-bottom to control the vertical position -->
                </div>
                <h1>
                    <!-- <span class="badge bg-brand-color-5 rounded-pill theme-version">StayComfort</span> -->
                </h1>

            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <!-- <label>Navigation</label> -->
                    <i class="ph-duotone ph-gauge"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="<?= urlOf('index') ?>" class="pc-link">
                        <span class="pc-micon">
                            <!-- <i class="ph-duotone ph-gauge"></i> -->
                            <i class="ph-duotone ph-squares-four"></i>

                        </span>
                        <span class="pc-mtext">Dashboard</span>
                        <!-- <span class="pc-arrow"><i data-feather="chevron-right"></i></span> -->
                        <!-- <span class="pc-badge">2</span> -->
                    </a>
                    <!-- <li class="pc-item"><a class="pc-link" href="../demo/layout-vertical.html">Vertical</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-vertical-tab.html">Vertical + Tab</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-tab.html">Tab</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-2-column.html">2 Column</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-big-compact.html">Big Compact</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-compact.html">Compact</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-moduler.html">Moduler</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-creative.html">Creative</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-detached.html">Detached</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-advanced.html">Advanced</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-extended.html">Extended</a></li>
          </ul>
        </li>
        <li class="pc-item pc-caption">
          <label>Widget</label>
          <i class="ph-duotone ph-chart-pie"></i>
        </li>
        <li class="pc-item">
          <a href="../widget/w_statistics.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-projector-screen-chart"></i>
            </span>
            <span class="pc-mtext">Statistics</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../widget/w_user.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-identification-card"></i>
            </span>
            <span class="pc-mtext">User</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../widget/w_data.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-database"></i>
            </span>
            <span class="pc-mtext">Data</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../widget/w_chart.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-chart-pie"></i>
            </span>
            <span class="pc-mtext">Chart</span></a
          >
        </li>
        <li class="pc-item pc-caption">
          <label>Application</label>
          <i class="ph-duotone ph-buildings"></i>
        </li>
        <li class="pc-item">
          <a href="../application/calendar.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-calendar-blank"></i>
            </span>
            <span class="pc-mtext">Calendar</span></a
          >
        </li>
        <li class="pc-item">
          <a href="../application/chat.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-chats-circle"></i>
            </span>
            <span class="pc-mtext">Chat</span></a
          >
        </li> -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-image"></i>
                        </span>
                        <span class="pc-mtext">Gallery</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="../application/gallery-grid.html">Grid</a></li>
                        <li class="pc-item"><a class="pc-link" href="../application/gallery-masonry.html">Masonry</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <!-- <i class="ph-duotone ph-user-circle"></i> -->
                            <!-- <i class="ph-duotone ph-user"></i> -->
                            <i class="ph-duotone ph-users-three"></i>
                            <!-- <i class="ph-duotone ph-user-plus"></i> -->


                        </span>
                        <span class="pc-mtext">Guests</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/guests/guestList') ?>">Guest
                                List</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/guests/addGuest') ?>">Add New
                                Guest</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <!-- <i class="ph-duotone ph-user-circle"></i> -->
                            <i class="ph-duotone ph-user"></i>

                        </span>
                        <span class="pc-mtext">Role</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/role/roleList') ?>">Role List</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/role/addRole') ?>">Add New
                                Role</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-user-circle"></i>

                        </span>
                        <span class="pc-mtext">Users</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/user/profile') ?>">Account
                                Profile</a></li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/user/userList') ?>">User List</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/user/addUser') ?>">Add New
                                User</a></li>
                    </ul>
                </li>



                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <!-- <i class="ph-duotone ph-shopping-cart"></i> -->
                            <!-- <i class="ph-duotone ph-grid-four"></i> -->
                            <i data-feather="layers"></i>

                        </span>
                        <span class="pc-mtext">RoomTypes</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">

                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/roomTypes/roomList') ?>">RoomType
                                List</a></li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/roomTypes/addRoomType') ?>">Add
                                New
                                RoomType</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-bed"></i>

                            <!-- <i data-feather="home"></i> -->
                            <!-- <i data-feather="key"></i> -->
                            <!-- <i data-feather="bed"></i> -->

                            <!-- <i class="ph-duotone ph-package"></i> -->

                        </span>
                        <span class="pc-mtext">Rooms</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">

                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/rooms/roomList') ?>">Room
                                List</a></li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/rooms/addRoom') ?>">Add New
                                Room</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-coins"></i>

                        </span>
                        <span class="pc-mtext">Expenses</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">

                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/expenses/expenseList') ?>">Expense
                                List</a></li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/expenses/addExpense') ?>">Add New
                                Expense</a></li>
                    </ul>
                </li>



                <!-- 
                <li class="pc-item pc-caption">
                    <label>Pages</label>
                    <i class="ph-duotone ph-devices"></i>
                </li>

            </ul>
            <div class="card nav-action-card bg-brand-color-4">
                <div class="card-body" style="background-image: url('../assets/images/layout/nav-card-bg.svg')">
                    <h5 class="text-dark">Help Center</h5>
                    <p class="text-dark text-opacity-75">Please contact us for more questions.</p>
                    <a href="https://phoenixcoded.support-hub.io/" class="btn btn-primary" target="_blank">Go to help
                        Center</a>
                </div>
            </div> -->
        </div>
        <div class="card pc-user-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <!-- <img src="<?= urlOf('assets/images/user/') . $row["Image"]; ?>" alt="user-image"
                            class="user-avtar wid-45 rounded-circle" /> -->
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="dropdown">
                            <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-offset="0,20">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <h6 class="mb-0"><?= $name?></h6>
                                        <small><?= $role?></small>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="btn btn-icon btn-link-secondary avtar">
                                            <i class="ph-duotone ph-windows-logo"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li>
                                        <a class="pc-user-links" href="<?= urlOf('pages/user/profile') ?>">
                                            <i class="ph-duotone ph-user"></i>
                                            <span>My Account</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a class="pc-user-links">
                                            <i class="ph-duotone ph-gear"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li> -->
                                    <!-- <li>
                                        <a class="pc-user-links">
                                            <i class="ph-duotone ph-lock-key"></i>
                                            <span>Lock Screen</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a class="pc-user-links" href="<?= urlOf('api/authentication/logout') ?>">
                                            <i class="ph-duotone ph-power"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->


<!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper">
        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item d-inline-flex d-md-none">
                    <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-magnifying-glass"></i>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="mb-0 d-flex align-items-center">
                                <input type="search" class="form-control border-0 shadow-none"
                                    placeholder="Search..." />
                                <button class="btn btn-light-secondary btn-search">Search</button>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="pc-h-item d-none d-md-inline-flex">
                    <form class="form-search">
                        <i class="ph-duotone ph-magnifying-glass icon-search"></i>
                        <input type="search" class="form-control" placeholder="Search..." />

                        <button class="btn btn-search" style="padding: 0"><kbd>ctrl+k</kbd></button>
                    </form>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <!-- <li class="dropdown pc-h-item d-none d-md-inline-flex">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-circles-four"></i>
                    </a>
                    <div class="dropdown-menu dropdown-qta dropdown-menu-end pc-h-dropdown">
                        <div class="overflow-hidden">
                            <div class="qta-links m-n1">
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-shopping-cart"></i>
                                    <span>E-commerce</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-lifebuoy"></i>
                                    <span>Helpdesk</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-scroll"></i>
                                    <span>Invoice</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-books"></i>
                                    <span>Online Courses</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-envelope-open"></i>
                                    <span>Mail</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-identification-badge"></i>
                                    <span>Membership</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-chats-circle"></i>
                                    <span>Chat</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-currency-circle-dollar"></i>
                                    <span>Plans</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ph-duotone ph-user-circle"></i>
                                    <span>Users</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li> -->
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-sun-dim"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                            <i class="ph-duotone ph-moon"></i>
                            <span>Dark</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                            <i class="ph-duotone ph-sun-dim"></i>
                            <span>Light</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                            <i class="ph-duotone ph-cpu"></i>
                            <span>Default</span>
                        </a>
                    </div>
                </li>
                <li class="pc-h-item">
                    <a class="pc-head-link pct-c-btn" href="#" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvas_pc_layout">
                        <i class="ph-duotone ph-gear-six"></i>
                    </a>
                </li>
                <!-- <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-diamonds-four"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-user"></i>
                            <span>My Account</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-gear"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-lifebuoy"></i>
                            <span>Support</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-lock-key"></i>
                            <span>Lock Screen</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-power"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li> -->
                <!-- <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-bell"></i>
                        <span class="badge bg-success pc-h-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Notifications</h5>
                            <ul class="list-inline ms-auto mb-0">
                                <li class="list-inline-item">
                                    <a href="../application/mail.html" class="avtar avtar-s btn-link-hover-primary">
                                        <i class="ti ti-link f-18"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-body text-wrap header-notification-scroll position-relative"
                            style="max-height: calc(100vh - 235px)">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="text-span">Today</p>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="<?= urlOf('assets/images/user/avatar-2.jpg') ?>" alt="user-image"
                                                class="user-avtar avtar avtar-s" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Keefe Bond added new tags to 💪
                                                        Design system</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">2 min ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s.</span></p>
                                            <span class="badge bg-light-primary border border-primary me-1 mt-1">web
                                                design</span>
                                            <span
                                                class="badge bg-light-warning border border-warning me-1 mt-1">Dashobard</span>
                                            <span class="badge bg-light-success border border-success me-1 mt-1">Design
                                                System</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-primary">
                                                <i class="ph-duotone ph-chats-teardrop f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Message</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">1 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s.</span></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <p class="text-span">Yesterday</p>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-danger">
                                                <i class="ph-duotone ph-user f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Challenge invitation</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">12 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate"><strong> Jonny aber </strong> invites to join
                                                    the challenge</span></p>
                                            <button
                                                class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                                            <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-info">
                                                <i class="ph-duotone ph-notebook f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Forms</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">2 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2">Lorem Ipsum is simply dummy text of
                                                the printing and typesetting industry. Lorem Ipsum has been the
                                                industry's standard
                                                dummy text ever since the 1500s.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="<?= urlOf('assets/images/user/avatar-2.jpg') ?>" alt="user-image"
                                                class="user-avtar avtar avtar-s" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Keefe Bond added new tags to 💪
                                                        Design system</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">2 min ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s.</span></p>
                                            <button
                                                class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                                            <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-success">
                                                <i class="ph-duotone ph-shield-checkered f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h6 class="mb-0 text-truncate">Security</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm">5 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative mt-1 mb-2">Lorem Ipsum is simply dummy text of
                                                the printing and typesetting industry. Lorem Ipsum has been the
                                                industry's standard
                                                dummy text ever since the 1500s.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-footer">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="d-grid"><button class="btn btn-primary">Archive all</button></div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid"><button class="btn btn-outline-secondary">Mark all as
                                            read</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> -->
                <li class="dropdown pc-h-item header-user-profile">
                    <!-- <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="<?= urlOf('assets/images/user/') . $row["Image"]; ?>" alt="user-image"
                            class="user-avtar" />
                    </a> -->
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Profile</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative"
                                style="max-height: calc(100vh - 225px)">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <!-- <img src="<?= urlOf('assets/images/user/') . $row["Image"]; ?>"
                                                    alt="user-image" class="wid-50 rounded-circle" /> -->
                                            </div>
                                            <div class="flex-grow-1 mx-3">
                                                <!-- <h5 class="mb-0"><?= $row['Name'] ?></h5> -->
                                                <!-- <a class="badge custom"
                                                    href="mailto:carson.darrin@company.io"><?= $row['Email'] ?></a> -->
                                            </div>
                                            <span class="badge custom">PRO</span>
                                        </div>
                                    </li>
                                    <!-- <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-key"></i>
                                                <span>Change password</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-envelope-simple"></i>
                                                <span>Recently mail</span>
                                            </span>
                                            <div class="user-group">
                                                <img src="<?= urlOf('assets/images/user/avatar-1.jpg') ?>"
                                                    alt="user-image" class="avtar" />
                                                <img src="<?= urlOf('assets/images/user/avatar-2.jpg') ?>"
                                                    alt="user-image" class="avtar" />
                                                <img src="<?= urlOf('assets/images/user/avatar-3.jpg') ?>"
                                                    alt="user-image" class="avtar" />
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-calendar-blank"></i>
                                                <span>Schedule meetings</span>
                                            </span>
                                        </a>
                                    </li> -->
                                    <!-- <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-heart"></i>
                                                <span>Favorite</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-arrow-circle-down"></i>
                                                <span>Download</span>
                                            </span>
                                            <span class="avtar avtar-xs rounded-circle bg-danger text-white">10</span>
                                        </a>
                                    </li> -->
                                    <!-- <li class="list-group-item">
                                        <div class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-globe-hemisphere-west"></i>
                                                <span>Languages</span>
                                            </span>
                                            <span class="flex-shrink-0">
                                                <select
                                                    class="form-select bg-transparent form-select-sm border-0 shadow-none">
                                                    <option value="1">English</option>
                                                    <option value="2">Spain</option>
                                                    <option value="3">Arbic</option>
                                                </select>
                                            </span>
                                        </div>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-flag"></i>
                                                <span>Country</span>
                                            </span>
                                        </a>
                                        <div class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-moon"></i>
                                                <span>Dark mode</span>
                                            </span>
                                            <div class="form-check form-switch form-check-reverse m-0">
                                                <input class="form-check-input f-18" id="dark-mode" type="checkbox"
                                                    onclick="dark_mode()" role="switch" />
                                            </div>
                                        </div>
                                    </li> -->
                                    <!-- <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-user-circle"></i>
                                                <span>Edit profile</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-star text-warning"></i>
                                                <span>Upgrade account</span>
                                                <span
                                                    class="badge bg-light-success border border-success ms-2">NEW</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-bell"></i>
                                                <span>Notifications</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-gear-six"></i>
                                                <span>Settings</span>
                                            </span>
                                        </a>
                                    </li> -->
                                    <li class="list-group-item">
                                        <a href="<?= urlOf('pages/user/profile') ?>" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <!-- <i class="ph-duotone ph-plus-circle"></i> -->
                                                <i class="ph-duotone ph-user-circle"></i>
                                                <span>My Profile</span>
                                            </span>
                                        </a>
                                        <a href="<?= urlOf('') ?>" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <!-- <i class="ph-duotone ph-plus-circle"></i> -->
                                                <i class="ph-duotone ph-squares-four"></i>
                                                <span>Dashboard</span>
                                            </span>
                                        </a>
                                        <hr>
                                        <a href="<?= urlOf('api/authentication/logout') ?>" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-power"></i>
                                                <span>Logout</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- [ Header ] end -->