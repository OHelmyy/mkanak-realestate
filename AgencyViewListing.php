<?php
require('inc/db_config.php');

if (!$con) {
    die("Failed to connect to the database!");
}
$sql ="SELECT pr_id, price, description, location, type, bedroom, bathroom, area FROM property";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency View Listing Page</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/AgencyViewListing.css">
</head>

<header>
    <?php require('inc/header.php'); ?>
</header>
<body>
<div class="table-container">
    <table>
        <tr>
            <th>PropertyID</th>
            <th>Price</th>
            <th>Description</th>
            <th>Location</th>
            <th>Type</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Area</th>
            <th>Action</th>
        </tr>
        <?php
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr><td>".$row["pr_id"]."</td><td>".$row["price"]."</td><td>".$row["description"]."</td><td>".$row["location"]."</td><td>".$row["type"]."</td><td>".$row["bedroom"]."</td><td>".$row["bathroom"]."</td><td>".$row["area"]."</td><td> <button class='edit-btn'>Edit</button>
                                <button class='delete-btn'>Delete</button></td></tr>";
                
            }
            echo "</table>";
        }else{
            echo"There is no properties!";
        }

        
        ?>
    </table>
</div>
</body>

