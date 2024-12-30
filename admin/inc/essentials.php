<?php

// Define constants for site and image paths
define('SITE_URL', 'http://127.0.0.1/MKwebsite/');
define('USERS_IMG_PATH', SITE_URL . 'images/users/');

define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/MKwebsite/images/');
define('USERS_FOLDER', 'users/');

// SendGrid API key
define('SENDGRID_API_KEY', "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");
define('SENDGRID_EMAIL', "seragsayed22@gmail.com");
define("SENDGRID_NAME","Makanak");

function adminLogin() {
    session_start();
    if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
        echo "<script>window.location.href='index.php';</script>";
        exit;
    }
    session_regenerate_id(true);

}

function redirect($url){
    echo "<script>window.location.href='$url';</script>";
}



function alert($type,$msg){
$bs_class=($type=="success")?"alert-success":"alert-danger";

    echo<<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        alert;
}

function uploadUserImage($image) {
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // Invalid image MIME type
    }

    $upload_dir = UPLOAD_IMAGE_PATH.USERS_FOLDER;
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
    }

    $file_name = 'IMG_' . random_int(11111, 99999) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
    $target_path = $upload_dir . $file_name;

    if (move_uploaded_file($image['tmp_name'], $target_path)) {
        return $file_name; // Return the saved file name
    } else {
        return 'upd_failed'; // Upload failed
    }
}


?>