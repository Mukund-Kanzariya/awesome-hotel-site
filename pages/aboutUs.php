<?php 
require '../includes/init.php'; 
include pathOf('includes/header.php'); 
include pathOf('includes/navbar.php'); 
?>

<div class="about-section">
    <div class="container">
        <h2 class="about-heading text-center">About Us</h2>
        <p class="about-subtext text-center">Discover the story behind StayComfort Hotel and our commitment to excellence.</p>

        <div class="row about-content">
            <div class="col-md-6 about-text">
                <h3>Our Story</h3>
                <p>Founded in the heart of Luxury City, StayComfort Hotel has been a beacon of luxury and comfort for over a decade. Our vision is to provide an unmatched hospitality experience where elegance meets comfort.</p>
                <p>With a dedicated team and state-of-the-art amenities, we strive to make every guest's stay memorable. Whether you're here for a weekend getaway or a business trip, StayComfort offers the perfect blend of relaxation and sophistication.</p>
            </div>
            <div class="col-md-6 about-image-container">
                <img src="<?= urlOf('assets/img/villa3.jpeg') ?>" alt="About StayComfort" class="about-image">
            </div>
        </div>

        <div class="row about-features mt-5">
            <div class="col-md-6">
                <div class="about-feature-box">
                    <i class="fas fa-bed fa-3x"></i>
                    <h4 class="about-feature-title">Luxurious Rooms</h4>
                    <p class="about-feature-description">Experience unparalleled comfort in our elegantly designed rooms.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-feature-box">
                    <i class="fas fa-utensils fa-3x"></i>
                    <h4 class="about-feature-title">World-Class Dining</h4>
                    <p class="about-feature-description">Savor gourmet dishes crafted by our top chefs using fresh, local ingredients.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include pathOf('includes/footer.php'); 
include pathOf('includes/scripts.php'); 
include pathOf('includes/pageEnd.php'); 
?>
