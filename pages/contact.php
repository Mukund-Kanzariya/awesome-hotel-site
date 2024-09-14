<?php 
require '../includes/init.php'; 
include pathOf('includes/header.php'); 
include pathOf('includes/navbar.php'); 
?>

<div class="contact-section">
    <div class="container">
        <h2 class="contact-heading text-center">Contact Us</h2>
        <p class="contact-subtext text-center">We'd love to hear from you! Please fill out the form below to get in touch.</p>

        <div class="row">
            <div class="col-md-6 contact-info">
                <h4>Our Address</h4>
                <p>StayComfort Hotel</p>
                <p>123 Comfort Street, Luxury City</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: info@staycomfort.com</p>
            </div>

            <div class="col-md-6">
                <form action="process_contact.php" method="post" class="contact-form">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-lg btn-contact">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
include pathOf('includes/footer.php'); 
include pathOf('includes/scripts.php'); 
include pathOf('includes/pageEnd.php'); 
?>
