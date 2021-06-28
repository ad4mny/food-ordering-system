<header class="hero-bg">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center text-white">
                <h1 class="font-weight-light">Welcome, Adam!</h1>
                <p class="lead text-white">Browse meal to feed your tummy now.</p>
                <a href="profile?act=update" class="btn btn-outline-light">Update Info</a>
            </div>
        </div>
    </div>
</header>

<!-- Modal Signup -->
<div class="modal fade" id="modal_signup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body mx-4">
                <form action="action.php" method="post" id="signup_form">
                    <div class="mb-3 text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Create An Account.</h4>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="uil uil-user-circle"></i></div>
                            </div>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="uil uil-phone"></i></div>
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your contact number">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="uil uil-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="usr" name="username" placeholder="Create a username">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="uil uil-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" id="pwd" name="password" placeholder="Choose a password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="uil uil-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" id="c_pwd" name="confirm_password" placeholder="Confirm the password">
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <button type="submit" class="btn btn-success" name="submit"><i class="uil uil-sign-in-alt"></i> Sign Up</button>
                    </div>
                    <div class="my-3 text-center">
                        <small class="text-muted">
                           Already have an account? <a href="#" class="text-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modal_login">Login</a>.
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Vendor -->
<div class="modal fade" id="modal_vendor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="action.php" method="post" id="vendor_form">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Become a vendor!</h4>
                </div>
                <div class="modal-body mx-3">
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter shop name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="shop_username" name="shop_username" placeholder="Create a shop username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control" id="shop_password" name="shop_password" placeholder="Choose a password">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control" id="shop_confirm_password" name="shop_confirm_password" placeholder="Confirm password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="col text-center">
                        <input type="hidden" name="signup" value="vendor">
                        <input type="submit" class="btn btn-default" value="Register">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="modal_login" tabindex="-1" aria-labelledby="modal_loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body mx-4">
                <form action="" method="post" id="login_form">
                    <div class="mb-3">
                        <h4 class="modal-title w-100 font-weight-bold text-center">Hello.</h4>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="uil uil-user"></i></div>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="uil uil-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <button type="submit" class="btn btn-success">
                            <i class="uil uil-sign-in-alt"></i> Login
                        </button>
                    </div>
                    <div class="my-3">
                        <small class="text-muted">
                            Don't have an account? <a href="" class="text-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modal_signup">Sign up</a>.
                        </small><br>
                        <small class="text-muted">
                            Become a vendor, register <a href="" class="text-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modal_vendor">here</a>.
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>