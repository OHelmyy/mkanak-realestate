<?php
require('inc/db_config.php');

if ($con) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed: " . mysqli_connect_error();
}

if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $query=mysqli_query($con,"DELETE FROM property WHERE pr_id = $id");
}

if($query){
    
    header("Location: AgencyViewListing.php");
    exit();
}else{
    echo"<script>alert('Failed to delete')</script>";
}

?>