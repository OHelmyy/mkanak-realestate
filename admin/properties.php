<?php 
require('inc/essentials.php');
adminLogin();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Properties</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto overflow-hidden">
            <h3 class="mb-4 mt-4">PROPERTIES </h3>
            
            <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                   
                    <div class="table-responsive-lg " style="height: 450px; overflow-y :scroll;">
                        <table class=" table table-hover border">
                            <thead >
                                <tr >
                                    
                                    <th scope="col">#</th>
                                    
                                    <th scope="col">Property Id</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Bedrooms</th>
                                    <th scope="col">Bathrooms</th>
                                    <th scope="col">Area</th>
                                    
                                    <th scope="col">Actions</th>
                                    
                                </tr>
                                
                            </thead>
                            <tbody id="property-data">
                                
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
function get_all_property()
{
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/properties.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('property-data').innerHTML =this.responseText;
    }
    xhr.send('get_all_property');
    

}

function toggle_status(pr_id, current_status) {
    let new_status = current_status === 1 ? 0 : 1;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/properties.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success', 'Property status updated!');
            refreshButton(pr_id, new_status); // Refresh the button after the toggle
        } else {
            alert('error', 'Failed to update status!');
        }
    };

    xhr.send('toggle_status=' + pr_id + '&value=' + new_status);
}

function refreshButton(pr_id, new_status) {
    let button = document.querySelector(`button[onclick='toggle_status(${pr_id}, ${new_status === 1 ? 0 : 1})']`);
    if (button) {
        if (new_status === 1) {
            button.className = 'btn btn-dark btn-sm shadow-none';
            button.textContent = 'Hide';
            button.setAttribute('onclick', `toggle_status(${pr_id}, 1)`);
        } else {
            button.className = 'btn btn-danger btn-sm shadow-none';
            button.textContent = 'Post';
            button.setAttribute('onclick', `toggle_status(${pr_id}, 0)`);
        }
    }
}





window.onload = function(){
    get_all_property();
}

</script>
</body>
</html>