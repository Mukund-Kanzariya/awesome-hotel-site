<?php   

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

$query = "SELECT 
    rooms.Id,
    rooms.RoomNumber,
    rooms.Description,
    rooms.AcNonAc,
    rooms.Capacity,
    rooms.IsAvailable,
    roomTypes.Name as RoomTypeId
FROM rooms
INNER JOIN roomTypes ON rooms.RoomTypeId = roomtypes.Id";

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
                            <li class="breadcrumb-item"><a href="<?= urlOf('/') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Room</a></li>
                            <li class="breadcrumb-item" aria-current="page">Room list</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Room list</h2>
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
                <div class="card table-card">
                    <div class="card-body">
                        <div class="text-end p-sm-4 pb-sm-2">
                            <a href="<?= urlOf('pages/rooms/addRoom') ?>" class="btn custom"> <i
                                    class="ti ti-plus f-18"></i> Add
                                Room
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover tbl-product" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th class="text-center">sr.no</th>
                                        <th class="text-center">Room Type</th>
                                        <th class="text-center">Room.no</th>
                                        <th class="text-center">AC-NonAc</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Capacity</th>
                                        <th class="text-center">Is Available</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($rows as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $index++ ?></td>
                                        <td class="text-center"><?= $row['RoomTypeId'] ?></td>
                                        <td class="text-center"><?= $row['RoomNumber'] ?></td>
                                        <td class="text-center"><?= $row['AcNonAc'] ?></td>
                                        <td class="text-center"><?= $row['Description'] ?></td>
                                        <td class="text-center"><?= $row['Capacity'] ?></td>
                                        <td class="text-center">
                                            <?php 
                                                  if($row['IsAvailable'] == 1) { 
                                                      echo "Available"; 
                                                  } else { 
                                                      echo "Booked"; 
                                                  } 
                                                  ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="prod-action-links">
                                                <ul class="list-inline me-auto mb-0">

                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                        title="Edit">
                                                        <a href="update?updateId=<?= $row['Id'] ?>"
                                                            class="avtar avtar-xs btn-link-success btn-pc-default">
                                                            <i class="ti ti-edit-circle f-18"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                        title="Delete">
                                                        <a href="../../api/rooms/delete?deleteId=<?= $row['Id'] ?>"
                                                            class="avtar avtar-xs btn-link-danger btn-pc-default">
                                                            <i class="ti ti-trash f-18"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
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

<?php

include pathOf('includes/footer.php');
include pathOf('includes/script.php');
include pathOf('includes/pageEnd.php');

?>