<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .header-bg {
            background: #D13222;
            padding: 50px 0;
        }

        .header-bg h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .header-bg p {
            font-size: 1.2rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .icon {
            font-size: 50px;
            color: #ff4d4d;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        .footer a {
            color: #ff4d4d;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    
    <div class="header-bg text-white text-center">
        <h1>Agency</h1>
        <p>Your trusted partner in finding the perfect property.</p>
    </div>

    
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <div class="icon">
                        <i class="bi bi-house-fill"></i>
                    </div>
                    <h5 class="card-title">List Property</h5>
                    <p>List your property with us and reach potential buyers effortlessly.</p>
                    <a href="" class="btn btn-outline-danger">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <div class="icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h5 class="card-title">View Listed Properties</h5>
                    <p>Explore our extensive list of properties tailored to your needs.</p>
                    <a href="" class="btn btn-outline-danger">View Listings</a>
                </div>
            </div>
           
        </div>
    </div>

   
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2024 MKANAK. All Rights Reserved.</p>
            <p>
                <a href="policy.php">Privacy Policy</a> | <a href="policy.php">Terms of Service</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
