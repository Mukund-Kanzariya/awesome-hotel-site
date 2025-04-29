<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$id=$_GET['guestId'];

$query="SELECT * FROM `guests` WHERE Id=? ";
$param=[$id];
$row=selectOne($query,$param);

$id1 = $row['Id'];
$query1 = "SELECT * FROM `guestrooms` WHERE GuestId = ?";
$param1 = [$id1];
$row1 = select($query1, $param1); // Use select() for multiple rows

    
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
                            <li class="breadcrumb-item" aria-current="page">CheckOut </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">CheckOut Guest</h2>
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
                                    <h5 class="mb-0"><?= $row['Name'] ?></h5>
                                    <p class="mb-0 text-muted me-1">Room No.: </p>
                                    <?php foreach ($row1 as $roomno) { ?>
                                    <p class="mb-0 text-primary"><?= $roomno['RoomNo'] ?></p>
                                    <?php } ?>

                                    <!-- <p class="text-muted text-sm"><?= $row['RoomNo'] ?></p> -->
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
                                    <p class="mb-0"><?= $row['Address'] ?></p>
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
                                                        <p class="mb-1 text-muted">Check-In-Date</p>
                                                        <p class="mb-0"><?= $row['CheckInDate'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Check-Out-Date</p>
                                                        <p class="mb-0"><?= $row['CheckOutDate'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-1 text-muted">Total Amount</p>
                                                    <p class="mb-0"><?= $row['TotalBill'] ?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-1 text-muted">Status</p>
                                                    <p class="mb-0"><?php echo "Check Outing..."; ?></p>
                                                </div>
                                            </div>
                                            <li class="list-group-item px-0 pb-0">

                                                <div class="card-body text-end btn-page">
                                                    <button type="button" class="btn custom mb-0"
                                                        onclick="sendData()">CheckOut
                                                        Guest</button>
                                                </div>

                                                <!-- <p class="mb-0">
                                                    <?= $row['Address'].','.$row['City'].','.$row['State'] ?></p> -->
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

?>

<script>
function sendData() {
    $.ajax({
        url: '../../api/guests/checkOut',
        type: 'POST',
        data: {
            id: '<?= $row['Id']; ?>', // Sending guest Id from PHP
            roomno: <?= json_encode(array_column($row1, 'RoomNo')); ?> // Sending room numbers as a JSON array
        },
        success: function(response, status, xhr) {
            if (xhr.status == 200) {
                alert("Guest successfully Checked Out!");
                window.location.href = "../../pages/guests/guestList";
            } else {
                alert("Error on checking out guest. Please try again.");
            }
        },
        error: function(xhr, status, error) {
            console.log("Error: " + error);
            alert("Error occurred. Please try again.");
        }
    });
}
</script>


<?php

 include pathOf("includes/pageEnd.php");
 
 ?>