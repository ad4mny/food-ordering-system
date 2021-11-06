<div class="container">

    <!-- Alerts -->
    <div id="alert" class="w-75 position-absolute start-50 translate-middle mt-5" style="z-index: 1; top: 10%;">
        <?php
        if ($this->session->tempdata('notice') != NULL) {
            echo '<div class="alert alert-success border-0 shadow alert-dismissible fade show" role="alert">';
            echo '<i class="fas fa-info-circle fa-fw"></i> ' . $this->session->tempdata('notice');
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        if ($this->session->tempdata('error') != NULL) {
            echo '<div class="alert alert-danger border-0 shadow alert-dismissible fade show" role="alert">';
            echo '<i class="fas fa-exclamation-circle fa-fw"></i> ' . $this->session->tempdata('error');
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Navigations -->
    <div class="row my-5">
        <div class="col-4">
            <div class="row pb-2">
                <div class="col">
                    <h3 class="text-capitalize fw-light">Welcome, <?php echo $_SESSION['user']; ?> (Admin).</h3>
                </div>
            </div>
            <div class="row pb-2">
                <div class="col">
                    <div class="list-group bg-white shadow">
                        <a href="<?php echo base_url(); ?>admin/dashboard" class="list-group-item list-group-item-action <?php if ($this->uri->segment(2) == 'dashboard') echo 'active'; ?>">Dashboard</a>
                        <a href="<?php echo base_url(); ?>admin/vendor" class="list-group-item list-group-item-action <?php if ($this->uri->segment(2) == 'orders') echo 'active'; ?>">Approve Vendor</a>
                        <a href="<?php echo base_url(); ?>admin/catalog" class="list-group-item list-group-item-action <?php if ($this->uri->segment(2) == 'catalogs') echo 'active'; ?>">View Cafe's Catalog</a>
                        <a href="<?php echo base_url(); ?>admin/table" class="list-group-item list-group-item-action <?php if ($this->uri->segment(2) == 'catalogs') echo 'active'; ?>">Add Cafe's Table</a>
                        <a href="<?php echo base_url(); ?>logout" class="list-group-item list-group-item-action text-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>