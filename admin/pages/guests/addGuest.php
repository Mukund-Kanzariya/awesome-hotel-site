<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$query = "SELECT * FROM `roomtypes`";
$roomtypes = select($query);

?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <form enctype="multipart/form-data">
            <div class="row">
                <!-- [ Guest Details ] start -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Guest Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" id="name" required
                                    autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile No." id="mobile"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" placeholder="Enter E-mail" id="email"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" placeholder="Enter Address" id="address"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>User Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <p><span class="text-danger">*</span> Recommended Passport-Size Image</p>
                                <input type="file" class="form-control mb-3" id="image" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ Guest Details ] end -->

                <!-- [ Room and Check-in/out Details ] start -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Check-In/Out</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Check-In Date</label>
                                <input type="date" class="form-control" id="checkin" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control" id="checkout" required />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Select Room</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Select Room Type</label>
                                <select class="form-select" id="roomtype" onchange="loadRooms(); calculateTotal()">
                                    <option disabled selected>Select Room Type</option>
                                    <?php foreach ($roomtypes as $type) { ?>
                                    <option value="<?= $type['Id'] ?>" data-price="<?= $type['Price'] ?>">
                                        <?= $type['Name'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Select Room Quantity</label>
                                <select class="form-select" id="quantity" onchange="loadRooms(); calculateTotal()">
                                    <option disabled selected>Select Quantity of Rooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Select Room Number(s)</label>
                                <div id="roomNoContainer">
                                    <!-- Room number dropdowns will be dynamically added here based on quantity -->
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Total Bill</label>
                                <input type="text" class="form-control" placeholder="Enter Total Amount" id="total"
                                    readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ Room and Check-in/out Details ] end -->

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" onclick="sendData(event)">Add Guest</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- [ Main Content ] end -->
    </div>
</div>

<?php
include pathOf("includes/footer.php");
include pathOf("includes/script.php");
?>

<!-- Calculate Total Bill -->
<script>
function calculateTotal() {
    var roomType = document.getElementById('roomtype');
    var selectedRoomType = roomType.options[roomType.selectedIndex];
    var price = selectedRoomType.getAttribute('data-price');
    var quantity = document.getElementById('quantity').value;

    if (price && quantity) {
        var total = price * quantity;
        document.getElementById('total').value = total;
    }
}
</script>

<!-- Load Available Rooms and handle dynamic room number selection -->
<script>
function loadRooms() {
    var roomTypeId = $('#roomtype').val();
    var quantity = $('#quantity').val();

    $.ajax({
        url: '../../api/rooms/getRoomsByType',
        type: 'POST',
        data: {
            roomtype: roomTypeId
        },
        success: function(response) {
            var rooms = JSON.parse(response);
            var roomNoContainer = $('#roomNoContainer');
            roomNoContainer.empty();

            // Add room number dropdowns based on selected quantity
            for (var i = 0; i < quantity; i++) {
                var select = $('<select class="form-select mb-3" name="roomno[]"></select>');
                select.append('<option disabled selected>Available Room ' + (i + 1) + '</option>');

                rooms.forEach(function(room) {
                    select.append('<option value="' + room.RoomNumber + '">' + room.RoomNumber +
                        '</option>');
                });

                roomNoContainer.append(select);
            }
        },
        error: function() {
            alert("Error loading rooms. Please try again.");
        }
    });
}
</script>

<!-- Handle Form Submission -->
<script>
function sendData(event) {
    event.preventDefault(); // Prevent form from submitting

    var formData = new FormData();
    formData.append('name', $('#name').val());
    formData.append('mobile', $('#mobile').val());
    formData.append('email', $('#email').val());
    formData.append('address', $('#address').val());
    formData.append('image', $('#image')[0].files[0]);
    formData.append('checkin', $('#checkin').val());
    formData.append('checkout', $('#checkout').val());

    // Append each selected room number
    $('select[name="roomno[]"]').each(function() {
        var roomNumber = $(this).val();
        console.log("Appending room number: " + roomNumber); // Debugging line
        formData.append('roomno[]', roomNumber);
    });

    formData.append('total', $('#total').val());

    $.ajax({
        url: '../../api/guests/insert',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response, status, xhr) {
            if (xhr.status == 200) {
                alert("Guest Added Successfully");
                window.location.href = "../../pages/guests/guestList";
            } else {
                alert("Error adding guest. Please try again.");
                window.location.href = "addGuest";
            }
        }
    });
}
</script>


<?php
include pathOf("includes/pageEnd.php");
?>