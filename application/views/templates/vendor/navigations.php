<div class="container">

    <!-- Alerts -->
    <div id="alert" class="w-75 position-absolute start-50 translate-middle mt-5" style="z-index: 1; top: 10%;">
        <?php
        if ($this->session->tempdata('notice') != NULL) {
            echo '<div class="alert alert-success shadow alert-dismissible fade show" role="alert">';
            echo '<i class="fas fa-info-circle fa-fw"></i> ' . $this->session->tempdata('notice');
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        if ($this->session->tempdata('error') != NULL) {
            echo '<div class="alert alert-danger shadow alert-dismissible fade show" role="alert">';
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
                    <h3 class="text-capitalize fw-light">Welcome, <?php echo $_SESSION['user'];?>.</h3>
                </div>
            </div>
            <div class="row pb-2">
                <div class="col">
                    <div class="list-group bg-white shadow">
                        <a href="<?php echo base_url(); ?>vendor/orders" class="list-group-item list-group-item-action <?php if ($this->uri->segment(2) == 'orders') echo 'active'; ?>">Active Orders</a>
                        <a href="<?php echo base_url(); ?>vendor/catalogs" class="list-group-item list-group-item-action <?php if ($this->uri->segment(2) == 'catalogs') echo 'active'; ?>">Your Catalogs</a>
                        <a href="<?php echo base_url(); ?>logout" class="list-group-item list-group-item-action text-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>