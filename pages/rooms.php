<?php 

require '../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

?>

<!-- Hero Section with Parallax Effect -->
<div class="hero-section">
    <div class="hero-content">
        <h1>Discover Our Rooms</h1>
        <p>Luxury and comfort for every taste</p><br>
        <a href="#" class="hero-button">Book Now</a>
    </div>
</div><br>

<!-- Parallax Section with Split View -->
<div class="parallax-split ">
    <div class="parallax-image" style="background-image: url('../assets/img/queen9.jpg');"></div>
    <div class="parallax-text">
        <h2> Queen Room</h2>
        <p>Our Deluxe Queen Room offers an elegant retreat with a queen-size bed, a private balcony, and a garden view.
            Perfect for a relaxing getaway.</p>
        <p>Indulge in our Queen Room, featuring a spacious queen-size bed, stylish decor, and a serene view, providing
            the ideal setting for comfort and relaxation.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>

<div class="parallax-split reverse">
    <div class="parallax-image" style="background-image: url('../assets/img/king2.jpg');"></div>
    <div class="parallax-text">
        <h2>King Room</h2>
        <p>Experience the pinnacle of comfort and elegance in our Luxury King Room. The room features a plush king-size
            bed, luxurious furnishings, and a panoramic city view.</p>
        <p>Discover unmatched luxury in our Premium King Room, offering a grand king-size bed, sophisticated decor, and
            stunning views that elevate your stay to new heights.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>

<div class="parallax-split ">
    <div class="parallax-image" style="background-image: url('../assets/img/single5.jpg');"></div>
    <div class="parallax-text">
        <h2> Single Room</h2>
        <p>Relax in our cozy Single Room, featuring a comfortable bed, modern amenities, and a tranquil atmosphere
            perfect for solo travelers.</p>
        <p>Retreat to our inviting Single Room, complete with a plush bed, sleek furnishings, and all the essentials for
            a peaceful and restful stay.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>

<div class="parallax-split reverse">
    <div class="parallax-image" style="background-image: url('../assets/img/double5.jpg');"></div>
    <div class="parallax-text">
        <h2>Double Room</h2>
        <p>Unwind in our spacious Double Room, designed with comfort in mind, featuring two plush beds and all the
            amenities needed for a restful stay.</p>
        <p>Enjoy the comfort of our well-appointed Double Room, featuring two cozy beds, modern conveniences, and ample
            space for a relaxing and enjoyable stay.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>


<!-- Full-Width Parallax Section with Overlaid Text -->
<div class="parallax-full" style="background-image: url('../assets/img/suite6.jpg');">
    <div class="parallax-overlay">
        <h2>Executive Suite</h2>
        <p>Indulge in the ultimate luxury with our Executive Suite. Enjoy a separate living area, premium amenities, and
            stunning views that will take your breath away.</p>
    </div>
</div>

<!-- parallax reapet -->
<div class="parallax-split ">
    <div class="parallax-image" style="background-image: url('../assets/img/family5.jpg');"></div>
    <div class="parallax-text">
        <h2> Family Room</h2>
        <p>Relax in our cozy Single Room, featuring a comfortable bed, modern amenities, and a tranquil atmosphere
            perfect for solo travelers.</p>
        <p>Retreat to our inviting Single Room, complete with a plush bed, sleek furnishings, and all the essentials for
            a peaceful and restful stay.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>

<div class="parallax-split reverse">
    <div class="parallax-image" style="background-image: url('../assets/img/studio6.jpg');"></div>
    <div class="parallax-text">
        <h2>Studio Room</h2>
        <p>Unwind in our spacious Double Room, designed with comfort in mind, featuring two plush beds and all the
            amenities needed for a restful stay.</p>
        <p>Enjoy the comfort of our well-appointed Double Room, featuring two cozy beds, modern conveniences, and ample
            space for a relaxing and enjoyable stay.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>

<div class="parallax-split ">
    <div class="parallax-image" style="background-image: url('../assets/img/deluxe1.jpg');"></div>
    <div class="parallax-text">
        <h2> Deluxe Room</h2>
        <p>Relax in our cozy Single Room, featuring a comfortable bed, modern amenities, and a tranquil atmosphere
            perfect for solo travelers.</p>
        <p>Retreat to our inviting Single Room, complete with a plush bed, sleek furnishings, and all the essentials for
            a peaceful and restful stay.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>

<div class="parallax-split reverse">
    <div class="parallax-image" style="background-image: url('../assets/img/villa10.jpg');"></div>
    <div class="parallax-text">
        <h2>Villa </h2>
        <p>Unwind in our spacious Double Room, designed with comfort in mind, featuring two plush beds and all the
            amenities needed for a restful stay.</p>
        <p>Enjoy the comfort of our well-appointed Double Room, featuring two cozy beds, modern conveniences, and ample
            space for a relaxing and enjoyable stay.</p>

        <a href="#" class="parallax-button">View More</a>
    </div>
</div>





<!-- More Room Types with Hover Effects -->
<div class="rooms-container container">
    <div class="row">
        <!-- Room Card with Flip Effect -->
        <div class="col-md-4">
            <div class="room-card flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="<?= urlOf('assets/img/studio.jpeg') ?>" alt="Standard Room">
                        <h4>Standard Room</h4>
                    </div>
                    <div class="flip-card-back">
                        <p class="room-description">A cozy and comfortable space with all the essential amenities.
                            Perfect for budget-conscious travelers.</p>
                        <p class="price">$149/night</p>
                        <a href="#" class="btn btn-room">Book Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Card with Zoom-In Effect -->
        <div class="col-md-4">
            <div class="room-card zoom-card">
                <img src="<?= urlOf('assets/img/suite2.jpg') ?>" alt="Junior Suite">
                <div class="room-info">
                    <h4>Junior Suite</h4>
                    <p class="room-description">Spacious and stylish, the Junior Suite features a king-size bed, a
                        seating area, and beautiful views.</p>
                    <p class="price">$349/night</p>
                    <a href="#" class="btn btn-room">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Room Card with Slide-Up Effect -->
        <div class="col-md-4">
            <div class="room-card slide-card">
                <img src="<?= urlOf('assets/img/family3.jpeg') ?>" alt="Family Room">
                <div class="room-info">
                    <h4>Family Room</h4>
                    <p class="room-description">Ideal for families, this room offers two queen-size beds and plenty of
                        space to relax and enjoy your stay.</p>
                    <p class="price">$399/night</p>
                    <a href="#" class="btn btn-room">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full-Screen Parallax Section with Text Overlay -->
<div class="parallax-full" style="background-image: url('../assets/img/villa11.jpg');">
    <div class="parallax-overlay">
        <h2>Rooftop Lounge</h2>
        <p>Unwind and enjoy the city skyline at our exclusive rooftop lounge. Perfect for evening cocktails and sunset
            views.</p>
    </div>
</div>

<?php

include pathOf('includes/footer.php');
include pathOf('includes/scripts.php');
include pathOf('includes/pageEnd.php');

?>