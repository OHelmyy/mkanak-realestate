<?php
require 'inc/db_config.php'; // Include database configuration

// Fetch 'website_title' and 'website_about' content from the settings table
$settings_query = "SELECT website_title FROM settings LIMIT 1";
$result = $con->query($settings_query);

$website_title = "Default Title"; // Fallback default


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $website_title = $row['website_title']; // Assign the website_title to a variable

}
?>


<div class="bg-dark text-white pt-5">
  <div class="container-fluid">
    <div class="row">

    <!-- Social Media Links -->
    <div class="col-lg-3 col-md-6 mb-4">
    <h3 class="fw-bold fs-4 mb-3">
    <?php echo htmlspecialchars($website_title); ?>
</h3>
        <div>
          <a href="#" class="d-inline-block me-2 text-black">
            <i class="bi bi-facebook" style="font-size: 24px; color: black;"></i>
          </a>
          <a href="#" class="d-inline-block text-black">
            <i class="bi bi-instagram" style="font-size: 24px; color: black;"></i>
          </a>
        </div>
      </div>

      <!-- Legal Section -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold mb-3">LEGAL</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Terms Of Service</a></li>
          <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Company Section -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold mb-3">COMPANY</h5>
        <ul class="list-unstyled">
          <li><a href="aboutUs.php" class="text-white text-decoration-none">About Us</a></li>
          <li><a href="#" class="text-white text-decoration-none">Careers</a></li>
        </ul>
      </div>

      <!-- Contact Section -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold mb-3">CONTACT</h5>
        <ul class="list-unstyled">
          <li><a href="contactUs" class="text-white text-decoration-none">Support</a></li>
          <li><a href="register" class="text-white text-decoration-none">Partner with us</a></li>
          <li class="text-white mt-2">Email: MkanakCompany@gmail.com</li>
          <li class="text-white">Tel: +01050100978</li>
        </ul>
      </div>
    </div>

    <!-- Copyright Section -->
    <div class="text-center mt-4">
      <p class="mb-0">&copy; 2024 MKANAK Limited. All rights reserved</p>
    </div>
  </div>

  </div>
  