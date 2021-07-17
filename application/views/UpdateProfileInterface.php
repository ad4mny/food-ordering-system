<div class="container my-5">
    <div class="row border-md-bottom pb-2 text-center text-md-start">
        <div class="col-12 col-md-9">
            <h1 class="fw-light"><i class="fas fa-user fa-fw"></i> Profile</h1>
        </div>
    </div>
    <div class="row pb-2">
        <?php
        if (isset($profiles) && $profiles !== false) {
        ?>
            <div class="col-4">
                <form method="post" action="<?php echo base_url(); ?>/profile/submit">
                    <div class="m-2 p-4 bg-white rounded-3 shadow-sm">
                        <div class="form-group mb-3">
                            <p class="mb-0 text-capitalize">Username</p>
                            <input class="form-control" name="username" value="<?php echo $profiles['ud_username']; ?>" placeholder="Change your username">
                        </div>
                        <div class="form-group mb-3">
                            <p class="mb-0 text-capitalize">Name</p>
                            <input class="form-control" name="name" value="<?php echo $profiles['ud_full_name']; ?>" placeholder="Enter your name">
                        </div>
                        <div class="form-group mb-3">
                            <p class="mb-0 text-capitalize">Contact</p>
                            <input class="form-control" name="contact" value="<?php echo $profiles['ud_contact']; ?>" placeholder="Enter your contact number">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-outline-primary" name="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php
        } else {
            redirect(base_url() . 'logout');
        } ?>
    </div>
    <div class="row pb-5 d-md-none">
        <div class="col text-center">
            <a href="<?php echo base_url(); ?>logout" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>