<?php

require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
require('../inc/sendgrid/sendgrid-php.php');

// Define SITE_URL if not already defined
if (!defined('SITE_URL')) {
    define('SITE_URL', 'http://127.0.0.1/MKwebsite/');
}

date_default_timezone_set('UTC'); // Set default timezone
function send_mail($uemail, $name, $token)
{
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("mohdraz8678@gmail.com", "Makanak");
    $email->setSubject("Account verification link");
    $email->addTo($uemail, $name);
    
    $email->addContent(
        "text/html",
        "
         Click the link to confirm your email:<br>
         <a href='".SITE_URL."email_confirm.php?email=$uemail&token=$token"."'>
         CLICK ME
         </a>
        "
    );
    $sendgrid = new \SendGrid(SENDGRID_API_KEY);

    try {
        $response = $sendgrid->send($email);
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}

if (isset($_POST['register'])) {
    $data = filtration($_POST);

    // Match password and confirm password
    if ($data['pass'] !== $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // Check if user exists
    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email'], $data['phonenum']], "ss");

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email'])? 'email_already':'phone_already' ;
        exit;
    }

    
   //upload user image

    $img=uploadUserImage($_FILES['profile']);

    if($img=='inv_img'){
        echo 'inv_img';
        exit;
    }
    else if($img=='upd_failed'){
        echo 'upd_failed';
        exit;
    }
   


    // Send verification mail
    $token = bin2hex(random_bytes(16));

    if (!send_mail($data['email'], $data['name'], $token)) {
        echo 'mail_failed';
        exit;
    }

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    // Insert user data into the database
    $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `dob`, 
    `profile`, `password`,`token`) VALUES (?, ?, ?, ?, ?, ?,?,?)";
    $values = [$data['name'], $data['email'], $data['address'], $data['phonenum'], $data['dob'],$img, $enc_pass, $token];

    if (insert($query, $values, 'ssssssss')) {
        echo 1;
    } else {
        echo 'mail_valied';
        exit;
    }


}

if (isset($_POST['login'])) {
    $data = filtration($_POST);

    // Validate required fields
    if (empty($data['email']) || empty($data['pass'])) {
        echo '<script>alert("Please fill all required fields.");</script>';
        exit;
    }

    // Check if user exists
    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email'], $data['email']], "ss");

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

    // Check if email is verified (optional validation)
    if (isset($u_fetch['is_verified']) && !$u_fetch['is_verified']) {
        echo '<script>alert("Your email is not verified. Please check your email for the verification link.");</script>';
        exit;
    }

    // Start session and set user details
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['uId'] = $u_fetch['id'];
    $_SESSION['uName'] = $u_fetch['name'];
    $_SESSION['uPic'] = $u_fetch['picture'];
    $_SESSION['uPhone'] = $u_fetch['phonenum'];

    echo '<script>alert("Login successful. Welcome back!");</script>';
}
?>
