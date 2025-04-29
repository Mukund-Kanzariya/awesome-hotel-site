<?php
session_start();

$GuestId=$_SESSION['GuestId'];

require '../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

// Fetch guest bookings from the database
$query = "SELECT * FROM `guests` WHERE `Id` = '$GuestId'";

$bookings = select($query);

?>

<!-- Guest Bookings Page -->
<br><br><br><br><br>
<div class="container">
    <h2>Guest Bookings</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Booking ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Rooms</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Check-in Date</th>
                <th scope="col">Check-out Date</th>
                <!-- <th scope="col">Room Type</th> -->
                <!-- <th scope="col">Quantity</th> -->
                <th scope="col">Total Bill</th>
                <!-- <th scope="col">Room Number(s)</th> -->
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($bookings)) {
                foreach ($bookings as $booking) { ?>
            <tr>
                <td><?= $booking['Id'] ?></td>
                <td>
                    <div class="col-auto pe-0">
                        <img src="<?= "../admin/assets/images/guests/" . $booking["Image"]; ?>" alt="user-image"
                            class="rounded" style="width: 40px; height: 40px; object-fit: cover;" />
                    </div>

                </td>
                <td><?= $booking['Name'] ?></td>
                <?php
                    $id1 = $booking['Id'];
                    $query1 = "SELECT * FROM `guestrooms` WHERE GuestId = ?";
                    $param1 = [$id1];
                    $row1 = select($query1, $param1);
                 ?>
                <td>
                    <?php if (!empty($row1)) { // Check if there are any rooms associated with the guest ?>
                    <?php foreach ($row1 as $room) { ?>
                    <p class="mb-0 text-primary"><?= $room['RoomNo'] ?></p>
                    <?php } ?>
                    <?php } else { ?>
                    <p class="mb-0 text-muted">No rooms assigned to this guest.</p>
                    <?php } ?>
                </td>
                <td><?= $booking['Mobile'] ?></td>
                <td><?= $booking['Email'] ?></td>
                <td><?= $booking['CheckInDate'] ?></td>
                <td><?= $booking['CheckOutDate'] ?></td>
                <!-- <td><?= $booking['room_type'] ?></td> -->
                <!-- <td><?= $booking['quantity'] ?></td> -->
                <td><?= $booking['TotalBill'] ?></td>
                <!-- <td><?= $booking['room_numbers'] ?></td> -->
            </tr>
            <?php }
            } else { ?>
            <tr>
                <td colspan="10" class="text-center">No bookings found</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div><br>

<?php
include pathOf('includes/footer.php');
include pathOf('includes/scripts.php');
?>