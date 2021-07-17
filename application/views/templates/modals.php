<!-- Modal Signup -->
<div class="modal fade" id="modal_signup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body mx-4">
                <form action="<?php echo base_url(); ?>signup" method="post">
                    <div class="mb-3 text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Create An Account</h4>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-user-circle fa-fw"></i></span>
                            <input type="text" class="form-control" id="fullname" name="name" placeholder="Enter your full name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-phone fa-fw"></i></span>
                            <input type="text" class="form-control" id="phone" name="contact" placeholder="Enter your contact number">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
                            <input type="text" class="form-control" id="usr" name="username" placeholder="Create a username">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-lock fa-fw"></i></span>
                            <input type="password" class="form-control" id="pwd" name="password" placeholder="Choose a password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-lock fa-fw"></i></span>
                            <input type="password" class="form-control" id="c_pwd" name="confirm_password" placeholder="Confirm the password">
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <input type="hidden" name="role" value="0">
                        <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-sign-in-alt"></i> Sign Up</button>
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

<!-- Modal Signup -->
<div class="modal fade" id="modal_vendor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body mx-4">
                <form action="<?php echo base_url(); ?>signup" method="post">
                    <div class="mb-3 text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Apply Shop Vendor</h4>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-user-circle fa-fw"></i></span>
                            <input type="text" class="form-control" name="name" placeholder="Enter the vendor name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-phone fa-fw"></i></span>
                            <input type="text" class="form-control" name="contact" placeholder="Enter vendor contact number">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Create a vendor username">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-lock fa-fw"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Choose a password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-lock fa-fw"></i></span>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm the password">
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <input type="hidden" name="role" value="1">
                        <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-sign-in-alt"></i> Apply Now</button>
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

<!-- Modal Login -->
<div class="modal fade" id="modal_login" tabindex="-1" aria-labelledby="modal_loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body mx-4">
                <form action="<?php echo base_url(); ?>login" method="post">
                    <div class="mb-3">
                        <h4 class="modal-title w-100 font-weight-bold text-center">Hello.</h4>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock fa-fw"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <button type="submit" class="btn btn-success" name="submit">
                            <i class="fas fa-sign-in-alt"></i> Login
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