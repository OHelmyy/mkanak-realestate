<nav class="navbar navbar-expand-lg sticky-top shadow-sm"
    style="background-color: #D13222; color: white; padding: 1rem 1.5rem;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3 h-font" href="index.php"
            style="color: white; letter-spacing: 2px;">MKANAK</a>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation" style="border-color: white;">
            <span class="navbar-toggler-icon"
                style="background-image: url('data:image/svg+xml,%3Csvg xmlns%3D%22http://www.w3.org/2000/svg%22 fill%3D%22white%22 viewBox%3D%220 0 30 30%22%3E%3Cpath stroke%3D%22white%22 stroke-width%3D%222%22 stroke-linecap%3D%22round%22 stroke-miterlimit%3D%2210%22 d%3D%22M4 7h22M4 15h22M4 23h22%22/%3E%3C/svg%3E');"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fs-6">
                <li class="nav-item">
                    <a class="nav-link active me-3" href="index.php" style="color: white; transition: color 0.3s;"
                        onmouseover="this.style.color='black'" onmouseout="this.style.color='white'">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="find.php" style="color: white; transition: color 0.3s;"
                        onmouseover="this.style.color='black'" onmouseout="this.style.color='white'">Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="#" style="color: white; transition: color 0.3s;"
                        onmouseover="this.style.color='black'" onmouseout="this.style.color='white'">Find Agency</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="contact.php" style="color: white; transition: color 0.3s;"
                        onmouseover="this.style.color='black'" onmouseout="this.style.color='white'">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="main_profile.php" style="color: white; transition: color 0.3s;"
                        onmouseover="this.style.color='black'" onmouseout="this.style.color='white'">My profile</a>
                </li>
            </ul>


            <div class="d-flex ms-auto">
                <?php

                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                    $path=USERS_IMG_PATH;
                    echo <<<data
                        <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <img src="$path$_SESSION[uPic]" style="width:25px;height:25px;"class"me-1">
                        $_SESSION[uName]
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" type="button">My Profile</a></li>
                            <li><a class="dropdown-item" type="button">Favourites</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                        </div>


                            


                    data;
                }
                else{
                echo<<<data

                     <button type="button" class="btn btn-outline-light shadow-none me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                     Login
                     </button>
                     <button type="button" class="btn btn-outline-light shadow-none" data-bs-toggle="modal"data-bs-target="#registerModal">
                     Register
                     </button>

            

                data;
                }


                ?>

            </div>
        </div>
    </div>
</nav>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header " style="background-color: white; color: #D13222;">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input name=email type="email" required class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn shadow-none"
                            style="background-color: red; color: white; border: none;  transition: background-color 0.3s;">LOGIN</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form" method="POST">
                <div class="modal-header" style="background-color: white; color: #D13222;">
                    <h5 class="modal-title d-flex align-items-center ">
                        <i class="bi bi-person-vcard fs-3 me-2"></i> User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                        NOTE: Your Details Must Match With Your ID
                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Form Fields Here -->
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input name="phonenum" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Picture</label>
                                <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp " class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Date Of Birth</label>
                                <input name="dob" type="date"  class="form-control shadow-none" rows="1" required></i>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <div class="text-center my-2">
                            <button type="submit" class="btn btn-dark shadow-none"
                                style="background-color: red; color: white; border: none;  transition: background-color 0.3s;">REGISTER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>