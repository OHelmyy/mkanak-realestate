<?php
session_start();
include 'admin\inc\db_config.php';
include 'admin\inc\essentials.php';

// Check if user logged in
if (!isset($_SESSION['uId'])) {
    echo "<script>
            alert('success','You are not logged in. Please log in to view your profile.');
            window.location.href = 'index.php';
          </script>";
    exit; // Stop further execution
} 

// gets user data with id
$user_id = $_SESSION['uId'];
$sql = "SELECT `name`, phonenum, email FROM user_cred WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    header("Location: index.php");
    exit;
}
//EKTBO EL LOG IN .PHP FO2

// update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['name'];
    $phone = $_POST['phonenum'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_update = "UPDATE user_cred SET name = ?, phonenum = ?, email = ?, password = ? WHERE id = ?";
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt_update = $con->prepare($sql_update);
    $stmt_update->bind_param("ssssi",$name, $phone, $email, $password_hashed, $user_id);

    if ($stmt_update->execute()) {
        echo "<script>alert('success','Profile updated successfully'); window.location.href='main_profile.php';</script>";
    } else {
        echo "<script>alert('d','Error updating profile');</script>";
    }

    $stmt_update->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            background-image: url('background3.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .profile-form {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .profile-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .profile-form label {
            margin: 10px 0;
            font-size: 16px;
        }
        .profile-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .profile-form button {
            background-color: black;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            width: 100%;
        }
        .profile-form button:hover {
            background-color: grey;
        }
    </style>
</head>
<body>
    <form action="edit_profile.php" method="POST" class="profile-form">
        <h2>Edit Profile</h2>
        <label for="first_name">First Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

        <label for="phone">Phone Number</label>
        <input type="text" id="phonenum" name="phonenum" value="<?php echo htmlspecialchars($user['phonenum']); ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="New password (optional)" >

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
