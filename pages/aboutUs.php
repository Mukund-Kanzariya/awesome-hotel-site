<?php 
require '../includes/init.php'; 
include pathOf('includes/header.php'); 
include pathOf('includes/navbar.php'); 

// Fetch the reviews from the database
$query = "SELECT * FROM reviews "; 

$reviews = select($query);
?>

<style>
.reviews-section {
    margin-top: 50px;
    padding: 40px 0;
    background-color: #f5f5f5;
}

.reviews-section h3 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

.reviews-container {
    overflow: hidden;
    width: 100%;
    position: relative;
    max-width: 600px;
    margin: 0 auto;
}

.review-slider {
    display: flex;
    transition: transform 1s ease-in-out;
    /* This will create the sliding effect */
}

.review-box {
    min-width: 100%;
    max-width: 100%;
    background-color: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    position: relative;
    text-align: left;
}

.review-text {
    font-size: 1.1rem;
    font-style: italic;
    color: #555;
    margin-bottom: 15px;
}

.review-author {
    font-weight: bold;
    font-size: 1rem;
    color: #333;
    text-align: right;
    margin-top: 20px;
}

.rating-stars {
    position: absolute;
    top: 15px;
    right: 15px;
}

.rating-stars i {
    color: #FFD700;
}
</style>

<div class="about-section">
    <div class="container">
        <h2 class="about-heading text-center">About Us</h2>
        <p class="about-subtext text-center">Discover the story behind StayComfort Hotel and our commitment to
            excellence.</p>

        <div class="row about-content">
            <div class="col-md-6 about-text">
                <h3>Our Story</h3>
                <p>Founded in the heart of Luxury City, StayComfort Hotel has been a beacon of luxury and comfort for
                    over a decade...</p>
            </div>
            <div class="col-md-6 about-image-container">
                <img src="<?= urlOf('assets/img/villa3.jpeg') ?>" alt="About StayComfort" class="about-image">
            </div>
        </div>
        <!-- Reviews Section -->
        <div class="reviews-section">
            <h3>What Our Guests Say</h3>
            <div class="reviews-container">
                <div class="review-slider">
                    <?php foreach ($reviews as $review): ?>
                    <div class="review-box">
                        <!-- Rating Stars -->
                        <div class="rating-stars">
                            <?php for ($i = 0; $i < $review['Rating']; $i++): ?>
                            <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <?php for ($i = $review['Rating']; $i < 5; $i++): ?>
                            <i class="far fa-star"></i> <!-- Empty stars for remaining rating -->
                            <?php endfor; ?>
                        </div>
                        <p class="review-text">"<?= htmlspecialchars($review['Review']); ?>"</p>
                        <p class="review-author">- <?= htmlspecialchars($review['Name']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <!-- Features Section -->
        <div class="row about-features mt-5">
            <div class="col-md-12">
                <div class="about-feature-box">
                    <i class="fas fa-bed fa-3x"></i>
                    <h4 class="about-feature-title">Luxurious Rooms</h4>
                    <p class="about-feature-description">Experience unparalleled comfort in our elegantly designed
                        rooms.</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="about-feature-box">
                    <i class="fas fa-utensils fa-3x"></i>
                    <h4 class="about-feature-title">World-Class Dining</h4>
                    <p class="about-feature-description">Savor gourmet dishes crafted by our top chefs using fresh,
                        local ingredients.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include pathOf('includes/footer.php'); 
include pathOf('includes/scripts.php'); 

?>

<script>
const reviewsSlider = document.querySelector('.review-slider');
const reviewBoxes = document.querySelectorAll('.review-box');
let currentIndex = 0;
let totalReviews = reviewBoxes.length;
let slideInterval = 5000; // Interval for sliding (in milliseconds, 5000ms = 5 seconds)

function showNextReview() {
    currentIndex++;

    if (currentIndex >= totalReviews) {
        currentIndex = 0;
    }

    // Slide to the next review by updating the transform property
    reviewsSlider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Automatically slide every 5 seconds
setInterval(showNextReview, slideInterval);
</script>

<?php

include pathOf('includes/pageEnd.php'); 
?>