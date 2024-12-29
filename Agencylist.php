<?php
require('inc/db_config.php');

if (!$con) {
    die("Failed to connect to the database!");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Listing Page</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/Agencylist.css">
</head>
<body class="bg-light">



    <body> 
        <header>
        <?php require('inc/header.php'); ?>
        </header>
        <main class="main-container">
        
        <div class="left-section">
            <div class="text-overlay">
                <h1>Fill Our Website</h1>
                <p>With Your Amazing Properties</p>
                
            </div>
        </div>

        
        <div class="right-section">
            <h2>List Your Property</h2>
            <p>Fill out the details for information</p>
            <form action="add_property.php" method="post" enctype="multipart/form-data">
                <input type="text" name="price" placeholder="Price" required>
                <textarea name="description" placeholder="Description" rows="4" required></textarea>
                <input type="text" name="location" placeholder="Location" required>

    
            <select name="type" required>
                    <option value="">Select Type</option>
                    <option value="Villa">Villa</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Townhouse">Townhouse</option>
                    <option value="Penthouse">Penthouse</option>
            </select>

            <input type="number" name="bedroom" placeholder="Bedrooms" min="1" required>
            <input type="number" name="bathroom" placeholder="Bathrooms" min="1" required>
            <input type="number" name="area" placeholder="Area (sqm)" min="1" required>

            <input type="file" name="photos">
    
            <button type="submit" name="submit" class="submit-btn">Add Property</button>
            </form>

        </div>
    </main>
        
    </body>
