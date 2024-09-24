<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

if(isset($_SESSION['userId'])){

    $id= $_SESSION['userId'];
    
    $query="SELECT users.Id,users.Name,users.Mobile,users.Email,users.Image,users.Address,users.City,users.State,users.UserName,users.Password,roles.Name AS RoleId FROM `users` INNER JOIN `roles` ON `users`.RoleId=`roles`.Id  WHERE users.Id=?";
    $param=[$id];
    $row=selectOne($query,$param);

}else{
    echo "<script>
    alert('userid is not set');
    </script>";
}

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                            <li class="breadcrumb-item" aria-current="page">Account Profile</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Account Profile</h2>
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
                <div class="row">
                    <div class="col-lg-5 col-xxl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body position-relative">
                                <div class="text-center mt-3">
                                    <div class="chat-avtar d-inline-flex mx-auto">
                                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                            src="<?= "../../assets/images/guests/" . $row["Image"]; ?>"
                                            alt="User image" />
                                        <i class="chat-badge bg-success me-2 mb-2"></i>
                                    </div>
                                    <h5 class="mb-0"><?= $row['UserName'] ?></h5>
                                    <p class="text-muted text-sm"><?= $row['RoleId'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Personal information</h5>
                            </div>
                            <div class="card-body position-relative">
                                <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                    <p class="mb-0 text-muted me-1">Email: </p>
                                    <p class="mb-0"><?= $row['Email'] ?></p>
                                </div>
                                <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                    <p class="mb-0 text-muted me-1">Mobile: </p>
                                    <p class="mb-0"><?= $row['Mobile'] ?></p>
                                </div>
                                <div class="d-inline-flex align-items-center justify-content-between w-100">
                                    <p class="mb-0 text-muted me-1">Location</p>
                                    <p class="mb-0"><?= $row['City'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xxl-9">
                        <div class="tab-content" id="user-set-tabContent">
                            <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel"
                                aria-labelledby="user-set-profile-tab">

                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Full Name</p>
                                                        <p class="mb-0"><?= $row['Name'] ?></p>
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Father Name</p>
                                                        <p class="mb-0">Mr. Deepen Handgun</p>
                                                    </div> -->
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Mobile</p>
                                                        <p class="mb-0"><?= $row['Mobile'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Email</p>
                                                        <p class="mb-0"><?= $row['Email'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">City</p>
                                                        <p class="mb-0"><?= $row['City'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">State</p>
                                                        <p class="mb-0"><?= $row['State'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <p class="mb-1 text-muted">Address</p>
                                                <p class="mb-0">
                                                    <?= $row['Address'].','.$row['City'].','.$row['State'] ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            
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