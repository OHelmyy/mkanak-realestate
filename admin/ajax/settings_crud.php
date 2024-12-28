<?php 

require('../inc/essentials.php');
require('../inc/db_config.php');
adminLogin();

if(isset($_POST['get_general'])){
   $q="SELECT * FROM settings WHERE `sr_no`=?";
   $values=[1];
   $res=select($q,$values,'i');
   $data =mysqli_fetch_assoc($res);
   $json_data = json_encode($data);
   echo $json_data;
}


if(isset($_POST['upd_general'])){
    $frm_data=filtration($_POST);

    if (!isset($frm_data['website_title']) || !isset($frm_data['website_about'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
        exit;
    }


    $q="UPDATE `settings` SET `website_title`=?,`website_about`=? WHERE `sr_no`=?";
    $values=[$frm_data['website_title'],$frm_data['website_about'],1];
    $res=update($q,$values,'ssi');
    echo $res;
}

?>