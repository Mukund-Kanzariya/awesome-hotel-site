    <?php
    session_start();

    if (!isset($_SESSION['userId'])) {
        header("Location: ../authentication/login");
        exit();
    }

    require '../../includes/init.php';
    include pathOf("includes/header.php");
    include pathOf("includes/navbar.php");

    // Fetch room types and their respective prices (AC/Non-AC)
    $query = "SELECT * FROM `roomtypes`";
    $roomtypes = select($query);
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
                                <div class="mb-3">
                                    <label class="form-label">Total Days</label>
                                    <input type="text" class="form-control" id="totalDays" disabled />
                                    <!-- <input type="text" value="<?= $totalDays ?>"> -->
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5>Select Room</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Select AC/Non-AC</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="radio" name="AcNonAc" value="AC" id="acRadio"
                                                    onclick="filterRooms('AC')" />
                                                <label for="ac">AC</label>
                                                <input type="radio" name="AcNonAc" value="Non-AC" id="nonAcRadio"
                                                    onclick="filterRooms('Non-AC')" />
                                                <label for="nonAc">Non-AC</label>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="form-label">Select Room Type</label>
                                    <select class="form-select" id="roomtype" onchange="calculateTotal()">
                                        <option disabled selected>Select Room Type</option>
                                        <?php foreach ($roomtypes as $type) { ?>
                                        <option value="<?= $type['Id'] ?>" data-price-ac="<?= $type['Price_AC'] ?>"
                                            data-price-nonac="<?= $type['Price_NonAC'] ?>">
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
                                    <input type="text" class="form-control" id="total" readonly />
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

    <!-- JavaScript Section -->

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
            url: '../../api/rooms/getRoomsByTypeAndAcStatus',
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
        event.preventDefault();

        var formData = new FormData();
        formData.append('name', $('#name').val());
        formData.append('mobile', $('#mobile').val());
        formData.append('email', $('#email').val());
        formData.append('address', $('#address').val());
        formData.append('image', $('#image')[0].files[0]);
        formData.append('checkin', $('#checkin').val());
        formData.append('checkout', $('#checkout').val());
        formData.append('roomtype', $('#roomtype').val());
        formData.append('quantity', $('#quantity').val());

        // Append selected room numbers
        $('select[name="roomno[]"]').each(function() {
            var roomNumber = $(this).val();
            if (roomNumber) {
                formData.append('roomno[]', roomNumber);
            } else {
                alert('Please select a room number for each room.');
                return;
            }
        });

        formData.append('total', $('#total').val());

        $.ajax({
            url: '../../api/guests/insert',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Guest added successfully');
                window.location.href = '../../pages/guests/guestList';
            },
            error: function() {
                alert('Error adding guest.Please try again.');
            }
        });
    }
    </script>

    <?php

    include pathOf("includes/pageEnd.php");

    ?>