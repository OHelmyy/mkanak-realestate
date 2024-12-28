<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MKANAK</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <?php require('inc/links.php')?>

<style>

.swiper-container {
    width: 100%;
    height: auto; 
}

.carousel-img {
    width: 100%;
    height: 400px;
    object-fit: cover; 
}
.swiper-wrapper {
    display: flex;
    align-items: center;
}

      .availability-form {
            margin-top: -100px;
            z-index: 3;
            position: relative;
        }
        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
        
    
</style>

</head>
<body class="bg-light">
   
<?php require('inc/header.php')?>
<!-- Carousel Section -->
<div class="container-fluid mt-1">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="images/carousel/download (4).jpeg" class="w-100 d-block carousel-img">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/download (4).jpeg" class="w-100 d-block carousel-img">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/download (5).jpeg" class="w-100 d-block carousel-img">
            </div>
        </div>
    </div>
</div>



    <!-- Availability Form -->
    <!-- <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Property Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight:500">Discover</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight:500">Discover</label>
                            <select class="form-select shadow-none">
                                <option value="1">Buy</option>
                                <option value="2">Rent</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight:500">Property Type</label>
                            <select class="form-select shadow-none">
                                <option selected>Select Property</option>
                                <option value="1">Villa</option>
                                <option value="2">Apartment</option>
                                <option value="3">Duplex</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn btn-dark shadow-none custom-bg mt-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
   <!-- Availability Form Section -->
<div class="container availability-form">
    <div class="row justify-content-center">
        <div class="col-lg-12 bg-white shadow p-5 rounded">
            <h5 class="mb-4 text-center">Check Property Availability</h5>
            <form>
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500">Property Type</label>
                        <select class="form-select shadow-none">
                            <option selected>Select Property</option>
                            <option value="1">Villa</option>
                            <option value="2">Apartment</option>
                            <option value="3">Duplex</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500">What are you looking for</label>
                        <select class="form-select shadow-none">
                            <option value="1">Buy</option>
                            <option value="2">Rent</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500">Select City</label>
                        <select class="form-select shadow-none">
                            <option selected>Select City</option>
                            <option value="1">Cairo</option>
                            <option value="2">Alexandria</option>
                            <option value="3">Mansoura</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3 text-center">
                        <button type="submit" class="btn btn-dark shadow-none custom-bg mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



   


<!-- Property Section -->
<!-- Property Section -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Property</h2>
<div class="container">
    <div class="row">
        <!-- Property Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow" style="max-width:300px; margin:auto;">
                <img src="images/carousel/download (4).jpeg" class="card-img-top">
                <div class="card-body bg-light">
                    <h5 class="card-title mb-4 fw-bold">Villa for sale ready to move in Mountain View iCity</h5>
                    <p class="card-text text-dark">Independent villa for sale, immediate receipt at a bargain price, sea view, with a down payment and installments, Mountain View iCity</p>
                </div>
                <ul class="list-group list-group-flush mb-2">
                    <li class="list-group-item">EGP 38,000,003</li>
                    <li class="list-group-item">Second feature</li>
                    <li class="list-group-item">Third feature</li>
                </ul>
                <div class="rating mb-1">
                    <h6 class="mb-1">Rating</h6>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                </div>
                <div class="card-body d-flex justify-content-evenly">
                    <a href="#" class="btn btn-sm text-black custom-bg shadow-none">Call</a>
                    <a href="#" class="btn btn-sm text-black custom-bg shadow-none">Email</a>
                </div>
            </div>
        </div>
        <!-- Add more property cards as needed... -->
    </div>
    <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
    </div>
</div>



<!-- Reach Us Section -->
<h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Reach Us</h2>
<div class="container">
    <div class="row">
        <!-- Google Maps Embed -->
        <div class="col-lg-8 col-md-8 mb-lg-0 mb-3 bg-white rounded shadow-sm">
            <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=..."></iframe>
        </div>
        <!-- Contact Details -->
        <div class="col-lg-4 col-md-4">
            <div class="bg-white p-4 rounded shadow-sm mb-4">
                <h5>Call Us</h5>
                <a href="tel:+91777565612" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> 91777565612
                </a>
            </div>
            <div class="bg-white p-4 rounded shadow-sm">
                <h5>Email Us</h5>
                <a href="mailto:info@example.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-envelope-fill"></i> info@example.com
                </a>
            </div>
        </div>
    </div>
</div>


<br>
<br>

  <?php require('inc/footer.php')?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>

        // var swiper = new Swiper(".swiper-container", {
        //     spaceBetween: 30,
        //     effect: "fade",
        //     loop: true,
        //     autoplay: {
        //         delay: 3500,
        //         disableOnInteraction: false,
        //     }
        // });


        const swiper = new Swiper('.swiper-container', {
    loop: true, // Enables infinite scrolling
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 3000, // Automatically changes slides every 3 seconds
    },
});

    </script>
</body>
</html>
