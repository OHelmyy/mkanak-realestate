<?php
require('inc/db_config.php');

if (isset($_POST['edit'])) {
    $id = $_POST['edit'];

    $query = mysqli_query($con, "SELECT * FROM property WHERE pr_id = '$id'");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        echo "Property not found.";
        exit;
    }

}

if (isset($_POST['update'])) {
    $price = $_POST['price'];
    $description = $_POST['description'];
    $location=$_POST['location'];
    $type = $_POST['type'];
    $bedroom = $_POST['bedroom'];
    $bathroom = $_POST['bathroom'];
    $area = $_POST['area'];
    $file_name = $_FILES['photos']['name'];

    if ($file_name) {
        $tempname = $_FILES['photos']['tmp_name'];
        $folder = 'Photos/'.$file_name;
        move_uploaded_file($tempname, $folder);
    } else {
        $folder = $row['photos']; 
    }

    $update_query = mysqli_query($con, "UPDATE property SET price = '$price', description = '$description',location='$location', type = '$type', bedroom = '$bedroom', bathroom = '$bathroom', area = '$area', photos = '$file_name'
    WHERE pr_id = '$id'");
    if ($update_query) {
        header("Location: AgencyViewListing.php");
        exit();
    } else {
        echo "<script>alert('Failed to update property.');</script>";
    }
    
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="css/edit_property.css">
    
</head>

<body>
<header>
<a href="AgencyViewListing.php"><img src="images/icons/goback.png" alt="Go Back" class="header-img"></a>
    <h1>EDIT YOUR PROPERTY</h1>
</header>
    
        
        
<form method="POST" action="edit_property.php" enctype="multipart/form-data">
    <input type="hidden" name="edit" value="<?php echo $row['pr_id']; ?>">

    <label for="price">Price:</label>
    <input type="text" name="price" value="<?php echo $row['price']; ?>" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required><?php echo $row['description']; ?></textarea><br>

    <label for="location">Location:</label>
    <input type="text" name="location" value="<?php echo $row['location']; ?>" required><br>
    <select name="type" required>
            <option value="">Select Type</option>
            <option value="Villa">Villa</option>
            <option value="Apartment">Apartment</option>
            <option value="Townhouse">Townhouse</option>
            <option value="Penthouse">Penthouse</option>
    </select><br>

<label for="bedroom">Bedrooms:</label>
    <input type="number" name="bedroom" value="<?php echo $row['bedroom']; ?>" required><br>

    <label for="bathroom">Bathrooms:</label>
    <input type="number" name="bathroom" value="<?php echo $row['bathroom']; ?>" required><br>

    <label for="area">Area:</label>
    <input type="text" name="area" value="<?php echo $row['area']; ?>" required><br>

    <label for="photos">Photos:</label>
    <input type="file" name="photos"><br>

    <button type="submit" name="update">Update Property</button>
    </form>
    


</body>