<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$query="SELECT * FROM roomtypes";
$rows=select($query);

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Rooms</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add New Room</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Add New Room</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <form>

            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Room description</h5>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">RoomType</label>
                                <select class="form-select" id="roomtype">
                                    <option disable selected>Select RoomType</option>
                                    <?php
                                        foreach($rows as $row) {?>
                                    <option value="<?php echo $row['Id'];?>"><?php echo $row['Name'];?></option>
                                    <?php }?>
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Room No.</label>
                                <input type="text" class="form-control" id="roomno" placeholder="Enter Room No." />
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Room Description</label>
                                <textarea class="form-control" placeholder="Enter Room Description in 2 line"
                                    id="description"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-header">
                            <h5>AC-NonAC</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="radio" name="AcNonAc" value="AC">
                                        <label for="ac">AC</label><br>

                                        <input type="radio" name="AcNonAc" value="Non-AC">
                                        <label for="nonAc">Non-AC</label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5>Capacity</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">Capacity<i
                                                class="ph-duotone ph-users ms-1" data-bs-toggle="tooltip"
                                                data-bs-title="Users"></i>
                                        </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ph-duotone ph-users ms-1"
                                                    data-bs-toggle="tooltip" data-bs-title="Users"></i></span>
                                            <input type="text" class="form-control" placeholder="persons"
                                                id="capacity" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card-body text-end btn-page">
                        <button type="button" class="btn custom mb-0" onclick="sendData()">Add Room</button>
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

?>

<script>
function sendData() {

    var acnonac = $("input[name='AcNonAc']:checked").val();

    $.ajax({
        url: '../../api/rooms/insert',
        type: 'post',
        data: {
            roomTypeId: $('#roomtype').val(),
            roomNo: $('#roomno').val(),
            description: $('#description').val(),
            acnonac: acnonac, 
            capacity: $('#capacity').val()
        },
        success: function(response, status, xhr) {
            if (xhr.status == 200) {
                alert("Room added successfully!");
                window.location.href = "../../pages/rooms/roomList";
            } else {
                alert("Room not added. Please try again.");
                window.location.href = "addRoom";
            }
        }
    });

}
</script>

<?php

include pathOf("includes/pageEnd.php");

?>