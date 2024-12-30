<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agency Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <?php require('inc/links.php')?>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Agency Registration</h2>
        <form id="agency-register-form" method="POST" action="ajax/agency_register.php">
            <div class="mb-3">
                <label for="name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phonenum" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phonenum" name="phonenum" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
            <div class="mb-3">
                <label for="cpass" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpass" name="cpass" required>
            </div>
            <button type="submit" name="agencyregister" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>