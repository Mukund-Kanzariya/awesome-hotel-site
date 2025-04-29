<div class="navbar" id="navbar">
    <div class=" " style="margin-top:0px;margin-left:0px;">
        <!-- Adjust the margin-top as needed -->
        <img src="<?= urlOf('assets/img/logomain.png') ?>" height="60px" width="70px" alt="">
        <!-- Adjust the margin-bottom to control the vertical position -->
    </div>
    <h2 class="logoname">StayComfort</h2>
    <ul>
        <li><a href="<?= urlOf('index') ?>">Home</a></li>
        <li><a href="<?= urlOf('pages/rooms') ?>">Rooms</a></li>
        <li><a href="<?= urlOf('pages/booking') ?>">Booking</a></li>
        <li><a href="<?= urlOf('pages/aboutUs') ?>">About</a></li>
        <li><a href="<?= urlOf('pages/contact') ?>">Contact</a></li>
        <li><a href="<?= urlOf('pages/review') ?>">Review</a></li>
    </ul>
    <div class="profile">

        <!-- <i class="fa-solid fa-chevron-down"></i> -->
        <!-- <i class="fa-solid fa-caret-down"></i> -->

        <!-- <img src="<?= urlOf('assets/img/photo.jpg') ?>" alt="Profile Image"> -->
        <!-- <span class="profile-name">Menu</span> -->
        <!-- <i class="fas fa-bars"></i> -->
        <i class="fas fa-bars" style="color: white;"></i>


        <div class="dropdown">
            <!-- <a href="#profile"><img src="profile-icon.png" alt="Profile">Profile</a> -->
            <!-- <a href="#dashboard"><img src="dashboard-icon.png" alt="Dashboard">Dashboard</a> -->
            <!-- <a href="#logout"><img src="logout-icon.png" alt="Logout">Logout</a> -->

            <a href="<?= urlOf('pages/viewBookings') ?>" class="dropdata"><i class="fa-solid fa-calendar-check"></i>
                View Bookings</a>
            <a href="<?= urlOf('admin') ?>" class="dropdata"><i class="fa-solid fa-user-shield"></i>
                Admin Login</a>
            <!-- <a href="#" class="dropdata text-danger"><i class="fa-solid fa-right-from-bracket"></i>Logout</a> -->

        </div>
    </div>
    <!-- <img src="<?= urlOf('assets/img/moon.png') ?>" id="icon"> -->
</div>