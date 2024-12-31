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
<a href="Agencylist.php"><img src="images/icons/goback.png" alt="Go Back" class="header-img"></a>
    <h1>View Your Properties</h1>
</header>
<body>
<div class="table-container">
<?php
if ($result->num_rows > 0) {
    echo"<table>
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
        </tr>";
        
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr><td>".$row["pr_id"]."</td><td>".$row["price"]."</td><td>".$row["description"]."</td><td>".$row["location"]."</td><td>".$row["type"]."</td><td>".$row["bedroom"]."</td><td>".$row["bathroom"]."</td><td>".$row["area"]."</td><td> 
                        <form style='display:inline;' method='POST' action='edit_property.php'>
                        <input type='hidden' name='edit' value='" . $row["pr_id"] . "'>
                        <button type='submit' class='edit-btn' onclick='openModal((".$row["pr_id"]."))'>Edit</button>
                        </form>
                        <form style='display:inline;' method='POST' action='delete_property.php'>
                        <input type='hidden' name='delete' value='" . $row["pr_id"] . "'>
                        <button type='submit' class='delete-btn '>Delete</button>
                        </form>
                    </td></tr>";
                
            }
            echo "</table>";


        
        
    echo"</table>";
}}else{
    echo"<p>There is no listed properties!</p>";
}
?>
</div>
</body>

