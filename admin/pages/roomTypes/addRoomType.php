<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

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
                            <li class="breadcrumb-item" aria-current="page">Add New RoomType</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Add New RoomType</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-xl-6">
                <form>

                    <div class="card">
                        <div class="card-header">
                            <h5>RoomType Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Room Type Name</label>
                                <input type="text" class="form-control" placeholder="Enter Room Type Name" id="name"
                                    autofocus />
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
                                        <label class="form-label d-flex align-items-center"> Non-Ac Price<i
                                                class="ph-duotone ph-info ms-1" data-bs-toggle="tooltip"
                                                data-bs-title="Price"></i></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" placeholder="NonAC-Price"
                                                id="NonAcPrice" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center"> Ac Price <i
                                                class="ph-duotone ph-info ms-1" data-bs-toggle="tooltip"
                                                data-bs-title="Price"></i></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" placeholder="AC-Price"
                                                id="AcPrice" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" onclick="sendData()">Add RoomType</button>
                        </div>
                    </div>
                </form>
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
        url: '../../api/roomTypes/insert',
        method: 'POST',
        data: {
            name: $('#name').val(),
            nonacprice: $('#NonAcPrice').val(),
            acprice: $('#AcPrice').val()
        },
        success: function(response, status, xhr) {
            if (xhr.status == 200) {
                alert("Room Type added successfully!");
                window.location.href = "../../pages/roomTypes/roomList";
            } else {
                alert("Room Type not added. Please try again.");
                window.location.href = "addRoomType";
            }
        }
    });
}
</script>

<?php

include pathOf("includes/pageEnd.php");

?>