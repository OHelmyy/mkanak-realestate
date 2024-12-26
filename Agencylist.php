<?php
include 'inc/db_config.php';

if (!$con) {
    die("Failed to connect to the database!");
}

$sql = "SELECT * FROM property";
$result = $con->query($sql);
?>


    <head>   
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Agencylist.css">   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body> 
        <header>
            <h1 class="logo">Mkanak</h1>
            <div class="search-bar">
                <input type="text" placeholder="What you looking for?" />
                <button><img src="Photos/search.png" alt="Search" class="search-icon"></button>
            </div>
            <button class="menu-icon">☰</button>
        </header>
        <img src="Photos/Agencylist.jpg" alt="Buildings" class="Agencylistphoto">
        <section class="property-section">
        <div class="sidebar">
            <h3>PROPERTY TYPE</h3>
            <ul>
                <li><input type="checkbox"> Villa</li>
                <li><input type="checkbox"> Apartment</li>
                <li><input type="checkbox"> Townhouse</li>
                <li><input type="checkbox"> Penthouse</li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Pick Your Property</h2>
                <div class="property-grid">
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="property-card">';
                        echo '<img src="Photos/Agencylistphoto.jpg" alt="Property Image">';
                        echo '<div class="property-details">';
                        echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<p>' . $row['bedroom'] . ' beds, ' . $row['bathroom'] . ' baths</p>';
                        echo '<p><span class="location-icon">📍</span> ' . htmlspecialchars($row['location']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No properties found!</p>";
                }
                ?>
                </div>
        </div>
    </section>
    </body>
