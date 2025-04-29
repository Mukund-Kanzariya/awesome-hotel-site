<?php

require '../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

// Fetch room types and their respective prices (AC/Non-AC)
$query = "SELECT * FROM `roomtypes`";
$roomtypes = select($query);
?>

<!-- Guest Booking Page -->
<br><br><br><br><br>
<div class="container">
    <h2>Guest Booking Form</h2>
    <form enctype="multipart/form-data">

        <!-- Guest Information Section -->
        <div class="form-group">
            <label for="guest-name">Guest Name:</label>
            <input type="text" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="guest-mobile">Mobile:</label>
            <input type="text" class="form-control" id="mobile" required>
        </div>

        <div class="form-group">
            <label for="guest-email">Email:</label>
            <input type="email" class="form-control" id="email" required>
        </div>


        <div class="form-group">
            <label for="guest-address">Address:</label>
            <textarea class="form-control" id="address" required></textarea>
        </div>

        <!-- Guest Image Upload -->
        <div class="form-group">
            <label for="guest-image">Guest Image:</label>
            <input type="file" class="form-control-file" id="image" accept="image/*">
        </div>

        <!-- Check-in and Check-out Dates -->
        <div class="form-group">
            <label for="check-in-date">Check-in Date:</label>
            <input type="date" class="form-control" id="checkin" min="<?= date('Y-m-d') ?>" required>
        </div>

        <div class="form-group">
            <label for="check-out-date">Check-out Date:</label>
            <input type="date" class="form-control" id="checkout" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Days</label>
            <input type="text" class="form-control" id="totalDays" disabled />
        </div>

        <div class="mb-3">
            <label class="form-label">Select AC/Non-AC</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="radio" name="AcNonAc" value="AC" id="acRadio" onclick="filterRooms('AC')" />
                        <label for="ac">AC</label>
                        <input type="radio" name="AcNonAc" value="Non-AC" id="nonAcRadio"
                            onclick="filterRooms('Non-AC')" />
                        <label for="nonAc">Non-AC</label>
                    </div>
                </div>
            </div>

            <label class="form-label">Select Room Type</label>
            <select class="form-control" id="roomtype" onchange="calculateTotal()">
                <option disabled selected>Select Room Type</option>
                <?php foreach ($roomtypes as $type) { ?>
                <option value="<?= $type['Id'] ?>" data-price-ac="<?= $type['Price_AC'] ?>"
                    data-price-nonac="<?= $type['Price_NonAC'] ?>">
                    <?= $type['Name'] ?>
                </option>
                <?php } ?>
            </select>
            <br>
            <label class="form-label">Select Room Quantity</label>
            <select class="form-control" id="quantity" onchange="loadRooms(); calculateTotal()">
                <option disabled selected>Select Quantity of Rooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>
            <label class="form-label">Select Room Number(s)</label>
            <div id="roomNoContainer">
                <!-- Room number dropdowns will be dynamically added here based on quantity -->
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label">Total Bill</label>
                <input type="text" class="form-control" id="total" readonly />
            </div>

        </div>

        <!-- Form Submit and Reset Buttons -->
        <button class="btn btn-primary" onclick="sendData(event)">Confirm Booking</button>
        <button type="reset" class="btn btn-secondary">Reset</button>

    </form>
</div><br>

<?php

include pathOf('includes/footer.php');
include pathOf('includes/scripts.php');

?>

<script>
// Function to calculate the number of days between check-in and check-out

let totalDays = 0;

function calculateDays() {
    var checkinDate = new Date(document.getElementById('checkin').value);
    var checkoutDate = new Date(document.getElementById('checkout').value);

    // Ensure both dates are selected
    if (checkinDate && checkoutDate) {
        // Calculate the difference in milliseconds
        var timeDifference = checkoutDate.getTime() - checkinDate.getTime();

        // Convert the time difference from milliseconds to days
        var daysDifference = timeDifference / (1000 * 3600 * 24);

        // Ensure that checkout is after checkin
        if (daysDifference > 0) {
            totalDays = Math.floor(daysDifference);
            document.getElementById('totalDays').value = daysDifference;
        } else {
            document.getElementById('totalDays').value = 'Invalid Dates';
        }
    }
}

// Attach event listeners to the checkin and checkout date inputs
document.getElementById('checkin').addEventListener('change', calculateDays);
document.getElementById('checkout').addEventListener('change', calculateDays);


// Calculate Total Bill based on selected room type and quantity
function calculateTotal() {
    var roomType = document.getElementById('roomtype');
    var selectedRoomType = roomType.options[roomType.selectedIndex];
    var acNonAc = document.querySelector('input[name="AcNonAc"]:checked').value;
    var price = acNonAc === 'AC' ? selectedRoomType.getAttribute('data-price-ac') : selectedRoomType.getAttribute(
        'data-price-nonac');
    var quantity = document.getElementById('quantity').value;

    if (price && quantity) {
        var total = price * quantity * totalDays;
        document.getElementById('total').value = total;
    }
}

// Load Available Rooms based on selected type (AC/Non-AC) and quantity
function loadRooms() {
    var roomTypeId = $('#roomtype').val();
    var acNonAc = $('input[name="AcNonAc"]:checked').val();
    var quantity = $('#quantity').val();

    $.ajax({
        url: '../admin/api/rooms/getRoomsByTypeAndAcStatus',
        type: 'POST',
        data: {
            roomtype: roomTypeId,
            acNonAc: acNonAc
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

// Handle Form Submission
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
    // formData.append('acNonAc', $('input[name="AcNonAc"]:checked').val());
    formData.append('roomtype', $('#roomtype').val());
    formData.append('quantity', $('#quantity').val());

    // Append each selected room number
    $('select[name="roomno[]"]').each(function() {
        var roomNumber = $(this).val();
        formData.append('roomno[]', roomNumber);
    });

    formData.append('total', $('#total').val());

    $.ajax({
        url: '../api/guests/insert',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            alert('Booking successfull');
            window.location.href = '<?= urlOf("pages/viewBookings") ?>';
        },
        error: function() {
            alert('Error adding guest.Please try again.');
        }
    });
}
</script>

<?php

include pathOf('includes/pageEnd.php');

?>