<!-- Navigations -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top d-none d-lg-block">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="#">eHungry</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(1) == '') echo 'active border-bottom border-success'; ?>" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'catalog') echo 'active border-bottom border-success'; ?>" href="<?php echo base_url(); ?>catalog">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'table') echo 'active border-bottom border-success'; ?>" href="<?php echo base_url(); ?>table">Book A Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'about') echo 'active border-bottom border-success'; ?>" href="<?php echo base_url(); ?>about">About</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php if (!isset($_SESSION['order'])) { ?>
                    <a href="<?php echo base_url(); ?>checkout" class="btn <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success '; ?>">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo base_url(); ?>checkout" class="btn position-relative <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success' ?>">
                        <i class="fas fa-shopping-basket"></i>
                        <span class="position-absolute badge rounded-pill bg-danger end-0">
                            <small> <?php echo sizeof($_SESSION['order']); ?></small>
                        </span>
                    </a>
                <?php }  ?>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modal_login">
                    <i class="fas fa-sign-in-alt"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
<!-- Mobile Toolbar -->
<div class="bg-white d-block d-lg-none d-inline-flex w-100 border-top shadow-sm ">
    <div class="p-2 flex-fill">
        <p class="mb-0 text-success fw-bold text-center">eHungry</p>
    </div>
</div>
<!-- Mobile Appbar -->
<div class="bg-white fixed-bottom d-block d-lg-none d-inline-flex w-100 border-top shadow-sm ">
    <div class="p-2 flex-fill">
        <a class="btn <?php if ($this->uri->segment(1) == '') echo 'text-success'; ?>" href="<?php echo base_url(); ?>">
            <i class="fas fa-home fa-fw fa-lg"></i>
        </a>
    </div>
    <div class="p-2 flex-fill">
        <a class="btn <?php if ($this->uri->segment(1) == 'catalog') echo 'text-success '; ?>" href="<?php echo base_url(); ?>catalog">
            <i class="fas fa-utensils fa-fw fa-lg"></i>
        </a>
    </div>
    <div class="p-2 flex-fill">
        <a class="btn <?php if ($this->uri->segment(1) == 'table') echo 'text-success '; ?>" href="<?php echo base_url(); ?>table">
            <i class="fas fa-table fa-fw fa-lg"></i>
        </a>
    </div>
    <div class="p-2 flex-fill">
        <?php if (!isset($_SESSION['order'])) { ?>
            <a href="<?php echo base_url(); ?>checkout" class="btn <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success'; ?>">
                <i class="fas fa-shopping-basket fa-fw fa-lg"></i>
            </a>
        <?php } else { ?>
            <a href="<?php echo base_url(); ?>checkout" class="btn position-relative <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success' ?>">
                <i class="fas fa-shopping-basket fa-fw fa-lg"></i>
                <span class="position-absolute badge rounded-pill bg-danger end-0">
                    <small> <?php echo sizeof($_SESSION['order']); ?></small>
                </span>
            </a>
        <?php }  ?>
    </div>
    <div class="p-2 flex-fill">
        <button class="btn" data-bs-toggle="modal" data-bs-target="#modal_login">
            <i class="fas fa-user fa-fw fa-lg"></i>
        </button>
    </div>
</div>

<!-- Alerts -->
<div id="alert" style="position:absolute;z-index:1;" class="m-5">
</div>