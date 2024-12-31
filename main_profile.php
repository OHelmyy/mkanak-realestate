<?php
session_start();
include 'admin\inc\db_config.php';

// Check if user logged in
if (!isset($_SESSION['uId'])) {
    echo "<script>
            alert('You are not logged in. Please log in to view your profile.');
            window.location.href = 'index.php';
          </script>";
    exit; // Stop further execution
}

// Fetch user data with ID
$user_id = $_SESSION['uId'];
$sql = "SELECT `name`, phonenum, email FROM user_cred WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user was found
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Redirect if no user is found
    header("Location: index.php");
    exit;
}
//EKTBO EL LOGIN.PHP FO2

$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-image: url('background2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .profile {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .profile h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .profile p {
            margin: 10px 0;
            font-size: 16px;
        }
        .edit-button {
            background-color: black;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .edit-button:hover {
            background-color: grey;
        }
    </style>
</head>
<body>
    <div class="profile">
        <h2>User Profile</h2>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phonenum']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Password:</strong> ********</p> <!-- Hide password -->
    </div>
    <a href="edit_profile.php" class="edit-button">Edit Profile</a>
</body>
</html>
