<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:./pages/authentication/login");
}


require './includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

$query = " SELECT 
    users.Id,
    users.Name, 
    users.Mobile, 
    users.Email, 
    users.Image,
    users.Address, 
    users.City, 
    users.State, 
    users.Username, 
    users.Password, 
    roles.Name AS RoleId
FROM 
    `users` 
INNER JOIN 
    `roles` 
ON 
    users.RoleId = roles.Id;
";

$rows = select($query);

$index=1;

$query1="SELECT * FROM `guests` WHERE Status = 'active' ORDER BY CheckInDate DESC";
$rows1 = select($query1);


$query2="SELECT COUNT(*) as count FROM `guests`";

$row2 = selectOne($query2);

$count = $row2['count'];

$query3="SELECT COUNT(*) as count FROM `rooms`";

$row3 = selectOne($query3);

$rooms = $row3['count'];


?>


<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Home</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-4.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4">Total Guests</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><?= $count ?></h3>
                            <!-- <span class="badge bg-light-success ms-2">36%</span> -->
                        </div>
                        <!-- <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this daily</p>
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-5.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4">Total Roooms</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><?= $rooms ?></h3>
                            <span class="badge bg-light-primary ms-2"></span>
                        </div>
                        <!-- <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this </p>
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <?php $queryactiveguest="SELECT COUNT(*) as count FROM `guests` WHERE `Status` = 'active'";

                $rowactiveguest = selectOne($queryactiveguest);

                $activeguest = $rowactiveguest['count'];  ?>

                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-4.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4">Active Guests</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><?= $activeguest ?></h3>
                            <!-- <span class="badge bg-light-success ms-2">36%</span> -->
                        </div>
                        <!-- <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this daily</p>
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <?php
                $queryavailablerooms="SELECT COUNT(*) as count FROM `rooms` WHERE `IsAvailable` = TRUE";

                $rowavailablerooms = selectOne($queryavailablerooms);
                
                $availablerooms = $rowavailablerooms['count'];
                ?>
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-5.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4">Available Rooms</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><?= $availablerooms ?></h3>
                            <span class="badge bg-light-primary ms-2"></span>
                        </div>
                        <!-- <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this </p>
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4 col-sm-12">
                <div class="card statistics-card-1 overflow-hidden bg-brand-color-3">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-6.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4 text-white">Yearly Sales</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">$249.95</h3>
                        </div>
                        <p class="text-white text-opacity-75 mb-2 text-sm mt-3">You made an extra 35,000 this Daily</p>
                        <div class="progress bg-white bg-opacity-10" style="height: 7px">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-6 col-xl-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Users From United States</h5>
                    </div>
                    <div class="card-body">
                        <div id="world-map-markers" class="set-map" style="height: 365px"></div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-6 col-xl-5">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5>Users From United States</h5>
                        <div class="dropdown">
                            <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons-two-tone f-18">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avtar avtar-s bg-light-primary flex-shrink-0">
                                <i class="ph-duotone ph-money f-20"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0 text-muted">Total Earnings</p>
                                <h5 class="mb-0">$249.95</h5>
                            </div>
                        </div>
                        <div id="earnings-users-chart"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avtar avtar-s bg-light-warning flex-shrink-0">
                                        <i class="ph-duotone ph-lightning f-20"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <p class="mb-0 text-muted">Total ideas</p>
                                        <h6 class="mb-0">235</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avtar avtar-s bg-light-danger flex-shrink-0">
                                        <i class="ph-duotone ph-map-pin f-20"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <p class="mb-0 text-muted">Total location</p>
                                        <h6 class="mb-0">26</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-7.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <div class="d-flex align-items-center">
                            <img src="<?= urlOf('assets/images/widget/img-facebook.svg') ?>" alt="img"
                                class="img-fluid" />
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0 text-muted">Total Likes</p>
                                <div class="d-inline-flex align-items-center">
                                    <h5 class="f-w-300 d-flex align-items-center m-b-0">12,281</h5>
                                    <span class="badge bg-success ms-2">+7.2%</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mt-5 text-center">
                            <div class="col-6">
                                <p class="mb-0 text-muted">Target</p>
                                <h5 class="mb-0">35,098</h5>
                            </div>
                            <div class="col-6 border-start">
                                <p class="mb-0 text-muted">Duration</p>
                                <h5 class="mb-0">3,539</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-8.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <div class="d-flex align-items-center">
                            <img src="<?= urlOf('assets/images/widget/img-google.svg') ?>" alt="img"
                                class="img-fluid" />
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0 text-muted">Total Likes</p>
                                <div class="d-inline-flex align-items-center">
                                    <h5 class="f-w-300 d-flex align-items-center m-b-0">12,281</h5>
                                    <span class="badge bg-success ms-2">+5.9%</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mt-5 text-center">
                            <div class="col-6">
                                <p class="mb-0 text-muted">Target</p>
                                <h5 class="mb-0">35,098</h5>
                            </div>
                            <div class="col-6 border-start">
                                <p class="mb-0 text-muted">Duration</p>
                                <h5 class="mb-0">3,539</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-9.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <div class="d-flex align-items-center">
                            <img src="<?= urlOf('assets/images/widget/img-twitter.svg') ?>" alt="img"
                                class="img-fluid" />
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0 text-muted">Total Likes</p>
                                <div class="d-inline-flex align-items-center">
                                    <h5 class="f-w-300 d-flex align-items-center m-b-0">12,281</h5>
                                    <span class="badge bg-success ms-2">+6.2%</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mt-5 text-center">
                            <div class="col-6">
                                <p class="mb-0 text-muted">Target</p>
                                <h5 class="mb-0">35,098</h5>
                            </div>
                            <div class="col-6 border-start">
                                <p class="mb-0 text-muted">Duration</p>
                                <h5 class="mb-0">3,539</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5>Recent Users</h5>
                        <div class="dropdown">
                            <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons-two-tone f-18">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2 class="mb-3"><b>4.7<small class="text-muted f-18">/5</small></b></h2>
                            <div class="star mb-3 f-20">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            </div>
                        </div>
                        <div class="row align-items-center g-3 mb-2">
                            <div class="col-auto">
                                <h6 class="mb-0">5 <i class="fas fa-star text-warning"></i></h6>
                            </div>
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar bg-primary" style="width: 70%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0 text-muted">384</p>
                            </div>
                        </div>
                        <div class="row align-items-center g-3 mb-2">
                            <div class="col-auto">
                                <h6 class="mb-0">4 <i class="fas fa-star text-warning"></i></h6>
                            </div>
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar bg-primary" style="width: 55%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0 text-muted">145</p>
                            </div>
                        </div>
                        <div class="row align-items-center g-3 mb-2">
                            <div class="col-auto">
                                <h6 class="mb-0">3 <i class="fas fa-star text-warning"></i></h6>
                            </div>
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar bg-primary" style="width: 40%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0 text-muted">24</p>
                            </div>
                        </div>
                        <div class="row align-items-center g-3 mb-2">
                            <div class="col-auto">
                                <h6 class="mb-0">2 <i class="fas fa-star text-warning"></i></h6>
                            </div>
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar bg-primary" style="width: 25%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0 text-muted">1</p>
                            </div>
                        </div>
                        <div class="row align-items-center g-3">
                            <div class="col-auto">
                                <h6 class="mb-0">1 <i class="fas fa-star text-warning"></i></h6>
                            </div>
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar bg-primary" style="width: 10%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0 text-muted">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-6 col-xl-12">
                <div class="card table-card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5>Admin Users</h5>
                        <!-- <div class="dropdown">
                            <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons-two-tone f-18">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Edit</a>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-body py-2 px-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-sm mb-0">
                                <tbody>
                                    <?php  foreach($rows as $row) {?>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <img src="<?=  "./assets/images/users/" . $row['Image'];?>"
                                                    alt="user image" class="img-radius align-top m-r-15"
                                                    style="width: 40px" />
                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0"><?= $row['Username'] ?></h6>
                                                    <p class="m-b-0"><?= $row['RoleId'] ?></p>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['Mobile'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['Email'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['Address'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['City'] ?></h6>
                                            </div>
                                        </td>
                                        <!-- <td>
                                            <p class="mb-0"><i class="ph-duotone ph-circle text-warning f-12"></i> 11
                                                may 12:30
                                            </p>
                                        </td> -->
                                        <!-- <td class="text-end">
                                            <button class="btn avtar avtar-xs btn-light-danger"><i
                                                    class="ti ti-x"></i></button>
                                            <button class="btn avtar avtar-xs btn-light-success"><i
                                                    class="ti ti-check"></i></button>
                                        </td> -->
                                    </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-12">
                <div class="card table-card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5>Recent Guests</h5>
                        <!-- <div class="dropdown">
                            <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons-two-tone f-18">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Edit</a>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-body py-2 px-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-sm mb-0">
                                <tbody>
                                    <?php foreach($rows1 as $row) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <img src="<?=  "./assets/images/guests/" . $row['Image'];?>"
                                                    alt="user image" class="img-radius align-top m-r-15"
                                                    style="width: 40px" />
                                                <div class="d-inline-block">
                                                    <p class="m-b-0"><?= $row['Name'] ?></p>
                                                    <h6 class="m-b-0">GuestId: <?= $row['Id'] ?></h6>
                                                </div>
                                            </div>

                                        </td>
                                        <?php
                                             $guestid = $row['Id'];
                                             $query1 = "SELECT * FROM `guestrooms` WHERE GuestId = ?";
                                             $param1 = [$guestid];
                                             $row1 = select($query1, $param1);
                                        ?>

                                        <td>
                                            <?php if (!empty($row1)) { // Check if there are any rooms associated with the guest ?>
                                            <?php foreach ($row1 as $room) { ?>
                                            <p class="mb-0 text-primary"><?= $room['RoomNo'] ?></p>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <p class="mb-0 text-muted">No rooms assigned to this guest.</p>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['Mobile'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['Email'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['Address'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['CheckInDate'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['CheckOutDate'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">rs.<?= $row['TotalBill'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0"><?= $row['CreatedAt'] ?></h6>
                                            </div>
                                        </td>
                                        <?php if($row['Status'] == "active") { ?>
                                        <td> <a href="pages/guests/checkOut?guestId=<?= $row['Id'] ?>"
                                                class="btn custom">CheckOut
                                            </a></td><?php } ?>

                                        <!-- <td>
                                            <p class="mb-0"><i class="ph-duotone ph-circle text-warning f-12"></i> 11
                                                may 12:30
                                            </p>
                                        </td> -->
                                        <!-- <td class="text-end">
                                            <button class="btn avtar avtar-xs btn-light-danger"><i
                                                    class="ti ti-x"></i></button>
                                            <button class="btn avtar avtar-xs btn-light-success"><i
                                                    class="ti ti-check"></i></button>
                                        </td> -->
                                    </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php
    
    include pathOf('includes/footer.php');
    include pathOf('includes/script.php');
    include pathOf('includes/pageEnd.php');
    
    ?>