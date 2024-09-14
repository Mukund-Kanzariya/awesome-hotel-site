<?php

// session_start();

// if(!isset($_SESSION['userId'])){
//     header("Location:../authentication/login.php");
// }


require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");


$query ="SELECT * FROM `category`";

$result = mysqli_query($conn,$query);

// $rows=mysqli_fetch_assoc($result);
// $rows=mysqli_fetch_array($result); bey sem j chhe at a time a single row return karse

// $total_records=mysqli_num_rows($result);

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">RoomType</a></li>
                            <li class="breadcrumb-item" aria-current="page">Room Type List</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">RoomType List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-6">
                <div class="card border-0 table-card user-profile-list">
                    <div class="card-body">
                        <div class="text-end p-sm-4 pb-sm-2">
                            <a href="<?=  urlOf('pages/roomTypes/addRoomType') ?>" class="btn custom"> <i class="ti ti-plus f-18"></i> Add
                                RoomType
                            </a>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>RoomType Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($rows=mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?= $index++ ?></td>
                                        <td><?= $rows['CategoryName'] ?>
                                            <div class="overlay-edit">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item m-0"><a href="update ?updateId=<?= $rows['Id'] ?>";
                                                            class="avtar avtar-s btn custom"><i
                                                                class="ti ti-pencil f-18"></i></a></li>
                                                    <li class="list-inline-item m-0"><a href="../../api/category/delete ?deleteId=<?= $rows['Id'] ?>"
                                                            class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                class="ti ti-trash f-18"></i></a></li>
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