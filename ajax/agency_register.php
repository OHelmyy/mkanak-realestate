<?php
// Include database connection and essentials
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

// Handle Agency Registration
if (isset($_POST['agencyregister'])) {
    $data = filtration($_POST);

    // Match password and confirm password
    if ($data['pass'] !== $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // Check if agency already exists by email or phone number
    $u_exist = select(
        "SELECT * FROM `agency_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",
        [$data['email'], $data['phonenum']],
        "ss"
    );

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    // Hash password
    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    // Insert data into the database
    $query = "INSERT INTO `agency`(`name`, `email`, `phonenum`, `location`, `password`) VALUES (?, ?, ?, ?, ?)";
    $values = [$data['name'], $data['email'], $data['phonenum'], $data['location'], $enc_pass];

    if (insert($query, $values, 'sssss')) {
        echo 'registration_success';
    } else {
        echo 'ins_failed';
    }
}

if (isset($_POST['agencylogin'])) {
    $data = filtration($_POST);

    // Validate required fields
    if (empty($data['email']) || empty($data['pass'])) {
        echo '<script>alert("Please fill all required fields.");</script>';
        exit;
    }

    // Check if user exists
    $u_exist = select("SELECT * FROM `agency` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email'], $data['email']], "ss");

    if (mysqli_num_rows($u_exist) == 0) {
        echo '<script>alert("Invalid email or phone number.");</script>';
        exit;
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);

    // Verify the password
    if (!password_verify($data['pass'], $u_fetch['password'])) {
        echo '<script>alert("Invalid password.");</script>';
        exit;
    }

    // Start session and set user details
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['uId'] = $u_fetch['id'];
    $_SESSION['uName'] = $u_fetch['name'];
    $_SESSION['uPhone'] = $u_fetch['phonenum'];

    // Send a successful response
    echo 'login_success'; // Return success
    exit;
}

?>
