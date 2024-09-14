<?php

session_start();

// if(!isset($_SESSION['userId'])){
//     header("Location:../authentication/login.php");
// }


require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$query="SELECT * FROM category";
$result=mysqli_query($conn,$query);

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Guests</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add New Guest</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Add New Guest</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <form action="../../api/product/insert" method="post" enctype="multipart/form-data">

            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Guest description</h5>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">Room No.</label>
                                <select class="form-select" name="category">
                                    <option disable selected>Select Room No.</option>
                                    <?php
                                while($row=mysqli_fetch_assoc($result)) {?>
                                    <option value="<?php echo $row['Id'];?>"><?php echo $row['CategoryName'];?></option>
                                    <?php }?>
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile No.</label>
                                <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter E-mail" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter address" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter City" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" name="state" placeholder="Enter State" />
                            </div>

                        </div>
                    </div>


                </div>

                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-header">
                            <h5>Date-Time</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Check-In-Time</label>
                                        <input type="date" class="form-control" name="checkout"
                                            placeholder="Enter Check In Date" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Check-Out-Time</label>
                                        <input type="date" class="form-control" name="checkout"
                                            placeholder="Enter Check In Date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5>Pricing</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">Price <i
                                                class="ph-duotone ph-info ms-1" data-bs-toggle="tooltip"
                                                data-bs-title="Price"></i></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" placeholder="Price" name="price" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5>Guest image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <!-- <p><span class="text-danger">*</span> Recommended resolution is 640*640 with file size</p> -->
                                <!-- <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i> -->
                                <!-- Click to Upload</label> -->
                                <input type="file" class="form-control mb-3" name="image">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" name="submit" value="submit">Add Room</button>
                        </div>
                    </div> -->

                </div>


                <!-- <div class="col-xl-6">

                    <div class="card">
                        <div class="card-header">
                            <h5>Room image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <p><span class="text-danger">*</span> Recommended resolution is 640*640 with file size</p>
                                <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i>
                                Click to Upload</label>
                                <input type="file" class="form-control mb-3" name="image">
                            </div>
                        </div>
                    </div>

                </div> -->

                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" name="submit" value="submit">Add Guest</button>
                        </div>
                    </div>
                </div>


                <!-- [ sample-page ] end -->
            </div>
        </form>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php

include pathOf("includes/footer.php");
include pathOf("includes/script.php");
include pathOf("includes/pageEnd.php");

?>