<?php 
require('inc/essentials.php');
adminLogin();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -Settings</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto overflow-hidden">
           <h3 class="mb-4 mt-4">SETTINGS </h3>
                <!-- general settings section -->

                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">General Settings</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" onclick="showModal()">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <h6 class="card-subtitle mb-1 fw-bold">Title</h6>
                    <p class="card-text" id="website_title"></p>
                    <h6 class="card-subtitle mb-1 fw-bold">AboutUs</h6>
                    <p class="card-text" id="website_about"></p>
                    
                    </div>
                </div>

                <!-- general settings modal -->

                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-hidden="true">

                <div class="modal-dialog">
                    <form id="general_s_form">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title ">General Settings</h1>
                       
                    </div>
                    <div class="modal-body">
                       <div class=" mb-3">
                         <label class="form-label fw-bold" >Title</label>
                         <input type="text" name="website_title" id="website_title_inp" class="form-control shadow-none" required>
                       </div>
                       <div class="mb-3">
                         <label class="form-label fw-bold " >About Us</label>
                         <textarea name="website_about" id="website_about_inp" class="form-control shadow-none" rows="5" required></textarea> 
                         </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="website_title.value = general_data.website_title ,website_about.value = general_data.website_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-primary custom-bg text-white shadow-none">SUBMIT</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php require("inc/scripts.php"); ?>
<script>
 let general_data;

 let general_s_form = document.getElementById("general_s_form");
 let website_title_inp = document.getElementById('website_title_inp');
 let website_about_inp = document.getElementById('website_about_inp');

 function get_general()
    {
    let website_title = document.getElementById('website_title');
    let website_about = document.getElementById('website_about');

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload =function(){
        try {
        general_data = JSON.parse(this.responseText);
        website_title.innerText = general_data.website_title;
        website_about.innerText = general_data.website_about;

        website_title_inp.value = general_data.website_title;
        website_about_inp.value = general_data.website_about;
    } catch (error) {
        console.error('Error parsing JSON:', this.responseText);
    }
    }

    xhr.send('get_general')
 }


 general_s_form.addEventListener('submit', function(e){
    e.preventDefault();
    upd_general(website_title_inp.value,website_about_inp.value);
 });

 function upd_general(website_title_val, website_about_val) {
        let website_title = document.getElementById('website_title');
        let website_about = document.getElementById('website_about');

        let website_title_inp = document.getElementById('website_title_inp');
        let website_about_inp = document.getElementById('website_about_inp');

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/settings_crud.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload =function(){
            var myModal = document.getElementById('general-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
            document.getElementById('general-s').addEventListener('hidden.bs.modal', function () {
            removeAllBackdrops();
            var modalInstance = bootstrap.Modal.getInstance(this);
            if (modalInstance) {
                modalInstance.dispose();
            }
        });

        console.log(this.responseText);

            if(this.responseText==1){
                alert('success','changes saved!');
                get_general();
            }else{
                alert('error','no changes made!');

            }
                
            
        }
        xhr.send(
            'website_title=' + encodeURIComponent(website_title_val) +
            '&website_about=' + encodeURIComponent(website_about_val) +
            '&upd_general=1'
        );
}



 window.onload =function(){
    get_general();
 }
</script>
</body>
</html>