<?php 
require('inc/essentials.php');
adminLogin();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Agencies</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto overflow-hidden">
            <h3 class="mb-4 mt-4">AGENCIES </h3>
            
            <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                   
                    <div class="table-responsive-lg " style="height: 450px; overflow-y :scroll;">
                        <table class=" table table-hover border">
                            <thead >
                                <tr >
                                    <th>#</th>
                                    <th scope="col">Agency ID#</th>
                                    
                                    <th scope="col">Agency Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                   
                                   
                                    
                                    <th scope="col">Actions</th>
                                    
                                </tr>
                                
                            </thead>
                            <tbody id="Agency-data">
                                
                            </tbody>
                        </table>
                    </div>
                    
                    </div>
                </div>
           
        </div>
    </div>
</div>

<?php require("inc/scripts.php"); ?>

<script>

function get_all_agency()
{
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/agency.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('Agency-data').innerHTML =this.responseText;
    }
    xhr.send('get_all_agency');
    

}
function delete_agency(agId) {
    if (!confirm("Are you sure you want to delete this user?")) {
        return; // Exit if user cancels the confirmation
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/agency.php", true); // Update with your correct AJAX file path
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert("success","agency deleted successfully!");
            refreshUserList(); // Refresh the user list
        } else {
            alert("err","Failed to delete the agency!");
        }
    };

    xhr.send("delete_agency=" + encodeURIComponent(agId)); // Send user ID
}

function refreshUserList() {
    // Example function to reload the user data
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/agency.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        document.getElementById("agency-data").innerHTML = this.responseText;
    };

    xhr.send("get_all_agency=1"); // Adjust the parameters as needed
}




window.onload = function(){
   get_all_agency();
}

</script>
</body>
</html>