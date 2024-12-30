<?php 
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -Dashboards</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-light">

<?php 
$current_users= mysqli_fetch_assoc(
    mysqli_query($con, "SELECT COUNT(id) as total FROM user_cred")
);


$current_properties= mysqli_fetch_assoc(
    mysqli_query($con, "SELECT 
    COUNT(pr_id) as `total` ,
    COUNT(CASE WHEN `status` = '1' THEN 1 END) AS `approved`,
    COUNT(CASE WHEN `status` = '0' THEN 1 END) AS `rejected`,
    COUNT(CASE WHEN `status` IS NULL THEN 1 END) AS `pending`
    FROM property")
);

$current_agencies= mysqli_fetch_assoc(
    mysqli_query($con, "SELECT COUNT(ag_id) as total FROM agency")
);
$current_q= mysqli_fetch_assoc(
    mysqli_query($con, "SELECT COUNT(id) as total FROM contact_us")
)

?>

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 >DASHBOARD</h3>
                <h6 class="badge bg-danger py-2 px-3 rounded">website is ON!</h6>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-3 mb-4">
                    <a href="properties.php" class="text-decoration-none">
                        <div class="card text-center p-3">
                            <h6>New Properties</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_properties['total']?></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="users.php" class="text-decoration-none">
                        <div class="card text-center p-3">
                            <h6>New Users</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_users['total']?></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="Agency.php" class="text-decoration-none">
                        <div class="card text-center p-3">
                            <h6>New Agencies</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_agencies['total']?></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="UserQ.php" class="text-decoration-none">
                        <div class="card text-center text-info p-3">
                            <h6>User Queries</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_q['total']?></h1>
                        </div>
                    </a>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 >Property Analytics</h3>
            </div>

            <div class="row mb-4">
            <div class="col-md-3 mb-4">
                    <a href="properties.php" class="text-decoration-none">
                        <div class="card text-center text-primary p-3">
                            <h6>Pending Properties</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_properties['pending']?></h1>
                        </div>
                    </a>
            </div>
            <div class="col-md-3 mb-4">
                    <a href="properties.php" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <h6>approved Properties</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_properties['approved']?></h1>
                        </div>
                    </a>
            </div>
            <div class="col-md-3 mb-4">
                    <a href="properties.php" class="text-decoration-none">
                        <div class="card text-center text-danger p-3">
                            <h6>Rejected Properties</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_properties['rejected']?></h1>
                        </div>
                    </a>
            </div>
            </div>

            <!-- <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 >User Analytics</h3>
            </div>

            <div class="row mb-4">
            <div class="col-md-3 mb-4">
                    <a href="users.php" class="text-decoration-none">
                        <div class="card text-center text-primary p-3">
                            <h6>New Registers</h6>
                            <h1 class="mt-2 mb-0">///</h1>
                        </div>
                    </a>
            </div>
            <div class="col-md-3 mb-4">
                    <a href="userQ.php" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <h6>New Queries</h6>
                            <h1 class="mt-2 mb-0">///</h1>
                        </div>
                    </a>
            </div>
            </div> -->

            <!-- <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 >Agency Analytics</h3>
            </div>

            <div class="row mb-4">
            <div class="col-md-3 mb-4">
                    <a href="Agency.php" class="text-decoration-none">
                        <div class="card text-center text-primary p-3">
                            <h6>New Registers</h6>
                            <h1 class="mt-2 mb-0">///</h1>
                        </div>
                    </a>
            </div>
            <div class="col-md-3 mb-4">
                    <a href="agentQ.php" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <h6>New Queries</h6>
                            <h1 class="mt-2 mb-0">///</h1>
                        </div>
                    </a>
            </div>
            </div> -->


        </div>
    </div>
</div>
</body>
</html>