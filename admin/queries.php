<?php 
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();



if(isset($_GET['del'])){
   $frm_data=filtration($_GET);


   if($frm_data['del']=='all'){
   }else{
    $q="DELETE FROM `contact_us` WHERE `id`=?";
    $values=[$frm_data['del']];  
    if(delete($q,$values,'i')){
        alert('success','query deleted');
    }else{
        alert('error','query not deleted');
    }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -USER QUERIES</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto overflow-hidden">
           
            <h3 class="mb-4 mt-4">QUERIES </h3>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                <div class="table-responsive-lg " style="height: 450px;, overflow-y :scroll;">
                        <table class=" table table-hover border">
                            <thead class="sticky-top">
                                <tr >
                                    
                                    <th scope="col">Name</th>
                                    <th scope="col" width="30%">Subject</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>        
                                    <th scope="col">Actions</th>
                                    
                                </tr>
                                
                            </thead>
                            <tbody >
                                <?php
                                $q="SELECT * FROM contact_us ORDER BY `id` DESC";
                                $data=mysqli_query($con,$q);
                                $i=1;



                                while($row=mysqli_fetch_assoc($data)){
                                    $delete = "<a href='?del={$row['id']}' class='btn btn-danger btn-sm shadow-none'>Delete</a>";



                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['message']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['phone']."</td>";
                                    echo "<td>".$delete."</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<?php require("inc/scripts.php"); ?>


</body>
</html>