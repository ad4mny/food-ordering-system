<div class="container my-5">
    <div class="row m-4 border-md-bottom pb-2 text-center text-md-start">
        <div class="col-12 col-md-9">
            <h2 class="display-4"><i class="fas fa-utensils fa-fw"></i> Browse Menu</h2>
        </div>
        <div class="col-12 col-md-3 m-auto ">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                <input type="text" id="search_box" class="form-control" placeholder="Search Menu">
            </div>
        </div>
    </div>
    <div class="row m-md-4">
        <div class="col">
            <div class="row row-cols-1 row-cols-md-3 g-4" id="display_area">
                <?php if (isset($menus) && is_array($menus)) {
                    foreach ($menus as $row) { ?>
                        <div class="col d-flex justify-content-center align-items-center">

                            <div class="card text-left" style="width: 18rem;">
                                <?php
                                if ($row['cd_img'] != null) {
                                    echo '<img class="card-img-top" src="img/menu/' . $row['cd_img'] . '" alt="No Image">';
                                } else {
                                    echo '<img class="card-img-top" src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="No Image">';
                                }
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title text-capitalize mb-0"><?php echo $row['cd_name']; ?></h5>
                                    <small class="card-text text-capitalize text-muted"><?php echo $row['ud_full_name'] . "'s Shop"; ?></small>
                                    <p class="card-text"><?php echo $row['cd_desc']; ?></p>
                                    <?php if (!isset($_SESSION['order'][$row['cd_id']])) { ?>
                                        <div class="d-flex justify-content-between align-items-middle">
                                            <a href="<?php echo base_url(); ?>checkout/add/<?php echo $row['cd_id']; ?>" class="btn btn-success">
                                                <i class="fas fa-plus fa-fw"></i>
                                                <span>RM <?php echo number_format($row['cd_price'], 2); ?></span>
                                            </a>
                                            <button class="btn text-muted">
                                                <i class="fas fa-info-circle fa-fw"></i>
                                            </button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex justify-content-between align-items-middle">
                                            <button class="btn btn-secondary" disabled>
                                                <i class="fas fa-check fa-fw"></i>
                                                <span>RM <?php echo number_format($row['cd_price'], 2); ?></span>
                                            </button>
                                            <button class="btn text-muted">
                                                <i class="fas fa-info-circle fa-fw"></i>
                                            </button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>
    </div>
</div>