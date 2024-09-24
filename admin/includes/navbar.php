<?php 

require_once 'init.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userId'])) {
    $id = $_SESSION['userId'];
    
    $query="SELECT users.Id,users.Name,users.Mobile,users.Email,users.Image,users.Address,users.City,users.State,users.UserName,users.Password,roles.Name AS RoleId FROM `users` INNER JOIN `roles` ON `users`.RoleId=`roles`.Id  WHERE users.Id=?";
    $param=[$id];
    $row=selectOne($query,$param);
    
    if ($row) {
        $name = $row['UserName'];
        $role = $row['RoleId'];
    } else {
        echo "<script>
            alert('User not found.');
        </script>";
    }
} else {
    echo "<script>
        alert('User ID is not set.');
    </script>";
}

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
                <!-- <li class="pc-item pc-hasmenu">
                    <a href="<?= urlOf('index') ?>" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-squares-four"></i>

                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li> -->
                <!-- <li class="pc-item pc-hasmenu">
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
                </li> -->

                <li class="pc-item pc-hasmenu">
                    <a class="pc-link">
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
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/users/profile') ?>">Account
                                Profile</a></li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/users/userList') ?>">User List</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="<?= urlOf('pages/users/addUser') ?>">Add New
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


        </div>
        <div class="card pc-user-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="<?= urlOf('assets/images/users/') . $row["Image"]; ?>" alt="user-image"
                            class="user-avtar wid-45 rounded-circle" />
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="dropdown">
                            <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-offset="0,20">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <h6 class="mb-0"><?= $name ?></h6>
                                        <small><?= $role ?></small>
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
                                        <a class="pc-user-links" href="<?= urlOf('pages/users/profile') ?>">
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
                
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="<?= urlOf('assets/images/users/') . $row["Image"]; ?>" alt="user-image"
                            class="user-avtar" />
                    </a>
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
                                                <img src="<?= urlOf('assets/images/users/') . $row["Image"]; ?>"
                                                    alt="user-image" class="wid-50 rounded-circle" />
                                            </div>
                                            <div class="flex-grow-1 mx-3">
                                                <h5 class="mb-0"><?= $row['Name'] ?></h5>
                                                <a class="badge custom"
                                                    href="mailto:carson.darrin@company.io"><?= $row['Email'] ?></a>
                                            </div>
                                            <span class="badge custom">PRO</span>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="<?= urlOf('pages/users/profile') ?>" class="dropdown-item">
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