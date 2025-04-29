<?php  
    require '../includes/init.php';  
    include pathOf('includes/header.php');  
    include pathOf('includes/navbar.php');  
?>  
<br><br><br><br><br><br>
<div class="review-section">
    <div class="container">
        <h2 class="review-heading text-center">Submit Your Review</h2>
        <p class="review-subtext text-center">We value your feedback! Please fill out the form below to share your experience with us.</p>
        
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="rating">Your Rating</label>
                        <select id="rating" name="rating" class="form-control" required>
                            <option value="">Select a rating</option>
                            <option value="5">Excellent (5 stars)</option>
                            <option value="4">Very Good (4 stars)</option>
                            <option value="3">Good (3 stars)</option>
                            <option value="2">Fair (2 stars)</option>
                            <option value="1">Poor (1 star)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="review">Your Review</label>
                        <textarea id="review" name="review" rows="5" class="form-control" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-lg btn-contact" onclick="submitReview()">Submit Review</button>
                </form><br>
            </div>
        </div>
    </div>
</div>

<?php  
    include pathOf('includes/footer.php');  
    include pathOf('includes/scripts.php');  
?>  

<script>
    function submitReview(){
        $.ajax({
            url: '../api/review/insert', 
            type: 'post',
            data: {
                name: $('#name').val(),
                email: $('#email').val(),
                rating: $('#rating').val(),
                review: $('#review').val()
            },
            success: function(response, status, xhr) {
                if (xhr.status == 200) {
                    alert("Review submitted successfully");
                    Windows.location.href = '../../pages/review';
                    location.reload();

                } else {
                    alert("Failed to submit review. Please try again");
                }
            }
        });
    }
</script>

<?php include pathOf('includes/pageEnd.php'); ?>
