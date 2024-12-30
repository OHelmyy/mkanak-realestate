<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makanak Intro Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #d32f2f;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        .intro-container {
            text-align: center;
            position: relative;
            color: #ffffff;
        }

        .animation-container {
            position: absolute;
            top: 35%;
            display: flex;
            gap: 10px;
        }

        .circle {
            width: 30px;
            height: 30px;
            background-color: #ffffff;
            border-radius: 50%;
            animation: grow 2s infinite ease-in-out;
        }

        .circle:nth-child(2) {
            animation-delay: 0.5s;
        }

        .circle:nth-child(3) {
            animation-delay: 1s;
        }

        @keyframes grow {
            0%, 100% {
                transform: scale(0.5);
            }
            50% {
                transform: scale(1.5);
            }
        }

        h1 {
            font-size: 3rem;
            animation: fadeIn 2s ease-in-out forwards;
        }

        .dropdown-menu {
            background-color: grey;
        }

        .dropdown-menu a {
            color: white;
        }

        .dropdown-menu a:hover {
            background-color: darkgrey;
        }

        .home-button .btn {
            background-color: grey;
            border: none;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 10px 30px;
            border-radius: 5px;
        }

        .home-button .btn:hover {
            background-color: darkgrey;
        }

        .buildings-container {
            position: fixed; 
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 0px; 
            background-color: #d32f2f; 
        }

        .buildings-container img {
            width: 200px; 
            height: auto;
            margin-bottom: 0; 
        }
    </style>
</head>
<body>
    <div class="intro-container d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="dropdown position-absolute top-0 mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="admin/index.php">Admin Login</a></li>
                <li><a class="dropdown-item" href="agency_signup.php">Agency Signup</a></li>
            </ul>
        </div>
        
        <div class="animation-container d-flex align-items-center justify-content-center">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        
        <h1 class="mt-4 text-white text-uppercase">Makanak</h1>
        
        <div class="home-button mt-3">
            <a href="index.php" class="btn btn-secondary">Home</a>
        </div>
        
        <div class="buildings-container">
            <img src="images/icons/skyscraper.png" alt="Building 1">
            <img src="images/icons/office-building.png" alt="Building 2">
            <img src="images/icons/apartment (1).png" alt="Building 3">
            <img src="images/icons/skyscraper.png" alt="Building 1">
            <img src="images/icons/office-building.png" alt="Building 2">
            <img src="images/icons/apartment (1).png" alt="Building 3">
            <img src="images/icons/skyscraper.png" alt="Building 1">
            <img src="images/icons/office-building.png" alt="Building 2">
            <img src="images/icons/apartment (1).png" alt="Building 3">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
