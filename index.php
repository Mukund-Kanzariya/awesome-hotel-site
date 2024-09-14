<?php 

require './includes/init.php';

include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

?>


<!-- Hero Section -->
<div class="hero-section-home">
    <div class="hero-home-text">
        WELCOME TO THE <br> "StayComfort"
        <br>
        <a href="#" class="hero-button">Book Now</a>
    </div>
</div>

<!-- Call-to-Action Section -->
<div class="cta-section text-center">
    <h2>Experience Luxury Like Never Before</h2>
    <p>Our rooms are designed to offer you the utmost comfort and luxury. Book your stay with us today!</p>
    <a href="<?= urlOf('pages/rooms') ?>" class="btn  btn-lg">View Rooms</a>
    <!-- <a href="<?= urlOf('pages/contact') ?>" class="btn  btn-lg">Contact Us</a> -->
</div>



<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= urlOf('assets/img/villa10.jpg') ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide</h5>
                <p>Some description for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= urlOf('assets/img/villa11.jpg') ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide</h5>
                <p>Some description for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= urlOf('assets/img/king2.jpg') ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide</h5>
                <p>Some description for the third slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= urlOf('assets/img/double1.jpg') ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Fourth slide</h5>
                <p>Some description for the fourth slide.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- new garden seciton -->
<div class="garden-section container">
    <div class="row align-items-center">
        <div class="col-md-6 garden-image-container">
            <img src="<?= urlOf('assets/img/home.jpg') ?>" alt="Beautiful Garden" class="garden-image">
        </div>
        <div class="col-md-6 garden-text">
            <h2 class="garden-heading">StayComfort</h2>
            <p class="garden-description">At StayComfort, we provide the ultimate luxury experience with top-notch
                amenities and exceptional service. Our beautifully designed rooms offer a blend of comfort and
                style, ensuring a relaxing stay for all our guests. Whether you're here for business or leisure, we
                strive
                to make your stay unforgettable. Our team is dedicated to providing personalized service to cater to
                your every need.</p>
        </div>
    </div>
</div>
<div class="garden-section container ">
    <div class="row align-items-center">
        <div class="col-md-6 garden-text">
            <h2 class="garden-heading">Explore Our Beautiful Gardens</h2>
            <p class="garden-description">Immerse yourself in the tranquility of our lush gardens, featuring a
                variety of vibrant flowers and serene walking paths. Our gardens are the perfect place to relax and
                unwind,
                offering a peaceful escape from the hustle and bustle of everyday life.</p>
        </div>
        <div class="col-md-6 garden-image-container">
            <img src="<?= urlOf('assets/img/garden.jpg') ?>" alt="Beautiful Garden" class="garden-image">
        </div>
    </div>
</div>


<!-- New Features Section -->
<div class="features-section  my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="feature-box p-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-shield-alt fa-3x"></i>
                </div>
                <!-- aya ek paragraph rakhvano chhe vadhare services na page ma json_last_error -->
                <h4 class="feature-title">Security Payment</h4>
                <p class="feature-description">100% security payment</p>
                <!-- <p class="feature-description">Your transactions are protected with advanced encryption technology. -->
                <!-- </p> -->
                <!-- <p class="feature-description">Feel safe and secure with our trusted payment gateway.</p> -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box p-4">
                <div class="feature-icon mb-3">
                    <!-- <i class="fas fa-exchange-alt fa-3x text-warning"></i> -->
                    <i class="fas fa-car-side fa-3x "></i>
                </div>
                <h4 class="feature-title">Taxi Service</h4>
                <p class="feature-description">Reliable taxi service</p>
                <!-- <p class="feature-description">Our taxis are available 24/7 to ensure you reach your destination on -->
                <!-- time.</p> -->
                <!-- <p class="feature-description">Professional drivers committed to providing safe and comfortable -->
                <!-- rides.</p> -->
                <!-- <p class="feature-description">Clean and well-maintained vehicles for your convenience.</p> -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box p-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-phone-alt fa-3x "></i>
                </div>
                <h4 class="feature-title">24/7 Support</h4>
                <p class="feature-description">Support every time fast</p>
                <!-- <p class="feature-description">Our dedicated team is available around the clock to assist you.</p> -->
                <!-- <p class="feature-description">Get quick and reliable help whenever you need it.</p> -->
                <!-- <p class="feature-description">We are here to solve your issues day or night.</p> -->
                <!-- <p class="feature-description">Always ready to provide the support you need, when you need it.</p> -->
            </div>
        </div>
    </div>
</div>

<!-- new garden seciotn -->

<div class="garden-section container">
    <div class="row align-items-center">
        <div class="col-md-6 garden-image-container">
            <img src="<?= urlOf('assets/img/garden1.jpg') ?>" alt="Beautiful Garden" class="garden-image">
        </div>
        <div class="col-md-6 garden-text">
            <h2 class="garden-heading">Explore Our Beautiful Gardens</h2>
            <p class="garden-description">Experience tranquility and natural beauty at our hotel, where every room
                offers a breathtaking garden view</p>
        </div>
    </div>
</div>

<div class="garden-section container">
    <div class="row align-items-center">
        <div class="col-md-6 garden-text">
            <h2 class="garden-heading">Celebrate in Style at Our Party Plot</h2>
            <p class="garden-description">Make your celebrations unforgettable at our stunning party plot. With
                ample space, elegant décor, and top-notch facilities, our venue is perfect for weddings, birthdays,
                and corporate events. Enjoy a seamless blend of sophistication and fun, ensuring that your special
                day is nothing short of spectacular.</p>
        </div>
        <div class="col-md-6 garden-image-container">
            <img src="<?= urlOf('assets/img/party.jpg') ?>" alt="Beautiful Garden" class="garden-image">
        </div>
    </div>
</div>


<!-- Counters Section -->
<div class="counters-section my-5">
    <div class="row text-center">
        <div class="col-md-3">
            <div class="counter-box p-4">
                <div class="counter-icon mb-3">
                    <i class="fas fa-users fa-3x "></i>
                </div>
                <h4 class="counter-title">Satisfied Guests</h4>
                <p class="counter-number">1963</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box p-4">
                <div class="counter-icon mb-3">
                    <i class="fas fa-star fa-3x "></i>
                </div>
                <h4 class="counter-title">Quality of Service</h4>
                <p class="counter-number">99%</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box p-4">
                <div class="counter-icon mb-3">
                    <i class="fas fa-certificate fa-3x "></i>
                </div>
                <h4 class="counter-title">Hotel Certificates</h4>
                <p class="counter-number">33</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box p-4">
                <div class="counter-icon mb-3">
                    <i class="fas fa-hotel fa-3x "></i>
                </div>
                <h4 class="counter-title">Available Rooms</h4>
                <p class="counter-number">144</p>
            </div>
        </div>
    </div>
</div>



<!-- Map Section -->
<!-- <div class="map-container ">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.268313695277!2d-122.40228838468113!3d37.79173297975798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064af4b0c89%3A0xb7b0d70b7a51a9f9!2sStayComfort%20Hotel!5e0!3m2!1sen!2sus!4v1625073527182!5m2!1sen!2sus"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div> -->

<?php

include pathOf('includes/footer.php');
include pathOf('includes/scripts.php');
include pathOf('includes/pageEnd.php');

?>