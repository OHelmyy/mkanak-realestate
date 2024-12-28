<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MKANAK - About Us</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"/>
    <style>
        .header-highlight {
            color: #D13222;
        }
        .h-line {
            width: 150px;
            height: 2px;
            margin: 0 auto;
        }
        .box {
            border-top-color: #D13222 !important;
        }
        .swiper-slide img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">

<!-- Header Section -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <h1 class="text-center">
            <a href="index.php" class="text-white text-decoration-none">MKANAK</a>
        </h1>
    </div>
</header>

<!-- Introduction Section -->
<section class="my-5 px-4">
    <h2 class="fw-bold text-center header-highlight">About Us</h2>
    <div class="h-line" style="background-color: #D13222;"></div>
    <p class="text-center mt-3">
        From affordable starter homes to premium estates, we offer a wide variety of properties to suit your needs. Explore homes for sale or rent in prime locations.
    </p>
</section>

<!-- Mission Section -->
<section class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 col-md-5 mb-4">
            <h3 class="mb-3 header-highlight">Our Mission</h3>
            <p>
                At MKANAK, we aim to redefine the property experience by offering homes that blend affordability with quality. Whether you are looking to rent or purchase, we ensure that every property meets the highest standards.
            </p>
        </div>
        <div class="col-lg-5 col-md-5 mb-4">
            <img src="images/features/dfb7f61cd947d9e217f75feb944654fd.jpg" class="w-100 rounded" alt="About Us">
        </div>
    </div>
</section>

<!-- Highlights Section -->
<section class="container mt-5">
    <div class="row">
       
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/icons/What is a Marketing Campaign_.jpeg" width="70px" alt="Customers">
                <h4 class="mt-2">100+ Customers</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/icons/download (3).jpeg" width="70px" alt="Properties">
                <h4 class="mt-2">200+ Properties</h4>
            </div>
        </div>
       
    </div>
</section>

<!-- Management Team Section -->
<section>
    <h6 class="my-5 fw-bold text-center header-highlight">Management Team</h6>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-center overflow-hidden rounded shadow">
                    
                    <h2 class="mt-2">MEMBERS</h2>
                    <p>SALES</p>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded shadow">
                    <h2 class="mt-2">MEMBERS</h2>
                    <p>SALES</p>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded shadow">
                    <h2 class="mt-2">MEMBERS</h2>
                    <p>SALES</p>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 MKANAK. All rights reserved. Designed and developed by MKANAK WebDev.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>

</body>
</html>
