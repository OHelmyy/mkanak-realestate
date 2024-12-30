<div class="bg-dark text-white pt-5">
  <div class="container-fluid">
    <div class="row">

    <!-- Social Media Links -->
    <div class="col-lg-3 col-md-6 mb-4">
        <h3 class="fw-bold fs-4 mb-3">MKANAK</h3>
        <div>
          <a href="#" class="d-inline-block me-2 text-black">
            <i class="bi bi-facebook" style="font-size: 24px; color: black;"></i>
          </a>
          <a href="#" class="d-inline-block text-black">
            <i class="bi bi-instagram" style="font-size: 24px; color: black;"></i>
          </a>
        </div>
      </div>

      <!-- Legal Section -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold mb-3">LEGAL</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Terms Of Service</a></li>
          <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Company Section -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold mb-3">COMPANY</h5>
        <ul class="list-unstyled">
          <li><a href="aboutUs.php" class="text-white text-decoration-none">About Us</a></li>
          <li><a href="#" class="text-white text-decoration-none">Careers</a></li>
        </ul>
      </div>

      <!-- Contact Section -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold mb-3">CONTACT</h5>
        <ul class="list-unstyled">
          <li><a href="contactUs" class="text-white text-decoration-none">Support</a></li>
          <li><a href="register" class="text-white text-decoration-none">Partner with us</a></li>
          <li class="text-white mt-2">Email: MkanakCompany@gmail.com</li>
          <li class="text-white">Tel: +01050100978</li>
        </ul>
      </div>
    </div>

    <!-- Copyright Section -->
    <div class="text-center mt-4">
      <p class="mb-0">&copy; 2024 MKANAK Limited. All rights reserved</p>
    </div>
  </div> 

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>

function alert(type, msg, position = 'body') {
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show " role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

    if (position == 'body') {
        document.body.append(element);
        element.classList.add('custom-alert');
    } else {
        document.getElementById(position).appendChild(element);
    }
    setTimeout(function() {
        element.remove();
    }, 3000);
}



let register_form=document.getElementById('register-form');

register_form.addEventListener('submit',(e)=>{

e.preventDefault();
let data=new FormData();
data.append('name',register_form.elements['name'].value);
data.append('email',register_form.elements['email'].value);
data.append('phonenum',register_form.elements['phonenum'].value);
data.append('address',register_form.elements['address'].value);
data.append('dob',register_form.elements['dob'].value);
data.append('pass',register_form.elements['pass'].value);
data.append('cpass',register_form.elements['cpass'].value);
data.append('profile',register_form.elements['profile'].files[0]);
data.append('register','');

var myModal=document.getElementById('registerModal');
var modal=bootstrap.Modal.getInstance(myModal);
modal.hide();

let xhr=new XMLHttpRequest();
xhr.open("POST","ajax/login_register.php",true);

xhr.onload=function(){
  console.log(this.responseText); // Debugging to check response

  if(this.responseText=='pass_mismatch'){
    alert('error',"PASSWORD MISMATCH");
  }
    else if(this.responseText=='email_already'){
      alert('error',"Email is already registered!");
    }
    else if(this.responseText=='phone_already'){
      alert('error',"phone is already registered!");
    }
    else if(this.responseText=='inv_img'){
      alert('error',"Only jpg");
    }
    else if(this.responseText=='upd_failed'){
      alert('error',"image upload failed");
    }
    else if(this.responseText=='mail_failed'){
      alert('error',"cannot send confirmation mail server down");
    }
    else if(this.responseText=='ins_failed'){
      alert('error',"registration failed");
    }
    else{
      alert('success',"REGISTRATION SUCCESSFUL");
      register_form.reset();
      modal.hide();
    }
  }

xhr.send(data);


});




let login_form = document.getElementById('login-form');
login_form.addEventListener('submit', (e) => {
    e.preventDefault();
    let data = new FormData();
    data.append('email', login_form.elements['email'].value);
    data.append('pass', login_form.elements['pass'].value);
    data.append('login', '');

    var myModal = document.getElementById('loginModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);

xhr.onload = function () {
    console.log(this.responseText);  // Log the response for debugging
    if (this.responseText == 'inv_email') {
        alert('error', "Invalid email");
    }
    else if (this.responseText == 'not_verified') {
        alert('error', "Email is not verified!");
    }
    else if (this.responseText == 'inactive') {
        alert('error', "Account suspended");
    }
    else if (this.responseText == 'inv_pass') {
        alert('error', "Incorrect password");
    } 
    else if (this.responseText == 'inv_img') {
        alert('error', "Only jpg images allowed");
    } 
    else {
        window.location = window.location.pathname; // Reload page
    }
};



xhr.send(data);


});


  </script>

  