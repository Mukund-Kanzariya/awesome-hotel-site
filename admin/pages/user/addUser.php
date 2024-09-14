<?php

// session_start();

// if(!isset($_SESSION['userId'])){
//     header("Location:../authentication/login.php");
// }


require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");


$query = "SELECT * FROM role";
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">User</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add New User</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Add New User</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->

        <form action="../../api/user/insert" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>User Details</h5>
                        </div>



                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">Select Role</label>
                                <select class="form-select" name="role">
                                    <option disabled selected>Select Role</option>
                                    <?php while($row=mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?= $row['Id'] ?>" require><?= $row['Rolename'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" require
                                    autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">MobileNumber</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile No." name="mobile"
                                    require />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control" placeholder="Enter E-mail" name="email"
                                    require />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>User image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <p><span class="text-danger">*</span> Recommended Passport-Size Image</p>
                                <!-- <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i> -->
                                <!-- Click to Upload</label> -->
                                <input type="file" class="form-control mb-3" name="image" require>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Addressing</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" placeholder="Enter Address" name="address"
                                    require></textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" placeholder="Enter City" name="city" require />
                            </div>
                            <div class="mb-0">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" placeholder="Enter State" name="state"
                                    require />
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5> For Login </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <label class="form-label">UserName</label>
                                <input type="text" class="form-control" placeholder="Enter UserName" name="username"
                                    require />
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Enter Password" name="password"
                                    require />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" name="submit" value="submit">Add User</button>
                        </div>
                    </div>
                </div>
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