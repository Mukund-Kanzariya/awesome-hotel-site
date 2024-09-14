<?php   

// session_start();

// if(!isset($_SESSION['userId'])){
//     header("Location:../authentication/login.php");
// }


require '../../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

$query = "SELECT 
    product.Id,
    product.Name,
    product.Description,
    product.Price,
    product.Image,
    category.CategoryName as CategoryId
FROM product
INNER JOIN category ON product.CategoryId = category.Id";

$result=mysqli_query($conn,$query);

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
                                        <th class="text-center">Room Image</th>
                                        <th class="text-center">Room Type</th>
                                        <th class="text-center">Room No.</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Price</th>
                                        <!-- <th class="text-end">Price</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row=mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td class="text-center"><?= $index++ ?></td>
                                        <td>
                                            <div class="text-center">
                                                <div class="col-auto pe-0">
                                                    <img src="<?=  "../../assets/images/product/" . $row["Image"]; ?>"
                                                        alt="user-image" class="wid-40 rounded" />
                                                </div>
                                                <!-- <div class="col">
                                                    <h6 class="mb-1">Wheat</h6>
                                                </div> -->
                                            </div>
                                        </td>
                                        <td class="text-center"><?= $row['Name'] ?></td>
                                        <td class="text-center"><?= $row['CategoryId'] ?></td>
                                        <td class="text-center"><?= $row['Description'] ?></td>
                                        <td class="text-center"><?= $row['Price'] ?></td>
                                        <td class="text-center">
                                            <div class="prod-action-links">
                                                <ul class="list-inline me-auto mb-0">
                                                    <!-- <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                        title="View">
                                                        <a href="#"
                                                            class="avtar avtar-xs btn-link-secondary btn-pc-default"
                                                            data-bs-toggle="offcanvas"
                                                            data-bs-target="#productOffcanvas">
                                                            <i class="ti ti-eye f-18"></i>
                                                        </a>
                                                    </li> -->
                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                        title="Edit">
                                                        <a href="update?updateId=<?= $row['Id'] ?>"
                                                            class="avtar avtar-xs btn-link-success btn-pc-default">
                                                            <i class="ti ti-edit-circle f-18"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                        title="Delete">
                                                        <a href="../../api/product/delete?deleteId=<?= $row['Id'] ?>"
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