<?php
require('inc/db_config.php');

if ($con) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed: " . mysqli_connect_error();
}
?>
<?php
if(isset($_POST['submit'])){
    $price=$_POST['price'];
    $description=$_POST['description'];
    $type=$_POST['type'];
    $bedroom=$_POST['bedroom'];
    $bathroom=$_POST['bathroom'];
    $area=$_POST['area'];
    $file_name=$_FILES['photos']['name'];
    $tempname=$_FILES['photos']['tmp_name'];
    $folder = 'Photos/'.$file_name;
    $query = mysqli_query($con,"Insert into property (price, description, type, bedroom, bathroom, area, photos) Value ('$price','$description', '$type','$bedroom','$bathroom','$area','$file_name')");

    if($query){
        echo"<script>alert('data inserted successfully')</script>";
    }else{
        echo"<script>alert('data failed to be inserted')</script>";
    }



}


?>