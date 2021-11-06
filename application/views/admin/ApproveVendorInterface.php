<div class="col">
    <div class="row pb-1 border-bottom">
        <div class="col">
            <h1 class="fw-light d-flex align-items-center"><i class="fas fa-bars fa-fw fa-xs me-2"></i> Dashboard</h1>
        </div>
    </div>
    <div class="row row-cols-3 g-3">

        <?php if (isset($vendors) && is_array($vendors) && $vendors !== false) {
            foreach ($vendors as $row) { ?>
                <div class="col ">
                    <div class="bg-white rounded-3 shadow py-2 px-4 position-relative">

                        <small>Vendor Name</small>
                        <h5 class=" text-capitalize fw-bold"><?php echo $row['ud_full_name']; ?></h5>
                        <small>Vendor Contact</small>
                        <h5 class=" fw-bold"><?php echo $row['ud_contact']; ?></h5>
                        <?php if ($row['ud_status'] == 0) { ?>
                            <div class="position-absolute end-0 top-0 m-2">
                                <a href="<?php echo base_url() . 'admin/vendor/approve/' . $row['ud_id']; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-check fa-fw fa-sm"></i>
                                </a>
                                <a href="<?php echo base_url() . 'admin/vendor/delete/' . $row['ud_id']; ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-times fa-fw fa-sm"></i>
                                </a>
                            </div>
                        <?php } else { ?>
                            <div class="position-absolute end-0 top-0 m-2">
                                <span class="text-success">
                                    <i class="fas fa-check fa-fw fa-sm"></i>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="row bg-white rounded-3 shadow-sm mb-2 py-2 d-flex align-items-center justify-content-center text-center">
                <div class="col">
                    <p class="mb-0">No registered vendor.</p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>