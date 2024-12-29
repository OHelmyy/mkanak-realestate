<?php

require('../inc/db_config.php');

if (isset($_POST['get_all_property'])) {
    $res = selectAll('property'); // Fetch all property data

    // Check if the query was successful
    if (!$res) {
        echo "Error fetching data.";
        exit;
    }

}


if (isset($_POST['get_all_property'])) {

    $branchecked = [];
    $branchecked = [];




}
else{
}



if (isset($_POST['selectedTypes'])) {
    $selectedTypes = $_POST['selectedTypes'];
    if (!empty($selectedTypes)) {
        $typesArray = explode(',', $selectedTypes);
        $placeholders = implode(',', array_fill(0, count($typesArray), '?'));
        $query = "SELECT * FROM property WHERE `type` IN ($placeholders)";
        $stmt = $con->prepare($query);
        $stmt->bind_param(str_repeat('i', count($typesArray)), ...$typesArray);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $query = "SELECT * FROM property";
        $result = mysqli_query($con, $query);
    }

    $data = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $imagePath = !empty($row['photos']) ? 'images/' . htmlspecialchars($row['photos']) : 'images/default.jpg';
            // Generate the card HTML
            $data .= '
            <div class = "row">
                <div class="col-10 mb-4">
                    <div class="card h-100 shadow border-0">
                        <img src="' . $imagePath . '" class="card-img-top" alt="' . htmlspecialchars($row['type']) . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($row['type']) . ' - ' . htmlspecialchars($row['location']) . '</h5>
                            <p class="card-text">' . htmlspecialchars($row['description']) . '</p>
                            <p class="card-text"><strong>Price:</strong> ' . htmlspecialchars($row['price']) . ' L.E</p>
                            <p class="card-text">Bedrooms: ' . htmlspecialchars($row['bedroom']) . ' | Bathrooms: ' . htmlspecialchars($row['bathroom']) . ' | Area: ' . htmlspecialchars($row['area']) . ' sq. m.</p>
                            <div class="contact-buttons d-flex gap-2">
                                <a href="mailto:example@example.com" class="btn btn-danger btn-sm">Email</a>
                                <a href="https://wa.me/1234567890" target="_blank" class="btn btn-danger btn-sm">WhatsApp</a>
                                <a href="tel:+02 1091651645" class="btn btn-danger btn-sm">Call</a>
                            </div>
                        </div>
                    </div>
               
                    </div>
             </div>';
        }
    }
    

 else {
        $data = '<p>No properties found .</p>';
    }

    echo $data;
}




    ?>