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
            <div class="col-12 col-md-4">
                <div class="m-2 p-4 bg-white rounded-3 shadow-sm">
                    <h4 class="pb-3 text-capitalize">Hi, <?php echo $profiles['ud_username']; ?>.</h4>
                    <div class="form-group mb-2">
                        <small>Name</small>
                        <p class="text-capitalize"> <?php echo $profiles['ud_full_name']; ?></p>
                    </div>
                    <div class="form-group mb-2">
                        <small>Contact</small>
                        <p class="text-capitalize"> <?php echo $profiles['ud_contact']; ?></p>
                    </div>
                    <div class="form-group ">
                        <a href="<?php echo base_url(); ?>profile/update" class="btn btn-primary">Update Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="m-2 p-4 bg-white rounded-3 shadow-sm">
                    <h4 class="pb-2">Order History</h4>
                    <?php
                    if (isset($histories) && $histories !== false) {
                        foreach ($histories as $row) {
                    ?>
                            <div class="row py-1 border-top">
                                <div class="col-3 d-none d-md-flex align-items-center">
                                    <?php
                                    if ($row['cd_img'] !== null) {
                                        echo '<img src="' . base_url() . 'assets/' . $row['cd_img'] . '" alt="No Image" class="img-fluid d-none d-md-block"/>';
                                    } else {
                                        echo '<img src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="No Image" class="img-fluid d-none d-md-block"/>';
                                    }
                                    ?>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="mx-md-2">
                                        <p class="text-capitalize mb-0 fs-sm-6"><?php echo $row['cd_name']; ?></p>
                                    </div>
                                </div>
                                <div class="col-1 text-center d-flex align-items-center justify-content-center">
                                    <p class="mb-0">x<?php echo  $row['od_quantity']; ?></p>
                                </div>
                                <div class="col-5 col-md-2 text-end d-md-flex align-items-center justify-content-center">
                                    <p class="mb-0">RM <?php echo number_format((float)$row['cd_price']  * $row['od_quantity'], 2, '.', ''); ?></p>
                                </div>
                            </div>
                    <?php }
                    } else {
                        echo '<div class="row"><div class="col"><p> No order have been made yet.</p></div></div>';
                    }
                    ?>
                </div>
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