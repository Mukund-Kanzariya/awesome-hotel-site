<?php

// session_start();

// if(!isset($_SESSION['userId'])){
//     header("Location:../authentication/login.php");
// }


require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$id=$_GET['updateId'];

$query = " SELECT 
    user.Id,
    user.RoleId,
    user.Name, 
    user.MobileNumber, 
    user.Email, 
    user.Address, 
    user.City, 
    user.State, 
    user.Username, 
    user.Password, 
    user.Image,
    role.Rolename AS RoleId
FROM 
    `user` 
INNER JOIN 
    `role` 
ON 
    user.RoleId = role.Id WHERE user.Id = '$id'";

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

// $query="SELECT * FROM `user` WHERE Id = '$id'";

// $row=mysqli_fetch_array($result);

$query1="SELECT * FROM `role`";
$result1=mysqli_query($conn,$query1);

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
                            <li class="breadcrumb-item" aria-current="page">Update User</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Update User</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->

        <form action="../../api/user/update" method="post"  enctype="multipart/form-data">
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>User Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?=  $row['Id'] ?>">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                    value="<?= $row['Name'] ?>" autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Role</label>
                                <select class="form-select" name="role">
                                    <option disable selected><?= $row['RoleId'] ?></option>
                                    <?php while($row1=mysqli_fetch_assoc($result1)) { ?>
                                    <option value="<?= $row1['Id'] ?>"><?= $row1['Rolename'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">MobileNumber</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile No." name="mobile"
                                    value="<?= $row['MobileNumber'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control" placeholder="Enter E-mail" name="email"
                                    value="<?= $row['Email'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>User image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <!-- <p><span class="text-danger">*</span> Recommended resolution is 640*640 with file size -->
                                <!-- </p> -->
                                <!-- <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i> -->
                                <!-- Click to Upload</label> -->
                                <input type="hidden" class="form-control" name="oldimage" value="<?= $row["Image"]; ?>">
                                <img src="<?= "../../assets/images/user/" . $row["Image"]; ?>" width="150px">
                                <input type="file" class="form-control mb-3" name="user_image">
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
                                <input type="text" class="form-control" placeholder="Enter Address" name="address"
                                    value="<?= $row['Address'] ?>">
                            </div>
                            <div class="mb-0">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" placeholder="Enter City" name="city"
                                    value="<?= $row['City'] ?>" />
                            </div>
                            <div class="mb-0">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" placeholder="Enter State" name="state"
                                    value="<?= $row['State'] ?>" />
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
                                <input type="text" class="form-control" placeholder="Set UserName" name="username" value="<?= $row['Username'] ?>"/>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Set Password" name="password" value="<?= $row['Password'] ?>"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn btn-primary mb-0" name="submit" value="submit">Update User</button>
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