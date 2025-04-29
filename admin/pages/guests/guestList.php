<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$query="SELECT * FROM `guests`";
$rows=select($query);
$index=1;



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
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Guest</a></li>
                            <li class="breadcrumb-item" aria-current="page">Guest List</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Guest List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card border-0 table-card user-profile-list">
                    <div class="card-body">
                        <div class="text-end p-sm-4 pb-sm-2">
                            <a href="<?= urlOF('pages/guests/addGuest') ?>" class="btn custom"> <i
                                    class="ti ti-plus f-18"></i>Add
                                Guest
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>mobileno.</th>
                                        <th>E-mail</th>
                                        <th>Address</th>
                                        <th>Check-In-Date</th>
                                        <th>Check-Out-Date</th>
                                        <th>Alloted Room No.</th>
                                        <th>TotalAmount</th>
                                        <th>Status</th>
                                        <th>operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($rows as $row) {?>
                                    <tr>
                                        <th><?= $index++ ?></th>
                                        <td>
                                            <div class="text-center">
                                                <div class="col-auto pe-0">
                                                    <img src="<?=  "../../assets/images/guests/" . $row["Image"]; ?>"
                                                        alt="user-image" class="wid-40 rounded" />
                                                </div>
                                                <!-- <div class="col">
                                                    <h6 class="mb-1">Wheat</h6>
                                                </div> -->
                                            </div>
                                        </td>
                                        <?php
                                        $id1 = $row['Id'];
                                        $query1 = "SELECT * FROM `guestrooms` WHERE GuestId = ?";
                                        $param1 = [$id1];
                                        $row1 = select($query1, $param1);
                                         ?>
                                        <td><?= $row['Name'] ?></td>
                                        <td><?= $row['Mobile'] ?></td>
                                        <td><?= $row['Email'] ?></td>
                                        <td><?= $row['Address'] ?></td>
                                        <td><?= $row['CheckInDate'] ?></td>
                                        <td><?= $row['CheckOutDate'] ?></td>
                                        <td>

                                            <?php if (!empty($row1)) { // Check if there are any rooms associated with the guest ?>
                                            <?php foreach ($row1 as $room) { ?>
                                            <p class="mb-0 text-primary"><?= $room['RoomNo'] ?></p>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <p class="mb-0 text-muted">No rooms assigned to this guest.</p>
                                            <?php } ?>
                                        </td>
                                        
                                        <td><?= $row['TotalBill'] ?></td>
                                        <td><?= $row['Status'] ?></td>
                                        <?php if($row['Status'] == "active") { ?>
                                        <td> <a href="checkOut?guestId=<?= $row['Id'] ?>" class="btn custom">CheckOut
                                            </a></td><?php } ?>
                                        <td>
                                            <div class="overlay-edit">
                                                <ul class="list-inline mb-0">
                                                <?php if($row['Status']== "active") { ?>
                                                    <!-- <li class="list-inline-item m-0"><a
                                                            href="update ?updateId=<?= $row['Id'] ?>"
                                                            class="avtar avtar-s btn custom"><i
                                                                class="ti ti-pencil f-18"></i></a></li> -->
                                                                <?php } ?>
                                                    <!-- <li class="list-inline-item m-0"><a
                                                            href="../../api/guests/delete?deleteId=<?= $row['Id'] ?>"
                                                            class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                class="ti ti-trash f-18"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <!-- <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <img src="<?= urlOf('assets/images/user/avatar-5.jpg') ?>"
                                                    alt="user image" class="img-radius align-top m-r-15"
                                                    style="width: 40px" />
                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0">Brielle Williamson</h6>
                                                    <p class="m-b-0 text-primary">Android developer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>
                                            <span class="badge bg-light-danger">Disabled</span>
                                            <div class="overlay-edit">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item m-0"><a href="#"
                                                            class="avtar avtar-s btn btn-primary"><i
                                                                class="ti ti-pencil f-18"></i></a></li>
                                                    <li class="list-inline-item m-0"><a href="#"
                                                            class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                class="ti ti-trash f-18"></i></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php

include pathOf("includes/footer.php");
include pathOf("includes/script.php");
include pathOf("includes/pageEnd.php");

?>