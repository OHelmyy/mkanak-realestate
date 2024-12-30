<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .contact-container {
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .map {
            border-radius: 10px;
            overflow: hidden;
        }

        h5 {
            color: #D13222;
            font-weight: bold;
        }

        a {
            color: #D13222;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .form-control {
            border: 1px solid #D13222;
            border-radius: 5px;
        }

        .form-control:focus {
            box-shadow: 0 0 5px #D13222;
            border-color: #D13222;
        }

        .btn-success {
            background-color: #D13222;
            border-color: #D13222;
            font-weight: bold;
        }

        .btn-success:hover {
            background-color: #b02a1f;
            border-color: #b02a1f;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        footer a {
            color: #D13222;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .navbar {
            background-color: #D13222;
            color: white;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 1px;
        }

    </style>
    
</head>
<body>

<!-- Navbar Section -->
<?php
    require 'inc/header.php';
    ?>

    
<!-- Contact Section -->
<div class="container contact-container">
    <div class="row">
        <!-- Map and Address Section -->
        <div class="col-md-6">
        <div class="map mb-3">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.4501045135893!2d31.235711315043937!3d30.04441928188064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840c5e85707cf%3A0x2e90e4b4a4f74a0!2sCairo%2C%20Egypt!5e0!3m2!1sen!2seg!4v1685703558268!5m2!1sen!2seg"
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

            <h5>Address</h5>
            <p>Cairo, Egypt</p>
            <h5>Call Us</h5>
            <p><a href="tel:+20 1091651645">+20 1091651645</a></p>
        </div>

        <!-- Contact Form Section -->
        <div class="col-md-6">
            <h5>Send a Message</h5>
            <form action="contactdb.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" rows="4" class="form-control" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100">Send</button>
            </form>
        </div>
    </div>
</div>
<?php
    require 'inc/footer.php';
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
